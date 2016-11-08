<?php

class Document extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('documentmodel');
        $this->load->model('teachermodel');
        $this->load->model('studentmodel');
        $this->load->model('control_status');
        $this->load->model('control_statusdoc');
    }

    public function menudocument() {
        $user = $this->session->userdata('user');
        $year = $this->control_status->getbyyear();
//        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
//        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $data['document'] = $this->documentmodel->document_1($user['id_st'], $year[0]['year']);
        //        print_r($data);
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $this->load->view('document/menudocument', $data);
    }

    public function chackshowdata() {
        $user = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
//        print_r($year);
//        extract($this->session->userdata($query[0]));
        // print_r($user);
        $data['establish'] = $this->studentmodel->getdatabyyear($user['id_st'], $year[0]['year']);
//       print_r($es);
        $data['userdata'] = $this->documentmodel->showuserdata($user['id_st'], $year[0]['year']);
//        echo $this->db->last_query();
//        print_r($data);
        if ($data['userdata'] == null) {
            $this->document_num1();
        } else {

            $this->showdata_form1();
        }
    }

    public function showdatafdocument1() {
        $user = $this->session->userdata('user');
        $year = $this->control_status->getbyyear();
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar', $user);
        $data['userdata'] = $this->documentmodel->showuserdata($user['id_st'], $year[0]['year']);
        $data['establish'] = $this->studentmodel->getdatabyyear($user['id_st'], $year[0]['year']);
        if ($data != NULL) {
            $this->load->view('document/showupdate', $data);
        }
        echo NULL;
        $this->load->view('template/foot');
    }

    public function document_num1() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar', $user);
        $data['userdata'] = $this->studentmodel->getdatabyyear($user['id_st'], $year[0]['year']);
        //print_r($data);
        $this->load->view('document/document_form1', $data);
//        print_r($data);
        $this->load->view('template/footer');
    }

    public function showdata_form1() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $data['establish'] = $this->studentmodel->getdatabyyear($user['id_st'], $year[0]['year']);
//        echo $this->db->last_query();
        //print_r($user);
        $data['userdata'] = $this->documentmodel->showuserdata($user['id_st'], $year[0]['year']);
//        echo $this->db->last_query();
//        echo "<pre>";
//        print_r($data);
//        echo "<pre>";
        $this->load->view('document/showdata_form1', $data);
        $this->load->view('template/foot');
    }

    public function adddocument_num1() {
        $user = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        list($a, $b) = explode(',', $this->input->post('map'), 2);
        $a = trim($a, "(");
        $b = trim($b, ")");

        $data = array(
            'address_home' => $this->input->post('address_home'),
            'phone' => $this->input->post('phone'),
            'fax' => $this->input->post('fax'),
            'name_contact' => $this->input->post('name_contact'),
            'lastname_contact' => $this->input->post('lastname_contact'),
            'address_contact' => $this->input->post('address_contact'),
            'phone_contact' => $this->input->post('phone_contact'),
            'fax_contact' => $this->input->post('fax_contact'),
            'lat' => $a,
            'lng' => $b,
                //'info'=>  $this->input->post('info'),
        );
        $data['id_st'] = $user['id_st'];
        $data['year'] = $year[0]['year'];
        $data['semester'] = $semester[0]['semester'];
//        print_r($data);

        $this->documentmodel->insertdata($data);
        $this->showdata_form1();
    }

    public function form_update() {
        $user = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
//        extract($this->session->userdata($query[0]));
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar', $user);
        $data['establish'] = $this->studentmodel->getdatabyyear($user['id_st'], $year[0]['year'], $semester[0]['semester']);
        $data['userdata'] = $this->documentmodel->showuserdata($user['id_st'], $year[0]['year'], $semester[0]['semester']);
        //print_r($data);
        $this->load->view('document/document_update', $data);
        $this->load->view('template/foot');
    }

    public function updatedata() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $year = $this->teachermodel->selectyear_max();
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
//        list($a, $b) = explode(',', $this->input->post('map'), 2);
//        $a = trim($a, "(");
//        $b = trim($b, ")");
        $data = array(
            'address_home' => $this->input->post('address_home'),
            'phone' => $this->input->post('phone'),
            'fax' => $this->input->post('fax'),
            'name_contact' => $this->input->post('name_contact'),
            'lastname_contact' => $this->input->post('lastname_contact'),
            'address_contact' => $this->input->post('address_contact'),
            'phone_contact' => $this->input->post('phone_contact'),
            'fax_contact' => $this->input->post('fax_contact'),
//            'lat' => $a,
//            'lng' => $b,
        );
        //        print_r($data);
        $this->documentmodel->update($data, $user['id_st'], $year[0]['year'], $semester[0]['semester']);
        $datauser['establish'] = $this->studentmodel->getdatabyyear($user['id_st'], $year[0]['year'], $semester[0]['semester']);
        $datauser['userdata'] = $this->documentmodel->showuserdata($user['id_st'], $year[0]['year'], $semester[0]['semester']);
