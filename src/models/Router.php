<?php

namespace src\models;

class Router
{
    private static $id;
    private static $routes = [];

    public static function define($routes)
    {
        self::$routes = $routes;
    }

    public static function checkURI()
    {
        if (isset($_GET['id'])) {
            self::$id = (int) $_GET['id'];

            return self::$id;
        }

    }

    public static function direct($uri)
    {
       if (array_key_exists($uri, self::$routes)) {
           return self::$routes[$uri];
       } else {
           echo 'No route is defined';
       }
    }
}