<?php 
const DBNAME = "web_intern";
const DBUSER = "root";
const DBPASS = "";
const DBHOST = "127.0.0.1";
const DBCHARSET = "utf8";
const BASE_URL = "http://localhost/my-project/admin/";
function router($url) {
    return BASE_URL. $url;
}
function redirect($key,$mgs,$route) {
    $_SESSION[$key] = $mgs;
    switch($key) {
        case 'success':
            unset($_SESSION["errors"]);
            break;
        case 'errors':
            unset($_SESSION["success"]);
            break;
    }
    header("location:" .BASE_URL . $route."?msg=" .$key);die();
}
?>