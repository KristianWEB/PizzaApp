<?php

use src\models\Router;

//check for any ids in the URI( if there are some we will delete them in the controller )
$id = Router::checkURI();

Router::define([
    'public'=>'../src/controllers/Controller.php',
    'public?id='.$id =>'../src/controllers/Controller.php',
    'public/create'=>'../src/controllers/FormController.php',
]);

// redirect to specific controller depending on the uri
$uri = trim($_SERVER['REQUEST_URI'], '/');
require Router::direct($uri);