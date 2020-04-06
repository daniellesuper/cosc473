<?php
//error_reporting(0);

require('PHPMailer\src\PHPMailer.php');
require('PHPMailer\src\SMTP.php');

$mail = new PHPMailer(); // create a new object
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587 or 465
$mail->IsHTML(true);
$mail->Username = "infosyllabusteam@gmail.com";
$mail->Password = "Infosyllabus473";
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


$mail->AddAddress("infosyllabusteam@gmail.com"); // prof / reciever's email address

$mail->Send();
//$mail->AddAddress($profEmail); // prof / reciever's email address



 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    
 } 

@header('Location: mainpage.php?');
 

?>