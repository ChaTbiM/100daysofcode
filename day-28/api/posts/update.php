<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type, Access-Control-Allow-Origin,Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

// Instantiate Database

$database = new Database();
$db = $database->connect();

// instantiate blog post object
$post = new Post($db);

$data = json_decode(file_get_contents('php://input'));

$post->set_title($data->title);
$post->set_author($data->author);
$post->set_body($data->body);
$post->set_category_id($data->category_id);
$post->set_id($data->id);

if ($post->update()) {
    echo json_encode(
        ['message' => 'Post Updated']
    );
} else {
    echo json_encode(
        ['message' => 'Post not Updated']
    );
}
