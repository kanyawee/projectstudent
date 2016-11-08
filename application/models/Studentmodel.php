<?php

class Studentmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getyear() {
        $query = $this->db->select_max('year')->get('student_establish');
        return $query->result_array();
    }

    function unrepeat($id) {
        $this->db->where('id_st', $id);
        return $this->db->get('student')->result_array();
    }

    function addstudent($data) {
        $this->db->insert('student', $data);
    }

    public function update($id_st, $data) {
        $this->db->where('id_st', $id_st);
        $this->db->update('student', $data);
        $this->db->where('id_st', $id_st);
        $query = $this->db->get('student');
        return $query->result_array();
    }

    public function delete($id_st) {
        $this->db->delete('student', array('id_st' => $id_st));
    }

    public function deleted($id_st) {
        $this->db->delete('student_establish', array('id_st' => $id_st));
    }

    public function add_detail($data) {
        $this->db->insert('student_establish', $data);
    }

    function showall() {
        $this->db->order_by("id_st", "DESC");
        $query = $this->db->get('student');
        return $query->result_array();
    }

    function showdetail($id_st) {
        $this->db->select('student.id_st,student.name_st,student.lastname_st,student.major,student.tell_st,student.email,student.name_pr,student.relation,student.tell_pr,student.file_name,student.full_path');
        $query = $this->db->where('student.id_st', $id_st)->get('student')->result_array();
        return $query;
    }

    public function selectstudent($data) {
        return $this->db->where('id_st', $data)->get('student')->result_array();
    }

    /**
     * Select Relation by view table with id_st
     * @param type $id_st
     * @return type
     */
    function getdatabyyear($id_st, $year) {

        $this->db->where('student_establish.id_st', $id_st)->where('student_establish.year', $year);
        $this->db->from("student_establish");
        $query = $this->db->join("student", "student.id_st= student_establish.id_st")->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    function data_es_st($id_st) {
        $this->db->where('student_establish.id_st', $id_st);
        $this->db->from("student_establish");
        $query = $this->db->join("student", "student.id_st= student_establish.id_st")->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    /**
     * select relation by join table with id_st
     * @param type $id_st
     * @return type
     */
//    public function getbyyear() {
//        $query = $this->db->select('year')->distinct('year')->get('student_establish');
//        return $query->result_array();
//    }
//    public function getbyyear() {
//        $query = $this->db->select_max('year')->distinct('year')->get('student_establish');
//        return $query->result_array();
//    }
//
    public function getrelation($year, $semester) {
        $status = 1;
        $this->db->select("student_establish.year,student_establish.id_st,student_establish.id_es,student.name_st,student.lastname_st,student.major,establishment.name_es,student.tell_st");
        $this->db->where('student_establish.status', $status)->where('year', $year)->where('semester', $semester);
        $this->db->order_by("student_establish.year", "DESC");
        $this->db->from("student_establish");
        $query = $this->db->join("student", "student.id_st= student_establish.id_st")->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    public function showrelation($data) {
//$this->db->where('establish.id_es',$id_es);
        $year = $data['year'];
        $major = $data['major'];
        $status = 1;
        $this->db->select("student_establish.year,student_establish.id_st,student_establish.id_es,student.name_st,student.lastname_st,student.major,establishment.name_es");
        if ($major == 'all') {
            $this->db->where('student_establish.status', $status)->where('student_establish.year', $year);
        } else {
            $this->db->where('student_establish.status', $status)->where('student.major', $major)->where('student_establish.year', $year);
        }
        $this->db->from("student_establish");
        $query = $this->db->join("student", "student.id_st= student_establish.id_st")->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    public function getstudentid($id_st) {
        $this->db->where('id_st', $id_st);
        $query = $this->db->get('student');
        return $query;
    }

///////////////loginsystem///////////////////

    public function login($data) {
        $id_st = $data['username'];
        $password = $data['password'];
        $this->db->where('id_st', $id_st);
        $this->db->where('password', MD5($password));
        $query = $this->db->get('student');
        return $query->result_array();
    }

    /* select datastudent get year and major
     * show form teacher
     */

    public function getstudentbymajor($data) {
        $year = $data['year'];
        $major = $data['major'];

        if ($major == "all") {
            $this->db->where('year', $year);
        } else {
            $this->db->where('year', $year)->where('major', $major);
        }
        $query = $this->db->from('student_establish')->join('student', "student.id_st= student_establish.id_st")->get()->result_array();
        return $query;
    }

//------select datastudent form document-----//
    public function getdatastudent() {
        $this->db->select('id_st,name_st,lastname_st,major');
        $this->db->order_by("id_st", "DESC");
        $query = $this->db->get('student');
        return $query->result_array();
    }

    public function uploadfile($data) {
        $this->db->where('id_st', $data['id_st']);
        $this->db->update('student', array(
            'file_name' => $data['file_name'],
            'full_path' => $data['full_path']
        ));
        $query = $this->db->get('student');
        return $query->result_array();
    }

    public function changnewgpassword($data, $id_st) {
        $this->db->where('id_st', $id_st);
        $this->db->update('student', array(
            'password' => $data['confrimpassword']
        ));
        $query = $this->db->get('student');
        return $query->result_array();
    }

    public function resetpassword($newp, $id_st) {
//      echo $default;
        $this->db->select("id_st,password");
        $this->db->where('id_st', $id_st);
        $this->db->update('student', array(
            'password' => $newp
        ));
        $this->db->where('id_st', $id_st);
        $query = $this->db->get('student');
//        if($query!=NULL){
//            $this->encypt->decode($query['password']);
//        }
        return $query->result_array();
    }

    public function changepass($username, $password) {
        $data = array(
            'password' => md5($password)
        );
        $this->db->where('id_st', $username);
        if ($this->db->update('student', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getdata_student($year, $semester) {
        $this->db->select("student.name_st,student.lastname_st,student.id_st,student.major,student_establish.id_es");
        $this->db->from("student")
                ->join("student_establish", "student_establish.id_st=student.id_st")
//                ->join("establishment","establishment.id_es=student_establish.id_es")
                ->where("student_establish.year", $year)
                ->where("student_establish.semester", $semester);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_student($year, $semester) {
        $status = 1;
        $this->db->select("student.name_st,student.lastname_st,student.id_st,student.major,student_establish.status,student_establish.year,student_establish.teacher_id,student_establish.id_es");
        $this->db->from("student")
                ->join("student_establish", "student_establish.id_st=student.id_st")
                ->where("student_establish.year", $year)
                ->where("student_establish.status", $status)
                ->where("student_establish.semester", $semester);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function add_advisors($data, $teacher, $year, $semester) {
        $this->db->where("year", $year)
                ->where("id_st", $data[0]['value'])
                ->where("semester", $semester);
        $this->db->update('student_establish', array(
            'teacher_id' => $teacher['teacher_id'][0],
        ));
    }

    public function delete_advisors($id_st, $year, $semester) {
        $addvisors = "0";
        $this->db->where("year", $year)
                ->where("id_st", $id_st)
                ->where("semester", $semester);
        $this->db->update('student_establish', array('teacher_id' => $addvisors));
    }

    public function get_student_es($year, $semester, $teacher_id) {
        $status = 1;
        $this->db->select("student.name_st,student.lastname_st,student.id_st,student.major,student_establish.status,student_establish.year,student_establish.teacher_id,establishment.id_es,establishment.name_es");
        $this->db->from("student")
                ->join("student_establish", "student_establish.id_st=student.id_st")
                ->join("establishment", "establishment.id_es=student_establish.id_es")
                ->where("student_establish.year", $year)
                ->where("student_establish.semester", $status)
                ->where("student_establish.teacher_id", $teacher_id)
                ->where("student_establish.semester", $semester);

        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getdata_major($major) {
        $status = 1;
        $this->db->select("student_establish.year,student_establish.id_st,student_establish.id_es,student.name_st,student.lastname_st,student.major,establishment.name_es,student.tell_st");
        $this->db->where('student_establish.status', $status)->where('major', $major);
        $this->db->order_by("student_establish.year", "DESC");
        $this->db->from("student_establish");
        $query = $this->db->join("student", "student.id_st= student_establish.id_st")->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    public function getdata_year_major($year, $semester, $major) {
        $status = 1;
        $this->db->select("student_establish.year,student_establish.id_st,student_establish.id_es,student.name_st,student.lastname_st,student.major,establishment.name_es,student.tell_st");
        $this->db->where('student_establish.status', $status)->where('year', $year)->where('major', $major)->where('semester', $semester);
        $this->db->order_by("student_establish.year", "DESC");
        $this->db->from("student_establish");
        $query = $this->db->join("student", "student.id_st= student_establish.id_st")->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

}

?>  