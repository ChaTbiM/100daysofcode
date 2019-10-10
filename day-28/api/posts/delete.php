<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type, Access-Control-Allow-Origin,Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

// Instantiate Database

$database = new Database();
$db = $database->connect();

// instantiate blog post object
$post = new Post($db);

$data = json_decode(file_get_contents('php://input'));

$post->set_id($data->id);

if ($post->delete()) {
    echo json_encode(
        ['message' => 'Post Deleted !']
    );
} else {
    echo json_encode(
        ['message' => 'Post not Deleted !']
    );
}
