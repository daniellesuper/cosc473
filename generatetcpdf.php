<?php
require("session_info.php");
include ('library/tcpdf.php');
error_reporting(0);

$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed".$conn->connect_error);
}
error_reporting(0);

$FKPROFID = $_SESSION["FKPROFID"];
$courseID = $_GET["courseID"];

$sql1 = "SELECT  meetingDays, symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10 FROM courseinfo WHERE PKID = $_GET[courseID]";
 //echo $sql1; exit;
$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

//echo $sql;exit;
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

if($result1->num_rows > 0) {
  //used for profinfo items
  // output data of each row
  $row = $result1->fetch_assoc(); 

if($result2->num_rows > 0){
    $bar = $result2->fetch_assoc();
  }
//echo $row;exit;

// make TCPDF object
$pdf = new TCPDF('P', "mm",'A4');

// remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->setTitle('Weekly Schedule');

// add 1st page
$pdf->AddPage();

$html = '<img src="images/weeklyschedule.png" alt="weeklyschedule" align="center">';
$pdf->writeHTML($html, true,false,true,false,'');

$html = "Break: $bar[holiday] | Date To: $bar[startdate] | Date End: $bar[enddate]<br><br>"; 
$pdf->writeHTML($html, true,false,true,false,'');

$html = "Week of: $bar[week1_of] <br> Description: $bar[week1_desc]";
$pdf->writeHTML($html, true,false,true,false,'');

$html = "symbol: $row[symbol1]";
$pdf->writeHTML($html, true,false,true,false,'');

//pie chart code
/*
$pdf->Write(0, 'Grades');

$xc = 105;
$yc = 100;
$r = 50;

$pdf->SetFillColor(0, 0, 255);
$pdf->PieSector($xc, $yc, $r, 20, 120, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 120, 250, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(255,255,255);
$pdf->Text(105, 65, 'BLUE');
$pdf->Text(60, 95, 'GREEN');
$pdf->Text(120, 115, 'RED');

*/
// add 2nd page
$pdf->AddPage();
// add content
$pdf->Cell(190,20,'Weekly Schedule', 1, 1, 'C');



/*
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
*/
//output


$pdf->output('tcpdf.pdf', 'I');
$conn->close(); }// end of if else for row and bar
?>
<html>
	<head>
		<link href="weeklyschedule.css" type="text/css" rel="stylesheet" />
		</head>
	<body>
	</body>
</html>



