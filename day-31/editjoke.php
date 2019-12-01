<?php

include __DIR__.'/includes/DatabaseConnection.php';
include __DIR__.'/includes/DatabaseFunctions.php';

try {
    if (isset($_POST['joketext'])) {
        updateJoke($pdo, $_POST['jokeid'], $_POST['joketext'], 1);
        header('location: jokes.php');
    } else {
        $joke = getJoke($pdo, $_GET['id']);

        ob_start();
        include __DIR__.'/templates/editejoke.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $output = 'Connection Error <br>'
    .$e->getMessage().' in <strong> '.$e->getFile().'</strong> on line <strong>'.$e->getLine().'</strong>';
}

include __DIR__.'/templates/layout.html.php';
