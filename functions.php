<?php 


function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function connectToDatabase(){

  
   
    try {
     return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e){
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    
    }
}

function fetchAll($pdo){
    
    $statement = $pdo->prepare("select * from todos");
    $statement->execute();



    return $statement->fetchAll(PDO::FETCH_CLASS,'Task');
}