<?php
// include library
include ('library/tcpdf.php');
require("session_info.php");

error_reporting(0);

$FKPROFID = $_SESSION["FKPROFID"];
$courseID = $_GET['courseID'];


$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}
error_reporting(0);

$sql1 = "SELECT  meetingDays FROM courseinfo WHERE PKID = $_GET[courseID]";
 //echo $sql1; exit;
$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

// make TCPDF object
$pdf = new TCPDF('P', "mm",'A4');

// remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->setTitle('Weekly Schedule');


// add page
$pdf->AddPage();

// add content
$pdf->Cell(190,10,'Weekly Schedule', 1, 1, 'C');


function fetch_data(){

	$output = '';
	$connect = mysqli_connect("localhost", "root", "", "info-syllabus");
	$sql = "SELECT  meetingDays FROM courseinfo WHERE PKID = $_GET[courseID]";
	$result = mysqli_fetch_array($connect, $sql);

	while($row = mysqli_fetch_array($result)){
		$output .= '<tr>
						<td>' .$row["meetingDays"]. '</td>


					</tr>';
	}

	return $output;
}


//output

$pdf->output('info-syllabus.pdf', 'I');
?>

<html>

<body>

</body>

</html>



