<?php

require_once "Database.php";

class TokoKelontong{
    function __construct(){
        $this->db = new Database();
    }

    function tampilData($table, $where = null){
        return $this->db->select($table, $where);
    }

    function tambahData($table, $data){
    return $this->db->insert($table, $data);
    }

    function ubahData($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    function hapusData($table, $where){
        return $this->db->delete($table, $where);
    }
}
?>