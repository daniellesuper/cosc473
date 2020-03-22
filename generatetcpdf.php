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


//
//
//
/*
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'solid' => 4, 'color' => array(213,209,209)));
$pdf->SetFillColor(213,209,209);

// $text = 'Week of: '.$bar[week1_of] .'\n'. 'Description: ' .$bar[week1_desc].'<br> symbol: '. $bar[symbol1_week1]. $bar[symbol2_week1]. $bar[symbol3_week1].'<br><br>';
$text = "Week of: ".$bar[week1_of] ."\n" . 'Description: ' .$bar[week1_desc]."\nsymbol: ". $bar[symbol1_week1]. $bar[symbol2_week1]. $bar[symbol3_week1]."\n\n";
$pdf->MultiCell(45, 45, $text, 1, 'L', 1, 0, '', '', true);

$text = "Week of: ".$bar[week2_of] ."\n" . 'Description: ' .$bar[week2_desc]."\nsymbol: ". $bar[symbol1_week2]. $bar[symbol2_week2]. $bar[symbol3_week2]."\n\n";
$pdf->MultiCell(45, 45, $text, 1, 'L', 1, 0, '', '', true);

$text = "Week of: ".$bar[week3_of] ."\n" . 'Description: ' .$bar[week3_desc]."\nsymbol: ". $bar[symbol1_week3]. $bar[symbol2_week3]. $bar[symbol3_week3]."\n\n";
$pdf->MultiCell(45, 45, $text, 1, 'L', 1, 0, '', '', true);

$text = "Week of: ".$bar[week3_of] ."\n" . 'Description: ' .$bar[week3_desc]."\nsymbol: ". $bar[symbol1_week3]. $bar[symbol2_week3]. $bar[symbol3_week3]."\n\n";
$pdf->MultiCell(45, 45, $text, 1, 'L', 1, 0, '', '', true);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
//
$pdf->Ln(4);
*/

// enter an if else for 2 & 3 day a week classes. 
// if 2 day - $subtable2day else - $subtable3day
// i apologize about hard coding in week days, just needed to see spacing
/*
if($row[meetingDays] == "TTR"){


$subtable2day='
<table  cellspacing="2" cellpadding="2">
	<tr>
		<td>T
		'.$bar[symbol1_week1].'
		</td>
		<td>TH
		'.$bar[symbol2_week1].'
		</td>
	</tr>
</table>
';
} else {

if($row[meetingDays] == "MWF"){

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
	}// if bracket
}
*/
// subtable is the days boxes holding the shape images, can be 2day or 3day aweek
//$subtable = $subtable3day; // used for MWF
//$subtable2 = $subtable2day; //used for TTR

if ($row[meetingDays] == "TTR"){

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
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week1].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week1].'
		</td>
	</tr>
</table>
			
		</td>
		<td>
			<h1>2</h1><br>
			<h4>Week Of '.$bar[week2_of].'</h4><br>
			<p>'.$bar[week2_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week2].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week2].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>3</h1><br>
			<h4>Week Of '.$bar[week3_of].'</h4><br>
			<p>'.$bar[week3_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week3].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week3].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>4</h1><br>
			<h4>Week Of '.$bar[week4_of].'</h4><br>
			<p>'.$bar[week4_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week4].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week4].'
		</td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>
			<h1>5</h1><br>
			<h4>Week Of '.$bar[week5_of].'</h4><br>
			<p>'.$bar[week5_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week5].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week5].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>6</h1><br>
			<h4>Week Of '.$bar[week6_of].'</h4><br>
			<p>'.$bar[week6_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week6].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week6].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>7</h1><br>
			<h4>Week Of '.$bar[week7_of].'</h4><br>
			<p>'.$bar[week7_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week7].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week7].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>8</h1><br>
			<h4>Week Of '.$bar[week8_of].'</h4><br>
			<p>'.$bar[week8_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week8].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week8].'
		</td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>
			<h1>9</h1><br>
			<h4>Week Of '.$bar[week9_of].'</h4><br>
			<p>'.$bar[week9_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week9].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week9].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>10</h1><br>
			<h4>Week Of '.$bar[week10_of].'</h4><br>
			<p>'.$bar[week10_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week10].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week10].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>11</h1><br>
			<h4>Week Of '.$bar[week11_of].'</h4><br>
			<p>'.$bar[week11_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week11].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week11].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>12</h1><br>
			<h4>Week Of '.$bar[week12_of].'</h4><br>
			<p>'.$bar[week12_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week12].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week12].'
		</td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>
			<h1>13</h1><br>
			<h4>Week Of '.$bar[week13_of].'</h4><br>
			<p>'.$bar[week13_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week13].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week13].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>14</h1><br>
			<h4>Week Of '.$bar[week14_of].'</h4><br>
			<p>'.$bar[week14_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week14].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week14].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>15</h1><br>
			<h4>Week Of '.$bar[week15_of].'</h4><br>
			<p>'.$bar[week15_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>T</b><br>
		'.$bar[symbol1_week15].'  
		</td>
		<td><b>TR</b><br>
		'.$bar[symbol2_week15].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>Key</h1><br>
			<p>'.$row[symbol1]." ".$row[assign1].'</p>
			<p>'.$row[symbol2]." ".$row[assign2].'</p>
			<p>'.$row[symbol3]." ".$row[assign3].'</p>
			<p>'.$row[symbol4]." ".$row[assign4].'</p>
			<p>'.$row[symbol5]." ".$row[assign5].'</p>
			<p>'.$row[symbol6]." ".$row[assign6].'</p>
			<p>'.$row[symbol7]." ".$row[assign7].'</p>
			<p>'.$row[symbol8]." ".$row[assign8].'</p>
			<p>'.$row[symbol9]." ".$row[assign9].'</p>
			<p>'.$row[symbol10]." ".$row[assign10].'</p>
		</td>
	</tr>
