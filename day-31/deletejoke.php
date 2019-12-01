<?php

if (isset($_POST['id'])) {
    try {
        include __DIR__.'/includes/DatabaseConnection.php';

        $query = 'DELETE FROM `jokes` WHERE `id`=:id';

        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':id', $_POST['id']);

        $stmt->execute();

        header('location: jokes.php');
    } catch (PDOException $e) {
        $output = 'Connection Error <br>'
        .$e->getMessage().' in <strong> '.$e->getFile().'</strong> on line <strong>'.$e->getLine().'</strong>';
    }
    include __DIR__.'\templates\layout.html.php';
}
