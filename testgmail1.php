// this is testgmail1.php

<?php

//error_reporting(0);

require('PHPMailer\src\PHPMailer.php');
require('PHPMailer\src\SMTP.php');

//$mail = new PHPMailer(); // create a new object
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "infosyllabi@gmail.com";
$mail->Password = "Universities2019";
$mail->SetFrom("infosyllabi@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello hghggghghhgghghgh";

$mail->AddAddress("infosyllabi@gmail.com"); // prof / reciever's email address

//$mail->AddAddress($profEmail); // prof / reciever's email address


 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
	 
	  
   echo "Message has been sent";
	
//header("location:main.php");
 }

?>