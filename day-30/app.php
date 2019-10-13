<?php

include 'Controller.php';
include 'Model.php';
include 'View.php';

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

$controller->clicked();
// echo $view->output();
