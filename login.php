<?php
error_reporting(0);
if($_GET['error']==1){
	echo"Invalid   
  	Username or Password";
}


?>

 <head>

<!-- google login button located at bottom of page -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
   
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="295013552349-eeioi3amb17henvt7ru8cjd7i5ve52of.apps.googleusercontent.com">
	<meta name="google-signin-scope" content="profile email"> 

    <!-- end of google login button located at bottom of page -->

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
			<!-- <button type="button" class="btn btn-outline-secondary">Login With Google</button>		-->
			<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    			
    			<script>
      				function onSignIn(googleUser) { 
        			// Useful data for your client-side scripts:
        			var profile = googleUser.getBasicProfile();
        			console.log("ID: " + profile.getId()); // Don't send this directly to your server!
       				console.log('Full Name: ' + profile.getName());
       			 	console.log('Given Name: ' + profile.getGivenName());
        			console.log('Family Name: ' + profile.getFamilyName());
        			console.log("Image URL: " + profile.getImageUrl());
        			console.log("Email: " + profile.getEmail());

        //The ID token you need to pass to your backend:
       var id_token = googleUser.getAuthResponse().id_token;
       console.log("ID Token: " + id_token);

      }

    </script>


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
  	<p>PSH Web Design, Don't Copy this &copy; 2020</p>
  </footer>
  
</body>
 