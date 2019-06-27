<?php
use src\models\Form;
use src\models\database\MYSQLConnection;
use src\models\Recipe;

$form = new Form('pizzaName', 'pizzaIngredients', 'pizzaEmail', 'submit');
$errors = $form->errors;

$recipe = new Recipe(new MYSQLConnection());
$singleItem = $recipe->displaySingle($id);

require  __DIR__ . '/../views/update.view.php';

$items = $form->getItems();
$recipe->update($items['titlePOST'], $items['ingredientsPOST'], $items['emailPOST'], $id);
