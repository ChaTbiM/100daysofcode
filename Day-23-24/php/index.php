<?php 
// Arrays
$names = [
    'Jeff',
    'Mustapha',
    'Peter'
];

//Associative Arrays 
$me = [
    'age' => 22,
    'hair' => 'black',
    'height' => 176,
];

$me['weight'] = 60;

unset($names[0]);
echo "<pre>";
var_dump($names);
echo "</pre>";

die();
require 'index.view.php';