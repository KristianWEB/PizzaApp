<?php

namespace src\models\database;
use \PDO;

class Database
{
    // Database parameters

    private $host = 'localhost';
    private $db_name = 'pizzaapp';
    private $username = 'kristian';
    private $password = 'test1234';
    private $conn;

    // Connect to Database

    public function connect()
    {

        try {
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=". $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: '. $e->getMessage();
        }

        return $this->conn;
    }
}