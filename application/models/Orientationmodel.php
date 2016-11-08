<?php

class orientationmodel extends CI_Model {

    public function orientation($year, $semester) {
        $status = 1;
        $this->db->select('id_es')->distinct('id_es');
//        $this->db->join("student_establish", "student_establish.id_st= student.id_st");
//        $this->db->join("student_establish", "student_establish.id_es = establishment.id_es");
//        $this->db->join("");
        $this->db->where('year', $year);
        $this->db->where('status', $status);
        $this->db->where('semester', $semester);
        $this->db->order_by("time", "ASC");
        $query = $this->db->get('student_establish');
        return $query->result_array();
    }

    public function addorien($data_a, $year, $semester) {
        $data_a = array(
            'id_es' => $data_a[0]['value'],
            'date' => $data_a[1]['value'],
            'time_start' => $data_a[2]['value'],
            'time_end' => $data_a[3]['value'],
            'year' => $year,
            'semester' => $semester
        );
//        print_r($data_a);
        $this->db->insert('orientation', $data_a);
    }

    public function getById_orient() {
        $id = $this->db->select_max('id_orien')->get('orientation')->result_array();
        return $id[0]['id_orien'];
    }

    public function get_idorien($data, $year, $semester) {
        $this->db->select('id_orien');
        $query = $this->db->where('id_es', $data[0]['value'])->where('year', $year)->where('semester', $semester)->get('orientation');
        $this->db->where('id_es', $data[0]['value'])->where('year', $year)->where('semester', $semester)->update('orientation', array(
            'date' => $data[1]['value'],
            'time_start' => $data[2]['value'],
            'time_end' => $data[3]['value']
        ));
        return $query->result_array();
    }

    public function getID_orien($id_es, $year, $semester) {
        $this->db->select('id_orien');
        $query = $this->db->where('id_es', $id_es)->where('year', $year)->where('semester', $semester)->get('orientation');
        return $query->result_array();
    }

    public function addDb($id_orien, $teacher_id) {
        $data = array(
            'id_orien' => $id_orien,
            'teacher_id' => $teacher_id,
        );
//        print_r($data);

        $this->db->insert('orientation_teacher', $data);
    }

    public function updateDb($id_orien, $teacher_id) {
        if ($this->db->where('id_orien', $id_orien)->where('teacher_id', $teacher_id)->get('orientation_teacher')->row()) {
            //Update
            $this->db->where('id_orien', $id_orien)->where('teacher_id', $teacher_id)->update('orientation_teacher', array(
                'teacher_id' => $teacher_id,
            ));
        } else {
            //Insert
            $this->db->insert('orientation_teacher', array(
                'id_orien' => $id_orien,
                'teacher_id' => $teacher_id,
            ));
        }
    }

    public function deleted_orien($id_orien) {
        $this->db->delete('orientation_teacher', array('id_orien' => $id_orien));
    }

    public function deleted_all($id_orien) {
        $this->db->delete('orientation', array('id_orien' => $id_orien));
    }

    public function getorientation($year, $semester) {
        $this->db->select('*');
        $this->db->where('orientation.year', $year);
        $this->db->where('orientation.semester', $semester);
        $query = $this->db->get('orientation')->result_array();
        return $query;
    }

    public function getByteacher_ID_orientation($teacher_id, $year,$semester) {
        $this->db->select('orientation.id_orien,orientation.id_es,orientation.date,orientation.time_start,orientation.time_end,orientation_teacher.teacher_id,teacher.teacher_name,teacher.teacher_lastname,student.id_st,student.name_st,student.lastname_st,student.major,establishment.name_es,student_establish.year,orientation_teacher.teacher_id');
        $this->db->from('orientation');
        $this->db->join('orientation_teacher', 'orientation_teacher.id_orien = orientation.id_orien')
                ->join('student_establish', 'student_establish.id_es = orientation.id_es')
                ->join('teacher', 'teacher.teacher_id = orientation_teacher.teacher_id')
                ->join('student', 'student.id_st=student_establish.id_st')
                ->join('establishment', 'establishment.id_es=student_establish.id_es');
        $this->db->where('orientation_teacher.teacher_id', $teacher_id);
        $this->db->where('orientation_teacher.year', $year);
        $this->db->where('orientation_teacher.semester', $semester);
        $this->db->order_by("orientation.date", "ASC");
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDb_orientation($year,$semester) {
        $this->db->select('orientation.id_orien,orientation.id_es,orientation.date,orientation.time_start,orientation.time_end,orientation_teacher.teacher_id,teacher.teacher_name,teacher.teacher_lastname,establishment.name_es,establishment.address_es,orientation.year,orientation.semester');
        $this->db->from('orientation');
        $this->db->join('orientation_teacher', 'orientation_teacher.id_orien = orientation.id_orien')
//                ->join('student_establish', 'student_establish.id_es = orientation.id_es')
                ->join('teacher', 'teacher.teacher_id = orientation_teacher.teacher_id')
//                ->join('student', 'student.id_st=student_establish.id_st')
                ->join('establishment', 'establishment.id_es=orientation.id_es');
        $this->db->where('orientation.year', $year);
        $this->db->where('orientation.semester', $semester);
        $this->db->order_by("orientation.date", "ASC");
        $query = $this->db->get()->result_array();
        return $query;
    }

    // demo select datateacher
    public function getdata_teacher($teacher_id, $year,$semester) {
        $this->db->select("*");
        $this->db->from("orientation")
                ->join("orientation_teacher", "orientation_teacher.id_orien =orientation.id_orien")
                ->join("teacher", "teacher.teacher_id=orientation_teacher.teacher_id")
                ->join("establishment", "establishment.id_es=orientation.id_es")
                ->where("orientation.year", $year)
                ->where("orientation.semester", $semester)
                ->where("orientation_teacher.teacher_id", $teacher_id);
        $this->db->order_by("orientation.date", "ASC");
        $query = $this->db->get()->result_array();
        return $query;
    }

    /* ----------assessment establish and student -------- */

    public function getdataorientation($year) {
        $this->db->select('teacher.teacher_id,teacher.teacher_name,teacher.teacher_lastname,student.id_st,student.name_st,student.lastname_st,student.major,establishment.id_es,establishment.name_es,orientation.year');
        $this->db->from("orientation");
        $this->db->join("student_establish", "student_establish.id_es= orientation.id_es")
                ->join("student", "student.id_st = student_establish.id_st")
                ->join("establishment", "establishment.id_es = student_establish.id_es")
                ->join("orientation_teacher", "orientation_teacher.id_orien=orientation.id_orien")
                ->join("teacher", "teacher.teacher_id = orientation_teacher.teacher_id");
        $this->db->where('orientation.year', $year);
        $this->db->order_by("orientation.id_orien", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function year($year) {
        $query = $this->db->select('year')->distinct('year')->where('year', $year)->get('orientation')->result_array();
        return $query;
    }

}

?>
