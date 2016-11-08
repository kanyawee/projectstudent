    public function recover_password() {
//        $this->load->library('form_validation');
//        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email')
        );
//        print_r($data);
        if (strlen($data['username']) == 11) {
            //check if email is in the database
            $this->load->model('recovermodel');
            if ($this->recovermodel->email_exists($data)) {
//$them_pass is the varible to be sent to the user's email 
                $temp_pass = md5(uniqid());
//            print_r($temp_pass);
//send email with #temp_pass as a link
                $this->load->library('email', array('mailtype' => 'html'));
                $this->email->from('user@yahoo.com', "Site");
                $this->email->to($this->input->post('email'));
                $this->email->subject("Reset your Password");
//
                $message = "<p>This email has been sent as a request to reset our password</p>";
                $message .= "<p><a href='" . base_url() . "main/reset_password/$temp_pass'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
                $this->email->message($message);
//
                if ($this->email->send()) {
//                $this->load->model('recovermodel');
                    if ($this->recovermodel->temp_reset_password($temp_pass, $data)) {
                        echo "check your email for instructions, thank y
//                $this->load->model('recovermodel');
                    if ($this->recovermodel->temp_reset_password($temp_pass, $data)) {
                       ou";
                    }
                } else {
                    echo "email was not sent, please contact your administrator";
                }
            } else {
                echo "your email is not in our database";
            }
        }
    }

    public function reset_password($temp_pass) {
        $this->load->model('recovermodel');
        if ($this->recovermodel->is_temp_pass_valid($temp_pass)) {

            $this->load->view('reset_password');
        } else {
            echo "the key is not valid";
        }
    }

    public function update_password() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
        if ($this->form_validation->run()) {
            echo "passwords match";
        } else {
            echo "passwords do not match";
        }
    }