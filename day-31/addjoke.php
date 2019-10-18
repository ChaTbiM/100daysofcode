<?php

if (isset($_POST['joketext'])) {
    $host = 'localhost';
    $dbname = 'joker';
    $username = 'root';
    $password = '';

    $table = 'jokes';

    try {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);

        $query = 'INSERT INTO '.$table.' (`joketext`,`jokedate`) VALUES(:joketext, CURDATE())';

        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':joketext', $_POST['joketext']);

        $stmt->execute();
        header('location: jokes.php');
    } catch (PDOException $e) {
        $output = 'Connection Error <br>'
        .$e->getMessage().' in <strong> '.$e->getFile().'</strong> on line <strong>'.$e->getLine().'</strong>';
    }
} else {
    $title = 'add new joke';
    ob_start();

    include __DIR__.'/templates/addjoke.html.php';

    $output = ob_get_clean();
}

include __DIR__.'/templates/layout.html.php';
