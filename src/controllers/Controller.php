<?php


$database = new Database();
$db = $database->connect();

$recipe = new Recipe($db);

$result = $recipe->displayData();

$result = $result->fetchAll();



require_once( __DIR__.'/../views/index.view.php');


