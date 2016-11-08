
<?php
class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('studentmodel');
        $this->load->model('establishmodel');
        $this->load->model('teachermodel');
        // $user = $this->session->userdata('user');
        //  if($user==NULL){
        //     redirect('teacher/login');
        // }
        // print_r($id_st);
        //$this->output->enable_profiler(TRUE);
        //$this->load->view('form_addst');
        //$this->load->model('esthblishmodel');
        //$this->load->view("form_addst.php",$data);
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
        // $this->load->view("form_addst.php");
        $this->load->model('studentmodel');
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
            // print_r($newsession);
            $this->session->set_userdata($newsession[0]);
            // $user = $this->session->userdata('user');
            $this->load->view('template/header');
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

        extract($this->session->userdata($query[0]));
        // print_r($user);
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $query = $this->studentmodel->getstudentid($id_st);
        $result = $query->result();
        $data['student'] = $result[0];
        $this->load->view('student/updatedatastudent', $data);
       $this->load->view('template/foot');
    }

    public function update() {
        //$this->load->studentmodel('update');
        extract($this->session->userdata($query[0]));
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
        $datauser['student'] = $this->studentmodel->update($id_st, $data);
        // print_r($datauser);
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $this->load->view('student/showedit_student', $datauser);
        $this->load->view('template/foot');
    }

    //**************function showdatastudent****************//

    public function showall() {
        $this->load->view('template/teacher_header');
        $this->load->model('studentmodel');
        //$data['query']=$this->studentmodel->showall();
        $data['query'] = $this->studentmodel->showall();
        //print_r($data);
        //$this->load->view('student/showall', $data);
        //$this->load->model('studentmodel');
        $this->load->view('template/footer');
    }


    /* ----- select data student is com-sci */

    public function showrelation() {
        $this->load->model('studentmodel');
        $this->load->model('teachermodel');
        $this->load->view('template/header');
        $this->load->view('template/test');
        //$year = date("Y") + 543;
        $year = $this->studentmodel->getbyyear();
//        print_r($year);
        $datastudent['student'] = $this->studentmodel->getrelation($year[0]['year']);
//        print_r($datastudent);
        $datastudent['year'] = $this->teachermodel->getbyyear();
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
        print_r($data);

        $datastudent['student'] = $this->studentmodel->showrelation($data);
//         print_r($datastudent);
        $datastudent['year'] = $this->teachermodel->getbyyear();
        $this->load->view('student/showallstudent', $datastudent);
    }

    public function datastudent() {
        extract($this->session->userdata($query[0]));
        // print_r($user);
        $data['establish'] = $this->establishmodel->getstablish($id_st);
       // print_r($data);
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/sidebar');
        $this->load->view('student/showdetail',$data);
        $this->load->view('template/foot');
    }

    //*************function delete datastudent***************8//

    public function delete($id_st) {
        if ($this->studentmodel->delete($id_st) == TRUE) {
            $data['result'] = "ลบข้อมูลเรียบร้อยแล้ว";
        } else {
            $data['result'] = "ไม่สามารถลบข้อมูลได้ค่ะ";
        }
        redirect('/student/showall/', 'refresh');
    }

//***************login********************//
    public function Login($message = null) {
        $this->load->view('template/header');
        $data['message'] = $message;
        $this->load->view('teacher/login', $data);
    }

    public function login_system() {
        $this->load->model('studentmodel');
        $data = array(
            'id_st' => $this->input->post('id_st'),
            'password' => $this->input->post('pass'),
        );
        //$this->session->set_userdata($datauser);
        $query = $this->studentmodel->login($data);
        if (sizeof($query) > 0) {
            //$this->session->set_userdata($query);
            $datauser = $query[0];
            $this->session->set_userdata($query[0]);
            $this->session->userdata($query[0]);
            // print_r($user);
            // $this->session->set_userdata($query[0]);
            // $this->session->userdata($query[0]);
            $this->datastudent();
//            $this->load->view('template/header', $user);
//            $this->load->view('template/sidebar',$user);
//            $this->load->view('student/menustudent');
        } else {
            $message = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง! กรุณาลองใหม่";
            $this->Login($message);
            //print_r($data);
        }
    }

    public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->login();
    }

//    public function menu() {
//        $user['user'] = $this->session->userdata('user');
//        $this->load->view('template/header', $user);
//        $this->load->view('template/navigation', $user);
//        $this->load->view('student/menustudent');
//        $this->load->view('template/navigation_teacher');
//        $this->load->view('template/foot');
//    }

    public function selectestablish() {
        $this->load->model('establishmodel');
        extract($this->session->userdata($query[0]));
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $st_es = $this->studentmodel->data_es_st($id_st);
        $this->load->view('student/addestablish', $st_es);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
    }

    public function getstatus() {
        $this->load->model('establishmodel');
        extract($this->session->userdata($query[0]));
        $year =  $this->studentmodel->getbyyear();
        $st_es = $this->studentmodel->getdatabyyear($id_st,$year[0]['year']);
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

        $this->load->model('studentmodel');
        extract($this->session->userdata($query[0]));

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '1000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            
        } else {
            $data = $this->upload->data();
            $data['id_st'] = $id_st;

            echo json_encode($data);
            $this->studentmodel->uploadfile($data);
        }
    }

//    public function finish() {
//        $user = $this->session->userdata('user');
//        $data = $this->studentmodel->finish($user['id_st']);
//        echo $this->db->last_query();
//    }


}
?>

