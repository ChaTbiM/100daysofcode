<?php

$title = 'This Is Home Page';

ob_start();

include __DIR__.'/templates/home.html.php';

$output = ob_get_clean();

include __DIR__.'/templates/layout.html.php';

include_once __DIR__.'/includes/DatabaseConnection.php';
include_once __DIR__.'/includes/DatabaseFunctions.php';

$jokes = allJokes($pdo);

var_dump($jokes);
