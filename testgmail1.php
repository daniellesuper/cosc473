<?php

//error_reporting(0);
require '/Applications/XAMPP/xamppfiles/htdocs/473/info-syllabus/cosc473/cosc473/PHPMailer/src/PHPMailer.php';
require '/Applications/XAMPP/xamppfiles/htdocs/473/info-syllabus/cosc473/cosc473/PHPMailer/src/SMTP.php';
require '/Applications/XAMPP/xamppfiles/htdocs/473/info-syllabus/cosc473/cosc473/PHPMailer/src/Exception.php';

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

$mail->Subject = "Test";

$mail->setFrom("infosyllabusteam@gmail.com");

$mail->isHTML(true);


$mail->Body = "Dear Professor $full_name,<br><br> thank you for registering with us, here is your username and password!<br><br>

Username = $user_name
<br>
Password = $user_pw
<br>
Info-syllabi team,<br>

USA<br>


";

$mail->addAddress("infosyllabusteam@gmail.com");




if($mail->Send() ) {
	echo " email sent";
} else {
	echo " error";
}

$mail->smtpClose();




/*
$mail = new PHPMailer(); // create a new object
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587 or 465(windows)
$mail->IsHTML(true);
$mail->Username = "infosyllabusteam@gmail.com";
$mail->Password = "Infosyllabusteam473";
$mail->SetFrom("infosyllabusteam@gmail.com");
$mail->Subject = "Test";
$mail->Body = "Dear Professor $full_name,<br><br> thank you for registering with us, here is your username and password!<br><br>

Username = $user_name
<br>
Password = $user_pw
<br>
Info-syllabi team,<br>

USA<br>


";


$mail->addAddress("infosyllabusteam@gmail.com"); // prof / reciever's email address

//$mail->Send();
//$mail->AddAddress($profEmail); // prof / reciever's email address



 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    
 } 

 else {

 	echo "message has been sent";
 }

//@header('Location: mainpage.php?');
 */

?>