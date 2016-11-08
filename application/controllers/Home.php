<?php

class home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('studentmodel');
        $this->load->model('establishmodel');
        $this->load->model('teachermodel');
        $this->load->model('control_status');
    }

    // **********functionstudent add************//
    public function home() {
        $this->showrelation();
        //echo"Ji";
    }

    public function addform() {
        $this->load->view('template/header');
        $this->load->view('template/test');
        $this->load->view("student/formpage_st.php");
        $this->load->view('template/footer');
        //$this->load->view('template/sidebar');
        //$this->load->view('test');
    }

    public function addstudent() {
        $data = array(
            'id_st' => $this->input->post('id_st'),
            'major' => $this->input->post('major'),
            'name_st' => $this->input->post('name_st'),
            'lastname_st' => $this->input->post('lastname_st'),
            'tell_st' => $this->input->post('tell_st'),
            'email' => $this->input->post('email'),
            'name_pr' => $this->input->post('name_pr'),
            'relation' => $this->input->post('relation'),
            'tell_pr' => $this->input->post('tell_pr'),
            'password' => md5($this->input->post('password'))
        );
        //print_r($data);

        if (($this->studentmodel->unrepeat($this->input->post('id_st'))) == NULL) {
            $this->studentmodel->addstudent($data);
            //print_r($this->studentmodel->unrepeat($this->input->post('id_st')));
            //echo "aaaa";
            $datauser['student_es'] = $this->studentmodel->selectstudent($this->input->post('id_st'));
//            print_r($datauser);
            $newsession = $this->studentmodel->selectstudent($this->input->post('id_st'));
//            print_r($newsession);
            $this->session->set_userdata('user', $newsession[0]);
            $user = $this->session->userdata('user');
            $this->load->view('template/header', $user);
            $this->load->view('template/navigation');
            $this->load->view('template/sidebar');
            $this->load->view('student/showdetail', $datauser);
        } else {
            $data['msg'] = "คุณได้ทำการลงทะเบียนเรียบร้อยแล้วคะ";
            $data['post'] = $this->input->post();
            $this->load->view('template/header');
            $this->load->view('template/test');
            $this->load->view('student/formpage_st', $data);
            $this->load->view('template/foot');
            //$this->load->view('template/sidebar');
        }

        //$this->studentmodel->addstudent($data);
//        $user = $this->session->userdata('user');
//        $query = $this->studentmodel->getstudentid($user[$id_st]);
//        $this->load->view('student/update_st', $query);
        //$this->datastudent();
        //$this->load->view('student/menustudent');
    }

    /* ----- select data student is com-sci */

    public function showrelation() {
        $this->load->model('studentmodel');
        $this->load->model('teachermodel');
        $this->load->view('template/header');
        $this->load->view('template/test');
        //$year = date("Y") + 543;
        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $datastudent['student'] = $this->studentmodel->getrelation($year[0]['year'],$semester[0]['semester']);
//        print_r($datastudent);
        $datastudent['year'] = $this->control_status->getbyyear();
        $this->load->view('student/showallstudent', $datastudent);
    }

    public function showdataall() {
        $this->load->model('teachermodel');
        $this->load->model('studentmodel');
//        $major = 'วิทยาการคอมพิวเตอร์';
//        $data['student'] = $this->studentmodel->showrelation($major);
        $this->load->view('template/header');
        $this->load->view('template/test');
        $data = array(
            'year' => $this->input->post('year'),
            'major' => $this->input->post('major')
        );
//        print_r($data);

        $datastudent['student'] = $this->studentmodel->showrelation($data);
//         print_r($datastudent);
        $datastudent['year'] = $this->control_status->getbyyear();
        $this->load->view('student/showallstudent', $datastudent);
    }

    public function test() {
        $this->load->view('template/header');
        $this->load->view('document/test1');
//        $this->load->view('template/foot');
    }

    public function processupload() {
        $this->load->view('student/test1');
    }

}
