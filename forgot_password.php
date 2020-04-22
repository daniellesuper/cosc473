<html>
	<body>
	  <div class"col-md-6 col-offset-3" align="center">
		<form method="post" action="send_pass.php">
		 <img src="images/logo.jpg" style="max-width:550; width:550; max-height:250; height:250;"><br><br>
		 <h1>Forgot Your Password?</h1><br>
		 <?php 
		 error_reporting(0);
		 echo"If you have forgotten your password, don't worry. Please enter your account's email address below. You will receive an email with your password.";
		  if ($_GET['err']==1)
			{
				echo "Email was invalid. Try Again.";
				error_reporting(0);
			}
		 ?><br><br>
		<label for="email"><b>Email</b></label>
			<input type="email" placeholder="Enter Email" name="email" required><br><br>
			<input type="submit" value="Send Password" class="btn btn-outline-secondary" /> 
		</form>
	 </div>
	</body>
	</html>