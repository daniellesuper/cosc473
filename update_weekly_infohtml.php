<?php
//new file
require("session_info.php");
error_reporting(0);

$courseID = $_GET['courseID'];

include ('session-connection.php');

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}


$holiday = htmlentities($_REQUEST['holiday'], ENT_QUOTES);
$startdate = htmlentities($_REQUEST['startdate'], ENT_QUOTES);
$enddate = htmlentities($_REQUEST['enddate'], ENT_QUOTES);
$custombreakname = htmlentities($_REQUEST['custombreakname'], ENT_QUOTES);
$customstartdate = htmlentities($_REQUEST['customstartdate'], ENT_QUOTES);
$customenddate = htmlentities($_REQUEST['customenddate'], ENT_QUOTES);
$week1_desc = htmlentities($_REQUEST['week1_desc'], ENT_QUOTES);

$week2_desc = htmlentities($_REQUEST['week2_desc'], ENT_QUOTES);
$week3_desc = htmlentities($_REQUEST['week3_desc'], ENT_QUOTES);
$week4_desc = htmlentities($_REQUEST['week4_desc'], ENT_QUOTES);
$week5_desc = htmlentities($_REQUEST['week5_desc'], ENT_QUOTES);
$week6_desc = htmlentities($_REQUEST['week6_desc'], ENT_QUOTES);
$week7_desc = htmlentities($_REQUEST['week7_desc'], ENT_QUOTES);
$week8_desc = htmlentities($_REQUEST['week8_desc'], ENT_QUOTES);
$week9_desc = htmlentities($_REQUEST['week9_desc'], ENT_QUOTES);
$week10_desc = htmlentities($_REQUEST['week10_desc'], ENT_QUOTES);
$week11_desc = htmlentities($_REQUEST['week11_desc'], ENT_QUOTES);
$week12_desc = htmlentities($_REQUEST['week13_desc'], ENT_QUOTES);
$week13_desc = htmlentities($_REQUEST['week1_desc'], ENT_QUOTES);
$week14_desc = htmlentities($_REQUEST['week14_desc'], ENT_QUOTES);
$week15_desc = htmlentities($_REQUEST['week15_desc'], ENT_QUOTES);

$week1_of = htmlentities($_REQUEST['week1_of'], ENT_QUOTES);
$week2_of = htmlentities($_REQUEST['week2_of'], ENT_QUOTES);
$week3_of = htmlentities($_REQUEST['week3_of'], ENT_QUOTES);
$week4_of = htmlentities($_REQUEST['week4_of'], ENT_QUOTES);
$week5_of = htmlentities($_REQUEST['week5_of'], ENT_QUOTES);
$week6_of = htmlentities($_REQUEST['week6_of'], ENT_QUOTES);
$week7_of = htmlentities($_REQUEST['week7_of'], ENT_QUOTES);
$week8_of = htmlentities($_REQUEST['week8_of'], ENT_QUOTES);
$week9_of = htmlentities($_REQUEST['week9_of'], ENT_QUOTES);
$week10_of = htmlentities($_REQUEST['week10_of'], ENT_QUOTES);
$week11_of = htmlentities($_REQUEST['week11_of'], ENT_QUOTES);
$week12_of = htmlentities($_REQUEST['week12_of'], ENT_QUOTES);
$week13_of = htmlentities($_REQUEST['week13_of'], ENT_QUOTES);
$week14_of = htmlentities($_REQUEST['week14_of'], ENT_QUOTES);
$week15_of = htmlentities($_REQUEST['week15_of'], ENT_QUOTES);

$symbol1_week1 = htmlentities($_REQUEST['symbol1_week1'], ENT_QUOTES);
$symbol2_week1 = htmlentities($_REQUEST['symbol2_week1'], ENT_QUOTES);
$symbol3_week1 = htmlentities($_REQUEST['symbol3_week1'], ENT_QUOTES);

$symbol1_week2 = htmlentities($_REQUEST['symbol1_week2'], ENT_QUOTES);
$symbol2_week2 = htmlentities($_REQUEST['symbol2_week2'], ENT_QUOTES);
$symbol3_week2 = htmlentities($_REQUEST['symbol2_week2'], ENT_QUOTES);

