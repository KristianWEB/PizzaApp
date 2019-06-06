<?php


/**
 *  HERE IS WHERE WE SHOULD GET THE FORM INFORMATION FROM create.view.php
 *  AND THEN INSERT IT INTO /models/Recipe.php
 */



$form = new Form('pizzaName', 'pizzaIngredients', 'pizzaEmail', 'submit');

$form->validate();
//testing purposes
$form->displayData();


$errors = $form->errors;



require  __DIR__ . '/../views/create.view.php';

$database = new Database();
$db = $database->connect();

$recipe = new Recipe($db);

$items = $form->getItems();


$recipe->create($items['titlePOST'], $items['ingredientsPOST'], $items['emailPOST']);

/** We have access to the form data here so we will pass it to our model to validate it*/
