<?php

//Controller Establishment
class Establishment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('studentmodel');
        $this->load->model('teachermodel');
        $this->load->model('establishmodel');
        $this->load->model('documentmodel');
        $this->load->model('control_status');
    }

    // public function index(){
    //     echo("arg1")
    // }
    // public function home() {
    //     $this->load->view('home');
    //     $this->load->view('header');
    //     $this->load->view('template/navigation');
    // }

    public function addformes() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $year = $this->teachermodel->selectyear_max();
        $semester['semester_year'] = $this->teachermodel->selectyear_semester($year[0]['year']);
//        print_r($semester);
        $es = $this->establishmodel->getestablish($user['id_st'], $year[0]['year']);
//        print_r($es);
        if ($es != NULL) {
            $this->load->view('student/addestablish');
        } else {
            $this->load->view('establishment/establishment_formadd', $semester);
        }
        $this->load->view('template/footer');
    }

    public function addestablishment() {
        $user = $this->session->userdata('user');
        //        echo 'trdfgh';
//        extract($this->session->userdata());  
        // print_r($id_st);
        $data = array(
            'name_es' => $this->input->post('name_es'),
            'address_es' => $this->input->post('address_es'),
            'website' => $this->input->post('website'),
            'peple' => $this->input->post('peple'),
            'email' => $this->input->post('email'),
            'tell_es' => $this->input->post('tell_es'),
            'website' => $this->input->post('website')
        );
//         print_r($data);
        $establish = $this->establishmodel->getDb($data);
        if (empty($establish)) {
            $this->establishmodel->add($data);
            $datastd = array(
                'id_st' => $user['id_st'],
                'id_es' => $this->establishmodel->setid(),
                'year' => $this->input->post('year'),
                'semester' => $this->input->post('semester')
            );
            $this->establishmodel->addstd($datastd);
            $this->showestblis();
        } else {
            $user = $this->session->userdata('user');
            $this->load->view('template/header', $user);
            $this->load->view('template/navigation');
            $this->load->view('template/sidebar');
            $establish['msg'] = "สถานประกอบการนี้มีในระบบแล้ว";
            $establish['post'] = $this->input->post();
            $this->load->view('establishment/establishment_formadd', $establish);
        }
    }

    public function delete($id_es) {
        if ($this->establishmodel->delete($id_es) == TRUE) {
            $data['result'] = "ลบข้อมูลเรียบร้อยแล้ว";
        } else {
            $data['result'] = "ไม่สามารถลบข้อมูลได้ค่ะ";
        }
        redirect('/teacher/dataestablishall/', 'refresh');
    }

    public function getestablish() {
        $user = $this->session->userdata('user');
        $data['name_es'] = $this->input->post('name_es');
        $data['name_es'] = $this->establishmodel->getDb($data);
    }

    public function showestblis() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata());  
        $data['establish'] = $this->establishmodel->selectid($user['id_st']);
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $this->load->view('establishment/showestablish', $data);
        $this->load->view('template/foot');
    }

    public function showallestablish() {
        $dataesta['establish'] = $this->establishmodel->showall();
        $this->load->view('template/header');
        $this->load->view('template/test');
        $dataesta['year'] = $this->control_status->getbyyear();
//        print_r($dataesta);
        $dataesta['establish'] = $this->establishmodel->getestablis();
//        print_r($dataesta);
        $this->load->view('establishment/showallestablish', $dataesta);
        // $this->load->view('template/foot');
    }

    public function showdataestablish() {
        $this->load->view('template/header');
        $this->load->view('template/test');
        $year = $this->input->post('year');
//        print_r($year);
        $datastudent['establish'] = $this->establishmodel->getrelation($year);
//        print_r($datastudent);
        $datastudent['year'] = $this->control_status->getbyyear();
        $this->load->view('establishment/showallestablish', $datastudent);
        $this->load->view('template/foot');
    }

