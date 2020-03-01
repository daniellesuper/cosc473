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
$symbol1_week1 = htmlentities($_REQUEST['symbol1_week1'],ENT_QUOTES);
$symbol2_week1 = htmlentities($_REQUEST['symbol2_week1'],ENT_QUOTES);
$symbol3_week1 = htmlentities($_REQUEST['symbol3_week1'],ENT_QUOTES);


$weekofheading2 = htmlentities($_REQUEST['weekofheading2'],ENT_QUOTES);
$week2_desc= htmlentities($_REQUEST['week2_desc'],ENT_QUOTES);
$week2_of = htmlentities($_REQUEST['week2_of'],ENT_QUOTES);
$symbol1_week2 = htmlentities($_REQUEST['symbol1_week2'],ENT_QUOTES);
$symbol2_week2 = htmlentities($_REQUEST['symbol2_week2'],ENT_QUOTES);
$symbol3_week2 = htmlentities($_REQUEST['symbol3_week2'],ENT_QUOTES);

$weekofheading3 = htmlentities($_REQUEST['weekofheading3'],ENT_QUOTES);
$week3_desc= htmlentities($_REQUEST['week3_desc'],ENT_QUOTES);
$week3_of = htmlentities($_REQUEST['week3_of'],ENT_QUOTES);
$symbol1_week3 = htmlentities($_REQUEST['symbol1_week3'],ENT_QUOTES);
$symbol2_week3 = htmlentities($_REQUEST['symbol2_week3'],ENT_QUOTES);
$symbol3_week3 = htmlentities($_REQUEST['symbol3_week3'],ENT_QUOTES);

$weekofheading4 = htmlentities($_REQUEST['weekofheading4'],ENT_QUOTES);
$week4_desc= htmlentities($_REQUEST['week4_desc'],ENT_QUOTES);
$week4_of = htmlentities($_REQUEST['week4_of'],ENT_QUOTES);
$symbol1_week4 = htmlentities($_REQUEST['symbol1_week4'],ENT_QUOTES);
$symbol2_week4 = htmlentities($_REQUEST['symbol2_week4'],ENT_QUOTES);
$symbol3_week4 = htmlentities($_REQUEST['symbol3_week4'],ENT_QUOTES);



$weekofheading5 = htmlentities($_REQUEST['weekofheading5'],ENT_QUOTES);
$week5_desc= htmlentities($_REQUEST['week5_desc'],ENT_QUOTES);
$week5_of = htmlentities($_REQUEST['week5_of'],ENT_QUOTES);
$symbol1_week5 = htmlentities($_REQUEST['symbol1_week5'],ENT_QUOTES);
$symbol2_week5 = htmlentities($_REQUEST['symbol2_week5'],ENT_QUOTES);
$symbol3_week5 = htmlentities($_REQUEST['symbol3_week5'],ENT_QUOTES);


$weekofheading6 = htmlentities($_REQUEST['weekofheading6'],ENT_QUOTES);
$week6_desc= htmlentities($_REQUEST['week6_desc'],ENT_QUOTES);
$week6_of = htmlentities($_REQUEST['week6_of'],ENT_QUOTES);
$symbol1_week6 = htmlentities($_REQUEST['symbol1_week6'],ENT_QUOTES);
$symbol2_week6 = htmlentities($_REQUEST['symbol2_week6'],ENT_QUOTES);
$symbol3_week6 = htmlentities($_REQUEST['symbol3_week6'],ENT_QUOTES);

$weekofheading7 = htmlentities($_REQUEST['weekofheading7'],ENT_QUOTES);
$week7_desc= htmlentities($_REQUEST['week7_desc'],ENT_QUOTES);
$week7_of = htmlentities($_REQUEST['week7_of'],ENT_QUOTES);
$symbol1_week7 = htmlentities($_REQUEST['symbol1_week7'],ENT_QUOTES);
$symbol2_week7 = htmlentities($_REQUEST['symbol2_week7'],ENT_QUOTES);
$symbol3_week7 = htmlentities($_REQUEST['symbol3_week7'],ENT_QUOTES);



$weekofheading8 = htmlentities($_REQUEST['weekofheading8'],ENT_QUOTES);
$week8_desc= htmlentities($_REQUEST['week8_desc'],ENT_QUOTES);
$week8_of = htmlentities($_REQUEST['week8_of'],ENT_QUOTES);
$symbol1_week8 = htmlentities($_REQUEST['symbol1_week8'],ENT_QUOTES);
$symbol2_week8 = htmlentities($_REQUEST['symbol2_week8'],ENT_QUOTES);
$symbol3_week8 = htmlentities($_REQUEST['symbol3_week8'],ENT_QUOTES);


$weekofheading9 = htmlentities($_REQUEST['weekofheading9'],ENT_QUOTES);
$week9_desc= htmlentities($_REQUEST['week9_desc'],ENT_QUOTES);
$week9_of = htmlentities($_REQUEST['week9_of'],ENT_QUOTES);
$symbol1_week9 = htmlentities($_REQUEST['symbol1_week9'],ENT_QUOTES);
$symbol2_week9 = htmlentities($_REQUEST['symbol2_week9'],ENT_QUOTES);
$symbol3_week9 = htmlentities($_REQUEST['symbol3_week9'],ENT_QUOTES);


