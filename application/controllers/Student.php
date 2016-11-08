
<?php

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('studentmodel');
        $this->load->model('establishmodel');
        $this->load->model('teachermodel');
        if ($user = $this->session->userdata('user') == NULL) {
            redirect('login/Login');
        }
        // print_r($id_st);
        //$this->output->enable_profiler(TRUE);
        //$this->load->view('form_addst');
        //$this->load->model('esthblishmodel');
        //$this->load->view("form_addst.php",$data);
    }


    public function detailadd() {
        $data = array(
            'id_st' => $this->input->post('idstudent'),
            'id_es' => $this->input->post('estabishlist'),
            'year' => $this->input->post('year')
        );
        //print_r($data);
        $this->studentmodel->add_detail($data);
        $this->showrelation();
    }

    //*********function update datastudent*************//
    public function formupdate() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        // print_r($user);
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $query = $this->studentmodel->getstudentid($user['id_st']);
        $result = $query->result();
        $data['student'] = $result[0];
        $this->load->view('student/updatedatastudent', $data);
        $this->load->view('template/foot');
    }

    public function update() {
        $user = $this->session->userdata('user');
        //$this->load->studentmodel('update');
//        extract($this->session->userdata($query[0]));
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
        $datauser['student'] = $this->studentmodel->update($user['id_st'], $data);
        // print_r($datauser);
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $this->load->view('student/showedit_student', $datauser);
        $this->load->view('template/foot');
    }

    //**************function showdatastudent****************//


    public function datastudent() {
//        $this->load->model('establishmodel');
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        // print_r($user);
        $data['establish'] = $this->establishmodel->getstablish($user['id_st']);
        // print_r($data);
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $this->load->view('student/showdetail', $data);
        $this->load->view('template/foot');
    }

    //*************function delete datastudent***************8//
//    public function menu() {
//        $user['user'] = $this->session->userdata('user');
//        $this->load->view('template/header', $user);
//        $this->load->view('template/navigation', $user);
//        $this->load->view('student/menustudent');
//        $this->load->view('template/navigation_teacher');
//        $this->load->view('template/foot');
//    }

    public function selectestablish() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        $this->load->view('template/header', $user);
        $this->load->view('template/navigation');
        $st_es = $this->studentmodel->data_es_st($user['id_st']);
        $this->load->view('student/addestablish', $st_es);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
    }

    public function getstatus() {
        $user = $this->session->userdata('user');
//        extract($this->session->userdata($query[0]));
        $year = $this->teachermodel->selectyear_max();
//        print_r($year);
        $st_es = $this->studentmodel->getdatabyyear($user['id_st'], $year[0]['year']);
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

//    public function form() {
//        $this->load->view('template/header');
//        $this->load->view('template/sidebar');
//        $this->load->view('form');
//        $this->load->view('template/foot');
//    }

    public function do_upload() {
//        extract($this->session->userdata($query[0]));
        $user = $this->session->userdata('user');
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            
        } else {
            $data = $this->upload->data();
            $data['id_st'] = $user['id_st'];

//            echo json_encode($data);
            $this->studentmodel->uploadfile($data);
        }
    }

    public function finish() {
//        $user = $this->session->userdata('user');
        $this->load->view('template/header');
        $this->load->view('document/addformres');
        $this->load->view('template/foot');
    }
    
    public function formchangpassword(){
        $user = $this->session->userdata('user');
        $this->load->view('template/header');
        $this->load->view('template/navigation',$user);
        $this->load->view('student/changpassword');
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
    }
    
    public function changnewgpassword(){
        $user = $this->session->userdata('user');
        $data =  array(
            'newpassword'=>  $this->input->post('newpassword'),
            'confrimpassword'=> md5($this->input->post('confrimpassword')) 
        );
        $id_st=$user['id_st'];
        $result['data']=$this->studentmodel->changnewgpassword($data,$id_st);
        echo json_encode($result);
    }

}
?>

