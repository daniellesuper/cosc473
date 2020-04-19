<?php
// session info
require("session_info.php");
include('library/tcpdf.php');
error_reporting(0);
$servername="localhost";
$dbname="infosyll_info-syllabus";
$username="infosyll_infosyllteam";
$password="#67ivGL#,}yG";
$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed".$conn->connect_error);
}
error_reporting(0);

// database queries
$FKPROFID = $_SESSION["FKPROFID"]; 
$courseID = $_GET["courseID"];
$sql1 = "SELECT  meetingDays, symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10, assign1, assign2, assign3, assign4, assign5, assign6, assign7, assign8, assign9, assign10,topicname1,topicname2,topicname3,topicname4,topicname5,topicname6,topicname7,topicname8, topicname9, topicname10, pointvalue1, pointvalue2, pointvalue3, pointvalue4, pointvalue5, pointvalue6, pointvalue7, pointvalue8, pointvalue9, pointvalue10 FROM courseinfo WHERE PKID = $_GET[courseID]";

$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate,
custombreakname, customstartdate, customenddate, symbol1_week1, symbol2_week1, symbol3_week1, symbol1_week2, symbol2_week2, symbol3_week2, symbol1_week3, symbol2_week3, symbol3_week3, symbol1_week4, symbol2_week4, symbol3_week4, symbol1_week5, symbol2_week5, symbol3_week5, symbol1_week6, symbol2_week6, symbol3_week6, symbol1_week7, symbol2_week7, symbol3_week7, symbol1_week8, symbol2_week8, symbol3_week8, symbol1_week9, symbol2_week9 , symbol3_week9, symbol1_week10, symbol2_week10, symbol3_week10, symbol1_week11, symbol2_week11, symbol3_week11, symbol1_week12, symbol2_week12, symbol3_week12, symbol1_week13, symbol2_week13, symbol3_week13, symbol1_week14, symbol2_week14, symbol3_week14, symbol1_week15, symbol2_week15, symbol3_week15 
FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

$sql3 = "SELECT title, fullname, officeaddress, email, officephone, monday, tuesday, wednesday, thursday, friday FROM profinfo WHERE PKID = $FKPROFID;";
$sql4 = "SELECT coursecode, coursename FROM courseinfo WHERE PKID = $_GET[courseID]";

$sql5 = "SELECT coursecode, coursename, bookname, bookisbn, bookAuthor, importantpoints FROM courseinfo WHERE PKID = $_GET[courseID]";

$result1 = $conn->query($sql1); // meeting days and symbol assignments
$result2 = $conn->query($sql2); // weekly info
$result3 = $conn->query($sql3); // profinfo
$result4 = $conn->query($sql4); // courseinfo
$result5 = $conn->query($sql5);