$weekofheading10 = htmlentities($_REQUEST['weekofheading10'],ENT_QUOTES);
$week10_desc= htmlentities($_REQUEST['week10_desc'],ENT_QUOTES);
$week10_of = htmlentities($_REQUEST['week10_of'],ENT_QUOTES);
$symbol1_week10 = htmlentities($_REQUEST['symbol1_week10'],ENT_QUOTES);
$symbol2_week10 = htmlentities($_REQUEST['symbol2_week10'],ENT_QUOTES);
$symbol3_week10 = htmlentities($_REQUEST['symbol3_week10'],ENT_QUOTES);


$weekofheading11 = htmlentities($_REQUEST['weekofheading11'],ENT_QUOTES);
$week11_desc= htmlentities($_REQUEST['week11_desc'],ENT_QUOTES);
$week11_of = htmlentities($_REQUEST['week11_of'],ENT_QUOTES);
$symbol1_week11 = htmlentities($_REQUEST['symbol1_week11'],ENT_QUOTES);
$symbol2_week11 = htmlentities($_REQUEST['symbol2_week11'],ENT_QUOTES);
$symbol3_week11 = htmlentities($_REQUEST['symbol3_week11'],ENT_QUOTES);



$weekofheading12 = htmlentities($_REQUEST['weekofheading12'],ENT_QUOTES);
$week12_desc= htmlentities($_REQUEST['week12_desc'],ENT_QUOTES);
$week12_of = htmlentities($_REQUEST['week12_of'],ENT_QUOTES);
$symbol1_week12 = htmlentities($_REQUEST['symbol1_week12'],ENT_QUOTES);
$symbol2_week12 = htmlentities($_REQUEST['symbol2_week12'],ENT_QUOTES);
$symbol3_week12 = htmlentities($_REQUEST['symbol3_week12'],ENT_QUOTES);


$weekofheading13 = htmlentities($_REQUEST['weekofheading13'],ENT_QUOTES);
$week13_desc= htmlentities($_REQUEST['week13_desc'],ENT_QUOTES);
$week13_of = htmlentities($_REQUEST['week13_of'],ENT_QUOTES);
$symbol1_week13 = htmlentities($_REQUEST['symbol1_week13'],ENT_QUOTES);
$symbol2_week13 = htmlentities($_REQUEST['symbol2_week13'],ENT_QUOTES);
$symbol3_week13 = htmlentities($_REQUEST['symbol3_week13'],ENT_QUOTES);


$weekofheading14 = htmlentities($_REQUEST['weekofheading14'],ENT_QUOTES);
$week14_desc= htmlentities($_REQUEST['week14_desc'],ENT_QUOTES);
$week14_of = htmlentities($_REQUEST['week14_of'],ENT_QUOTES);
$symbol1_week14 = htmlentities($_REQUEST['symbol1_week14'],ENT_QUOTES);
$symbol2_week14 = htmlentities($_REQUEST['symbol2_week14'],ENT_QUOTES);
$symbol3_week14 = htmlentities($_REQUEST['symbol3_week14'],ENT_QUOTES);


$weekofheading15 = htmlentities($_REQUEST['weekofheading15'],ENT_QUOTES);
$week15_desc= htmlentities($_REQUEST['week15_desc'],ENT_QUOTES);
$week15_of = htmlentities($_REQUEST['week15_of'],ENT_QUOTES);
$symbol1_week15 = htmlentities($_REQUEST['symbol1_week15'],ENT_QUOTES);
$symbol2_week15 = htmlentities($_REQUEST['symbol2_week15'],ENT_QUOTES);
$symbol3_week15 = htmlentities($_REQUEST['symbol3_week15'],ENT_QUOTES);







