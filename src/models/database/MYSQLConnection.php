<?php

namespace src\models\database;
use \PDO;

interface IDBConnection {
    public static function connect();
}

class MYSQLConnection implements IDBConnection
{
    // Database parameters

    private static $host = 'localhost';
    private static $db_name = 'pizzaapp';
    private static $username = 'kristian';
    private static $password = 'test1234';
    private static $conn;

    // Connect to Database

    public static function connect()
    {

        try {
            self::$conn = new PDO("mysql:host=".self::$host.";dbname=". self::$db_name, self::$username, self::$password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: '. $e->getMessage();
        }

        return self::$conn;
    }
}