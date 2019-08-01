<?php 


function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}


function fetchAll($pdo){
    
    $statement = $pdo->prepare("select * from todos");
    $statement->execute();



    return $statement->fetchAll(PDO::FETCH_CLASS,'Task');
}