//$week1assessment = htmlentities($_REQUEST['week1assessment'],ENT_QUOTES);



 /*
	
         $strQuery="insert into weeklyinfo
                      (
                       fkcourseid,fkprofid,holiday, startdate, enddate, week1_desc, week1_of, symbol1, week2_desc, week2_of, symbol2,  week3_desc, week3_of, symbol3, week4_desc, week4_of, symbol4, week5_desc, week5_of, symbol5, week6_desc, week6_of, symbol6, week7_desc, week7_of, symbol7, week8_desc, week8_of, symbol8, week9_desc, week9_of, symbol9, week10_desc, week10_of, symbol10, week11_desc, week11_of, symbol11, week12_desc, week12_of, symbol12, week13_desc, week13_of, symbol13, week14_desc, week14_of, symbol14, week15_desc, week15_of, symbol15
                      )
                     values
                     (
                      $courseID, $FKPROFID , '$holiday_name', '$startdate1', '$enddate',  '$week1_desc', '$week1_of', '$symbol1', '$week2_desc', '$week2_of', '$symbol2',  '$week3_desc', '$week3_of', '$symbol3', '$week4_desc', '$week4_of', '$symbol4', '$week5_desc', '$week5_of', '$symbol5', '$week6_desc', '$week6_of', '$symbol6', '$week7_desc', '$week7_of', '$symbol7', '$week8_desc', '$week8_of', '$symbol8', '$week9_desc', '$week9_of', '$symbol9', '$week10_desc', '$week10_of', '$symbol10', '$week11_desc', '$week11_of', '$symbol11', '$week12_desc', '$week12_of', '$symbol12', '$week13_desc', '$week13_of', '$symbol13', '$week14_desc', '$week14_of', '$symbol14', '$week15_desc', '$week15_of', '$symbol15'
					 )
                    ";
                    */
  $sql= "INSERT INTO weeklyinfo
                      (
                       fkcourseid,fkprofid,holiday, startdate, enddate,";

  $sql_week1="week1_desc, week1_of, symbol1_week1, symbol2_week1, symbol3_week1,";

  $sql_week2="week2_desc, week2_of, symbol1_week2, symbol2_week2, symbol3_week2,";

  $sql_week3="week3_desc, week3_of, symbol1_week3, symbol2_week3, symbol3_week3,";

  $sql_week4="week4_desc, week4_of, symbol1_week4, symbol2_week4, symbol3_week4,";

  $sql_week5="week5_desc, week5_of, symbol1_week5, symbol2_week5, symbol3_week5,";

  $sql_week6="week6_desc, week6_of, symbol1_week6, symbol2_week6, symbol3_week6,";

  $sql_week7="week7_desc, week7_of, symbol1_week7, symbol2_week7, symbol3_week7,";

  $sql_week8="week8_desc, week8_of, symbol1_week8, symbol2_week8, symbol3_week8,";

  $sql_week9="week9_desc, week9_of, symbol1_week9, symbol2_week9, symbol3_week9,";

  $sql_week10="week10_desc, week10_of, symbol1_week10, symbol2_week10, symbol3_week10,";

  $sql_week11="week11_desc, week11_of, symbol1_week11, symbol2_week11, symbol3_week11,";

  $sql_week12="week12_desc, week12_of, symbol1_week12, symbol2_week12, symbol3_week12,";

  $sql_week13="week13_desc, week13_of, symbol1_week13, symbol2_week13, symbol3_week13,";

  $sql_week14="week14_desc, week14_of, symbol1_week14, symbol2_week14, symbol3_week14,";

  $sql_week15="week15_desc, week15_of, symbol1_week15, symbol2_week15, symbol3_week15)";

 	$sql_values = "values
                     (
                      $courseID, $FKPROFID , '$holiday_name', '$startdate1', '$enddate',
                      '$week1_desc', '$week1_of', '$symbol1_week1', '$symbol2_week1', '$symbol3_week1',
                      '$week2_desc', '$week2_of', '$symbol1_week2', '$symbol2_week2', '$symbol3_week2',
                      '$week3_desc', '$week3_of', '$symbol1_week3', '$symbol2_week3', '$symbol3_week3',
                      '$week4_desc', '$week4_of', '$symbol1_week4', '$symbol2_week4', '$symbol3_week4',
                      '$week5_desc', '$week5_of', '$symbol1_week5', '$symbol2_week5', '$symbol3_week5',
                      '$week6_desc', '$week6_of', '$symbol1_week6', '$symbol2_week6', '$symbol3_week6',
                      '$week7_desc', '$week7_of', '$symbol1_week7', '$symbol2_week7', '$symbol3_week7',
                      '$week8_desc', '$week8_of', '$symbol1_week8', '$symbol2_week8', '$symbol3_week8',
                      '$week9_desc', '$week9_of', '$symbol1_week9', '$symbol2_week9', '$symbol3_week9',
                      '$week10_desc','$week10_of','$symbol1_week10','$symbol2_week10','$symbol3_week10',
                      '$week11_desc', '$week11_of', '$symbol1_week11', '$symbol2_week11', '$symbol3_week11',
                      '$week12_desc', '$week12_of', '$symbol1_week12', '$symbol2_week12', '$symbol3_week12',
                      '$week13_desc', '$week13_of', '$symbol1_week13', '$symbol2_week13', '$symbol3_week13',
                      '$week14_desc', '$week14_of', '$symbol1_week14', '$symbol2_week14', '$symbol3_week14',
                      '$week15_desc', '$week15_of', '$symbol1_week15', '$symbol2_week15', '$symbol3_week15'
                      )"; 
  $strQuery = $sql. $sql_week1. $sql_week2. $sql_week3. $sql_week4. $sql_week5. $sql_week6. $sql_week7. $sql_week8. $sql_week9
  				.$sql_week10. $sql_week11. $sql_week12. $sql_week13. $sql_week14. $sql_week15. $sql_values;
		 
 echo $strQuery; exit;
		 $conn->query($strQuery);
		
		 header("Location: mainpage.php");
		 exit;

	

?>