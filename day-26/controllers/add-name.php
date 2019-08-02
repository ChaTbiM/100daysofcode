<?php 

// var_dump($_POST);

App::get('database')->insert('users',[
    'name' => $_POST['name'],
]);

header("Location: /");