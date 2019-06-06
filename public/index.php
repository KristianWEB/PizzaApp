<?php


// Default Vendor autoload
require_once "../vendor/autoload.php";





$router = new Router();


require_once '../src/models/routes.php';

 $uri = trim($_SERVER['REQUEST_URI'], '/');

require $router->direct($uri);
