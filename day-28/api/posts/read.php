<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

// Instantiate Database

$database = new Database();
$db = $database->connect();

// instantiate blog post object
$post = new Post($db);

$results = $post->read();

$rows = $results->rowCount();

if ($rows) {
    global $results;
    foreach ($results as $post) {
        print_r($post);
    }
} else {
    echo 'there is no posts -_-';
}
