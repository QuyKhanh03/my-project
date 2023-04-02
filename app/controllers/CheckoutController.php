<?php

namespace App\Controllers;

use App\Models\Checkout;
use PHPMailer\PHPMailer\PHPMailer;

class CheckoutController extends BaseController
{
    public $checkout;
    public function __construct()
    {
        $this->checkout = new Checkout();
    }
    public function index()
    {
        $title = "Thanh toán";
        $title_banner = "Trang thanh toán";

        $this->render('checkout.index', compact('title', 'title_banner'));
    }
    public function checkoutPost()
    {
        if (isset($_SESSION["auth"])) {
            if (isset($_SESSION["carts"]) && !empty($_SESSION["carts"])) {
                if (isset($_POST["btn"])) {
                    $user_id = $_SESSION["auth"]->id_user;
                    $name_user = $_POST["name_user"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $note = $_POST["note"];
                    $total_amount = $_POST["total_amount"];
                    $date_current = date("Y-m-d H:i:s");
                    $this->checkout->updateUser($name_user, $email, $phone, $address, $user_id);
                    $this->checkout->insertOrder($user_id, $date_current, $total_amount, $note, 0);
                    $order_id = $this->checkout->getIdOrderByUserId($user_id);
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
                    $mail->Subject = 'Broccoli xin chào !!!';
                    $body = '';
                    $body .= '<p>Xin chào,</p>' . $name_user;
                    $body .= "<p>Bạn đã đặt hàng của chúng tôi vào </p>" .date("d/m/Y", strtotime($date_current));
                    $body .= '<p>Cảm ơn bạn đã đặt hàng tại Broccoli. Đơn hàng của bạn đang trong thời gian chờ xác nhận. Chúng tôi sẽ liên hệ với bạn sớm nhất.</p>';
                    $body .= '<p>Trân trọng.</p>';

                    $mail->Body = $body;
                    $mail->send();
                    echo print_r($_SESSION["carts"]);
                    foreach ($_SESSION["carts"] as $key => $value) {
                        $product_id = $value["id"];
                        $quantity = $value["quantity"];
                        $price = $value["price"];
                        $this->checkout->insertOrderDetail($order_id->id_order, $product_id, $price, $quantity);
                    }

                    unset($_SESSION["carts"]);
                    redirect("success", "Đặt hàng thành công, đơn hàng của bạn cần chờ xác nhận. Chúng tôi sẽ liên hệ với bạn sớm nhất !!!", "checkout");
                }
            } else {
                redirect("errors", "Giỏ hàng của bạn đang trống !!!", "cart");
            }
        } else {
            if (isset($_SESSION["carts"]) && !empty($_SESSION["carts"])) {
                if (isset($_POST["btn"])) {
                    $name_user = $_POST["name_user"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $note = $_POST["note"];
                    $total_amount = $_POST["total_amount"];
                    $date_current = date("Y-m-d H:i:s");
                    $password = md5($phone);
                    $this->checkout->insertUser($name_user, $email, $phone, $address, $password, 2);
                    $user_id = $this->checkout->getLastIdUser();
                    $this->checkout->insertOrder($user_id->id_user, $date_current, $total_amount, $note, 0);
                    $order_id = $this->checkout->getIdOrderByUserId($user_id->id_user);
                    foreach ($_SESSION["carts"] as $key => $value) {
                        $product_id = $value["id"];
                        $quantity = $value["quantity"];
                        $price = $value["price"];
                        $this->checkout->insertOrderDetail($order_id->id_order, $product_id, $price, $quantity);
                    }
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
                    $mail->Subject = 'Broccoli xin chào !!!';
                    $body = '';
                    $body .= "<p>Xin chào,.'.$name_user'</p>";
                    $body .= "<p>Bạn đã đặt hàng của chúng tôi vào </p>" .date("d/m/Y", strtotime($date_current));
                    $body .= "<p>Đây là tài khoản của bạn : </p>";
                    $body .= "<p>Tên đăng nhập : '.$email.'</p>";
                    $body .= "<p>Mật khẩu : '.$phone.'</p>";
                    $body .= "<p>Đơn hàng của bạn đang chờ xác nhận. Chúng tôi sẽ liên hệ với bạn sớm nhất !!!</p>";
                    $body .= "<p>Chúng tôi sẽ gửi thông tin đơn hàng cho bạn qua email này.</p>";
                    $body .= '<p>Trân trọng.</p>';

                    $mail->Body = $body;
                    $mail->send();
                    unset($_SESSION["carts"]);
                    redirect("success", "Đặt hàng thành công, đơn hàng của bạn cần chờ xác nhận. Chúng tôi sẽ liên hệ với bạn sớm nhất !!!", "checkout");
                }
            }
        }
    }
}
