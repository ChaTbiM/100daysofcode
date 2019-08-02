<?php 

// require 'Task.php';

require 'core/bootstrap.php';
// comment

$router = new Router;

// require 'routes.php';


// require $router->direct($uri);


require Router::load('routes.php')
        ->direct(Request::uri(),Request::method());

// class Post {
//     public $title; 
//     public $author;
//     public $published;

//     public function __construct($title,$author,$published){
//         $this->title = $title;
//         $this->published = $published;
//         $this->author = $author;
//     }
// }


// $posts = [
//     new Post("My First Post","ME",true),
//     new Post("My Second Post","me",true),
//     new Post("My Third Post","YOU",true),
//     new Post("My Fourth Post","you",false)

// ];

// array_filter
// array_map
// array_column
// foreach

// $unpublishedPosts = array_filter($posts, function($post){
//     return !$post->published;
// });

// $modified = array_map(function($post){
//      $post->published = true;
//      return $post;
// },$posts);

// $titles = array_column($posts,'title');

// $titles2 = array_map(function($post){
//     return  $post->title;
// },$posts);

// $titles = array_column($posts,'title','author');

// die(var_dump($titles['My First Post']));