if($result1->num_rows > 0) {
  //used for profinfo items
  // output data of each row
  $row = $result1->fetch_assoc(); 

if($result2->num_rows > 0){
    $bar = $result2->fetch_assoc();
  }

if($result3->num_rows > 0){
    $bar3 = $result3->fetch_assoc();
  } 
if($result4->num_rows > 0){
    $bar4 = $result4->fetch_assoc();
  } 
if($result5->num_rows > 0){
    $bar5 = $result5->fetch_assoc();
  } 

//
// syllabus formatting start
//

// make TCPDF object
$pdf = new TCPDF('P', "mm",'A4');
$pdf->SetMargins(5, 5, 5);
// remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->setTitle('Info Syllabus');
// add page 1
$pdf->AddPage();

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$text = '';
// header box
$titlename = $bar3["title"]." ".$bar3["fullname"]." ";
$coursenameDecode = $bar4["coursename"];
$course = $bar4["coursecode"]."\n".html_entity_decode($coursenameDecode);

//$pdf->SetXY(100, 205);
//$pdf->Image('images/house.png', '', '', 6, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
$officehours = "Office Hours: "."\n"."Mon: ".$bar3["monday"]."\n"."Tues: ".$bar3["tuesday"]."\n"."Wed: ".$bar3["wednesday"]."\n"."Thurs: ".$bar3["thursday"]."\n"."Fri: ".$bar3["friday"];

$officeinfo = "Faculty office"."\n".$bar3["officeaddress"]."\n"."Contact Email"."\n".$bar3["email"]."\n"."Office Phone"."\n".$bar3["officephone"];

$pdf->SetFillColor(178, 178, 178);
$pdf->MultiCell(200, 62, $text, 0, 'C', 1, 1, '', '', true);

// course info in the bottom banner
//$pdf->SetFillColor(178, 0, 178);
//$pdf->MultiCell(35, 30,$course, 1, 'C', 0, 2, 35, 37, false,0, false, true, 40, 'C');

// WHITE BOX FOR THE OFFICE INFO WITH DATA INCLUDED
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(35, 30,$officeinfo, 0, 'C', 1, 2, 125, 17, true,0, false, true, 40, 'B');


// WHITE BOX FOR THE OFFICE HOURS WITH DATA
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(35, 30,$officehours, 0, 'C', 1, 2, 165, 17, true,0, false, true, 40, 'B');

// book info
$bookinfo = $bar5["bookname"]."\n".$bar5["bookAuthor"]."\n".$bar5["bookisbn"];
$pdf->SetFillColor(230, 230, 230);
$pdf->MultiCell(100, 61, 'Book Info '."\n".$bookinfo, 0, 'C', 1, 0, 5, 67, true,0, false, true, 40, 'B');

//
// THIS IS THE LEFT PART OF BANNER IN TOP LEFT OF PDF
$pdf->SetXY(5, 10);
$pdf->Image('images/bannerleft.png', '', '', 70, 15, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS IS THE TEXT ON THE TOP BANNER FOR PROF INFO
$pdf->SetFont('helvetica','C',12);
$pdf->MultiCell(55, 10,$titlename, 0, 'C', 0, 2, 15, 13, true,0, false, true, 40, 'C');
//

// THIS IS THE MIDDLE PART OF THE BANNER
$pdf->SetXY(25, 23);
$pdf->Image('images/bannermiddle.png', '', '', 50, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//
// THIS THE RIGHT SIDE OF THE BANNER IN TOP LEFT OF PDF // BOTTOM WITH RIBBON ON RIGHT SIDE
$pdf->SetXY(25, 35);
$pdf->Image('images/bannerright.png', '', '', 70, 15, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// TEXT IN THE BOTTOM BANNER FOR COURSE INFO
$course= str_replace( "&#039;", "'", $course );
$pdf->MultiCell(75, 10,$course, 0, 'L', 0, 2, 30, 37, true,0, false, true, 40, 'C');

// THIS IS THE IMPORTANT POINT SECTION
$pdf->SetXY(106, 68);
$pdf->Image('images/imppointsbanner.png', '', '', 100, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS THE PENCIL IMAGE IN THE BOOK INFO SECTION
$pdf->SetXY(77, 77);
$pdf->Image('images/pencil.png', '', '', 20, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS IS THE BOOK IMAGE IN THE BOOK SECTION
$pdf->SetXY(7, 105);
$pdf->Image('images/book.png', '', '', 20, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// imp points
$importantpoints = $bar5["importantpoints"];
$importantpoints = html_entity_decode($importantpoints);
$html = '<span align = "right">'.$importantpoints.'</span>';
$pdf->writeHTML($html, true,false,true,false,'');


// pie chart

$pointvalue1 = $row["pointvalue1"];
$pointvalue2 = $row["pointvalue2"];
$pointvalue3 = $row["pointvalue3"];
$pointvalue4 = $row["pointvalue4"];
$pointvalue5 = $row["pointvalue5"];
$pointvalue6 = $row["pointvalue6"];
$pointvalue7 = $row["pointvalue7"];
$pointvalue8 = $row["pointvalue8"];
$pointvalue9 = $row["pointvalue9"];
$pointvalue10 = $row["pointvalue10"];


$pdf->SetFillColor(178, 178, 178);
$pdf->MultiCell(100, 145, 'Pie Chart'."\n", 0, 'C', 1, 0, '5', '130', true);

// HOUSE IMAGE AT TOP RIGHT OF PAGE 1
$pdf->SetXY(177, 10);
$pdf->Image('images/house.png', '', '', 10, 10, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//ENVELOPE IMAGE TO THE LEFT OF THE HOUSE IMAGE TOP RIGHT OF PAGE ON
$pdf->SetXY(137, 11);
$pdf->Image('images/email-logo.png', '', '', 10, 10, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS IS THE BANNER FOR GRADES
$pdf->SetXY(10, 130);
$pdf->Image('images/gradesbanner.png', '', '', 90, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// Start of the pie chart
$pointvalue1 = $row["pointvalue1"];
$pointvalue2 = $row["pointvalue2"];
$pointvalue3 = $row["pointvalue3"];
$pointvalue4 = $row["pointvalue4"];
$pointvalue5 = $row["pointvalue5"];
$pointvalue6 = $row["pointvalue6"];
$pointvalue7 = $row["pointvalue7"];
$pointvalue8 = $row["pointvalue8"];
$pointvalue9 = $row["pointvalue9"];
$pointvalue10 = $row["pointvalue10"];

$assign1 = $row["assign1"];

$xc = 55; // start of x axis
$yc = 200; // start of y axis
$r = 40; // radius length of circle

$pdf->SetFillColor(51, 153, 255);
$pdf->PieSector($xc, $yc, $r, 0, $pointvalue1 * 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(153, 0, 0);
$pdf->PieSector($xc, $yc, $r, $pointvalue1 * 3.6, ($pointvalue1 + $pointvalue2) * 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2) * 3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3) * 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 255, 255);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2 + $pointvalue3) *3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4) * 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(102, 0, 102);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4) * 3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5)* 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 255, 255);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5) * 3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5+$pointvalue6)* 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 153, 51);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5 + $pointvalue6) * 3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5+$pointvalue6 + $pointvalue7)* 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(139, 69, 19);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5 + $pointvalue6 + $pointvalue7) * 3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5+$pointvalue6 + $pointvalue7 + $pointvalue8)* 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 0, 0);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5 + $pointvalue6 + $pointvalue7 + $pointvalue8) * 3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5+$pointvalue6 + $pointvalue7 + $pointvalue8 + $pointvalue9)* 3.6, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 102, 255);
$pdf->PieSector($xc, $yc, $r, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5 + $pointvalue6 + $pointvalue7 + $pointvalue8 + $pointvalue9) * 3.6, ($pointvalue1 + $pointvalue2 + $pointvalue3 + $pointvalue4 + $pointvalue5+$pointvalue6 + $pointvalue7 + $pointvalue8 + $pointvalue9 + $pointvalue10)* 3.6, 'FD', false, 0, 2);

