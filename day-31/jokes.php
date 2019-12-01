<?php

// Connection
try {
    include __DIR__.'/includes/DatabaseConnection.php';

    // $query = 'CREATE TABLE `jokes`(id int NOT NULL AUTO_INCREMENT PRIMARY KEY,joketext TEXT ,jokedate DATE NOT NULL )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
    $query = 'SELECT `jokes`.`id` , `joketext` , `name`,`email` , `author_id` 
    FROM `jokes` INNER JOIN `authors` 
    ON `author_id`= `authors`.id ';
    $jokes = $pdo->query($query);

    $title = 'Joke list';

    ob_start();
    include __DIR__.'/templates/jokes.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $output = 'Connection Error <br>'
    .$e->getMessage().' in <strong> '.$e->getFile().'</strong> on line <strong>'.$e->getLine().'</strong>';
}

include __DIR__.'/templates/layout.html.php';
