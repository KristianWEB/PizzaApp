<?php

require 'models/database/Database.php';

$database = new Database();
$db = $database->connect();

$recipe = new Recipe($db);

$result = $recipe->displayData();

$result = $result->fetchAll();


require 'views/index.view.php';


