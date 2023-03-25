<?php 
namespace App\Controllers;
class UserController extends BaseController {
    public function index() {
        $title = "Đăng nhập";
        $title_banner = "Trang đăng nhập";
        $this->render("forms.login",compact('title','title_banner'));
    }
    public function register() {
        $title = "Đăng ký";
        $title_banner = "Trang đăng ký";
        $this->render("forms.register",compact('title','title_banner'));
    }
}