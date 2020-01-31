<?php
error_reporting(0);
require("session_info.php");



$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}
//$row=0;

$email=htmlentities($_REQUEST['email'],ENT_QUOTES);


$strQuery= "select * from profinfo
             where email = '$email'
            ";
			
		
$result=$conn->query($strQuery);	

$row=mysqli_num_rows($result);


if ($row>0) {
	 header("Location: register.php?error=1");
		 exit;

}else{

$title=htmlentities($_REQUEST['title'],ENT_QUOTES);
$full_name=htmlentities($_REQUEST['full_name'],ENT_QUOTES);
$user_name=htmlentities($_REQUEST['user_name'],ENT_QUOTES);
$user_pw=htmlentities($_REQUEST['user_pw'],ENT_QUOTES);
$password2=htmlentities($_REQUEST['password2'],ENT_QUOTES);
$phone_no=htmlentities($_REQUEST['phone_no'],ENT_QUOTES);
$address=htmlentities($_REQUEST['address'],ENT_QUOTES);



	if (!empty($user_pw)){
		if ($user_pw==$password2) {

 $strQuery="insert into profinfo
                      (
                       title, fullname, username, password, officephone, email, officeaddress, insertdate
                      )
                     values
                     (
                      '$title', '$full_name', '$user_name', '$user_pw', '$phone_no', '$email', '$address', now()
                     )
                    ";
					
					 //echo "$strQuery";exit;
		 $conn->query($strQuery);
		 $last_id = $conn->insert_id;
		 
		 $_SESSION["FKPROFID"] = $last_id;

 		//echo $last_id; exit;

		 header("Location:mainpage.php");
}
else {
	echo "Passwords Do Not Match. Please Try Again.";	
}

}
//require_once('testgmail1.php');	
		 
//		 	 header("Location: register.php?error=1"); this page reroutes to main/home page once registered
//		 exit;

} // end if		 

?>