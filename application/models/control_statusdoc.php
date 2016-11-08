<?php

class control_statusdoc extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getdocument() {
        $query = $this->db->get('control_status');
        return $query->result_array();
    }

    public function updateStatus($number_document, $data) {
        $this->db->where('number_document', $number_document);
        $this->db->update('control_status', $data);
        $updatestatus = $this->db->affected_rows();
        return $updatestatus;
    }

    public function get_status($id) {
//        $status=1;
        $query = $this->db->where('number_document', $id)->get('control_status');
        return $query->result_array();
    }

    public function adddate_seddocument($data) {
        $number_document = $data['number_document'];
        $this->db->where('number_document', $number_document);
        $this->db->update('control_status', $data);
        $query = $this->db->get('control_status');
        return $query->result_array();
    }

}

?>