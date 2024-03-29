<?php



use src\models\Form;
use src\models\database\MYSQLConnection;
use src\models\Recipe;

// initialize form "name" attributes values
$form = new Form('pizzaName', 'pizzaIngredients', 'pizzaEmail', 'submit');

$errors = $form->errors;


require  __DIR__ . '/../views/create.view.php';

$recipe = new Recipe(new MYSQLConnection());

$items = $form->getItems();

$recipe->create($items['titlePOST'], $items['ingredientsPOST'], $items['emailPOST']);

