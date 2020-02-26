<?php

require("session_info.php");
error_reporting(0);

$courseID = $_GET['courseID'];

$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Username and Password Invalid!". $conn->connect_error);
}

$holiday = $_REQUEST['holiday_name'];
$startdate = $_REQUEST['startdate'];
$enddate = $_REQUEST['enddate'];
$weekofheading1 = $_REQUEST['weekofheading1'];
$weekofheading2 = $_REQUEST['weekofheading2'];
$weekofheading3 = $_REQUEST['weekofheading3'];
$weekofheading4 = $_REQUEST['weekofheading4'];
$weekofheading5 = $_REQUEST['weekofheading5'];
$weekofheading6 = $_REQUEST['weekofheading6'];
$weekofheading7 = $_REQUEST['weekofheading7'];
$weekofheading8 = $_REQUEST['weekofheading8'];
$weekofheading9 = $_REQUEST['weekofheading9'];
$weekofheading10 = $_REQUEST['weekofheading10'];
$weekofheading11 = $_REQUEST['weekofheading11'];
$weekofheading12 = $_REQUEST['weekofheading12'];
$weekofheading13 = $_REQUEST['weekofheading13'];
$weekofheading14 = $_REQUEST['weekofheading14'];
$weekofheading15 = $_REQUEST['weekofheading15'];
$subheading1 = $_REQUEST['week1_info'];
$subheading2 = $_REQUEST['week2_info'];
$subheading3 = $_REQUEST['week3_info'];
$subheading4 = $_REQUEST['week4_info'];
$subheading5 = $_REQUEST['week5_info'];
$subheading6 = $_REQUEST['week6_info'];
$subheading7 = $_REQUEST['week7_info'];
$subheading8 = $_REQUEST['week8_info'];
$subheading9 = $_REQUEST['week9_info'];
$subheading10 = $_REQUEST['week10_info'];
$subheading11 = $_REQUEST['week11_info'];
$subheading12 = $_REQUEST['week12_info'];
$subheading13 = $_REQUEST['week13_info'];
$subheading14 = $_REQUEST['week14_info'];
$subheading15 = $_REQUEST['week15_info'];
$week1assessment = $_REQUEST['week1assessment'];
$week2assessment = $_REQUEST['week2assessment'];
$week3assessment = $_REQUEST['week3assessment'];
$week4assessment = $_REQUEST['week4assessment'];
$week5assessment = $_REQUEST['week5assessment'];
$week6assessment = $_REQUEST['week6assessment'];
$week7assessment = $_REQUEST['week7assessment'];
$week8assessment = $_REQUEST['week8assessment'];
$week9assessment = $_REQUEST['week9assessment'];
$week10assessment = $_REQUEST['week10assessment'];
$week11assessment = $_REQUEST['week11assessment'];
$week12assessment = $_REQUEST['week12assessment'];
$week13assessment = $_REQUEST['week13assessment'];
$week14assessment = $_REQUEST['week14assessment'];
$week15assessment = $_REQUEST['week15assessment'];

$sql =" Update weeklyinfo
       set
	   
	    holiday = '$holiday',
        startdate = '$startdate',
		enddate = '$enddate',
		weekofheading1 = '$weekofheading1',
		weekofheading2 = '$weekofheading2',
		weekofheading3 = '$weekofheading3',
		weekofheading4 = '$weekofheading4',
		weekofheading5 = '$weekofheading5',
		weekofheading6 = '$weekofheading6',
		weekofheading7 = '$weekofheading7',
		weekofheading8 = '$weekofheading8',
		weekofheading9 = '$weekofheading9',
		weekofheading10 = '$weekofheading10',
		weekofheading11 = '$weekofheading11',
		weekofheading12 = '$weekofheading12',
		weekofheading13 = '$weekofheading13',
		weekofheading14 = '$weekofheading14',
		weekofheading15 = '$weekofheading15',
		subheading1 = '$subheading1',
		subheading2 = '$subheading2',
		subheading3 = '$subheading3',
		subheading4 = '$subheading4',
		subheading5 = '$subheading5',
		subheading6 = '$subheading6',
		subheading7 = '$subheading7',
		subheading8 = '$subheading8',
		subheading9 = '$subheading9',
		subheading10 = '$subheading10',
		subheading11 = '$subheading11',
		subheading12 = '$subheading12',
		subheading13 = '$subheading13',
		subheading14 = '$subheading14',
		subheading15 = '$subheading15',
		week1assessment = '$week1assessment',
		week2assessment = '$week2assessment',
		week3assessment = '$week3assessment',
		week4assessment = '$week4assessment',
		week5assessment = '$week5assessment',
		week6assessment = '$week6assessment',
		week7assessment = '$week7assessment',
		week8assessment = '$week8assessment',
		week9assessment = '$week9assessment',
		week10assessment = '$week10assessment',
		week11assessment = '$week11assessment',
		week12assessment = '$week12assessment',
		week13assessment = '$week13assessment',
		week14assessment = '$week14assessment',
		week15assessment = '$week15assessment'
		
		where fkcourseid = $courseID ";

$result = $conn->query($sql);

header("location: mainpage.php?ok=1");

?>