<?php 


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "mytodoapp";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());

}

$statement = $pdo->prepare("select * from todos");
$statement->execute();


// echo "<pre>";
$result = $statement->fetchAll(PDO::FETCH_OBJ);

var_dump($result[0]);
// echo "</pre>";



require 'index.view.php';