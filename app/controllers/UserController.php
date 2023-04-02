<?php

namespace App\Controllers;

use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;

class UserController extends BaseController
{
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $title = "Đăng nhập";
        $title_banner = "Trang đăng nhập";
        $this->render("forms.login", compact('title', 'title_banner'));
    }



    //form đăng ký 
    public function register()
    {
        $title = "Đăng ký";
        $title_banner = "Trang đăng ký";
        $this->render("forms.register", compact('title', 'title_banner'));
    }
    public function registerPost()
    {
        $errors = [];
            if (isset($_POST["btn"])) {
                $name_user = $_POST["name_user"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmpassword = $_POST["confirmpassword"];
                $role_id = $_POST["role_id"];
                $date = date('Y-m-d H:i:s');
                $allUsers = $this->user->getUsers();
                if (empty($name_user) && empty(trim($name_user))) {
                    $errors["name_user"] = "Tên không được để trống";
                }
                if (empty($email) && empty(trim($email))) {
                    $errors["email"] = "Email không được để trống";
                }
                //kiểm tra email hợp lệ 
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors["email_check"] = "Email không hợp lệ";
                }
                if (empty($password) && empty(trim($password))) {
                    $errors["password"] = "Mật khẩu không được để trống";
                }
                if (empty($confirmpassword) && empty(trim($confirmpassword))) {
                    $errors["confirmpassword"] = "Mật khẩu không được để trống";
                }
                if ($password != $confirmpassword) {
                    $errors["confirm"] = "Mật khẩu không trùng khớp";
                }
                foreach ($allUsers as $user) {
                    if ($user->email == $email) {
                        $errors["email_check_2"] = "Email đã tồn tại";
                    }
                    if ($user->name_user == $name_user) {
                        $errors["name_user_2"] = "Tên đã tồn tại";
                    }
                }
                if (count($errors) > 0) {

                    redirect("errors", $errors, "register");
                } else {
                    $mail = new PHPMailer(true);
                    $mail->CharSet = "UTF-8";
                        $mail->Encoding = 'base64';
                        $mail->SMTPDebug = 0;                                 // bật tính năng gửi success or faild thì vẫn show thông tin mail để ta cấu hình
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'khanhpnph23703@fpt.edu.vn';                 // SMTP username
                        $mail->Password = 'yomoxmhnhwzoskbb';                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to
                        //Recipients
                        $mail->setFrom('khanhpnph23703@fpt.edu.vn', ' Broccoli');
                        $mail->addAddress($email, $name_user);           // Name is optional
                        $mail->addCC('khanhpnph23703@fpt.edu.vn');
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Chào mừng bạn đến với Broccoli !!!';
                        $body = '';
                        $body .= '<p>Xin chào,</p>'.$name_user;
                        $body .= '<p>Bạn đã đăng ký tài khoản tại Broccoli vào </p>'.date('d-m-Y H:i', strtotime($date));
                        
                        $body .= '<p>Trân trọng.</p>';
                       
                        $mail->Body = $body;
                        $mail->send();
                    $result = $this->user->insertUser($name_user, $email, (md5($password)), $role_id);
                    if ($result) {
                        redirect("success", "Đăng ký thành công", "login");
                    }
                }
            }
        
    }
    public function loginPost()
    {
        if (isset($_POST["btn"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            // echo $email . " " . $password;
            if (empty($email) && empty(trim($email))) {
                $errors["email"] = "Email không được để trống";
            }
            if (empty($password) && empty(trim($password))) {
                $errors["password"] = "Mật khẩu không được để trống";
            }
            $Users = $this->user->getUserByEmailPassword($email, md5($password));
            if($Users->email == $email && $Users->password == md5($password)){
                $_SESSION["auth"] = $Users;
                redirect("success", "Đăng nhập thành công", "");
            } else {
                redirect("errors", "Đăng nhập thất bại!!! ", "login");
            }
        }
    }
    public function logout()
    {
        unset($_SESSION["auth"]);
        redirect("success", "Đăng xuất thành công", "");
    }
    public function profile()
    {
        if(isset($_SESSION["auth"])) {
            $id = $_SESSION["auth"]->id_user;
            $auth = $this->user->getUserById($id);
            $orders = $this->user->getOrderById($id);
        }else {
            redirect("errors","Bạn chưa đăng nhập","login");
        }
        $title = "Thông tin cá nhân";
        $title_banner = "Thông tin cá nhân";
        
        $this->render("customer.info", compact('title', 'title_banner','auth','orders'));
    }
    //update account
    public function updateAccount() {
        if(isset($_SESSION["auth"])) {
            if(isset($_POST["btn"])) {
                $id = $_SESSION["auth"]->id_user;
                $name_user = $_POST["name_user"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $address = $_POST["address"];
                $password = "";
                if(!empty($_POST["password_new"])) {
                    $password = $_POST["password_new"];
                    
                    $rePass = $_POST["rePass"];
                    if($rePass != $password) {
                        redirect("errors","Mật khẩu không trùng khớp","account");
                        die();
                    }

                }else {

                    $password = $_SESSION["auth"]->password;
                }
                
                $image = "";
                if($_FILES["avatar"]["size"] > 0) {
                    $image_new = $_FILES["avatar"];
                 $image = ($_FILES['avatar']['error'] == 0) ? $_FILES['avatar']['name'] : "";
                }else {
                    $image = $_POST["avatar_old"];
                }
                if(isset($image)) {
                    $result = $this->user->updateUser($name_user,$email,md5($password),$address,$phone,$image,$id);
                    if($result) {
                        move_uploaded_file($_FILES["avatar"]["tmp_name"],"public/img/testimonial/".$image);
                    }
                    redirect("success","Cập nhật thàng công","account");
                }
            }

        }else {
            redirect("errors", "Bạn chưa đăng nhập", "login");
        }
    }
    //update status order
    public function updateStatusOrder() {
        if(isset($_SESSION["auth"])) {
            if(isset($_POST["btn"])) {
                $id = $_POST["id_order"];
                $status = $_POST["status"];
                $result = $this->user->updateStatus($id,$status);
                if($result) {
                    redirect("success","Cập nhật thành công","account");
                }
            }
        }else {
            redirect("errors", "Bạn chưa đăng nhập", "login");
        }
    }
    public function orderDetail($id) {
        if(isset($_SESSION["auth"])) {
            // $order = $this->user->getOrderById($id);
            $order_detail = $this->user->getOrderDetailById($id);
        }else {
            redirect("errors","Bạn chưa đăng nhập","login");
        }
        $title = "Thông tin đơn hàng";
        $title_banner = "Thông tin đơn hàng";
        $this->render("customer.order_detail", compact('title', 'title_banner','order_detail'));
    }
}
