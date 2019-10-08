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

$id = isset($_GET['id']) ? $_GET['id'] : die();
$post->set_id($id);

$post->read_single();

$post_arr = [
    'id' => $post->get_id(),
    'title' => $post->get_title(),
    'body' => $post->get_body(),
    'author' => $post->get_author(),
    'category_id' => $post->get_category_id(),
    'category_name' => $post->get_category_name(),
];

print_r(json_encode($post_arr));
