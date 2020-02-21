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

$enddate=htmlentities($_REQUEST['enddate'],ENT_QUOTES);
$startdate1=htmlentities($_REQUEST['startdate1'],ENT_QUOTES); 



$weekofheading1 = htmlentities($_REQUEST['weekofheading1'],ENT_QUOTES);
$week1_desc= htmlentities($_REQUEST['week1_desc'],ENT_QUOTES);
$week1_of = htmlentities($_REQUEST['week1_of'],ENT_QUOTES);
$symbol1 = htmlentities($_REQUEST['symbol1'],ENT_QUOTES);


$weekofheading2 = htmlentities($_REQUEST['weekofheading2'],ENT_QUOTES);
$week2_desc= htmlentities($_REQUEST['week2_desc'],ENT_QUOTES);
$week2_of = htmlentities($_REQUEST['week2_of'],ENT_QUOTES);
$symbol2 = htmlentities($_REQUEST['symbol2'],ENT_QUOTES);

$weekofheading3 = htmlentities($_REQUEST['weekofheading3'],ENT_QUOTES);
$week3_desc= htmlentities($_REQUEST['week3_desc'],ENT_QUOTES);
$week3_of = htmlentities($_REQUEST['week3_of'],ENT_QUOTES);
$symbol3 = htmlentities($_REQUEST['symbol3'],ENT_QUOTES);

$weekofheading4 = htmlentities($_REQUEST['weekofheading4'],ENT_QUOTES);
$week4_desc= htmlentities($_REQUEST['week4_desc'],ENT_QUOTES);
$week4_of = htmlentities($_REQUEST['week4_of'],ENT_QUOTES);
$symbol4 = htmlentities($_REQUEST['symbol4'],ENT_QUOTES);

$weekofheading5 = htmlentities($_REQUEST['weekofheading5'],ENT_QUOTES);
$week5_desc= htmlentities($_REQUEST['week5_desc'],ENT_QUOTES);
$week5_of = htmlentities($_REQUEST['week5_of'],ENT_QUOTES);
$symbol5 = htmlentities($_REQUEST['symbol5'],ENT_QUOTES);

$weekofheading6 = htmlentities($_REQUEST['weekofheading6'],ENT_QUOTES);
$week6_desc= htmlentities($_REQUEST['week6_desc'],ENT_QUOTES);
$week6_of = htmlentities($_REQUEST['week6_of'],ENT_QUOTES);
$symbol6 = htmlentities($_REQUEST['symbol6'],ENT_QUOTES);

$weekofheading7 = htmlentities($_REQUEST['weekofheading7'],ENT_QUOTES);
$week7_desc= htmlentities($_REQUEST['week7_desc'],ENT_QUOTES);
$week7_of = htmlentities($_REQUEST['week7_of'],ENT_QUOTES);
$symbol7 = htmlentities($_REQUEST['symbol7'],ENT_QUOTES);


$weekofheading8 = htmlentities($_REQUEST['weekofheading8'],ENT_QUOTES);
$week8_desc= htmlentities($_REQUEST['week8_desc'],ENT_QUOTES);
$week8_of = htmlentities($_REQUEST['week8_of'],ENT_QUOTES);
$symbol8 = htmlentities($_REQUEST['symbol8'],ENT_QUOTES);

$weekofheading9 = htmlentities($_REQUEST['weekofheading9'],ENT_QUOTES);
$week9_desc= htmlentities($_REQUEST['week9_desc'],ENT_QUOTES);
$week9_of = htmlentities($_REQUEST['week9_of'],ENT_QUOTES);
$symbol9 = htmlentities($_REQUEST['symbol9'],ENT_QUOTES);

$weekofheading10 = htmlentities($_REQUEST['weekofheading10'],ENT_QUOTES);
$week10_desc= htmlentities($_REQUEST['week10_desc'],ENT_QUOTES);
$week10_of = htmlentities($_REQUEST['week10_of'],ENT_QUOTES);
$symbol10 = htmlentities($_REQUEST['symbol10'],ENT_QUOTES);

