<?php

namespace App\Controllers;

use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
require_once "./vendor/autoload.php";
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
                    try {
                        //Server settings
                        $mail->CharSet = "UTF-8";
                        $mail->Encoding = 'base64';
                        $mail->SMTPDebug = 0;                                 // bật tính năng gửi success or faild thì vẫn show thông tin mail để ta cấu hình
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'phamngockhanh29703@gmail.com';                 // SMTP username
                        $mail->Password = 'gcykqtleorouyifc';                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to

                        //Recipients
                        $mail->setFrom('phamngockhanh29703@gmail.com', ' Broccoli');
                        $mail->addAddress($email, $name_user);           // Name is optional
                        $mail->addCC('phamngockhanh29703@gmail.com');

                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Chào mừng bạn đến với Broccoli !!!';

                        $body = '';
                        $body .= '<p>Xin chào,</p>'.$name_user;
                        $body .= '<p>Bạn đã đăng ký tài khoản tại Broccoli vào </p>'.date('d-m-Y H:i', strtotime($date));
                        
                        // $body .= '<p>Nếu bạn đã yêu cầu đặt lại mật khẩu, hãy ấn vào <a href="change_passowrd.php"><h3 style="color: green;">tại đây</h3></a> để tạo mật khẩu mới để vào tài khoản XOSS Shop của bạn.</p>';
                        // $body .= '<p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>';
                        // $body .= 'Nếu bạn gặp phải bất cứ vấn đề nào khi đăng nhập vào tài khoản XOSS Shop, vui lòng gửi mail đến địa chỉ: phamngockhanh29703@gmail.com</pre>';
                        $body .= '<p>Trân trọng.</p>';

                        // $mail->Body    = 'Mat khau moi cua ban la: ' . $forget_password;
                        $mail->Body = $body;

                        $mail->send();
                        // echo 'Message has been sent';
                    } catch (Exception $e) {
                        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    }

                    $result = $this->user->insertUser($name_user, $email, md5($password), $role_id);
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
            $AllUsers = $this->user->getUsers();
            foreach ($AllUsers as $value) {
                echo $value->email . " " . $value->password . " " . $value->role_id;
                if ($value->email == $email && $value->password == (md5($password))) {
                    $_SESSION["auth"] = $value;
                    redirect("success", "Đăng nhập thành công", "/");
                } else {
                    redirect("errors", "Đăng nhập thất bại!!! ", "login");
                }
            }
        }
    }
    public function logout()
    {
        unset($_SESSION["auth"]);
        redirect("success", "Đăng xuất thành công", "/");
    }
}
