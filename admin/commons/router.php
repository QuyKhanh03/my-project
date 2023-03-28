<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector(); 

// filter check đăng nhập
$router->filter('admin', function(){
    if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])){
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


//product start
$router->get("products",[App\Controllers\ProductController::class, 'index']);
$router->get("add-product",[App\Controllers\ProductController::class, 'showFormAdd']);
$router->post("add-product-post",[App\Controllers\ProductController::class,"formAddPost"]);
$router->get("delete-product/{id}",[App\Controllers\ProductController::class, 'removeProduct']);
$router->get("edit-product/{id}",[App\Controllers\ProductController::class, 'showFormEdit']);
$router->post("edit-product-post/{id}",[App\Controllers\ProductController::class, 'formEditPost']);
//end
//category start
$router->get("categories",[App\Controllers\CategoryController::class, 'index']);
$router->get("add-category",[App\Controllers\CategoryController::class, 'showFormAdd']);
$router->post("add-category-post",[App\Controllers\CategoryController::class, 'formAddPost']);
$router->get("edit-category/{id}",[App\Controllers\CategoryController::class, 'showFormEdit']);
$router->post("edit-category-post/{id}",[App\Controllers\CategoryController::class, 'formEditPost']);
$router->get("delete-category/{id}",[App\Controllers\CategoryController::class, 'removeCategory']);
//end
//user start

$router->get("login",[App\Controllers\UserController::class, 'showFormLogin']);
$router->post("login-post",[App\Controllers\UserController::class,'loginPost']);
$router->get("logout",[App\Controllers\UserController::class, 'logout']);
//end
//customer start
$router->get("customer",[App\Controllers\UserController::class, 'index']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>