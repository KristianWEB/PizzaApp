<?php


class Recipe
{
    private $conn;
    private $table = 'pizzas';

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function displayData()
    {
        $query = 'SELECT * FROM '. $this->table;


        $sql = $this->conn->prepare($query);

        $sql->execute();

        return $sql;
    }
}