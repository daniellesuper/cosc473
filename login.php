<?php
error_reporting(0);
if($_GET['error']==1){
	echo"Invalid   
  	Username or Password";
}
?>
<head>
	<link rel="stylesheet" type="text/css" href="landingpage.css">
</head>
<header>
  	<div class="container"> 
  	  <div id="branding">
  	  	<a href="index.html"><span class="highlight"><img src="./images/logofinal.png"></span></a>
  	  </div><!--end branding-->
  	  <nav>
        <div id="links">
  	  	   <ul>
            <li class="current"><a href="index.html">Home</a></li>
            <li class="current"><a href="register.php">Register</a></li>
            <li class="current"><a href="login.php">Login</a></li>  
          </ul>
        </div><!--end links-->
  	  </nav>
  	</div><!--end container-->
</header>
<body> 	 
<form method = "post" action="logincheck.php">
	<div class="container"style="margin-top: 100px">
		<div class="row justify-content-center">
			<div class="col-md-6 col-offset-3" align="center">
				<br><br>
				<h1>User Login</h1>
				<form>
					<label for="psw"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="uname" required><br><br>

					<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required><br><br>
						
					<button type="submit" class="btn btn-outline-secondary">Login</button><br><br>
					<input type="checkbox" checked="checked" name="remember"> Remember me
					<div style="background-color:#DCDCDC">
						<span>Forgot <a href="forgot_password.php">password? </a></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</form>
<footer>
	<p>PSH Web Design, &copy; 2020</p>
</footer>
</body>