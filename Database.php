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
    function insert($table, $data) {
        $columns = implode(",", array_keys($data));
        $values  = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->mysqli->query($sql);
    }

    function update($table, $data, $where) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key='$value',";
        }
        $set = rtrim($set, ',');

        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= "$key='$value' AND ";
        }
        $condition = rtrim($condition, " AND ");

        $sql = "UPDATE $table SET $set WHERE $condition";
        return $this->mysqli->query($sql);
    }

    function delete($table, $where) {
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= "$key='$value' AND ";
        }
        $condition = rtrim($condition, " AND ");

        $sql = "DELETE FROM $table WHERE $condition";
        return $this->mysqli->query($sql);
    }

    function __destruct()
    {
        $this->mysqli->close();
    }
}
?>