$symbol1_week3 = htmlentities($_REQUEST['symbol1_week3'], ENT_QUOTES);
$symbol2_week3 = htmlentities($_REQUEST['symbol2_week3'], ENT_QUOTES);
$symbol3_week3 = htmlentities($_REQUEST['symbol3_week3'], ENT_QUOTES);

$symbol1_week4 = htmlentities($_REQUEST['symbol1_week4'], ENT_QUOTES);
$symbol2_week4 = htmlentities($_REQUEST['symbol2_week4'], ENT_QUOTES);
$symbol3_week4 = htmlentities($_REQUEST['symbol3_week4'], ENT_QUOTES);

$symbol1_week5 = htmlentities($_REQUEST['symbol1_week5'], ENT_QUOTES);
$symbol2_week5 = htmlentities($_REQUEST['symbol2_week5'], ENT_QUOTES);
$symbol3_week5 = htmlentities($_REQUEST['symbol3_week5'], ENT_QUOTES);

$symbol1_week6 = htmlentities($_REQUEST['symbol1_week6'], ENT_QUOTES);
$symbol2_week6 = htmlentities($_REQUEST['symbol2_week6'], ENT_QUOTES);
$symbol3_week6 = htmlentities($_REQUEST['symbol3_week6'], ENT_QUOTES);

$symbol1_week7 = htmlentities($_REQUEST['symbol1_week7'], ENT_QUOTES);
$symbol2_week7 = htmlentities($_REQUEST['symbol2_week7'], ENT_QUOTES);
$symbol3_week7 = htmlentities($_REQUEST['symbol3_week7'], ENT_QUOTES);

$symbol1_week8 = htmlentities($_REQUEST['symbol1_week8'], ENT_QUOTES);
$symbol2_week8 = htmlentities($_REQUEST['symbol2_week8'], ENT_QUOTES);
$symbol3_week8 = htmlentities($_REQUEST['symbol3_week8'], ENT_QUOTES);

$symbol1_week9 = htmlentities($_REQUEST['symbol1_week9'], ENT_QUOTES);
$symbol2_week9 = htmlentities($_REQUEST['symbol2_week9'], ENT_QUOTES);
$symbol3_week9 = htmlentities($_REQUEST['symbol3_week9'], ENT_QUOTES);

$symbol1_week10 = htmlentities($_REQUEST['symbol1_week10'], ENT_QUOTES);
$symbol2_week10 = htmlentities($_REQUEST['symbol2_week10'], ENT_QUOTES);
$symbol3_week10 = htmlentities($_REQUEST['symbol3_week10'], ENT_QUOTES);

$symbol1_week11 = htmlentities($_REQUEST['symbol1_week11'], ENT_QUOTES);
$symbol2_week11 = htmlentities($_REQUEST['symbol2_week11'], ENT_QUOTES);
$symbol3_week11 = htmlentities($_REQUEST['symbol3_week11'], ENT_QUOTES);

$symbol1_week12 = htmlentities($_REQUEST['symbol1_week12'], ENT_QUOTES);
$symbol2_week12 = htmlentities($_REQUEST['symbol2_week12'], ENT_QUOTES);
$symbol3_week12 = htmlentities($_REQUEST['symbol3_week12'], ENT_QUOTES);

$$symbol1_week13 = htmlentities($_REQUEST['symbol1_week13'], ENT_QUOTES);
$symbol2_week13 = htmlentities($_REQUEST['symbol2_week13'], ENT_QUOTES);
$symbol3_week13 = htmlentities($_REQUEST['symbol3_week13'], ENT_QUOTES);

$symbol1_week14 = htmlentities($_REQUEST['symbol1_week14'], ENT_QUOTES);
$symbol2_week14 = htmlentities($_REQUEST['symbol2_week14'], ENT_QUOTES);
$symbol3_week14 = htmlentities($_REQUEST['symbol3_week14'], ENT_QUOTES);

