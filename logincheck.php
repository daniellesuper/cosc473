<?php

require("session_info.php");

error_reporting(0);

$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Username and Password Invaid!". $conn->connect_error);
}

$username = $_POST['uname'];
$password = $_POST['psw'];

$login_time = date("H:i:s");

$sql =" Select     
PKID, title, fullname FROM profinfo where username= '$username' and password='$password'   ";
//echo $sql; exit;
$result = $conn->query($sql);
  $row=mysqli_num_rows($result);
  //echo $row; exit;

if($row>0){

$row=$result->fetch_array();
$PKID =$row[PKID];
$_SESSION["FKPROFID"] = $PKID;
 mysqli_query($conn,"INSERT INTO profinfo(`id`,`username`,`logintime`,`logouttime`) VALUES (NULL,`$_SESSION[the_username]`,'$login_time','','')");


header("Location: mainpage.php"); /* Redirect browser */
exit();
//$row=$result->fetch_array();
//$PKID =$row[PKID];
//$title=$row['title'];
//$fullname=$row['fullname'];

		//echo"ID= $PKID, Title=$title, FullName=$fullname";
//}// end of while loop

} //end of if 
		 else { 
		 
		 header("Location: index.php?error=1"); /* Redirect browser */
exit();
		//echo" No result found";
		}
		
?>
		
		