<?php 

require 'Task.php';
require '..\..\functions.php';
require '..\database\Connection.php';




$pdo = Connection::make();



$result = fetchAll($pdo);





require 'index.view.php';