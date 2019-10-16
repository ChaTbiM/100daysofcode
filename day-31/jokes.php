<?php

$host = 'localhost';
$dbname = 'joker';
$username = 'root';
$password = 'ss';

// Connection
try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $output = 'Connection Worked Bro';
} catch (PDOException $e) {
    $output = 'Connection Error <br>'
    .$e->getMessage().' in <strong> '.$e->getFile().'</strong> on line <strong>'.$e->getLine().'</strong>';
}

include __DIR__.'/template.html.php';
// Preparing Statements and Binding Parameters

// Executing The Query
