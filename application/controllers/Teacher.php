<?php

class Teacher extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('teachermodel');
        $this->load->model('studentmodel');
        $this->load->model('establishmodel');
        $this->load->model('documentmodel');
        $this->load->model('control_status');
        $this->load->model('control_statusdoc');
        $this->load->model('orientationmodel');
        if ($user_teacher = $this->session->userdata('user') == NULL) {
            redirect('login/Login');
        }
    }

    public function home() {
        $user_teacher = $this->session->userdata('user');
//        print_r($user_teacher);
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/menuteacher');
        $this->load->view('template/foot');
    }

    public function menu() {
        $user_teacher = $this->session->userdata('user');
//        print_r($user_teacher);
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/menuteacher');
//        print_r($user_teacher);
        $this->load->view('template/foot');
    }

////-----------------กำหนดการส่งเอกสาร-----------------//
    public function document() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->model('documentmodel');
        $document['datadocument'] = $this->control_statusdoc->getdocument();
        $this->load->view('teacher/chack_status', $document);
//        $this->load->view('template/foot');
    }

    public function updateStatus($number_document, $status) {
        $data['status'] = $status;
        //print_r($data);
        $this->control_statusdoc->updateStatus($number_document, $data);
        redirect('/teacher/document');
    }

    public function adddate_seddocument() {
        $data = array(
            'startdate' => $this->input->post('date'),
            'number_document' => $this->input->post('id')
        );
        $this->control_statusdoc->adddate_seddocument($data);
        echo json_encode($data);
    }

    public function getdatadocument() {
        $user_teacher = $this->session->userdata('user');
        $year1 = $this->teachermodel->selectyear_max();
        $year = $year1[0];
//        print_r($year);
        $semester1 = $this->teachermodel->selectyear_semester($year['year']);
        $semester = $semester1[0];
//        print_r($semester);
        $semester_post['semester'] = $this->input->post('semester');
        $year_post['year'] = $this->input->post('year');
        if ($year_post['year'] != 0) {
            $data['datastudent'] = $this->documentmodel->getdatadocument($year_post['year'], $semester_post['semester']);
            $this->load->view('template/header', $user_teacher);
            $this->load->view('document/newshowdocument', $data);
        } else {
            $data['datastudent'] = $this->documentmodel->getdatadocument($year['year'], $semester['semester']);
            $data['status'] = $this->documentmodel->getfinish($year['year']);
//        echo $this->db->last_query();
            $data['year'] = $this->teachermodel->year();
//        print_r($data);
            $this->load->view('template/header', $user_teacher);
            $this->load->view('include/navigation');
            $this->load->view('template/sidebar_teacher');
            $this->load->view('document/showdocument', $data);
            $this->load->view('template/foot');
        }

//        echo $this->db->last_query();
    }

    public function showdatadocument1() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $year = $this->uri->segment(3);
        $id_st = $this->uri->segment(4);
//        print_r($id_st);
//        print_r($year);
        $data['userdata'] = $this->documentmodel->showuserdata($id_st, $year);

        $this->load->view('document/showdocument1', $data);
        $this->load->view('template/foot');
    }

//
//    /* ----------manage data establishment----------- */

    public function dataestablishall() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');

        $dataestablish['establsih'] = $this->establishmodel->establishall();
        $this->load->view('teacher/dataestablishall', $dataestablish);
        $this->load->view('template/foot');
    }

    public function showdetailestablish($id_es) {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->model('establishmodel');
        $establish['establish'] = $this->establishmodel->showdata($id_es);
        //$establish['establish'] = $query[0];

        $this->load->view('establishment/Detailestablish', $establish);
        $this->load->view('template/foot');
    }