$symbol1_week15 = htmlentities($_REQUEST['symbol1_week15'], ENT_QUOTES);
$symbol2_week15 = htmlentities($_REQUEST['symbol2_week15'], ENT_QUOTES);
$symbol3_week15 = htmlentities($_REQUEST['symbol3_week15'], ENT_QUOTES);



$sql =" update weeklyinfo
       set
	    holiday = '$holiday', 
		startdate = '$startdate',
		enddate = '$enddate',
		custombreakname = '$custombreakname',
		customstartdate = '$customstartdate',
		customenddate = '$customenddate',
		week1_desc = '$week1_desc',
		week2_desc = '$week2_desc',
		week3_desc = '$week3_desc',
		week4_desc = '$week4_desc',
		week5_desc = '$week5_desc',
		week6_desc = '$week6_desc',
		week7_desc = '$week7_desc',
		week8_desc = '$week8_desc',
		week9_desc = '$week9_desc',
		week10_desc = '$week10_desc',
		week11_desc = '$week11_desc',
		week12_desc = '$week12_desc',
		week13_desc = '$week13_desc',
		week14_desc = '$week14_desc',
		week15_desc = '$week15_desc',
		week1_of = '$week1_of',
		week2_of = '$week2_of',
		week3_of = '$week3_of',
		week4_of = '$week4_of',
		week5_of = '$week5_of',
		week6_of = '$week6_of',
		week7_of = '$week7_of',
		week8_of = '$week8_of',
		week9_of = '$week9_of',
		week10_of = '$week10_of',
		week11_of = '$week11_of',
		week12_of = '$week12_of',
		week13_of = '$week13_of',
		week14_of = '$week14_of',
		week15_of = '$week15_of',
		symbol1_week1 = '$symbol1_week1',
		symbol2_week1 = '$symbol2_week1',
		symbol3_week1 = '$symbol3_week1',
		symbol1_week2 = '$symbol1_week2',
		symbol2_week2 = '$symbol2_week2',
		symbol3_week2 = '$symbol3_week2',
		symbol1_week3 = '$symbol1_week3',
		symbol2_week3 = '$symbol2_week3',
		symbol3_week3 = '$symbol3_week3',
		symbol1_week4 = '$symbol1_week4',
		symbol2_week4 = '$symbol2_week4',
		symbol3_week4 = '$symbol3_week4',
		symbol1_week5 = '$symbol1_week5',
		symbol2_week5 = '$symbol2_week5',
		symbol3_week5 = '$symbol3_week5',
		symbol1_week6 = '$symbol1_week6',
		symbol2_week6 = '$symbol2_week6',
		symbol3_week6 = '$symbol3_week6',
		symbol1_week7 = '$symbol1_week7',
		symbol2_week7 = '$symbol2_week7',
		symbol3_week7 = '$symbol3_week7',
		symbol1_week8 = '$symbol1_week8',
		symbol2_week8 = '$symbol2_week8',
		symbol3_week8 = '$symbol3_week8',
		symbol1_week9 = '$symbol1_week9',
		symbol2_week9 = '$symbol2_week9',
		symbol3_week9 = '$symbol3_week9',
		symbol1_week10 = '$symbol1_week10',
		symbol2_week10 = '$symbol2_week10',
		symbol3_week10 = '$symbol3_week10',
		symbol1_week11 = '$symbol1_week11',
		symbol2_week11 = '$symbol2_week11',
		symbol3_week11 = '$symbol3_week11',
		symbol1_week12 = '$symbol1_week12',
		symbol2_week12 = '$symbol2_week12',
		symbol3_week12 = '$symbol3_week12',
		symbol1_week13 = '$symbol1_week13',
		symbol2_week13 = '$symbol2_week13',
		symbol3_week13 = '$symbol3_week13',
		symbol1_week14 = '$symbol1_week14',
		symbol2_week14 = '$symbol2_week14',
		symbol3_week14 = '$symbol3_week14',
		symbol1_week15 = '$symbol1_week15',
		symbol2_week15 = '$symbol2_week15',
		symbol3_week15 = '$symbol3_week15'

					where fkcourseid = $_GET[courseID]";

		//echo $sql;exit;

