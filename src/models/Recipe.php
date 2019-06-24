<?php

namespace src\models;



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
        $query = 'SELECT * FROM ' . $this->table;


        $sql = $this->conn->prepare($query);

        $sql->execute();

        // return the fetched information
        return $sql->fetchAll();
    }

    public function checkRows($row)
    {
        if (!$row) {
            $query = 'ALTER TABLE ' . $this->table. ' AUTO_INCREMENT = 1';


            $sql = $this->conn->prepare($query);

            $sql->execute();

        }
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

        /**
         * Check if our parameters are filled with data since if they are empty ("") it is considered false
         */
        if ($pizzaName && $pizzaIngredients && $pizzaEmail) {
            $stmt = $this->conn->prepare($query);


            $stmt->bindParam(':title', $pizzaName);
            $stmt->bindParam(':ingredients', $pizzaIngredients);
            $stmt->bindParam(':email', $pizzaEmail);


            $stmt->execute();

            header('Location: \public');

        }

    }

    public function delete($id)
    {

        if (!empty($id)) {
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            $stmt = $this->conn->prepare($query);


            $stmt->bindParam(':id', $id);

            $stmt->execute();
        }
    }
}