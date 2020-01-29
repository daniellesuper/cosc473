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

$courseID = htmlentities($_REQUEST['courseID'],ENT_QUOTES);
$holiday_name=htmlentities($_REQUEST['holiday_name'],ENT_QUOTES);
$startdate=htmlentities($_REQUEST['startdate'],ENT_QUOTES);
$enddate=htmlentities($_REQUEST['enddate'],ENT_QUOTES);

$weekofheading1=htmlentities($_REQUEST['week1_info'],ENT_QUOTES);
$subheading1=htmlentities($_REQUEST['week1Assessment'],ENT_QUOTES);
$symbol1=htmlentities($_REQUEST['symbol1'],ENT_QUOTES);

$weekofheading2=htmlentities($_REQUEST['week2_info'],ENT_QUOTES);
$subheading2=htmlentities($_REQUEST['week2Assessment'],ENT_QUOTES);
$symbol2=htmlentities($_REQUEST['symbol2'],ENT_QUOTES);


$weekofheading3=htmlentities($_REQUEST['week3_info'],ENT_QUOTES);
$subheading3=htmlentities($_REQUEST['week3Assessment'],ENT_QUOTES);
$symbol3=htmlentities($_REQUEST['symbol3'],ENT_QUOTES);

$weekofheading4=htmlentities($_REQUEST['week4_info'],ENT_QUOTES);
$subheading4=htmlentities($_REQUEST['week4Assessment'],ENT_QUOTES);
$symbol4=htmlentities($_REQUEST['symbol4'],ENT_QUOTES);

$weekofheading5=htmlentities($_REQUEST['week5_info'],ENT_QUOTES);
$subheading5=htmlentities($_REQUEST['week5Assessment'],ENT_QUOTES);
$symbol5=htmlentities($_REQUEST['symbol5'],ENT_QUOTES);

$weekofheading6=htmlentities($_REQUEST['week6_info'],ENT_QUOTES);
$subheading6=htmlentities($_REQUEST['week6Assessment'],ENT_QUOTES);
$symbol6=htmlentities($_REQUEST['symbol6'],ENT_QUOTES);

$weekofheading7=htmlentities($_REQUEST['week7_info'],ENT_QUOTES);
$subheading7=htmlentities($_REQUEST['week7Assessment'],ENT_QUOTES);
$symbol7=htmlentities($_REQUEST['symbol7'],ENT_QUOTES);

$weekofheading8=htmlentities($_REQUEST['week8_info'],ENT_QUOTES);
$subheading8=htmlentities($_REQUEST['week8Assessment'],ENT_QUOTES);
$symbol8=htmlentities($_REQUEST['symbol8'],ENT_QUOTES);

$weekofheading9=htmlentities($_REQUEST['week9_info'],ENT_QUOTES);
$subheading9=htmlentities($_REQUEST['week9Assessment'],ENT_QUOTES);
$symbol9=htmlentities($_REQUEST['symbol9'],ENT_QUOTES);

$weekofheading10=htmlentities($_REQUEST['week10_info'],ENT_QUOTES);
$subheading10=htmlentities($_REQUEST['week10Assessment'],ENT_QUOTES);
$symbol10=htmlentities($_REQUEST['symbol10'],ENT_QUOTES);

$weekofheading11=htmlentities($_REQUEST['week11_info'],ENT_QUOTES);
$subheading11=htmlentities($_REQUEST['week11Assessment'],ENT_QUOTES);
$symbol11=htmlentities($_REQUEST['symbol11'],ENT_QUOTES);	

$weekofheading12=htmlentities($_REQUEST['week12_info'],ENT_QUOTES);
$subheading12=htmlentities($_REQUEST['week12Assessment'],ENT_QUOTES);
$symbol12=htmlentities($_REQUEST['symbol12'],ENT_QUOTES);

$weekofheading13=htmlentities($_REQUEST['week13_info'],ENT_QUOTES);
$subheading13=htmlentities($_REQUEST['week13Assessment'],ENT_QUOTES);
$symbol13=htmlentities($_REQUEST['symbol13'],ENT_QUOTES);

$weekofheading14=htmlentities($_REQUEST['week14_info'],ENT_QUOTES);
$subheading14=htmlentities($_REQUEST['week14Assessment'],ENT_QUOTES);
$symbol14=htmlentities($_REQUEST['symbol14'],ENT_QUOTES);

$weekofheading15=htmlentities($_REQUEST['week15_info'],ENT_QUOTES);
$subheading15=htmlentities($_REQUEST['week15Assessment'],ENT_QUOTES);
$symbol15=htmlentities($_REQUEST['symbol15'],ENT_QUOTES);

	$result = $conn->query($sql);
	$row=mysqli_num_rows($result);
	if($row > 0){
		@header("Location: mainpage.php");
     exit;
   }else{
         $strQuery="insert into weeklyinfo
                      (
                       holiday, startdate, enddate, weekofheading1, subheading1, symbol1,
													weekofheading2, subheading2, symbol2
										
                      )
                     values
                     (
                      '$holiday_name', '$startdate', '$enddate', '$weekofheading1', '$subheading1', '$symbol1',
																 '$weekofheading2', '$subheading2', '$symbol2'
					 )
                    ";
		 $conn->query($strQuery);
		 echo $strQuery; exit;
		 header("Location: mainpage.php");
		 exit;
	}
	

?>