//
//    /* ----------manage data teacher----------- */

    public function formadd_teacher() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/formadd_teacher');
        $this->load->view('template/footer');
    }

    public function addteacher() {
        $user_teacher = $this->session->userdata('user');
        $data = array(
            'teacher_name' => $this->input->post('teacher_name'),
            'teacher_lastname' => $this->input->post('teacher_lastname'),
            'phone' => $this->input->post('phone'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );
        $teacher = $this->teachermodel->teacher_Username($data['username']);
        if ($teacher != NULL) {
            $datateacher["info"] = "duplicate_username";
        } else {
            $this->teachermodel->addteacher($data);
            $datateacher["info"] = "success";
        }
        echo json_encode($datateacher);


//        redirect('/teacher/showdatateacher/', 'refresh');
        //$this->showdatateacher();
    }

//
////---------------กำหนดสิทธิ์ให้อาจารย์-------------//
    public function updatefunction($teacher_id, $function) {
        $data['function'] = $function;
//        //print_r($data);
        $this->teachermodel->updatefunction($teacher_id, $data);
//        redirect('/teacher/showdatateacher');
        json_encode($data);
    }

//
////----------------------------------------------//
    public function showdatateacher() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->model('teachermodel');
        $data['datateacher'] = $this->teachermodel->showdata();

        $this->load->view('teacher/showdatateacher', $data);
        $this->load->view('template/foot');
    }

//
    public function teacherUsername() {
        $username = $this->input->post('username');
        echo $username;
        if ($username != null) {
            $data = $this->teachermodel->teacher_Username($username);
            if ($data != null) {
                print_r($data);
            } else {
                echo 'false';
            }
        } else {
            echo ' ';
        }
    }

    public function formupdate($teacher_id) {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->model('teachermodel');
        $data['teacher'] = $this->teachermodel->getdatateacher($teacher_id);
        // print_r($data);
        //$datateacher['teacher']=$data[0];
        $this->load->view('teacher/update_datateacher', $data);
        $this->load->view('template/foot');
    }

    public function update_teacher() {
        $user_teacher = $this->session->userdata('user');
        $this->load->model('teachermodel');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $data = array(
            'teacher_name' => $this->input->post('teacher_name'),
            'teacher_lastname' => $this->input->post('teacher_lastname'),
            'phone' => $this->input->post('phone')
        );
        $teacher_id = $this->input->post('teacher_id');
        //print_r($data);
        $teacher['dataupdate'] = $this->teachermodel->update_teacher($teacher_id, $data);
        redirect('/teacher/showdatateacher/', 'refresh');
    }

    public function delete() {
        $data["teacher_id"] = $this->input->post("id");
        $this->teachermodel->delete($data["teacher_id"]);
//        $data["info"] = "deleted";
        echo json_encode($data);
    }

//    /* -----------manage data student -------- */

    public function selectdata() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $datayear['year'] = $this->control_status->getbyyear();
        $this->load->view('teacher/showselectdata', $datayear);
        $this->load->view('template/foot');
    }

// public function getdatabymajor() {
//        $user_teacher = $this->session->userdata('user');
//        $data = array(
//            'year' => $this->input->post('year'),
//            'major' => $this->input->post('major')
//        );
////        print_r($data);
//        $student['datastudent'] = $this->studentmodel->getstudentbymajor($data);
////        echo $this->db->last_query();
//////        print_r($student);
//        $this->load->view('template/header', $user_teacher);
//        $this->load->view('include/navigation');
//        $this->load->view('template/sidebar_teacher');
//        $this->load->view('student/showall', $student);
//        $this->load->view('template/foot');
//    }

    public function showall() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        //$data['query']=$this->studentmodel->showall();
        $data['datastudent'] = $this->studentmodel->showall();