</table>
';

$pdf->writeHTML($html, true, false, true, false, '');

}// if bracket/ end of TTR portion
else { // start of MWF portion

if($row[meetingDays] == "MWF"){

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
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week1].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week1].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week1].'
		</td>
	</tr>
</table>
			
		</td>
		<td>
			<h1>2</h1><br>
			<h4>Week Of '.$bar[week2_of].'</h4><br>
			<p>'.$bar[week2_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week2].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week2].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week2].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>3</h1><br>
			<h4>Week Of '.$bar[week3_of].'</h4><br>
			<p>'.$bar[week3_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week3].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week3].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week3].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>4</h1><br>
			<h4>Week Of '.$bar[week4_of].'</h4><br>
			<p>'.$bar[week4_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week4].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week4].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week4].'
		</td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>
			<h1>5</h1><br>
			<h4>Week Of '.$bar[week5_of].'</h4><br>
			<p>'.$bar[week5_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week5].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week5].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week5].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>6</h1><br>
			<h4>Week Of '.$bar[week6_of].'</h4><br>
			<p>'.$bar[week6_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week6].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week6].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week6].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>7</h1><br>
			<h4>Week Of '.$bar[week7_of].'</h4><br>
			<p>'.$bar[week7_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week7].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week7].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week7].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>8</h1><br>
			<h4>Week Of '.$bar[week8_of].'</h4><br>
			<p>'.$bar[week8_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week8].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week8].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week8].'
		</td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>
			<h1>9</h1><br>
			<h4>Week Of '.$bar[week9_of].'</h4><br>
			<p>'.$bar[week9_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week9].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week9].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week9].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>10</h1><br>
			<h4>Week Of '.$bar[week10_of].'</h4><br>
			<p>'.$bar[week10_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week10].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week10].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week10].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>11</h1><br>
			<h4>Week Of '.$bar[week11_of].'</h4><br>
			<p>'.$bar[week11_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week11].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week11].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week11].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>12</h1><br>
			<h4>Week Of '.$bar[week12_of].'</h4><br>
			<p>'.$bar[week12_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week12].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week12].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week12].'
		</td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>
			<h1>13</h1><br>
			<h4>Week Of '.$bar[week13_of].'</h4><br>
			<p>'.$bar[week13_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week13].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week13].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week13].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>14</h1><br>
			<h4>Week Of '.$bar[week14_of].'</h4><br>
			<p>'.$bar[week14_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week14].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week14].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week14].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>15</h1><br>
			<h4>Week Of '.$bar[week15_of].'</h4><br>
			<p>'.$bar[week15_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>M</b><br>
		'.$bar[symbol1_week15].'  
		</td>
		<td><b>W</b><br>
		'.$bar[symbol2_week15].'
		</td>
		<td><b>F</b><br>
		'.$bar[symbol3_week15].'
		</td>
	</tr>
</table>
		</td>
		<td>
			<h1>Key</h1><br>
			<p>'.$row[symbol1]." ".$row[assign1].'</p>
			<p>'.$row[symbol2]." ".$row[assign2].'</p>
			<p>'.$row[symbol3]." ".$row[assign3].'</p>
			<p>'.$row[symbol4]." ".$row[assign4].'</p>
			<p>'.$row[symbol5]." ".$row[assign5].'</p>
			<p>'.$row[symbol6]." ".$row[assign6].'</p>
			<p>'.$row[symbol7]." ".$row[assign7].'</p>
			<p>'.$row[symbol8]." ".$row[assign8].'</p>
			<p>'.$row[symbol9]." ".$row[assign9].'</p>
			<p>'.$row[symbol10]." ".$row[assign10].'</p>
		</td>
	</tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
}
}