//        echo $this->db->last_query();
//        print_r($datauser);
        $this->load->view('document/showupdate', $datauser);
        $this->load->view('template/foot');
    }

    //----------uploadocument---------//
    public function do_upload() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        $year = $this->teachermodel->selectyear_max();
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'pdf|PDF';
        $config['max_size'] = '1000';
        $config['encrypt_name'] = true;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            
        } else {
            $data = $this->upload->data();
            $data['id'] = $this->input->post('docment_number');
            $data['id_st'] = $user['id_st'];
            $data['year'] = $year[0]['year'];
            $data['semester'] = $semester[0]['semester'];

            echo json_encode($data);
            $file = $this->documentmodel->uploadfile($data);
        }
    }

// //    public function getfile() {
// //        $user = $this->session->userdata('user');
// //        $year = $this->documentmodel->getbyyear($user['id_st']);
// //        $st_es = $this->documentmodel->getfile($user['id_st'],$year[0],['year']);
// //        print_r($st_es);
// //
// //        foreach ($st_es as $value) {
// //            $json = array();
// //            if (sizeof($value) > 0) {
// //                $info = array('info' => 'true');
// //                array_push($json, $info, $value);
// //            } else {
// //
// //                $info = array('info' => 'false');
// //                array_push($json, $info);
// //            }
// //
// //            $jsonstring = json_encode($json);
// //            echo $jsonstring;
// //        }
// //    }
    //--------- show coudemnt upload is pdf ------//
//    public function chack_document($id) {
//        $user = $this->session->userdata('user');
//        $year = $this->documentmodel->getbyyear($user['id_st']);
//        $id_st = $user['id_st'];
//        $data['id'] = $id;
//        $result['document'] = $this->documentmodel->getfile_upload($id_st, $data, $year[0]['year']);
//        if($result !=NULL){
//            $this->showpdf($id);
//        }  else {
//            $this->load->view('document/menudocument');
//        }
//    }

    public function showpdf($id) {
        $user = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
//        $year = $this->documentmodel->getbyyear($user['id_st']);
//         print_r($year);
        $id_st = $user['id_st'];
        $data['id'] = $id;
        $result = $this->documentmodel->getfile_upload($id_st, $data, $year[0]['year'], $semester[0]['semester']);
        $dataAll['documentname'] = $result[0]['document_name'];
//         if($dataAll !=NULL){
//             $this->load->view('document/viewpdf', $dataAll);
//         }  else {
//              $jsonstring = json_encode($dataAll);
//              echo $jsonstring;
//         }
////         print_r($dataAll);
        $this->load->view('document/viewpdf', $dataAll);
    }

    public function readpdf() {
        $data["id"] = $this->input->post("id");
        $user = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $result = $this->documentmodel->getfile_upload($user['id_st'], $data, $year[0]['year'], $semester[0]['semester']);
        echo json_encode($result);
    }

//------------updatestatusdocument--------------//

    public function chack_status() {
        $user = $this->session->userdata('user');
        $data["id"] = $this->input->post("id");
        //        $year = $this->documentmodel->getbyyear($user['id_st']);
        $result = $this->control_statusdoc->get_status($data['id']);
        echo json_encode($result);
    }

    public function updatefinish($id_st, $finish) {
        $year = $this->teachermodel->selectyear_max();
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $data['finish'] = $finish;
//        print_r($data);
        $this->control_status->updatefinish($id_st, $data, $year[0]['year'], $semester[0]['semester']);
        redirect('/teacher/document');
    }

//     public function showdocument() {
//         $this->load->view('include/header');
//         $this->load->model('documentmodel');
//         $this->load->model('teachermodel');
//         $document['year'] = $this->teachermodel->getbyyear();
//         //print_r($document);
//         $document['datastudent'] = $this->documentmodel->showdocument();
//         //print_r($document);
//         $this->load->view('include/navigation');
//         $this->load->view('template/sidebar_teacher');
//         $this->load->view('document/showdocument', $document);
//         $this->load->view('template/footer');
//     }
}

?>
