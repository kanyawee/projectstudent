<?php

class assessmentmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_assessment($year, $semester) {
        $this->db->select('year')->distinct('year')->get('student_establish');
        $this->db->from("student");
        $this->db->join("student_establish", "student_establish.id_st= student.id_st");
        $this->db->join("establishment", "establishment.id_es = student_establish.id_es");
        $this->db->where('student_establish.year', $year);
        $this->db->where('student_establish.semester', $semester);
        $this->db->order_by("student_establish.id_es", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }

//    public function datastudent($year,$semester) {
//        $status = 1;
////        $this->db->select('establishment.id_es,establishment.name_es')->distinct('establishment.id_es');
//        $this->db->select('student.id_st,student_establish.year,orientation.id_es,establishment.name_es,student.name_st,student.lastname_st');
//        $this->db->from('student_establish')->where('student_establish.year', $year)->where('student_establish.status', $status)
//                ->join('establishment', 'establishment.id_es = student_establish.id_es')
//                ->join('student', 'student.id_st = student_establish.id_st')
//                ->join('orientation', 'orientation.id_es=student_establish.id_es');
//        $query = $this->db->order_by("orientation.date", "ASC")->get()->result_array();
//        return $query;
//    }

    public function datastudent($year, $semester) {
        $this->db->select('*');
        $this->db->from('orientation')->where('year', $year)
                ->where('semester', $semester);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getdatastudent($year, $semester) {
        $status = 1;
        $this->db->select('establishment.id_es,establishment.name_es,student_establish.year')
                ->distinct('establishment.id_es');
//        $this->db->select('student_establish.id_st,student_establish.year,student_establish.id_es,establishment.name_es,student.name_st,student.lastname_st');
        $query = $this->db->from('student_establish')
                        ->where('student_establish.year', $year)->where('student_establish.status', $status)
                        ->where('student_establish.semester', $semester)
                        ->join('establishment', 'establishment.id_es = student_establish.id_es')
                        ->join('student', 'student.id_st = student_establish.id_st')
                        ->get()->result_array();
        return $query;
    }

    public function getstudentByid($student, $table1) {
        //$this->db->select('student_establish.id_st,student_establish.year,student.name_st,student.lastname_st,student.major');
        $query = $this->db->where($student)
                        ->join('student', 'student.id_st = student_establish.id_st')
                        ->join('establishment', 'establishment.id_es = student_establish.id_es')
                        ->get($table1)->result_array();
        return $query;
    }

    public function getestablishByid($establish, $table1) {
        $query = $this->db->where($establish)
                        ->join('establishment', 'establishment.id_es = student_establish.id_es')
                        ->get($table1)->result_array();
        return $query;
    }

    public function addpoint_assessment_student($data) {
        extract($data);
        if ($this->db->where('id_st', $id_st)->where('year', $year)->get('assessment_student')->row()) {
            //Update
            $this->db->where('id_st', $id_st)->where('year', $year)->update('orientation', $data);
            //echo $id_st;
        } else {
            //Insert
            $this->db->insert('orientation', $data);
            //echo "Insert";
        }

        //$this->db->insert('assessment_student', $data);
    }

}

?>