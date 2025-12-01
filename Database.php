<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_tokokelontong');

class Database
{
    public $mysqli;

    function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->mysqli->connect_error) {
            echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
        }
    }

    function select($table, $where = null)
    {
        $sql = "SELECT * FROM $table ";

        if ($where != null) {
            $sql .= "WHERE ";
            $row = null;

            if (count($where) == 1) {
                foreach ($where as $key => $value) {
                    $sql .= "$key = '$value'";
                }
            } else {
                foreach ($where as $key => $value) {
                    $row .= "$key = '$value' AND ";
                }

                // buang " AND " paling belakang
                $sql .= substr($row, 0, -4);
            }
        }

        $result = $this->mysqli->query($sql) 
            or trigger_error("Wrong SQL: $sql - Error: " . $this->mysqli->error, E_USER_ERROR);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function __destruct()
    {
        $this->mysqli->close();
    }
}
?>
