<?php
// error_reporting(0);

include ('session-connection.php');

$conn= new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error){

die("Connection Failed".$conn->connect_error);

}
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


// database queries

$email = $_POST["email"]; 

$sql = "SELECT title, fullname,username, password FROM profinfo WHERE email = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
	 
    $title = $row['title'];
    $fullname = $row['fullname']; 
		$password = $row['password']; 
		$username = $row['username']; 
		 
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
			// echo $username; echo $password; exit;
			$mail->Body = 
			"Dear $title $fullname,<br><br> 
			Here is your username and password!<br><br>
			Username: $username
			<br>
			Password: $password
			<br>
			Info-Syllabi Team,<br>
			USA<br>
			";

			$mail->addAddress("$email");

			if($mail->Send() ) {
				// echo '<script>alert("Please check your email!")</script>'; 
				header("location: login.php");
			} else {
				echo "error: email did not send. Try again!!";
			}
			$mail->smtpClose();
} // end of if ($result->num_rows > 0)
else{
		header("location: forgot_password.php?err =1");
		error_reporting(0);
}

?>