//grade breakdown
//PRINT IMAGE IF THERES AN ASSIGNMENT
if($row[pointvalue1] != "0"){
	$image = 'images/rectangle1.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 208);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);


if($row[pointvalue2] != "0"){
	$image = 'images/rectangle2.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 215);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);


if($row[pointvalue3] != "0"){
	$image = 'images/rectangle3.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 222);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

if($row[pointvalue4] != "0"){
	$image = 'images/rectangle4.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 229);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

if($row[pointvalue5] != "0"){
	$image = 'images/rectangle5.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 236);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

if($row[pointvalue6] != "0"){
	$image = 'images/rectangle6.png';
}
else {
	$image = "";
}
$pdf->SetXY(115, 243);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

if($row[pointvalue7] != "0"){
	$image = 'images/rectangle7.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 250);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

if($row[pointvalue8] != "0"){
	$image = 'images/rectangle8.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 257);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

if($row[pointvalue9] != "0"){
	$image = 'images/rectangle9.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 264);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

if($row[pointvalue10] != "0"){
	$image = 'images/rectangle10.png';
} else {
	$image = "";
}
$pdf->SetXY(115, 271);
$pdf->Image($image, '', '', 15, 5, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// PRINTS ASSIGNMENT IF THERE IS ONE IF NOT PRINTS NOTHING
if ($row[pointvalue1] == "0"){
$row[pointvalue1] = '';;}

if ($row[pointvalue2] == "0"){
$row[pointvalue2] = '';;}

if ($row[pointvalue3] == "0"){
$row[pointvalue3] = '';;}

if ($row[pointvalue4] == "0"){
$row[pointvalue4] = '';;}

if ($row[pointvalue5] == "0"){
$row[pointvalue5] = '';;}

if ($row[pointvalue6] == "0"){
$row[pointvalue6] = '';;}

if ($row[pointvalue7] == "0"){
$row[pointvalue7] = '';;}

if ($row[pointvalue8] == "0"){
$row[pointvalue8] = '';;}

if ($row[pointvalue9] == "0"){
$row[pointvalue9] = '';;}

if ($row[pointvalue10] == "0"){
$row[pointvalue10] = '';;}

$pdf->SetFillColor(178, 178, 178);
$pdf->MultiCell(100, 10, 'Grade Breakdown ', 0, 'C', 1, 0, 105, 200, true);

$topicname = $row["topicname1"]. " ".$row["pointvalue1"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 207, true);

$topicname = $row["topicname2"]." ".$row["pointvalue2"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 214, true);

$topicname = $row["topicname3"]." ".$row["pointvalue3"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 221, true);

$topicname = $row["topicname4"]." ".$row["pointvalue4"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 228, true);

$topicname = $row["topicname5"]." ".$row["pointvalue5"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 235, true);

$topicname = $row["topicname6"]." ".$row["pointvalue6"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 242, true);

$topicname = $row["topicname7"]." ".$row["pointvalue7"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 249, true);

$topicname = $row["topicname8"]." ".$row["pointvalue8"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 256, true);

$topicname = $row["topicname9"]." ".$row["pointvalue9"]."\n";
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 263, true);

$topicname = $row["topicname10"]." ".$row["pointvalue10"];
$pdf->MultiCell(100, 10, $topicname, 0, 'C', 1, 0, 105, 270, true);


// END OF PAGE 1 OF PDF

// add 2nd page
$pdf->AddPage();
//$pdf->writeHTML($html, true,false,true,false,'');
$html = '<img src="images/weeklyschedule.png" alt="weeklyschedule" align="center">';
$pdf->writeHTML($html, true,false,true,false,'');
// holiday break
$html = '<span style = "color: red"; align = "center">'.$bar[holiday].' Break: '. $bar[startdate]. ' to '. $bar[enddate].'</span>'; 
$pdf->writeHTML($html, true,false,true,false,'');
// custom break 
$html = '<span style = "color: red"; align = "center">'.$bar[custombreakname].' Break: '. $bar[customstartdate]. ' to '. $bar[customenddate].'</span>'; 
$pdf->writeHTML($html, true,false,true,false,'');
//
// start of the if statememt for outputting correct # of boxes and info
//
$sql3 = "SELECT  symbol1_week1, symbol2_week1, symbol3_week1, symbol1_week2, symbol2_week2, symbol3_week2, symbol1_week3, symbol2_week3, symbol3_week3, symbol1_week4, symbol2_week4, symbol3_week4, symbol1_week5, symbol2_week5, symbol3_week5, symbol1_week6, symbol2_week6, symbol3_week6, symbol1_week7, symbol2_week7, symbol3_week7, symbol1_week8, symbol2_week8, symbol3_week8, symbol1_week9, symbol2_week9	, symbol3_week9, symbol1_week10, symbol2_week10, symbol3_week10, symbol1_week11, symbol2_week11, symbol3_week11, symbol1_week12, symbol2_week12, symbol3_week12, symbol1_week13, symbol2_week13, symbol3_week13, symbol1_week14, symbol2_week14, symbol3_week14, symbol1_week15, symbol2_week15, symbol3_week15
FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

$result3 = $conn->query($sql3);
if($result3->num_rows > 0){
    $num = $result3->fetch_assoc();
  }
include 'showSymbol.php';

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

<table cellspacing="10" cellpadding="4"> 
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
elseif ($row[meetingDays] == "M") { 

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

<table cellspacing="10" cellpadding="4"> 
	<tr>
		<td>
			<h1>1</h1><br>
			<h4>Week Of '.$bar[week1_of].'</h4><br>
			<p>'.$bar[week1_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>'.$row[meetingDays].'</b><br>
		'.$bar[symbol1_week1].' 
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
elseif ($row[meetingDays] == "T") { // start of MWF portion
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

<table cellspacing="10" cellpadding="4"> 
	<tr>
		<td>
			<h1>1</h1><br>
			<h4>Week Of '.$bar[week1_of].'</h4><br>
			<p>'.$bar[week1_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>'.$row[meetingDays].'</b><br>
		'.$bar[symbol1_week1].' 
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
elseif ($row[meetingDays] == "W") { // start of MWF portion
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

<table cellspacing="10" cellpadding="4"> 
	<tr>
		<td>
			<h1>1</h1><br>
			<h4>Week Of '.$bar[week1_of].'</h4><br>
			<p>'.$bar[week1_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>W</b><br>
		'.$bar[symbol1_week1].' 
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
		<td><b>W</b><br>
		'.$bar[symbol1_week2].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week3].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week4].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week5].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week6].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week7].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week8].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week9].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week10].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week11].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week12].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week13].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week14].'  
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
		<td><b>W</b><br>
		'.$bar[symbol1_week15].'  
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
elseif ($row[meetingDays] == "TR") { // start of MWF portion
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

<table cellspacing="10" cellpadding="4"> 
	<tr>
		<td>
			<h1>1</h1><br>
			<h4>Week Of '.$bar[week1_of].'</h4><br>
			<p>'.$bar[week1_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>TR</b><br>
		'.$bar[symbol1_week1].' 
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week2].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week3].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week4].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week5].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week6].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week7].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week8].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week9].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week10].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week11].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week12].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week13].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week14].'  
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
		<td><b>TR</b><br>
		'.$bar[symbol1_week15].'  
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
elseif ($row[meetingDays] == "F") { // start of MWF portion
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

<table cellspacing="10" cellpadding="4"> 
	<tr>
		<td>
			<h1>1</h1><br>
			<h4>Week Of '.$bar[week1_of].'</h4><br>
			<p>'.$bar[week1_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b>F</b><br>
		'.$bar[symbol1_week1].' 
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
		<td><b>F</b><br>
		'.$bar[symbol1_week2].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week3].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week4].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week5].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week6].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week7].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week8].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week9].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week10].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week11].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week12].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week13].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week14].'  
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
		<td><b>F</b><br>
		'.$bar[symbol1_week15].'  
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
elseif ($row[meetingDays] == "MWF") {
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

<table cellspacing="10" cellpadding="4">
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
			<p>'.$row[symbol1]."".$row[assign1].'</p>
			<p>'.$row[symbol2]."".$row[assign2].'</p>
			<p>'.$row[symbol3]."".$row[assign3].'</p>
			<p>'.$row[symbol4]."".$row[assign4].'</p>
			<p>'.$row[symbol5]."".$row[assign5].'</p>
			<p>'.$row[symbol6]."".$row[assign6].'</p>
			<p>'.$row[symbol7]."".$row[assign7].'</p>
			<p>'.$row[symbol8]."".$row[assign8].'</p>
			<p>'.$row[symbol9]."".$row[assign9].'</p>
			<p>'.$row[symbol10]."".$row[assign10].'</p>
		</td>
	</tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
}
else {
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

<table cellspacing="10" cellpadding="4">
	<tr>
		<td>
			<h1>1</h1><br>
			<h4>Week Of '.$bar[week1_of].'</h4><br>
			<p>'.$bar[week1_desc].'</p>
			<table cellspacing="2" cellpadding="2">
	<tr>
		<td><b></b><br>
		'.$bar[symbol1_week1].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week1].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week2].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week2].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week3].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week3].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week4].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week4].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week5].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week5].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week6].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week6].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week7].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week7].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week8].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week8].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week9].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week9].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week10].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week10].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week11].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week11].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week12].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week12].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week13].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week13].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week14].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week14].'
		</td>
		<td><b></b><br>
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
		<td><b></b><br>
		'.$bar[symbol1_week15].'  
		</td>
		<td><b></b><br>
		'.$bar[symbol2_week15].'
		</td>
		<td><b></b><br>
		'.$bar[symbol3_week15].'
		</td>
	</tr> 
</table>
		</td>
		<td>
			<h1>Key</h1><br>
			<p>'.$row[symbol1]."".$row[assign1].'</p>
			<p>'.$row[symbol2]."".$row[assign2].'</p>
			<p>'.$row[symbol3]."".$row[assign3].'</p>
			<p>'.$row[symbol4]."".$row[assign4].'</p>
			<p>'.$row[symbol5]."".$row[assign5].'</p>
			<p>'.$row[symbol6]."".$row[assign6].'</p>
			<p>'.$row[symbol7]."".$row[assign7].'</p>
			<p>'.$row[symbol8]."".$row[assign8].'</p>
			<p>'.$row[symbol9]."".$row[assign9].'</p>
			<p>'.$row[symbol10]."".$row[assign10].'</p>
		</td>
	</tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
}// else bracket
}
$pdf->output('weeklyschedule.pdf', 'I'); // PUT D INSTEAD OF I FOR DOWNLOADING AUTOMATICALLY PDF
$conn->close(); //}// end of if else for row and bar
?>
<html>
	<head>	
		<link rel="icon" href="images/favicon.ico" type="image"/>
	</head>
	<body>
	</body>
</html>