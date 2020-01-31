<?php
error_reporting(0);
if($_GET['error']==1){
	echo"Invalid   
  	Username or Password";
}


?>

<head>
<html>
<header>
	<link rel="stylesheet" type="text/css" href="landingpage.css">
  	<div class="container"> 
  	  <div id="branding">
  	  	<a href="landingpage.html"><span class="highlight"><img src="./images/logofinal.png"></span></a>
  	  </div><!--end branding-->
  	  <nav>
        <div id="links">
  	  	<ul>
  	  	  <li class="current"><a href="index.html">Home</a></li>
          <li class="current"><a href="contact.php">Contact</a></li>
          <li class="current"><a href="register.php">Register</a></li>
          <li class="current"><a href="index.php">Login</a></li>  
  	  	</ul>
        </div><!--end links-->
  	  </nav>
  	</div><!--end container-->
  </header>
<body>

</body>
</html>


</head>
    
  </header>
 
<body> 	 
<form method = "post" action="logincheck.php">
 <div class="container"style="margin-top: 100px">
	<div class="row justify-content-center">
		<div class"col-md-6 col-offset-3" align="center">
		 <br><br>
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
<footer>
  	<p>PSH Web Design, Don't Copy Shit &copy; 2020</p>
  </footer>
</body>
 