<?php

require_once "Database.php";

class TokoKelontong{
    function __construct(){
        $this->db = new Database();
    }

    function tampilData($table, $where = null){
        return $this->db->select($table, $where);
    }
}
?>