$result = $conn->query($sql);

	$row=mysqli_num_rows($result);

	if($row > 0){
		@header("Location: mainpage.php");
     exit; 
   }else{
		 $FKPROFID = $_SESSION['PKID'];
         $strQuery="update weeklyinfo 
		            set holiday = '$holiday', 
		startdate = '$startdate',
		enddate = '$enddate',
		custombreakname = '$custombreakname',
		customstartdate = '$customstartdate',
		customenddate = '$customenddate',
		week1_desc = '$week1_desc',
		week2_desc = '$week2_desc',
		week3_desc = '$week3_desc',
		week4_desc = '$week4_desc',
		week5_desc = '$week5_desc',
		week6_desc = '$week6_desc',
		week7_desc = '$week7_desc',
		week8_desc = '$week8_desc',
		week9_desc = '$week9_desc',
		week10_desc = '$week10_desc',
		week11_desc = '$week11_desc',
		week12_desc = '$week12_desc',
		week13_desc = '$week13_desc',
		week14_desc = '$week14_desc',
		week15_desc = '$week15_desc',
		week1_of = '$week1_of',
		week2_of = '$week2_of',
		week3_of = '$week3_of',
		week4_of = '$week4_of',
		week5_of = '$week5_of',
		week6_of = '$week6_of',
		week7_of = '$week7_of',
		week8_of = '$week8_of',
		week9_of = '$week9_of',
		week10_of = '$week10_of',
		week11_of = '$week11_of',
		week12_of = '$week12_of',
		week13_of = '$week13_of',
		week14_of = '$week14_of',
		week15_of = '$week15_of',
		symbol1_week1 = '$symbol1_week1',
		symbol2_week1 = '$symbol2_week1',
		symbol3_week1 = '$symbol3_week1',
		symbol1_week2 = '$symbol1_week2',
		symbol2_week2 = '$symbol2_week2',
		symbol3_week2 = '$symbol3_week2',
		symbol1_week3 = '$symbol1_week3',
		symbol2_week3 = '$symbol2_week3',
		symbol3_week3 = '$symbol3_week3',
		symbol1_week4 = '$symbol1_week4',
		symbol2_week4 = '$symbol2_week4',
		symbol3_week4 = '$symbol3_week4',
		symbol1_week5 = '$symbol1_week5',
		symbol2_week5 = '$symbol2_week5',
		symbol3_week5 = '$symbol3_week5',
		symbol1_week6 = '$symbol1_week6',
		symbol2_week6 = '$symbol2_week6',
		symbol3_week6 = '$symbol3_week6',
		symbol1_week7 = '$symbol1_week7',
		symbol2_week7 = '$symbol2_week7',
		symbol3_week7 = '$symbol3_week7',
		symbol1_week8 = '$symbol1_week8',
		symbol2_week8 = '$symbol2_week8',
		symbol3_week8 = '$symbol3_week8',
		symbol1_week9 = '$symbol1_week9',
		symbol2_week9 = '$symbol2_week9',
		symbol3_week9 = '$symbol3_week9',
		symbol1_week10 = '$symbol1_week10',
		symbol2_week10 = '$symbol2_week10',
		symbol3_week10 = '$symbol3_week10',
		symbol1_week11 = '$symbol1_week11',
		symbol2_week11 = '$symbol2_week11',
		symbol3_week11 = '$symbol3_week11',
		symbol1_week12 = '$symbol1_week12',
		symbol2_week12 = '$symbol2_week12',
		symbol3_week12 = '$symbol3_week12',
		symbol1_week13 = '$symbol1_week13',
		symbol2_week13 = '$symbol2_week13',
		symbol3_week13 = '$symbol3_week13',
		symbol1_week14 = '$symbol1_week14',
		symbol2_week14 = '$symbol2_week14',
		symbol3_week14 = '$symbol3_week14',
		symbol1_week15 = '$symbol1_week15',
		symbol2_week15 = '$symbol2_week15',
		symbol3_week15 = '$symbol3_week15'

					where fkcourseid = $_GET[courseID]";
					// PKID

		//echo $strQuery;exit;
		$conn->query($strQuery);
		 header("Location: mainpage.php");
		 exit;
	}
?>