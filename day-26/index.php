<?php 

// require 'Task.php';

require 'core/bootstrap.php';
// comment

$router = new Router;

// require 'routes.php';


// require $router->direct($uri);


require Router::load('routes.php')
        ->direct(Request::uri());


