gcykqtleorouyifc
Admin753@gmail.com
12345

//mailler
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer(true);
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

$body .= '<p>Trân trọng.</p>';

$mail->Body = $body;
$mail->send();

