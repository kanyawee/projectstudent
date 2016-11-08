<?php

class welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('studentmodel');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('template/index');
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }

}

?>