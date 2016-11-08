<?php

class control_status extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $id = $data['id'];
        $this->db->where('id_st', $id);
        $data = array(
            'status' => 0
        );
        $this->db->update('student_establish', $data);
    }

    public function deleted($data) {
        $id = $data['id'];
        $this->db->where('id_st', $id);
        $this->db->delete('student_establish');
    }

    public function update($data) {
        $id = $data['id'];
        $this->db->where('id_st', $id);
        $data = array(
            'status' => 1
        );
        $this->db->update('student_establish', $data);
    }

    public function updatefinish($id_st, $data, $year,$semester) {
        $this->db->where('id_st', $id_st)->where('year', $year)->where('semester',$semester);
        $this->db->update('student_establish', $data);
        $updatestatus = $this->db->affected_rows();
        return $updatestatus;
    }
    /* select datastudent form approve establish
     * 
     */

    public function getbyyear() {
        $query = $this->db->select('year')->order_by("year", "DESC")->distinct('year')->get('student_establish');
        return $query->result_array();
    }

    public function getapprove_establish($year,$semester) {
        $this->db->from("student");
        $this->db->join("student_establish", "student_establish.id_st= student.id_st");
        $this->db->join("establishment", "establishment.id_es = student_establish.id_es");
        $this->db->where('student_establish.year', $year);
        $this->db->where('student_establish.semester', $semester);
        $this->db->order_by("time", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>