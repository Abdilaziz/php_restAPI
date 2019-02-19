<?php

class Database{

    private $host = "localhost";
    private $db_name = "api_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){

        $this->conn = null;

        try {
            $dns = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            $this->conn = new PDO( $dns, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }
        catch(PDOException $exception) {
            echo "Connection error: ".$exception->getMessage();
        }

        return $this->conn;

    }

}


?>