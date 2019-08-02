<?php 

// var_dump($_POST);

$app['database']->insert('users',[
    'name' => $_POST['name'],
]);

header("Location: /");