<?php

namespace src\models;



use src\models\database\IDBConnection;

class Recipe
{
    private $conn;
    private $table = 'pizzas';

    public function __construct(IDBConnection $db)
    {
        $this->conn = $db;
    }

    public function connect() {
        return $this->conn::connect();
    }

    public function displayData()
    {
        $query = 'SELECT * FROM ' . $this->table;


        $sql = $this->connect()->prepare($query);

        $sql->execute();

        // return the fetched information
        return $sql->fetchAll();
    }

    public function displaySingle($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = '. $id;

        $sql = $this->connect()->prepare($query);

        $sql->execute();

        // return the fetched information
        return $sql->fetchAll();
    }
    public function checkRows($row)
    {
        if (!$row) {
            $query = 'ALTER TABLE ' . $this->table. ' AUTO_INCREMENT = 1';


            $sql = $this->connect()->prepare($query);

            $sql->execute();

        }
    }

    // Here is where we should insert the data using the controller
    public function create($pizzaName, $pizzaIngredients, $pizzaEmail)
    {
        /**
         * Check if our parameters are filled with data since if they are empty ("") it is considered false
         */
        if ($pizzaName && $pizzaIngredients && $pizzaEmail) {
            $query = 'INSERT INTO ' .
                $this->table . '
            SET title = :title,
                ingredients = :ingredients,
                email = :email
        ';
            $sql = $this->connect()->prepare($query);


            $sql->bindParam(':title', $pizzaName);
            $sql->bindParam(':ingredients', $pizzaIngredients);
            $sql->bindParam(':email', $pizzaEmail);


            $sql->execute();

            header('Location: \public');

        }

    }

    public function delete($id)
    {

        if (!empty($id)) {
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            $sql = $this->connect()->prepare($query);


            $sql->bindParam(':id', $id);

            $sql->execute();
        }
    }

    public function update($pizzaName, $pizzaIngredients, $pizzaEmail, $id)
    {

        $query = 'UPDATE ' .
            $this->table . '
            SET title = :title,
                ingredients = :ingredients,
                email = :email
                WHERE id = :id';

        /**
         * Check if our parameters are filled with data since if they are empty ("") it is considered false
         */
        if ($pizzaName && $pizzaIngredients && $pizzaEmail) {
            $sql = $this->connect()->prepare($query);


            $sql->bindParam(':title', $pizzaName);
            $sql->bindParam(':ingredients', $pizzaIngredients);
            $sql->bindParam(':email', $pizzaEmail);
            $sql->bindParam(':id', $id);

            $sql->execute();

            header('Location: \public');

        }

    }
}