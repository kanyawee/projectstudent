<?php

class Establishmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getestablish($id_st, $year) {
        if ($query = $this->db->where('id_st', $id_st)->where('year', $year)->get('student_establish')->result_array()) {
            return $query;
        } else {
            NULL;
        }
    }

    public function getDb($data) {
        $name_es = $data['name_es'];
        if ($query = $this->db->where('name_es', $name_es)->get('establishment')->result_array()) {
            return $query;
        } else {
            echo NULL;
        }
    }

    function add($data) {
        $this->db->insert('establishment', $data);
    }

    function addstd($data) {
        if ($this->db->insert('student_establish', $data)) {
            
        } else {
            echo "Error";
        }
    }

    public function setid() {
        $id = $this->db->select_max('id_es')->get('establishment')->result_array();
        return $id[0]['id_es'];
    }

    function delete($id_es) {
        $this->db->delete('establishment', array('id_es' => $id_es));
    }

    public function getstudentidbyestablish($id_st) {
        $this->db->where('student_establish.id_st', $id_st);
        $this->db->select("*");
        $this->db->from("student_establish");
        $this->db->join("establishment", "establishment.id_es = student_establish.id_es");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getstablish($id_st) {
        $status = 1;
        $this->db->where('student_establish.id_st', $id_st)->where('student_establish.status', $status);
        $this->db->select("*");
        $this->db->from("student_establish");
        $this->db->join("establishment", "establishment.id_es = student_establish.id_es");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_establish($data) {
        $id_es = $data['id_es'];
        $this->db->where('id_es', $id_es);
        $this->db->update('establishment', $data);
        $this->db->where('id_es', $id_es);
        $query = $this->db->get('establishment');
        return $query->result_array();
    }

    public function getestablishment($id) {
        $this->db->where('id_es', $id);
        return $this->db->get('establishment');
    }

    public function showall() {
        $status = 1;
        $this->db->select("student_establish.year,student_establish.id_st,student_establish.id_es,establishment.name_es,establishment.address_es,establishment.tell_es,establishment.website");
        $this->db->where('student_establish.status', $status);
        $this->db->order_by("student_establish.year", "DESC");
        $this->db->from("student_establish");
        $query = $this->db->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    function getshowestablish($year) {
        $this->db->select("student_establish.id_es,student_establish.year,establishment.name_es,establishment.tell_es,establishment.website,establishment.address_es");
        $this->db->where('student_establish.year', $year);
        $this->db->order_by("student_establish.year", "DESC");
        $this->db->from("student_establish");
        $query = $this->db->join("establishment", "establishment.id_es = student_establish.id_es")->join("student", "student.id_st= student_establish.id_st")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    public function showdata($id_es) {
        $this->db->where('id_es', $id_es);
        $query = $this->db->get('establishment');
        return $query->result_array();
    }

    public function showalldata($id_es) {
        $this->db->where('id_es', $id_es);
        return $this->db->get('establishment');
    }

    public function getestablishbyname($name) {
        $this->db->like('name_es', $name);
        $query = $this->db->get('establishment');

        return $query->result_array();
    }

    public function getDetail($id_es) {
        $this->db->where('id_es', $id_es);
        $query = $this->db->get('establishment');
        return $query->result_array();
    }

    public function add_idestablish($data) {
        $this->db->insert('student_establish', $data);
    }

//    public function checkid($id_st){
//        $this->db->select('*');
//        $this->db->where('id_st', $id_st);
//        $query = $this->db->get('student_establish_view');
//        return $query->result_array();
//    }



    public function selectid($id_st) {
        $this->db->where('student_establish.id_st', $id_st);
        $this->db->select("*");
        $this->db->order_by("student_establish.year", "DESC");
        $this->db->from("student_establish");
        $this->db->join("establishment", "establishment.id_es = student_establish.id_es");
        $query = $this->db->get();
        return $query->result_array();
    }

    function getrelation($year) {
        $status = 1;
        $this->db->select("student_establish.year,student_establish.id_st,student_establish.id_es,establishment.name_es,establishment.address_es,establishment.tell_es,establishment.website");
        $this->db->where('student_establish.status', $status)->where('year', $year);
        $this->db->order_by("student_establish.year", "DESC");
        $this->db->from("student_establish");
        $query = $this->db->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    function establishall() {
        $query = $this->db->get('establishment');
        return $query->result_array();
    }

    function getname_es() {
        $this->db->select('name_es,id_es');
        $query = $this->db->get('establishment');
        return $query->result_array();
        
    }

    public function getestablis() {
        $status = 1;
        $this->db->from("student_establish");
//        $this->db->select("student_establish.year,student_establish.id_es,establishment.name_es,establishment.address_es,establishment.tell_es,establishment.website");
        $this->db->where('student_establish.status', $status);
        $this->db->order_by("student_establish.year", "DESC");
        $query = $this->db->join("establishment", "establishment.id_es = student_establish.id_es")->get()->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    public function shjoin($id) {
        $this->db->select('*');
        $this->db->from('orentation');
        $this->db->join('orentation_teacher', 'orentation_teacher.id_orien = orentation.id_orien');
        $this->db->where('orentation_teacher.id_orien',$id);
        $query = $this->db->get();
        
        return $query->result_array();
        
    }

}

?>