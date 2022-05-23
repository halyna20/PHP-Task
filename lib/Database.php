<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

class Database
{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $connect;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->connect = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if (!$this->connect) {
            $this->error = "Connection fail" . $this->connect->connect_error;
            return false;
        }
    }


    public function select($query)
    {
        $result = $this->connect->query($query) or
            die($this->connect->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    public function insert($query)
    {
        $insert_row = $this->connect->query($query) or
            die($this->connect->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }


    public function update($query)
    {
        $update_row = $this->connect->query($query) or
            die($this->connect->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }


    public function delete($query)
    {
        $delete_row = $this->connect->query($query) or
            die($this->connect->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }
}