//     public function dataestablish() {
//         $this->load->model('teachermodel');
//         $this->load->model('establishmodel');
//         $this->load->view('template/header');
//         $this->load->view('template/test');
//         if (!empty($this->input->post('year'))) {
//             $year = $this->input->post('year');
//         } else {
//             $year = null;
//         }
// //        print_r($year);
//         $dataestablish['establish'] = $this->establishmodel->getshowestablish($year);
// //         print_r($dataestablish);
//         $dataestablish['year'] = $this->teachermodel->getbyyear();
//         $this->load->view('establishment/showallestablish', $dataestablish);
//         $this->load->view('template/foot');
//     }

    public function getformupdate() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata()); 
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar', $user);
        $query = $this->establishmodel->getstudentidbyestablish($user['id_st']);
        $data['establish'] = $query[0];
        // print_r($data);
        $this->load->view('establishment/update_es', $data);
        $this->load->view('template/foot');
    }

    public function update() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata());
        $data = array(
            'id_es' => $this->input->post('id_es'),
            'name_es' => $this->input->post('name_es'),
            'address_es' => $this->input->post('address_es'),
            'website' => $this->input->post('website'),
            'peple' => $this->input->post('peple'),
            'tell_es' => $this->input->post('tell_es'),
            'email' => $this->input->post('email')
        );
        ///print_r($data);
        $establish['establish'] = $this->establishmodel->update_establish($data);
        //$data['dataupdate'] = $establish[0];
        //print_r($establish);
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $this->load->view('establishment/showupdate', $establish);
//        $this->load->view('template/controlsidebar');
        $this->load->view('template/foot');
    }

    public function deletement($id_es) {
        //public function delete($id_st) {
        if ($this->establishmodel->delete($id_es) == TRUE) {
            $data['result'] = "ลบข้อมูลเรียบร้อยแล้ว";
            //$this->load->view('showall');
        } else {
            $data['result'] = "ไม่สามารถลบข้อมูลได้ค่ะ";
        }
        redirect('/establishment/showestblis/', 'refresh');
    }

    public function selectestablish() {
        $user = $this->session->userdata('user');
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $year = $this->teachermodel->selectyear_max();
        $st_es['semester_year'] = $this->teachermodel->selectyear_semester($year[0]['year']);
//        print_r($st_es);
//        $st_es['establish'] = $this->establishmodel->getname_es();
        $st_es['establish'] = $this->establishmodel->establishall();

//        $st_es = $this->studentmodel->data_es_st($user['id_st']);
//        print_r($st_es);
        $this->load->view('student/addestablish', $st_es);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
    }

    public function getname_es() {
        $user = $this->session->userdata('user');
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $st_es['establish'] = $this->establishmodel->establishall();
//        $st_es['num_row'] = $this->establishmodel->getname_es();
//        print_r($st_es);
        $this->load->view('establishment/show_establis_name', $st_es);
        $this->load->view('template/sidebar');
    }

    public function getstatus() {
        $this->load->model('establishmodel');
        $user = $this->session->userdata('user');
        $st_es = $this->studentmodel->data_es_st($user['id_st']);
        $json = array();
        if (sizeof($st_es) > 0) {
            $info = array('info' => 'true');
            array_push($json, $info, $st_es);
        } else {

            $info = array('info' => 'false');
            array_push($json, $info);
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function getname() {
        $name = $this->input->get('term');

        $this->load->model('establishmodel');
        $data = $this->establishmodel->getestablishbyname($name);
        $json = array();
        foreach ($data as $value) {
            $bus = array(
                'label' => $value['name_es'],
                'value' => $value['name_es'],
                'id' => $value['id_es']
            );
            array_push($json, $bus);
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;

        /*
          $name = $this->input->get('term');
          $json = array();
          for ($i = $name; $i < 10; $i++) {
          $bus = array(
          'lable' => $i,
          'value' => $i . "value",
          'id' => $i . "x"
          );
          array_push($json, $bus);
          }
          echo json_encode($json);

         */
    }

    public function getDetail($id) {
        $id_es = $id;
        $this->load->model('establishmodel');
        $data = $this->establishmodel->getDetail($id_es);
        echo json_encode($data[0]);
    }

    public function add_establish() {
        $user = $this->session->userdata('user');
        $data = array(
            'id_es' => $this->input->post('id_es'),
            'semester' => $this->input->post('semester'),
            'year' => $this->input->post('year'),
        );
//        $data['term']='2';
//        $data['year']='2558';
        $data['id_st'] = $user['id_st'];
        $data = $this->establishmodel->add_idestablish($data);
//        $this->load->view('template/header', $user);
//        $this->load->view('template/sidebar');
        //redirect('/student/login/');        
        redirect('/student/selectestablish/');
    }

//     public function getestablishment($id_es) {
//         $this->load->view('template/teacher_header');
//         $this->load->model('establishmodel');
//         $data['establish'] = $this->establishmodel->getDetail($id_es);
//         $this->load->view('teacher/showDetailestablish', $data);
//     }
//     public function getditail() {
//         $this->load->model('establishmodel');
//         $user = $this->session->userdata('user');
//         $st_es = $this->establishmodel->checkid($user['id_st']);
//     }
//    public function resultDataestablish() {
//        $user = $this->session->userdata('user');
//
//        $data = $this->establishmodel->getstudentidbyestablish($user['id_st']);
//        print_r($data);
////        print_r($major);
////        foreach ($major as $value) {
////            echo "<option value='$value->major_id'>$value->name_major</option>";
////        }
//    }
//    }
}

?>
