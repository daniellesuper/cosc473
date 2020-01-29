<?php
error_reporting(0);
if($_GET['error']==1){
	echo"Invalid   
  	Username or Password";
}


?>

 <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body> 	 
<form method = "post" action="logincheck.php">
 <div class="container"style="margin-top: 100px">
	<div class="row justify-content-center">
		<div class"col-md-6 col-offset-3" align="center">
		 <img src="images\logo.jpg" style="max-width:550; width:550; max-height:250; height:250;"><br><br>
		 <form>
		     <label for="psw"><b>Username</b></label>
			 <input type="text" placeholder="Enter Username" name="uname" required"><br><br>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required><br><br>
			
			<button type="submit" class="btn btn-outline-secondary">Login</button>
			<button type="button" class="btn btn-outline-secondary">Login With Google</button>
			<button type="button" class="btn btn-outline-secondary">Login With Facebook</button><br><br>		
	
		<input type="checkbox" checked="checked" name="remember"> Remember me
	
   	<div style="background-color:#DCDCDC">

		<span>Forgot <a href="forgot_password.php
">password? </a></span>
		</div>
		</form>
		 
		 </div>
		</div>
</div>
</form>
</body>
 