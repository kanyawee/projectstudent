<?php

class documentmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertdata($data) {
        $this->db->insert('document_1', $data);
    }

    public function update($data, $id_st) {
        $this->db->where('document_1.id_st', $id_st);
        $this->db->update('document_1', $data);
    }

//    public function getupdatadocument1($id_st, $year) {
//        $this->db->where('document_1.id_st', $id_st)->where('document_1.year', $year);
//        $this->db->select("*");
//        $this->db->from("document_1");
//        $this->db->join("student_establish", "document_1.id_st= student_establish.id_st", "left");
//        $this->db->join("student", "student.id_st= student_establish.id_st");
//        $this->db->join("establishment", "establishment.id_es = student_establish.id_es");
//        $query = $this->db->get();
//        return $query->result_array();
//    }

    public function showuserdata($id_st, $year) {
        $this->db->where('document_1.id_st', $id_st);
        $this->db->where('document_1.year', $year);
        $this->db->select("*");
        $this->db->from("document_1");
        $this->db->join("student_establish", "document_1.id_st= student_establish.id_st", "left");
        $this->db->join("student", "student.id_st= student_establish.id_st");
        $this->db->join("establishment", "establishment.id_es = student_establish.id_es");
        $query = $this->db->get();
        if ($query != NULL) {
            return $query->result_array();
        }
        return NULL;
    }

    public function showdatadocument($id_st) {
        $this->db->where('document_1.id_st', $id_st);
        $query = $this->db->get('document_1');

        return $query->result_array();
    }

    public function getbyyear($id_st) {
        $query = $this->db->select_max('year')->where('id_st', $id_st)->get('student_establish');
        return $query->result_array();
    }

    public function uploadfile($data) {
        $id_st = $data['id_st'];
        $document_number = $data['id'];
        $year = $data['year'];
        $semester=$data['semester'];
        if ($this->db->where('id_st', $id_st)->where('year', $year)->where('document_number', $document_number)->get('document_upload')->row()) {
            //Update
            $this->db->where('id_st', $id_st)->where('document_number', $document_number)->update('document_upload', array(
                'document_name' => $data['file_name'],
                'documentfull_path' => $data['full_path'],
            ));
        } else {
            //Insert
            $this->db->insert('document_upload', array(
                'id_document' => '',
                'document_name' => $data['file_name'],
                'documentfull_path' => $data['full_path'],
                'id_st' => $data['id_st'],
                'document_number' => $data['id'],
                'year' => $data['year'],
                'semester'=>$data['semester']
            ));
        }
    }

    function getfile($id_st) {
        $this->db->order_by('year', ' DESC ');
        $this->db->select('document_number');
        $this->db->where('document_upload.id_st', $id_st);
        $query = $this->db->get('document_upload')->result_array();
        if ($query != NULL) {
            return $query;
        }return NULL;
    }

    public function getfile_upload($id_st, $data, $year) {
        $id = $data['id'];
        $this->db->select('*');
        $this->db->from('document_upload');
        $this->db->where('id_st', $id_st)->where('document_number', $id)->where('year', $year);

        $query = $this->db->get();
        return $query->result_array();
    }

//      public function showdocument() {
//        $query = $this->db->get();
//        return $query->result_array();
//    }
    /* -------------getdatadocument-page teacher----- */
    public function showdocument() {
        $this->db->from('document_upload');
        $this->db->join('student', 'student.id_st = document_upload.id_st');
        $this->db->distinct("document_number");
        $query = $this->db->get();
        return $query->result_array();
    }

    function getdatadocument($year, $semester) {
        $status = 1;
        $oldbox = $this->db->from('student_establish')
                        ->where('document_upload.year', $year)
                        ->where('student_establish.status', $status)
                        ->where('document_upload.semester', $semester)
                        ->join('document_upload', 'document_upload.id_st = student_establish.id_st')
                        ->join('student', 'student.id_st = student_establish.id_st')->get()->result_array();
        foreach ($oldbox as $box) {
            $newBox[$box['id_st']][] = $box;
        }
        if (isset($newBox)) {
            return $newBox;
        } else {
            return NULL;
        }
    }

    public function insert($dataInput) {
        $this->db->insert('control', $dataInput);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    public function getfinish($year) {
        $this->db->where('year', $year);
        $query = $this->db->from('student_establish')->get();

        return $query->result_array();
    }

//    public function finish($id_st) {
//        $this->db->where('student_establish.id_st', $id_st);
//        $this->db->from('student_establish');
//        $query = $this->db->join("document_upload", "document_upload.id_st= student_establish.id_st")
//                        ->join("assessment_student", "assessment_student.id_st = student_establish.id_st")->get()->result_array();
//
//        return $query->result_array();
//    }

    public function addfinish($id_st) {
//$finish = ['1'];
//        $this->db->select('finish');
        $this->db->where('id_st', $id_st);
        $data = array(
            'finish' => 1
        );
        $this->db->update('student_establish', $data);
        $query = $this->db->get('student_establish');
        return $query->result_array();
    }

    public function chack_process($id_st) {
        $this->db->select('document_number');
        $query = $this->db->where('id_st', $id_st)->order_by("year", "DESC")->get('document_upload')->result_array();
        return $query;
    }

    public function chack_finish($id_st) {
        $query = $this->db->where('id_st', $id_st)->get('student_establish')->result_array();
        return $query;
    }

    public function document_1($id_st, $year) {
        $this->db->select('*');
        $query = $this->db->where('id_st', $id_st)->where('year', $year)->get('document_1')->result_array();
        return $query;
    }

}

?>
