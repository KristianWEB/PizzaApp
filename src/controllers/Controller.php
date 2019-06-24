<?php
use src\models\database\MYSQLConnection;
use src\models\Recipe;

$db = MYSQLConnection::connect();
$recipe = new Recipe($db);


// Delete db record if any ( form button sends an id to the url and with get request we immediately delete the specified record ( using id ) from database then we load page again
$recipe->delete($id);

$result = $recipe->displayData();
require_once( __DIR__.'/../views/index.view.php');


// check Database records to reset the counter where there aren't any.
$recipe->checkRows(count($result));