{/**

// WEEK 1 INFO
$html = '<br><br><br>'.'Week of: '.$bar[week1_of] .'<br>'. 'Description: ' .$bar[week1_desc].'<br> symbol: '. $bar[symbol1_week1]. $bar[symbol2_week1]. $bar[symbol3_week1].'<br><br>';
$pdf->Multicell($html, true,false,true,false,'');
// end of week 1 info 



// WEEK 2 INFO
$html = 'Week of: '.$bar[week2_of]. '<br>'. 'Description: '.$bar[week2_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week2]. $bar[symbol2_week2]. $bar[symbol3_week2].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 2 info 


//WEEK 3 INFO
$html = 'Week of: '.$bar[week3_of].'<br>'. 'Description: '.$bar[week3_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week3]. $bar[symbol2_week3]. $bar[symbol3_week3].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 3 info


// WEEK 4 INFO
$html = 'Week of: '.$bar[week4_of]. '<br>'. 'Description: '.$bar[week4_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week4] .$bar[symbol2_week4] .$bar[symbol3_week4].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 4 info


//WEEK 5 INFO
$html = 'Week of: '.$bar[week5_of]. '<br>'. 'Description: '.$bar[week5_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week5] .$bar[symbol2_week5]. $bar[symbol3_week5].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 5 info


//WEEK 6 INFO
$html = 'Week of: '.$bar[week6_of] . '<br>' . 'Description: '.$bar[week6_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week6] .$bar[symbol2_week6] .$bar[symbol3_week6].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 6 info 

//WEEK 7 INFO
$html = 'Week of: '.$bar[week7_of]. '<br>'. 'Description: '.$bar[week7_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week7] .$bar[symbol2_week7] .$bar[symbol3_week7].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 7 info


//WEEK 8 INFO
$html = 'Week of: '.$bar[week8_of]. '<br> Description: '.$bar[week8_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week8] .$bar[symbol2_week8]. $bar[symbol3_week8].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 8 info


//WEEK 9 INFO
$html = 'Week of: '.$bar[week9_of]. '<br>'. 'Description: '.$bar[week9_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week9] .$bar[symbol2_week9] .$bar[symbol3_week9].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end week 9 info

//WEEK 10 INFO
$html = 'Week of: '.$bar[week10_of] .'<br> Description: '.$bar[week10_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week10].$bar[symbol2_week10]. $bar[symbol3_week10].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 10 info


//WEEK 11 INFO
$html = 'Week of: '.$bar[week11_of] .'<br> Description: '.$bar[week11_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week11] .$bar[symbol2_week11] .$bar[symbol3_week11].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 11 info


//WEEK 12 INF0
$html = 'Week of: '.$bar[week12_of] .'<br> Description: '.$bar[week12_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week12] .$bar[symbol2_week12] .$bar[symbol3_week12].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of weeek 12 info


//WEEK 13 INFO
$html = 'Week of: '.$bar[week13_of] .'<br> Description: '.$bar[week13_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week13] .$bar[symbol2_week13]. $bar[symbol3_week13].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
//end of week 13 info


//WEEK 14 INFO
$html = 'Week of: '.$bar[week14_of] .'<br> Description: '.$bar[week14_desc];
$pdf->writeHTML($html, true,false,true,false,'');

$html = 'symbol: '.$bar[symbol1_week14]. $bar[symbol2_week14] .$bar[symbol3_week14].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 14 info


// WEEK 15 INFO
$html = 'Week of: '.$bar[week15_of]. '<br>'.' Description: '.$bar[week15_desc];
$pdf->writeHTML($html, true,false,true,false,'');



$html = 'symbol: '.$bar[symbol1_week15]. $bar[symbol2_week15]. $bar[symbol3_week15].'<br><br>';
$pdf->writeHTML($html, true,false,true,false,'');
// end of week 15 info


// KEY INFO FOR SYMBOLS AND ASSIGNMENTS CORRESPONDING TO SYMBOL
$html = "Key:<br> $row[symbol1] $row[assign1]<br> $row[symbol2] $row[assign2] <br> $row[symbol3] $row[assign3]<br> 
				$row[symbol5] $row[assign5]<br> $row[symbol6] $row[assign6]<br> $row[symbol7] $row[assign7]<br>
					$row[symbol8] $row[assign8]<br> $row[symbol9] $row[assign9]<br> $row[symbol10] $row[assign10]<br>";
$pdf->writeHTML($html, true,false,true,false,'');
 */}
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