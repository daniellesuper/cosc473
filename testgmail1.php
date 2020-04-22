<?php
// local 
require '/Applications/XAMPP/xamppfiles/htdocs/473/PHPMailer.php';
require '/Applications/XAMPP/xamppfiles/htdocs/473/PHPMailer/src/SMTP.php';
require '/Applications/XAMPP/xamppfiles/htdocs/473/PHPMailer/src/Exception.php';
// live
// require '/home/infosyll/public_html/PHPMailer/src/PHPMailer.php';
// require '/home/infosyll/public_html/PHPMailer/src/SMTP.php';
// require '/home/infosyll/public_html/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "infosyllabusteam@gmail.com";
$mail->Password = "Infosyllabusteam473";
$mail->Subject = "Info-Syllabus Credentials";
$mail->setFrom("infosyllabusteam@gmail.com");
$mail->isHTML(true);
$mail->Body = "Dear $title $full_name,<br><br> Thank you for registering with us, here is your username and password!<br><br>
Username: $user_name
<br>
Password: $user_pw
<br>
Info-Syllabi Team,<br>
USA<br>
";

$mail->addAddress("$email");

if($mail->Send() ) {
	echo " email sent";
} else {
	echo " error";
}

$mail->smtpClose();
?>