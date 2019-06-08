<?php

use PizzaApp\models\database\Database;
use PizzaApp\models\Recipe;

$database = new Database();
$db = $database->connect();

$recipe = new Recipe($db);

$result = $recipe->displayData();

$result = $result->fetchAll();

// check Database records to reset the counter where there aren't any.
$rows = count($result);
$recipe->checkRows($rows);
require_once( __DIR__.'/../views/index.view.php');


