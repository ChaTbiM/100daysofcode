<?php 

// require 'Task.php';

require 'core/bootstrap.php';


$router = new Router;

// require 'routes.php';


// require $router->direct($uri);


require Router::load('routes.php')
        ->direct(Request::uri());