//        print_r($data);
        $this->load->view('student/showall', $data);
        $this->load->view('template/foot');
    }

    public function detailstudent($id_st) {
        $user_teacher = $this->session->userdata('user');
        $data['student'] = $this->studentmodel->showdetail($id_st);
        $data['establish'] = $this->establishmodel->getstablish($id_st);
//        print_r($data['student']);
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/detailstudent', $data);
        $this->load->view('template/foot');
    }

    public function updatestudent($id_st) {
        $user_teacher = $this->session->userdata('user');
        $query = $this->studentmodel->getstudentid($id_st);
        $result = $query->result();
        $data['student'] = $result[0];

        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/formupdate_student', $data);
    }

    public function update() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header');
        $this->load->view('include/navigation', $user_teacher);
        $this->load->view('template/sidebar_teacher');
        $data = array(
            'major' => $this->input->post('major'),
            'name_st' => $this->input->post('name_st'),
            'lastname_st' => $this->input->post('lastname_st'),
            'tell_st' => $this->input->post('tell_st'),
            'email' => $this->input->post('email'),
            'name_pr' => $this->input->post('name_pr'),
            'relation' => $this->input->post('relation'),
            'tell_pr' => $this->input->post('tell_pr')
        );
        $id_st = $this->input->post('id_st');
        $datauser['student'] = $this->studentmodel->update($id_st, $data);
        $this->load->view('teacher/showupdate_student', $datauser);
        $this->load->view('template/foot');
    }

    public function delete_student() {
        $data["id_st"] = $this->input->post("id");
        $this->studentmodel->delete($data['id_st']);
        $this->studentmodel->deleted($data['id_st']);
//        $data["info"] = "deleted";
        echo json_encode($data);
//        redirect('teacher/showdatateacher/', 'refresh');
    }

//
//    //----------manage data establishment-----------//
//
    public function getform_update($id_es) {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->model('establishmodel');
        $query = $this->establishmodel->showdata($id_es);
        $result = $query;
        $data['establish'] = $result[0];
//        print_r($data);
        $this->load->view('teacher/formupdate_establish', $data);
        $this->load->view('template/foot');
    }

    public function update_establish() {
        $user_teacher = $this->session->userdata('user');
        $data = array(
            'id_es' => $this->input->post('id_es'),
            'name_es' => $this->input->post('name_es'),
            'address_es' => $this->input->post('address_es'),
            'peple' => $this->input->post('peple'),
            'tell_es' => $this->input->post('tell_es'),
            'email' => $this->input->post('email'),
            'person_contect' => $this->input->post('person_contect'),
            'position' => $this->input->post('position'),
        );
        //$id_es['id_es'] = $this->input->post('id_es');
        $data['establish'] = $this->establishmodel->update_establish($data);
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/showDetailestablish', $data);
        $this->load->view('template/foot');
        //print_r($data);
    }

    public function delete_establis() {
        $data["id_es"] = $this->input->post("id");
        $this->establishmodel->delete($data['id_es']);
//        $data["info"] = "deleted";
        echo json_encode($data);
    }

//
//    /* ----------------------config year and semester------------------ */
//
    public function setting_year() {
//        echo "aaaaa";
        $user_teacher = $this->session->userdata('user');
        // print_r($user_teacher);
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $datayear['datayear'] = $this->teachermodel->selectall();

        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/setting_year', $datayear);
        $this->load->view('template/foot');
//        print_r($datayear);
    }

    public function addyear_semester() {
        $user_teacher = $this->session->userdata('user');
        $data = array(
            'year' => $this->input->post('year'),
            'semester' => $this->input->post('semester')
        );

        $datayear = $this->teachermodel->chack_semester($data);
        if ($datayear == NULL) {
            $this->teachermodel->addyear_semester($data);
            $datachack["info"] = "success";
        } else {
            $datachack["info"] = "duplicate";
        }

        echo json_encode($datachack);
    }

    public function status_year($id_set, $status) {
        $data['status'] = $status;
        $data1 = $this->teachermodel->chack_year($data['status']);
//        print_r($data1);
        if ($data1 != 0) {
            $datas['status'] = "0";
            $this->teachermodel->chack_year1($data1[0]['id_set'], $datas['status']);
        }

        $this->teachermodel->status_year($id_set, $data);
//        redirect('/teacher/document');
    }

//    /* -----------------approve establishment------------------- */

    public function approve_establish() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
