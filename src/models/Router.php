<?php

namespace src\models;

class Router
{
    private $id;
    protected $routes = [];

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function checkURI()
    {
        if (isset($_GET['id'])) {
            $this->id = (int) $_GET['id'];

            return $this->id;
        }

    }

    public function direct($uri)
    {

       if (array_key_exists($uri, $this->routes)) {
           return $this->routes[$uri];
       } else {
           echo 'No route is defined';
       }

    }
}