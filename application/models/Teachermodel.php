<?php

class teachermodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function year() {
        $query = $this->db->select('year,semester')->order_by('id_set', 'DESC')->get('setting_year');
        return $query->result_array();
    }

    public function chack_semester($data) {
        $year = $data['year'];
        $semester = $data['semester'];
        $query = $this->db->where('year', $year)->where('semester', $semester)->get('setting_year');
        return $query->result_array();
        // $this->db->insert('setting_year', $data);
    }

    public function addyear_semester($data) {
        $this->db->insert('setting_year', $data);
    }

    public function chack_year($status) {
//        echo $id_set;
//        echo $status;
        $query = $this->db->where('status', $status)->get('setting_year');
//        $this->db->update('setting_year');
        return $query->result_array();
    }

    public function chack_year1($id_set, $status) {
        $status1['status']=$status;
        $this->db->where('id_set', $id_set);
        $this->db->update('setting_year',array(
            'status' =>$status1['status']
        ));
        $updatestatus = $this->db->affected_rows();
        return $updatestatus;
    }

    public function status_year($id_set, $status) {
        $this->db->where('id_set', $id_set);
        $this->db->update('setting_year', $status);
        $updatestatus = $this->db->affected_rows();
        return $updatestatus;
    }

//    function deleted_year($id_set) {
//        $this->db->where('id_set', $id_set);
//        $this->db->delete('setting_year');
//    }

    public function selectyear_max() {
        $status = 1;
        $this->db->where('status', $status);
        $query = $this->db->select('year')->get('setting_year');
        return $query->result_array();
    }

    public function selectyear_semester($year) {
        $status = 1;
        $this->db->select('semester,year');
        $this->db->where('year', $year);
        $this->db->where('status', $status);
        $query = $this->db->get('setting_year');
        return $query->result_array();
    }

    public function selectall() {
        $this->db->order_by('time', 'DESC');
        $this->db->select('*');
        $query = $this->db->get('setting_year');
        return $query->result_array();
    }

    public function updata_year($id) {
        $this->db->where('id_set', $id);
        $this->db->select('*');
        $query = $this->db->get('setting_year');
        return $query->result_array();
    }

    public function addteacher($data) {
        $this->db->insert('teacher', $data);
    }

    public function updatefunction($teacher_id, $data) {
        $this->db->where('teacher_id', $teacher_id);
        $this->db->update('teacher', $data);
        $updatestatus = $this->db->affected_rows();
        return $updatestatus;
    }

    public function datateacher() {
        $this->db->select('teacher_id, teacher_name ,teacher_lastname');
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    public function gettectherbyname($name) {
        $this->db->like('teacher_name', $name);
        $query = $this->db->get('teacher');

        return $query->result_array();
    }

    public function showdata() {
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    public function delete($teacher_id) {
        $this->db->delete('teacher', array('teacher_id' => $teacher_id));
    }

    public function getdatateacher($teacher_id) {
        $this->db->where('teacher_id', $teacher_id);
        $this->db->select('*');
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    public function getteacherById($value2) {
        $this->db->where('teacher_id', $value2);
        $this->db->select('teacher_id,teacher_name');
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    public function update_teacher($teacher_id, $data) {
        //$teacher_id = $data['teacher_id'];
        $this->db->where('teacher_id', $teacher_id);
        $this->db->update('teacher', $data);
        $this->db->where('teacher_id', $teacher_id);
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    public function login($data) {
        $username = $data['username'];
        $password = md5($data['password']);
        $this->db->select('teacher_id, teacher_name,teacher_lastname,username,password,function');
        $this->db->from('teacher');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function selectStatus() {
        $query = $this->db->get_where('document_upload', 'status');
        return $query->result_array();
    }

    public function chackresetpass($username) {
        $this->db->select('password,username');
        $this->db->where('username', $username);
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    public function changepass($username, $password) {
        $data = array(
            'password' => md5($password)
        );
        $this->db->where('username', $username);
        if ($this->db->update('teacher', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_newpassword($data, $teacher_id) {
        $this->db->where('teacher_id', $teacher_id);
        $this->db->update('teacher', array(
            'password' => md5($data['confrimpassword'])
        ));
        $this->db->where('teacher_id', $teacher_id);
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    public function teacher_Username($username) {
        $this->db->select('*');
        $this->db->where('username', $username);
        return $query = $this->db->get('teacher')->result_array();
        // if ($query-num_rows() == 0) {
        //     return TRUE;
        // } else {
        //     return FALSE;
        // }
    }

//    public function uploadfile($data) {
//        $this->db->where('id_st', $data['id_st']);
//        $this->db->update('student', array(
//            'file_name' => $data['file_name'],
//            'full_path' => $data['full_path']
//        ));
//    }
//public function selectStatus() {
//$query = $this->db->get_where('document_upload', 'status');
//return $query->result_array();
//}
}

?>