//        print_r($semester);
        $student['datastudent'] = $this->control_status->getapprove_establish($year[0]['year'], $semester[0]['semester']);
//        print_r($student);
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/showapprov_establish', $student);
        // $this->load->view('include/foot');
//         $this->load->view('template/foot');
    }

//
    public function approve() {
        $data["id"] = $this->input->post("id");
        $data["action"] = $this->input->post("action");
//          $data["info"]="approved";
//        echo json_encode($data);
        if ($data["action"] == 'apr') {
            $this->control_status->add($data);
            $data["info"] = "approved";
        } else if ($data["action"] == 'del') {
            $this->control_status->deleted($data);
            $data["info"] = "deleted";
        } else if ($data["action"] == 'ap') {
            $this->control_status->update($data);
            $data["info"] = "approve";
        }
        echo json_encode($data);
    }

//
//    /* ---------------กำหนดตารางนิเทศ------------------ */
//
    public function get_orientation() {
        $user_teacher = $this->session->userdata('user');
//        $year = $this->input->get('year');
        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $data['datateacher'] = $this->teachermodel->showdata();
//        print_r($data['datateacher']);
        $data['datastudent'] = $this->orientationmodel->orientation($year[0]['year'], $semester[0]['semester']);
        $data['student'] = $this->studentmodel->get_student($year[0]['year'], $semester[0]['semester']);
//        print_r($data['student']);
        $data['establish'] = $this->establishmodel->getname_es();
//        print_r($data['establish']);
        $data['selectYear'] = $semester[0];
//        print_r($data['selectYear'] = $semester[0]);
        $dataorient = $this->orientationmodel->getorientation($year[0]['year'], $semester[0]['semester']);
        $data['subactive'] = 3;
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/orientation', $data);
        $this->load->view('include/foot');
    }

    public function addorientation() {
        $year = $this->teachermodel->selectyear_max();
        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $data = $this->input->post('data');
        $this->orientationmodel->addorien($data, $year[0]['year'], $year_semester[0]['semester']);
        $id_orien = $this->orientationmodel->getById_orient();
        $teacher = $this->input->post('id');
        foreach ($teacher as $teache_id) {
            $this->orientationmodel->addDb($id_orien, $teache_id);
        }

//        $year = $year_semester[0]['year'];
//        $semester = $year_semester[0]['semester'];
    }

//
    public function showorientation() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year1 = $year[0];
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $semester1 = $semester[0];
//        print_r($semester1);
        $year_post['year'] = $this->input->post('year');
        $semester_p['semester'] = $this->input->post('semester');
//        print_r($year_post);
        if ($user_teacher['function'] != 1) {
            if ($year_post['year'] && $semester_p['semester'] != 0) {
//                echo "aaa";
                $data['datastudent'] = $this->orientationmodel->getdata_teacher($user_teacher['teacher_id'], $year_post['year'], $semester_p['semester']);
                $data['student'] = $this->studentmodel->getdata_student($year_post['year'], $semester_p['semester']);
//                print_r($data['student']);
                $data['year'] = $this->teachermodel->year();
                $this->load->view('teacher/newshow_orient', $data);
            } else {
                $data['datastudent'] = $this->orientationmodel->getdata_teacher($user_teacher['teacher_id'], $year1['year'], $semester1['semester']);
                $data['student'] = $this->studentmodel->getdata_student($year1['year'], $semester1['semester']);
                $data['year'] = $this->teachermodel->year();
                $data['subactive'] = 1;
                $this->load->view('template/header', $user_teacher);
                $this->load->view('include/navigation');
                $this->load->view('template/sidebar_teacher', $data);
                $this->load->view('teacher/show_orientation', $data);
//                print_r($data);
                $this->load->view('template/foot');
            }
        } else {
            if ($year_post['year'] && $semester_p['semester'] != 0) {
                $data['datastudent'] = $this->orientationmodel->getDb_orientation($year_post['year'], $semester_p['semester']);
//                echo $this->db->last_query();
                $data['student'] = $this->studentmodel->getdata_student($year_post['year'], $semester_p['semester']);
                $data['year'] = $this->teachermodel->year();
                $this->load->view('teacher/newshow_orient', $data);
            } else {
                $data['datastudent'] = $this->orientationmodel->getDb_orientation($year1['year'], $semester1['semester']);
//            echo $this->db->last_query();
                $data['student'] = $this->studentmodel->getdata_student($year1['year'], $semester1['semester']);
                $data['year'] = $this->teachermodel->year();
                $data['subactive'] = 1;
                $this->load->view('template/header', $user_teacher);
                $this->load->view('include/navigation');
                $this->load->view('template/sidebar_teacher', $data);
                $this->load->view('teacher/show_orientation', $data);
                $this->load->view('template/foot');
            }
        }
    }

