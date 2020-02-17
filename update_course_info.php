<?php
//new file
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
$courseID = htmlentities($_REQUEST['courseID'], ENT_QUOTES);
$courseCode=htmlentities($_REQUEST['courseCode'],ENT_QUOTES);
$courseName=htmlentities($_REQUEST['courseName'],ENT_QUOTES);
$meetingDays=htmlentities($_REQUEST['meetingDays'],ENT_QUOTES);
$importantPoints=htmlentities($_REQUEST['importantpoints'],ENT_QUOTES);
$bookName=htmlentities($_REQUEST['bookName'],ENT_QUOTES);
$isbn=htmlentities($_REQUEST['isbn'],ENT_QUOTES);
$author=htmlentities($_REQUEST['author'],ENT_QUOTES);
//$bookImage=htmlentities($_REQUEST['bookImage'],ENT_QUOTES);
$topicname1=htmlentities($_REQUEST['gradeName1'],ENT_QUOTES);
$pointvalue1=htmlentities($_REQUEST['weight1'],ENT_QUOTES);
$topicname2=htmlentities($_REQUEST['gradeName2'],ENT_QUOTES);
$pointvalue2=htmlentities($_REQUEST['weight2'],ENT_QUOTES);
$topicname3=htmlentities($_REQUEST['gradeName3'],ENT_QUOTES);
$pointvalue3=htmlentities($_REQUEST['weight3'],ENT_QUOTES);
$topicname4=htmlentities($_REQUEST['gradeName4'],ENT_QUOTES);
$pointvalue4=htmlentities($_REQUEST['weight4'],ENT_QUOTES);
$topicname5=htmlentities($_REQUEST['gradeName5'],ENT_QUOTES);
$pointvalue5=htmlentities($_REQUEST['weight5'],ENT_QUOTES);
$topicname6=htmlentities($_REQUEST['gradeName6'],ENT_QUOTES);
$pointvalue6=htmlentities($_REQUEST['weight6'],ENT_QUOTES);
$topicname7=htmlentities($_REQUEST['gradeName7'],ENT_QUOTES);
$pointvalue7=htmlentities($_REQUEST['weight7'],ENT_QUOTES);

$fp = fopen($_FILES['bookImage']['tmp_name'], "r");	

// If successful, read from the file pointer using the size of the file (in bytes) as the length.	 
if ($fp) {
     $content = fread($fp, $_FILES['bookImage']['size']);
     fclose($fp);
	
     // Add slashes to the content to prevent SQL injection	 
     $bookImage = addslashes($content);
	 
	 $imageProperties = getimageSize($_FILES['bookImage']['tmp_name']);
	 $img_mime= $imageProperties['mime'];	
}
	
	$result = $conn->query($sql);
	$row=mysqli_num_rows($result);

	if($row > 0){
		@header("Location: mainpage.php");
     exit; 
   }else{
		 $FKPROFID = $_SESSION['PKID'];
         $strQuery="update courseinfo 
		            set coursecode = '$courseCode', coursename = '$courseName'
					where PKID = $courseID
                    ";
	
		$conn->query($strQuery);
		 header("Location: mainpage.php");
		 exit;
	}
?>