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


$courseCode=htmlentities($_REQUEST['courseCode'],ENT_QUOTES);
$courseName=htmlentities($_REQUEST['courseName'],ENT_QUOTES);
$meetingDays=htmlentities($_REQUEST['meetingDays'],ENT_QUOTES);
$important_points=htmlentities($_REQUEST['important_points'],ENT_QUOTES);
$bookName=htmlentities($_REQUEST['bookName'],ENT_QUOTES);
$bookisbn=htmlentities($_REQUEST['bookisbn'],ENT_QUOTES);
$bookauthor=htmlentities($_REQUEST['bookauthor'],ENT_QUOTES);
$bookImage=htmlentities($_REQUEST['bookImage'],ENT_QUOTES);
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
$symbol1 =htmlentities($_REQUEST['symbol1']),ENT_QUOTES);
$symbol2 =htmlentities($_REQUEST['symbol2']),ENT_QUOTES);
$symbol3 =htmlentities($_REQUEST['symbol3']),ENT_QUOTES);
$symbol4 =htmlentities($_REQUEST['symbol4']),ENT_QUOTES);
$symbol5 =htmlentities($_REQUEST['symbol5']),ENT_QUOTES);
$symbol6 =htmlentities($_REQUEST['symbol6']),ENT_QUOTES);
$symbol7 =htmlentities($_REQUEST['symbol7']),ENT_QUOTES);
$symbol8 =htmlentities($_REQUEST['symbol8']),ENT_QUOTES);
$symbol9 =htmlentities($_REQUEST['symbol9']),ENT_QUOTES);
$symbol10 =htmlentities($_REQUEST['symbol10']),ENT_QUOTES);
$assign1 =htmlentities($_REQUEST['assign1']),ENT_QUOTES);
$assign2 =htmlentities($_REQUEST['assign2']),ENT_QUOTES);
$assign3 =htmlentities($_REQUEST['assign3']),ENT_QUOTES);
$assign4 =htmlentities($_REQUEST['assign4']),ENT_QUOTES);
$assign5=htmlentities($_REQUEST['assign5']),ENT_QUOTES);
$assign6 =htmlentities($_REQUEST['assign6']),ENT_QUOTES);
$assign7 =htmlentities($_REQUEST['assign7']),ENT_QUOTES);
$assign8 =htmlentities($_REQUEST['assign8']),ENT_QUOTES);
$assign9 =htmlentities($_REQUEST['assign9']),ENT_QUOTES);
$assign10 =htmlentities($_REQUEST['assign10']),ENT_QUOTES);



$fp = fopen($_FILES['bookImage']['tmp_name'], "r");	

// If successful, read from the file pointer using the size of the file (in bytes) as the length.	 
if ($fp) {
     $content = fread($fp, $_FILES['bookImage']['size']);
     fclose($fp);
	
     // Add slashes to the content to prevent SQL injection	 
     $bookImage = addslashes($content);
	 
	 $imageProperties = getimageSize($_FILES['bookImage']['tmp_name']);
	 $img_mime= $imageProperties['mime'];
		
	//echo $img_mime; exit;
     // Insert into the table "table" for column "image" with our binary string of data ("content")	 
    //$sql= "Insert into courseinfo (bookpicture, img_mime) Values('$content', '$img_mime')";
	 
	 //$result = $conn->query($sql);
}
//echo $pointvalue2; exit;


//$sql =" Select     
//PKID, title, fullname FROM profinfo where username= '$username' and password='$password'   ";

   //$strQuery= "select * from profinfo
     //         where prof-info(PKID) = '8'
       //       ";
	//$conn->query($strQuery);
	/*
	$result = $conn->query($sql);
	$row=mysqli_num_rows($result);

	if($row > 0){
		@header("Location: mainpage.php");
     exit;
   }else{
   	*/

          $strQuery="insert into courseinfo

                      (
                       FKProfID, coursecode, coursename, meetingday, bookname, bookisbn, bookauthor, bookpicture, 
					   important_points, topicname1, pointvalue1, topicname2, pointvalue2, topicname3, pointvalue3, 
					   topicname4, pointvalue4, topicname5, pointvalue5, topicname6, pointvalue6, topicname7, pointvalue7,img_mime, symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10, assign1, assign2, assign3, assign4, assign5, assign6, assign7, assign8, assign9, assign10
                      )
                     values
                     (
                       $FKPROFID, '$courseCode', '$courseName', '$meetingDays', 
                       '$bookName', '$bookisbn', '$bookauthor', '$bookImage', 
					   '$important_points', '$topicname1', '$pointvalue1', 
					   '$topicname2', '$pointvalue2', '$topicname3', 
					   '$pointvalue3','$topicname4', '$pointvalue4', 
					   '$topicname5','$pointvalue5', '$topicname6',
					   '$pointvalue6', '$topicname7', '$pointvalue7','$img_mime','$symbol1', '$symbol2', '$symbol3', '$symbol4', '$symbol5', '$symbol6', '$symbol7', '$symbol8', '$symbol9', '$symbol10', '$assign1', '$assign2', '$assign3', '$assign4', '$assign5', '$assign6', '$assign7', '$assign8', '$assign9', '$assign10'
                     )";
    //echo $strQuery;exit;

		$conn->query($strQuery);
		
		 header("Location: mainpage.php");

		 exit;
	
	
	
         //@header('Location: index.php?page=register&added=1');
         //exit;
         //include "loginCheck1.php";
?>