$weekofheading11 = htmlentities($_REQUEST['weekofheading11'],ENT_QUOTES);
$week11_desc= htmlentities($_REQUEST['week11_desc'],ENT_QUOTES);
$week11_of = htmlentities($_REQUEST['week11_of'],ENT_QUOTES);
$symbol11 = htmlentities($_REQUEST['symbol11'],ENT_QUOTES);


$weekofheading12 = htmlentities($_REQUEST['weekofheading12'],ENT_QUOTES);
$week12_desc= htmlentities($_REQUEST['week12_desc'],ENT_QUOTES);
$week12_of = htmlentities($_REQUEST['week12_of'],ENT_QUOTES);
$symbol12 = htmlentities($_REQUEST['symbol12'],ENT_QUOTES);

$weekofheading13 = htmlentities($_REQUEST['weekofheading13'],ENT_QUOTES);
$week13_desc= htmlentities($_REQUEST['week13_desc'],ENT_QUOTES);
$week13_of = htmlentities($_REQUEST['week13_of'],ENT_QUOTES);
$symbol13 = htmlentities($_REQUEST['symbol13'],ENT_QUOTES);

$weekofheading14 = htmlentities($_REQUEST['weekofheading14'],ENT_QUOTES);
$week14_desc= htmlentities($_REQUEST['week14_desc'],ENT_QUOTES);
$week14_of = htmlentities($_REQUEST['week14_of'],ENT_QUOTES);
$symbol14 = htmlentities($_REQUEST['symbol14'],ENT_QUOTES);

$weekofheading15 = htmlentities($_REQUEST['weekofheading15'],ENT_QUOTES);
$week15_desc= htmlentities($_REQUEST['week15_desc'],ENT_QUOTES);
$week15_of = htmlentities($_REQUEST['week15_of'],ENT_QUOTES);
$symbol15 = htmlentities($_REQUEST['symbol15'],ENT_QUOTES);






//$week1assessment = htmlentities($_REQUEST['week1assessment'],ENT_QUOTES);



 
	
         $strQuery="insert into weeklyinfo
                      (
                       fkcourseid,fkprofid,holiday, startdate, enddate, week1_desc, week1_of, symbol1, week2_desc, week2_of, symbol2,  week3_desc, week3_of, symbol3, week4_desc, week4_of, symbol4, week5_desc, week5_of, symbol5, week6_desc, week6_of, symbol6, week7_desc, week7_of, symbol7, week8_desc, week8_of, symbol8, week9_desc, week9_of, symbol9, week10_desc, week10_of, symbol10, week11_desc, week11_of, symbol11, week12_desc, week12_of, symbol12, week13_desc, week13_of, symbol13, week14_desc, week14_of, symbol14, week15_desc, week15_of, symbol15
                      )
                     values
                     (
                      $courseID, $FKPROFID , '$holiday_name', '$startdate1', '$enddate',  '$week1_desc', '$week1_of', '$symbol1', '$week2_desc', '$week2_of', '$symbol2',  '$week3_desc', '$week3_of', '$symbol3', '$week4_desc', '$week4_of', '$symbol4', '$week5_desc', '$week5_of', '$symbol5', '$week6_desc', '$week6_of', '$symbol6', '$week7_desc', '$week7_of', '$symbol7', '$week8_desc', '$week8_of', '$symbol8', '$week9_desc', '$week9_of', '$symbol9', '$week10_desc', '$week10_of', '$symbol10', '$week11_desc', '$week11_of', '$symbol11', '$week12_desc', '$week12_of', '$symbol12', '$week13_desc', '$week13_of', '$symbol13', '$week14_desc', '$week14_of', '$symbol14', '$week15_desc', '$week15_of', '$symbol15'
					 )
                    ";
		 
 //echo $strQuery; exit;
		 $conn->query($strQuery);
		
		 header("Location: mainpage.php");
		 exit;

	

?>