//
//    public function uadate_orientation() {
//        $user_teacher = $this->session->userdata('user');
//        $year = $this->teachermodel->selectyear_max();
//        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
//        $data = $this->input->post('data');
////        echo json_encode($data[0]['value']);
//        $id_orien = $this->orientationmodel->get_idorien($data, $year[0]['year'], $year_semester[0]['semester']);
////        print_r($id_orien);
////        $id_orien = $this->documentmodel->getById_orient();
//        $teacher = $this->input->post('id');
//        foreach ($teacher as $teache_id) {
////            echo json_encode($teache_id);
//            $this->orientationmodel->updateDb($id_orien[0]['id_orien'], $teache_id);
//        }
//    }
//
//    public function deleted_orien() {
//        $user_teacher = $this->session->userdata('user');
//        $year = $this->teachermodel->selectyear_max();
//        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
//        $id_es = $this->input->post('id');
//        $id = $this->orientationmodel->getID_orien($id_es, $year[0]['year'], $year_semester[0]['semester']);
////        print_r($id_orien);
//        $this->orientationmodel->deleted_orien($id[0]['id_orien']);
//    }

    public function delete_all() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $id_es = $this->input->post('id');
        $id = $this->orientationmodel->getID_orien($id_es, $year[0]['year'], $year_semester[0]['semester']);
        $this->orientationmodel->deleted_all($id[0]['id_orien']);
        $this->orientationmodel->deleted_orien($id[0]['id_orien']);
    }

    public function previous_orientation() {
        $user_teacher = $this->session->userdata('user');
//        $data['year'] = $this->teachermodel->year();
        $year = $this->teachermodel->selectyear_max();
        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $data['datateacher'] = $this->teachermodel->datateacher();
        $data['teacher'] = $this->orientationmodel->getDb_orientation($year[0]['year'], $year_semester[0]['semester']);
//        print_r($data['teacher']);
        $year_post['year'] = $this->input->post('year');
        $semester_post['semester'] = $this->input->post('semester');
        $teacher_id = $this->input->post('id');
        if ($teacher_id != 0 && $year_post['year'] != 0) {
            $data['teacher'] = $this->orientationmodel->getdata_teacher($teacher_id, $year_post['year'], $semester_post['semester']);
            $this->load->view('teacher/newdoc', $data);
        } else if ($teacher_id != 0 || $year_post['year'] != 0) {
            if ($year_post != 0) {
                $data['teacher'] = $this->orientationmodel->getDb_orientation($year_post['year'], $semester_post['semester']);
                $this->load->view('teacher/newdoc', $data);
            } else {
                $data['teacher'] = $this->orientationmodel->getDb_orientation($teacher_id, $year_post['year'], $semester_post['semester']);
                $this->load->view('teacher/newdoc', $data);
            }
//            print_r($data['teacher']);
        } else {
            $data['subactive'] = 2;
            $data['year'] = $this->teachermodel->year();
            $this->load->view('template/header', $user_teacher);
            $this->load->view('include/navigation');
            $this->load->view('template/sidebar_teacher', $data);
            $this->load->view('teacher/previous_orientation', $data);
            $this->load->view('template/foot');
        }
    }

