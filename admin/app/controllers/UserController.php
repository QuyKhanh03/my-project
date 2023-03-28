<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }
     

    public function showFormLogin()
    {
        $this->render("login.index");
    }
    public function loginPost()
    {
        $errors = [];
        if (isset($_POST['btn'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email) || empty(trim($email))) {
                $errors['email'] = "Vui lòng nhập email";
            }
            if (empty($password) || empty(trim($password))) {
                $errors['password'] = "Vui lòng nhập mật khẩu";
            }
            if (count($errors) > 0) {   
                redirect("errors", $errors, "login");
            } else {
                $admin = $this->user->getUsers();
                foreach($admin as $value) {
                    if($value->email == $email && $value->password == md5($password) && $value->role_id == 1) {
                        $_SESSION['admin'] = $value;
                        redirect("success", "Đăng nhập thành công", "");
                    }else {
                        redirect("errors", "Đăng nhập thất bại!! Tài khoản hoặc mật khẩu không đúng.", "login");
                    }
                }
                 
            }
            
        }
    }
    //logout
    public function logout()
    {
        unset($_SESSION['admin']);
        redirect("success", "Đăng xuất thành công", "");
    }

    public function index()
    {
        $customers = $this->user->getUsersAndCountOrders();
        $this->render('customers.index', compact('customers'));
    }
}
