<?php

$host = 'localhost';
$dbname = 'joker';
$username = 'root';
$password = '';

// Connection
try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $query = 'CREATE TABLE `jokes`(id int NOT NULL AUTO_INCREMENT PRIMARY KEY,joketext TEXT ,jokedate DATE NOT NULL )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
    $query = 'SELECT `joketext` FROM `jokes`';
    $res = $pdo->query($query);

    $jokes = [];
    while ($row = $res->fetch()) {
        // $jokes[] = $row['joketext'];
        array_push($jokes, $row['joketext']);
    }

    $title = 'Joke list';

    ob_start();
    include __DIR__.'/templates/jokes.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $output = 'Connection Error <br>'
    .$e->getMessage().' in <strong> '.$e->getFile().'</strong> on line <strong>'.$e->getLine().'</strong>';
}

include __DIR__.'/templates/layout.html.php';
// Preparing Statements and Binding Parameters

// Executing The Query
