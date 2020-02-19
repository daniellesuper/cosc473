<?php
require("session_info.php");
error_reporting(0);
$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";
$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}

$FKPROFID = $_SESSION['FKPROFID'];

$courseID = htmlentities($_REQUEST['courseID'],ENT_QUOTES);
$holiday_name=htmlentities($_REQUEST['holiday_name'],ENT_QUOTES);
$startdate=htmlentities($_REQUEST['startdate'],ENT_QUOTES);
$enddate=htmlentities($_REQUEST['enddate'],ENT_QUOTES);



$weekofheading1 = htmlentities($_REQUEST['weekofheading1'],ENT_QUOTES);
$week1_info = htmlentities($_REQUEST['week1_info'],ENT_QUOTES);
//$week1assessment = htmlentities($_REQUEST['week1assessment'],ENT_QUOTES);



 
	
         $strQuery="insert into weeklyinfo
                      (
                       fkcourseid,fkprofid,holiday, startdate, enddate, weekofheading1, subheading1
                      )
                     values
                     (
                      $courseID, $FKPROFID , '$holiday_name', '$startdate', '$enddate', '$weekofheading1', '$week1_info'
					 )
                    ";
		 
 echo $strQuery; exit;
		 $conn->query($strQuery);
		
		 header("Location: mainpage.php");
		 exit;

	

?>