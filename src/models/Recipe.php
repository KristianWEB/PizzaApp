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

    // Here is where we should insert the data using the controller
    public function create($pizzaName, $pizzaIngredients, $pizzaEmail)
    {
        $query = 'INSERT INTO ' .
            $this->table . '
            SET title = :title,
                ingredients = :ingredients,
                email = :email
        ';

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':title', $pizzaName);
        $stmt->bindParam(':ingredients', $pizzaIngredients);
        $stmt->bindParam(':email', $pizzaEmail);


        $stmt->execute();
    }
}