<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Home;

class HomeController extends BaseController
{
    public $home;
    public function __construct()
    {
        $this->home = new Home();
    }
    public function index()
    {
        if (isset($_SESSION["admin"])) {
            $totalWeek = $this->home->getTotalWeekly();
            $totalMonth = $this->home->getTotalMonthly();
            $totalYear = $this->home->getTotalYearly();
            $customerMonth = $this->home->getCustomerMonthly();
            $customerWeek = $this->home->getCustomerWeekly();
            $customerYear = $this->home->getCustomerYearly();
            $topOrder = $this->home->getTop5Order();
            $total_order = $this->home->getTotalOrderToday();
            $total_amount = $this->home->getTotalAmountToday();
            $customers = $this->home->getTotalCustomerToday();
            $this->render("home.index", compact("totalMonth", "totalWeek", "totalYear", "customerMonth", "customerWeek", "customerYear", "topOrder", "total_order", "total_amount", "customers"));
        } else {
            redirect("", "", "login");
        }
    }
    //update status by id_order
    public function updateStatus()
    {
        if (isset($_POST["btn"])) {
            $status = 1;
            $id_order = $_POST["id_order"];
            $date_current = date("Y-m-d H:i:s");
            $this->home->updateStatus($id_order, $status);
            $infoUser = $this->home->getUserByIdOrder($id_order);
            $infoPrd = $this->home->getProductByIdOrder($id_order);
            $total = 0;
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
            $mail->addAddress($infoUser->email, $infoUser->name_user);           // Name is optional
            $mail->addCC('khanhpnph23703@fpt.edu.vn');
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Broccoli xin chào !!!';
            $body = '';
            $body .= '<p>Xin chào,</p>' . $infoUser->name_user;
            $body .= "<p>Đơn hàng của bạn đã được xác nhận vào : </p>" . date("d/m/Y", strtotime($date_current)) . " và sẽ được giao trong thời gian sớm nhất.</p>";
            $body .= '<p>Đây là hóa đơn của bạn, quý khách vui lòng kiểm tra hàng và hóa đơn. Nếu không nhận được hóa đơn hãy liên hệ với chúng tôi.</p>';
            $body .= '<div style="width: 500px;">
                        <h3 style="text-align: center;"><b>Hóa đơn</b></h3>
                        <hr>
                        </div>';
            $body .= '<span>Khách hàng :</span> ' . '<b>' . $infoUser->name_user . '</b>' . '<br>';
            $body .= '<span>Địa chỉ nhận hàng : ' . '<b>' . $infoUser->address . '</b>' . '</span><br>';
            $body .= '<span>Điện thoại : ' . '<b>' . $infoUser->phone . '</b>' . '</span><br>';
            $body .= '<span>Ngày đặt : ' . '<b>' . date("d/m/Y", strtotime($infoUser->date_order)) . '</b>' . '</span><br>';
            $body .= '<span>Ngày giao : ' . '<b>' . date("d/m/Y", strtotime($date_current)) . '</b>' . '</span><br>';
            $body .= '<table style="width: 500px;">
                        <tr>
                            <th style="text-align: left;">Tên sản phẩm</th>
                            <th style="text-align: left;">Số lượng</th>
                            <th style="text-align: left;">Đơn giá</th>
                            <th style="text-align: left;">Thành tiền</th>
                        </tr>';

            foreach ($infoPrd as $infoPrd) {
                $body .= '
                        <tr>
                            <td>' . $infoPrd->name_product . '</td>
                            <td>' . $infoPrd->quantity . '</td>
                            <td>' . number_format($infoPrd->product_price) . ' VNĐ</td>
                            <td>' . number_format($infoPrd->product_price * $infoPrd->quantity) . ' VNĐ</td>
                        </tr>
                        .';
                $total += ($infoPrd->product_price * $infoPrd->quantity);
            }
            $body .= '<tr>
                        <td colspan="3" style="text-align: right;"><b>Tổng tiền :</b></td>
                        <td>' . number_format($total) . ' VNĐ</td>
                    </tr>';

            $body .= '</table>';

            $body .= '<p>Trân trọng.</p>';
            $mail->Body = $body;
            $mail->send();
            redirect("success", "Cập nhật thành công", "");
        }
    }
}
