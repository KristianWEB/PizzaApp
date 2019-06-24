<?php

// initialize project

use src\models\database\Database;
use src\models\Router;
use src\models\Recipe;

$router = new Router();
$id = $router->checkURI();

require_once '../src/models/routes.php';
$uri = trim($_SERVER['REQUEST_URI'], '/');


// Delete db record if any ( form button throws an id to the url and with get request we immediately delete the specified record ( using id ) from database then we load page again

$database = new Database();
$db = $database->connect();

$recipe = new Recipe($db);

$recipe->delete($id);


require $router->direct($uri);