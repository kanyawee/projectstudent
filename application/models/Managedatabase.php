<?php

class Managedatabase extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getDb($data, $table) {

        if ($query = $this->db->where($data)->get($table)->result_array()) {
            return $query;
        } else {
            return null;
        }
    }

    public function addCheck($data, $where, $table) {
        if ($this->getDb($where, $table)) {
            //$this->getDb($data, $table=$this->db->where('id_st', $id_st)->get('orientation')->row()
            $this->db->where($where)->update($table, $data);
        } else {
            $this->db->insert($table, $data);
        }
    }

    public function getDbcoloum($data, $colum, $table) {

        if ($query = $this->db->where($data)->select($colum)->get($table)->result_array()) {
            return $query[0];
        } else {
            return null;
        }
    }

    public function getall($where, $table) {
        $query = $this->db->where($where)->get($table)->result_array();
        foreach ($query as $box) {
            $newBox[$box['id_st']] = $box;
        }
        if (isset($newBox)) {
            return $newBox;
        } else {
            $data = "ไม่พบข้อมูล";
            return $data;
        }
    }


    public function getdatapoint($where, $table) {
        $query = $this->db->where($where)->get($table)->result_array();
        return $query;

    }

    public function getpoint_as_student($where, $table) {
        $query = $this->db->where($where)->get($table)->result_array();
        return $query;
    }

}

?>