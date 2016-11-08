<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('studentmodel');
        $this->load->model('managedatabase');
        $this->load->model('assessmentmodel');
        $this->load->model('teachermodel');
        $this->load->model('documentmodel');
    }

//***************login********************//
    public function Login($message = null) {
        $this->load->view('template/header');
        $data['message'] = $message;
        $this->load->view('teacher/login', $data);
    }

    public function login_system_teacher() {

        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        if (is_numeric($data['username'])) {
            $query = $this->studentmodel->login($data);
            if (sizeof($query) > 0) {
//$this->session->set_userdata($query);
                $datauser = $query[0];
                $this->session->set_userdata('user', $datauser);
                $user = $this->session->userdata('user');
//             print_r($user);
// $this->session->set_userdata($query[0]);
// $this->session->userdata($query[0]);
                redirect('student/datastudent');
            } else {
                $message = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง! กรุณาลองใหม่";
                $this->Login($message);
////print_r($data);
            }
        } else {
            $query = $this->teachermodel->login($data);
            if (sizeof($query) > 0) {
                $teacherdata = $query[0];
//            print_r($teacherdata);

                $this->session->set_userdata('user', $teacherdata);
                $user_teacher = $this->session->userdata('user');
//             print_r($user_teacher);
                $this->load->view('template/header');
                $this->load->view('include/navigation', $user_teacher);
                $this->load->view('template/sidebar_teacher');
                $this->load->view('teacher/menuteacher');
                $this->load->view('template/foot');
// print_r($query);
            } else {
                $message = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง! กรุณาลองใหม่";
                $this->login($message);
//echo "login fall";
            }
        }


//print_r($query);
    }

    public function logout() {
        $this->session->set_userdata('user', FALSE);
        $this->session->sess_destroy();
        $this->login();
    }

    public function recoverpass() {
        $this->load->view('teacher/recoverpass');
    }

}
?>

