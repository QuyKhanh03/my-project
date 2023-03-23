<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector(); 

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

//khu vu can` quan tam start
// bắt đầu định nghĩa ra các đường dẫn
// $router->get('/', function(){
//     return "trang chủ";
// });

//home page
$router->get("/",[App\Controllers\HomeController::class, 'index']);
$router->get("products",[App\Controllers\ProductController::class, 'index']);
$router->get("login",[App\Controllers\HomeController::class, 'login']);
$router->get("add-product",[App\Controllers\ProductController::class, 'showFormAdd']);
$router->post("add-product-post",[App\Controllers\ProductController::class,"formAddPost"]);

$router->get("edit/{id}",[App\Controllers\ProductController::class, 'showFormEdit']);
$router->post("edit-product-post/{id}",[App\Controllers\ProductController::class, 'formEditPost']);
//end

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>