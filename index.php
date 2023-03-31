<?php 
session_start();
require_once "env.php";
require_once "vendor/autoload.php";
require_once "common/route.php";
// 
if (!isset($_SESSION["carts"])) {
    $_SESSION["carts"] = [];
}
?>