//
//    /* --------------------reset password teacher and student ---------------------- */
//
//    protected function random($characters = 8, $letters = '23456789bcdfghjkmnpqrstvwxyz') {
//        $str = '';
//        for ($i = 0; $i < $characters; $i++) {
//            $str .= substr($letters, mt_rand(0, strlen($letters) - 1), 1);
//        }
//        return $str;
//    }
//
    public function resetpassword() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/recoverpass');
        $this->load->view('template/foot');
    }

//
    public function chackreset() {
        $element = $this->input->post('username');
        $objnewpass = $this->random();
//        $data = array(
//                'password' => md5($objnewpass)
//            );
        if (is_numeric($element)) {
            //Student doing
//            $this->db->where('id_st', $element);
//            $this->db->update('student', $data);
            if ($this->studentmodel->changepass($element, $objnewpass) == TRUE) {
                echo "รหัสใหม่ของคุณคือ : " . $objnewpass;
            } else {
                echo "ไม่มี user นี้";
            }
        } else {
            //Teacher doing
//             $this->db->where('username', $element);
//             $this->db->update('teacher', $data);
            if ($this->teachermodel->changepass($element, $objnewpass) == TRUE) {
                echo "รหัสใหม่ของคุณคือ: " . $objnewpass;
            } else {
                echo "ไม่มี user นี้";
            }
        }
    }

    public function getformreset_password() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('teacher/reset_password');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('template/foot');
    }

//
//// ทดสอบแสดง
    public function reset_password() {
        $user_teacher = $this->session->userdata('user');
        $data = array(
            'newpassword' => $this->input->post('newpassword'),
            'confrimpassword' => $this->input->post('confrimpassword')
        );
        $result = $this->teachermodel->update_newpassword($data, $user_teacher['teacher_id']);
        print_r($result);
    }

    public function get_teacher() {
        $this->load->model('documentmodel');
        $data = $this->documentmodel->getdata_teacher();

        echo json_encode($data);
    }

    public function advisors_teacher() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $data['datastudent'] = $this->studentmodel->get_student($year[0]['year'], $year_semester[0]['semester']);
//        echo $this->db->last_query();
        $data['datateacher'] = $this->teachermodel->showdata();
        $data['selectYear'] = $year_semester[0];
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $this->load->view('teacher/advisors', $data);
        $this->load->view('include/foot');
    }

    public function add_advisors() {
        $year = $this->teachermodel->selectyear_max();
        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $data = $this->input->post('data');
//        print_r($data);
        $teacher['teacher_id'] = $this->input->post('id');
//        print_r($teacher);
        $this->studentmodel->add_advisors($data, $teacher, $year[0]['year'], $year_semester[0]['semester']);
    }

    public function delete_advisors() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $id['id_st'] = $this->input->post('id');
//        print_r($id);
        $this->studentmodel->delete_advisors($id['id_st'], $year[0]['year'], $year_semester[0]['semester']);
    }

    public function show_advisors() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);

        $year = $this->teachermodel->selectyear_max();
        $year_semester = $this->teachermodel->selectyear_semester($year[0]['year']);

        $year_post['year'] = $this->input->post('year');
        $semester_post['semester'] = $this->input->post('semester');
        if ($year_post['year'] != NULL) {
            $data['dataall'] = $this->studentmodel->get_student_es($year_post['year'], $semester_post['semester'], $user_teacher['teacher_id']);
            $this->load->view('teacher/new_showadvisor', $data);
        } else {
            $data['dataall'] = $this->studentmodel->get_student_es($year[0]['year'], $year_semester[0]['semester'], $user_teacher['teacher_id']);
            $data['year'] = $this->teachermodel->year();
            $this->load->view('include/navigation');
            $this->load->view('teacher/show_advisors', $data);
            $this->load->view('template/sidebar_teacher');
            $this->load->view('include/foot');
        }
    }

}

?>
