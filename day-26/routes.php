<?php

// Routing 


// $router->define([
//     '' => 'controllers/index.php',
//     'about' => 'controllers/about.php',
//     'contact' => 'controllers/contact.php',
//     'names' => 'controllers/add-name.php'
// ]);

$router->get('','controllers/index.php');
$router->get('contact','controllers/contact.php');
$router->get('about','controllers/about.php');
$router->post('names','controllers/add-name.php');


