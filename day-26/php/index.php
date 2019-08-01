<?php 

require 'Task.php';
require '..\..\functions.php';


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "mytodoapp";

$pdo = connectToDatabase();



$result = fetchAll($pdo);





require 'index.view.php';