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

    $posts_arr = [];
    $posts_arr['data'] = [];

    while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'body' => html_entity_decode($body),
            'category_id' => $category_id,
            'category_name' => $category_name,
        ];

        array_push($posts_arr['data'], $post_item);
    }

    echo json_encode($posts_arr);
} else {
    echo json_encode(['message' => 'no Post Found']);
}
