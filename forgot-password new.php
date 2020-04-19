<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<?php

require('PHPMailer\src\PHPMailer.php');
require('PHPMailer\src\SMTP.php');


$servername="localhost";
$dbname="infosyll_info-syllabus";
$username="infosyll_infosyllteam";
$password="#67ivGL#,}yG";

$conn = new mysqli($servername, $username, $password, $dbname);
			if($_POST)
			{
					$email = $_POST['email'];
					$selectquery = mysqli_query($conn,"select * from profinfo where email='{$email}'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($selectquery);
					$row = mysqli_fetch_array($selectquery);
	 
					//echo $count;

					//header("Location: email_sent.php"); /* Redirect browser */
					//exit();		
		
			
			if($count>0)
			{	
	  //echo $row['password'];
	  
					+//error_reporting(0);


					$mail = new PHPMailer(); // create a new object
		
					//Sever Settings
					$mail->IsSMTP(); // enable SMTP
					$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
					$mail->SMTPAuth = true; // authentication enabled
					$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
					$mail->Host = "smtp.gmail.com";
					$mail->Port = 465; // or 587
					$mail->Username = "infosyllabi@gmail.com";
					$mail->Password = "Universities2019";

					//Recipients
					$mail->SetFrom("infosyllabi@gmail.com");
					$mail->addAddress($email, $email); //Add a recipent


					//Content
					$mail->IsHTML(true);
					$mail->Subject = "Forgot Password";
					$mail->Body = "Hi $email your Password is {$row['password']}";
					//$mail->AltBody = "Hi $email your Password is {$row['password']}";




					$mail->send();
					echo 'Your Password has been sent on your Email ID.';
	
	
			} else 
			{
				header("Location: forgot-password.php"); /* Redirect browser */
					echo"<script>alert('Email Not Found');</script>";
					exit();
			}
			

			}/*

$sql =" Select     
PKID, title, fullname FROM profinfo where username= '$username' and password='$password'   ";	
$result = $conn->query($sql);
$row=mysqli_num_rows($result);
     if($row>0)
	 {

				$row=$result->fetch_array();
				$PKID =$row[PKID];
				$_SESSION["FKPROFID"] = $PKID;


				header("Location: forgot-password.php"); 
				exit();
	 }
      else { 
		 
		      header("Location: email_sent.php");

              exit;

      }
	}
	
	  
	  */
	  
	?>

<html>
	<body>
	
	
		<form method="post">
		<div class"col-md-6 col-offset-3" align="center">
		 <img src="info-syl.jpg" style="max-width:550; width:550; max-height:250; height:250;"><br><br>
		 
		 <h1>Forgot Your Password</h1><br>
		 <?php echo"If you have forgotten your password, don't worry. Please enter your account's email address below and click 'Send Email' button. You will recieve an email with your password."?><br><br>
		 
		<label for="email"><b>Email</b></label>
			 <input type="email" placeholder="Enter Email" name="email" required"><br><br>
					<button type="submit" class="btn btn-outline-secondary"> Send Email</button>


		</form>
	</body>
	</html>