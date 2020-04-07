<?php

//error_reporting(0);


$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
			if($_POST)
			{
					$email = $_POST['email'];
					$selectquery = mysqli_query($conn,"select * from profinfo where email='{$email}'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($selectquery);
					$row = mysqli_fetch_array($selectquery);
					
					if($count>0)
					{	
//----------------------------------------





require('PHPMailer\src\PHPMailer.php');
require('PHPMailer\src\SMTP.php');

//$mail = new PHPMailer(); // create a new object
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "infosyllabusteam@gmail.com";
$mail->Password = "Infosyllabus473";
$mail->SetFrom("infosyllabusteam@gmail.com");

$mail->Subject = "Forgot Password";
$mail->Body = "Hi $email your Password is {$row['password']}";
//$mail->Subject = "Test";
//$mail->Body = "hello hghggghghhgghghgh";

$mail->AddAddress("infosyllabusteam@gmail.com"); // prof / reciever's email address

//$mail->AddAddress($profEmail); // prof / reciever's email address


 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
	 
	  
   echo "Message has been sent";
	
header("location:email_sent.php");
 }
					}
			}

?>




<html>
	<body>
	
	
		<form method="post">
		<div class"col-md-6 col-offset-3" align="center">
		 <img src="images/logo.jpg" style="max-width:550; width:550; max-height:250; height:250;"><br><br>
		 
		 <h1>Forgot Your Password</h1><br>
		 <?php echo"If you have forgotten your password, don't worry. Please enter your account's email address below and click 'Send Email' button. You will recieve an email with your password."?><br><br>
		 
		<label for="email"><b>Email</b></label>
			 <input type="email" placeholder="Enter Email" name="email" required"><br><br>
					<button type="submit" class="btn btn-outline-secondary"> Send Email<a href="//localhost/info-syllabus/email_sent.php"></button>


		</form>
	</body>
	</html>