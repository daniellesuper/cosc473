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

$sql1 = "SELECT  meetingDays, symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10, assign1, assign2, assign3, assign4, assign5, assign6, assign7, assign8, assign9, assign10 FROM courseinfo WHERE PKID = $_GET[courseID]";
 //echo $sql1; exit;
$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate, symbol1_week1, symbol2_week1, symbol3_week1, symbol1_week2, symbol2_week2, symbol3_week2, symbol1_week3, symbol2_week3, symbol3_week3, symbol1_week4, symbol2_week4, symbol3_week4, symbol1_week5, symbol2_week5, symbol3_week5, symbol1_week6, symbol2_week6, symbol3_week6, symbol1_week7, symbol2_week7, symbol3_week7, symbol1_week8, symbol2_week8, symbol3_week8, symbol1_week9, symbol2_week9	, symbol3_week9, symbol1_week10, symbol2_week10, symbol3_week10, symbol1_week11, symbol2_week11, symbol3_week11, symbol1_week12, symbol2_week12, symbol3_week12, symbol1_week13, symbol2_week13, symbol3_week13, symbol1_week14, symbol2_week14, symbol3_week14, symbol1_week15, symbol2_week15, symbol3_week15	FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

//echo $sql2;exit;
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

// linking the css to PDF but reads the css
//$html = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/473/info-syllabus/cosc473/cosc473/weeklyschedule.css');

// add 1st page
$pdf->AddPage();

//$pdf->writeHTML($html, true,false,true,false,'');

$html = '<img src="images/weeklyschedule.png" alt="weeklyschedule" align="center">';
$pdf->writeHTML($html, true,false,true,false,'');


// $html = '<span style = "color: red"; align = "center"> Break: '
//					. $bar[holiday]. ' | '. 'Date To: '. $bar[startdate]. ' | '. 'Date End: '. $bar[enddate].'</span><br>'; 

$html = '<span style = "color: red"; align = "center">'.$bar[holiday].' Break: '. $bar[startdate]. ' to '. $bar[enddate].'</span>'; 
$pdf->writeHTML($html, true,false,true,false,'');


$html = '<span style = "color:red"; align = "center"><b> Class Meeting Days: ' .$row[meetingDays] .'</b></span><br>';
$pdf->writeHTML($html, true,false,true,false,'');



// enter an if else for 2 & 3 day a week classes. 
// if 2 day - $subtable2day else - $subtable3day
// i apologize about hard coding in week days, just needed to see spacing
$subtable2day='
<table  cellspacing="2" cellpadding="2">
	<tr>
		<td>T
		</td>
		<td>TH
		</td>
	</tr>
</table>
';
$subtable3day='
<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b>
		'.$bar[symbol1_week1].'  
		</td>
		<td><b>W</b>
		'.$bar[symbol2_week1].'
		</td>
		<td><b>F</b>
		'.$bar[symbol3_week1].'
		</td>
	</tr>
</table>
';

// subtable is the days boxes holding the shape images, can be 2day or 3day aweek
$subtable = $subtable3day;

$html = '
<style>
table.first {
	table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
	border: 3px solid purple;
}
td {
	border: 1px solid black;
	background-color: lightgrey;
}
</style>
<table cellspacing="10" cellpadding="4" >
	<tr>
		<td>
			<h1>1</h1><br>
			<h4>Week Of '.$bar[week1_of].'</h4><br>
			<p>'.$bar[week1_desc].'</p>
			'.$subtable.'
			
		</td>
		<td>
			<h1>2</h1><br>
			<h4>Week Of '.$bar[week2_of].'</h4><br>
			<p>'.$bar[week2_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>3</h1><br>
			<h4>Week Of '.$bar[week3_of].'</h4><br>
			<p>'.$bar[week3_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>4</h1><br>
			<h4>Week Of '.$bar[week4_of].'</h4><br>
			<p>'.$bar[week4_desc].'</p>
			'.$subtable.'
		</td>
	</tr>
	<tr>
		<td>
			<h1>5</h1><br>
			<h4>Week Of '.$bar[week5_of].'</h4><br>
			<p>'.$bar[week5_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>6</h1><br>
			<h4>Week Of '.$bar[week6_of].'</h4><br>
			<p>'.$bar[week6_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>7</h1><br>
			<h4>Week Of '.$bar[week7_of].'</h4><br>
			<p>'.$bar[week7_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>8</h1><br>
			<h4>Week Of '.$bar[week8_of].'</h4><br>
			<p>'.$bar[week8_desc].'</p>
			'.$subtable.'
		</td>
	</tr>
	<tr>
		<td>
			<h1>9</h1><br>
			<h4>Week Of '.$bar[week9_of].'</h4><br>
			<p>'.$bar[week9_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>10</h1><br>
			<h4>Week Of '.$bar[week10_of].'</h4><br>
			<p>'.$bar[week10_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>11</h1><br>
			<h4>Week Of '.$bar[week11_of].'</h4><br>
			<p>'.$bar[week11_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>12</h1><br>
			<h4>Week Of '.$bar[week12_of].'</h4><br>
			<p>'.$bar[week12_desc].'</p>
			'.$subtable.'
		</td>
	</tr>
	<tr>
		<td>
			<h1>13</h1><br>
			<h4>Week Of '.$bar[week13_of].'</h4><br>
			<p>'.$bar[week13_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>14</h1><br>
			<h4>Week Of '.$bar[week14_of].'</h4><br>
			<p>'.$bar[week14_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>15</h1><br>
			<h4>Week Of '.$bar[week15_of].'</h4><br>
			<p>'.$bar[week15_desc].'</p>
			'.$subtable.'
		</td>
		<td>
			<h1>Key</h1><br>
		</td>
	</tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');


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