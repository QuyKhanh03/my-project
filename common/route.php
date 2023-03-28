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

//product detail
$router->get("product/{id}",[App\Controllers\ProductController::class, 'productDetail']);

//products 

$router->get("products",[App\Controllers\ProductController::class, 'index']);
$router->post("comment",[App\Controllers\ProductController::class, 'addComment']);
//category
$router->get("category/{id}",[App\Controllers\CategoryController::class, 'categoryDetail']);


//account
$router->get("login",[App\Controllers\UserController::class, 'index']);
$router->get("register",[App\Controllers\UserController::class, 'register']);
$router->post("register",[App\Controllers\UserController::class, 'registerPost']);
$router->post("login-post",[App\Controllers\UserController::class, 'loginPost']);
$router->get("logout",[App\Controllers\UserController::class, 'logout']);
$router->get("account",[App\Controllers\UserController::class, 'profile']);
$router->post("updateInfo",[\App\Controllers\UserController::class,'updateAccount']);
//end

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>