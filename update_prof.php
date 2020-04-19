<?php
require("session_info.php");
error_reporting(0);

include ('session-connection.php');

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}

$profID = $_SESSION["FKPROFID"];

$title = $_REQUEST['title'];
$full_name = $_REQUEST['full_name'];
$username = $_REQUEST['user_name'];
$password= $_REQUEST['user_pw'];
$email = $_REQUEST['email'];
$officephone = $_REQUEST['phone_no'];
$officeaddress = $_REQUEST['address'];
$monday = $_REQUEST['monday'];
$tuesday = $_REQUEST['tuesday'];
$wednesday = $_REQUEST['wednesday'];
$thursday =$_REQUEST['thursday'];
$friday = $_REQUEST['friday'];

$sql =" Update profinfo
       set
          	   
        title = '$title',
		fullname = '$full_name',
		username = '$username',
		password = '$password',
		email = '$email',
		officephone = '$officephone',
		officeaddress = '$officeaddress',
		monday = '$monday',
		tuesday = '$tuesday',
		wednesday = '$wednesday',
		thursday = '$thursday',
		friday = '$friday'
		
		where PKID= $profID ";

//echo $sql; exit;

$result = $conn->query($sql);

header("Location: mainpage.php");
exit;

?>