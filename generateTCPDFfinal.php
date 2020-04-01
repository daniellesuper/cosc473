<?php
// session info
require("session_info.php");
include('library/tcpdf.php');
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

// database queries
$FKPROFID = $_SESSION["FKPROFID"]; 
$courseID = $_GET["courseID"];
$sql1 = "SELECT  meetingDays, symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10, assign1, assign2, assign3, assign4, assign5, assign6, assign7, assign8, assign9, assign10,topicname1,topicname2,topicname3,topicname4,topicname5,topicname6,topicname7,topicname8, topicname9, topicname10, pointvalue1, pointvalue2, pointvalue3, pointvalue4, pointvalue5, pointvalue6, pointvalue7, pointvalue8, pointvalue9, pointvalue10 FROM courseinfo WHERE PKID = $_GET[courseID]";

$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate, symbol1_week1, symbol2_week1, symbol3_week1, symbol1_week2, symbol2_week2, symbol3_week2, symbol1_week3, symbol2_week3, symbol3_week3, symbol1_week4, symbol2_week4, symbol3_week4, symbol1_week5, symbol2_week5, symbol3_week5, symbol1_week6, symbol2_week6, symbol3_week6, symbol1_week7, symbol2_week7, symbol3_week7, symbol1_week8, symbol2_week8, symbol3_week8, symbol1_week9, symbol2_week9 , symbol3_week9, symbol1_week10, symbol2_week10, symbol3_week10, symbol1_week11, symbol2_week11, symbol3_week11, symbol1_week12, symbol2_week12, symbol3_week12, symbol1_week13, symbol2_week13, symbol3_week13, symbol1_week14, symbol2_week14, symbol3_week14, symbol1_week15, symbol2_week15, symbol3_week15 
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

// set some text for examples
$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$text = '';
// header box
$titlename = $bar3["title"]." ".$bar3["fullname"]." ";
$course = $bar4["coursecode"]."\n".$bar4["coursename"];

//$pdf->SetXY(100, 205);
//$pdf->Image('images/house.png', '', '', 6, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
$officehours = "Office Hours: "."\n"."Mon: ".$bar3["monday"]."\n"."Tues: ".$bar3["tuesday"]."\n"."Wed: ".$bar3["wednesday"]."\n"."Thurs: ".$bar3["thursday"]."\n"."Fri: ".$bar3["friday"];

$officeinfo = "Faculty office"."\n".$bar3["officeaddress"]."\n"."Contact Email"."\n".$bar3["email"]."\n"."Office Phone"."\n".$bar3["officephone"];

$pdf->SetFillColor(178, 178, 178);
$pdf->MultiCell(200, 60, $text, 0, 'C', 1, 1, '', '', true);

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
$pdf->MultiCell(75, 10,$course, 0, 'L', 0, 2, 30, 37, true,0, false, true, 40, 'C');
//
//


// THIS IS THE WORDING IN THE IMPORTANT POINT SECTION
$pdf->SetXY(105, 67);
$pdf->Image('images/importantpoints.png', '', '', 100, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//THIS IS THE WORDS ON TOP OF THE BANNER
$pdf->SetXY(140, 68);
$pdf->Image('images/importantwords.png', '', '', 33, 13, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS THE PENCIL IMAGE IN THE BOOK INFO SECTION
$pdf->SetXY(77, 77);
$pdf->Image('images/pencil.png', '', '', 20, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS IS THE BOOK IMAGE IN THE BOOK SECTION
$pdf->SetXY(7, 105);
$pdf->Image('images/book.png', '', '', 20, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// imp points

$importantpoints = $bar5["importantpoints"];
$importantpoints = html_entity_decode($importantpoints);
$pdf->MultiCell(90, 111, $importantpoints, 0, 'C', 0, 1, 110 ,85, true);


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

$pdf->SetFillColor(0,0,255);
$pdf->PieSector($topicname1,$topicname2,$topicname3,$topicname4,$topicname5,$topicname6,$topicname7,$topicname8,$topicname9,$topicname10, 250, 20, 'FD', false, 0, 2);

$pdf->SetFillColor(50,50,255);
$pdf->PieSector($topicname1,$topicname2,$topicname3,$topicname4,$topicname5,$topicname6,$topicname7,$topicname8,$topicname9,$topicname10, 250, 20, 'FD', false, 0, 2);

// HOUSE IMAGE AT TOP RIGHT OF PAGE 1
$pdf->SetXY(177, 10);
$pdf->Image('images/house.png', '', '', 10, 10, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//ENVELOPE IMAGE TO THE LEFT OF THE HOUSE IMAGE TOP RIGHT OF PAGE ON
$pdf->SetXY(137, 11);
$pdf->Image('images/email-logo.png', '', '', 10, 10, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS IS THE BANNER FOR GRADES
$pdf->SetXY(10, 130);
$pdf->Image('images/grades.png', '', '', 90, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS IS THE SCHREENSHOT OF "GRADE" PUT ON TOP OF THE BANNER IMAGE
$pdf->SetXY(40, 130);
$pdf->Image('images/grade1.png', '', '', 30, 10, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//IMPORTANT POINTS IMAGE 
//$pdf->SetXY(105, 84);
//$pdf->Image('images/importantpoints.png', '', '', 100, 20, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//grade breakdown

// THIS IS THE BLUE SQUARE FOR ASSIGNMENT 2
$pdf->SetXY(120, 205);
$pdf->Image('images/rectangle1.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// THIS IS THE REDISH BROWN IMAGEE FOR ASSIGNMENT 3
$pdf->SetXY(120, 210);
$pdf->Image('images/rectangle2.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//THIS IS THE GREEN IMAGE FOR ASSIGNMENT 4
$pdf->SetXY(120, 215);
$pdf->Image('images/rectangle3.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//THIS IS THE LIGHT GREEN IMAGE FOR ASSIGNMENT 5
$pdf->SetXY(120, 220);
$pdf->Image('images/rectangle4.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//THIS IS THE PURPLE IMAGE FOR ASSIGNMENT 6
$pdf->SetXY(120, 225);
$pdf->Image('images/rectangle5.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

$pdf->SetXY(120, 230);
$pdf->Image('images/rectangle6.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//THIS IS THE GREEN IMAGE FOR ASSIGNMENT 7
$pdf->SetXY(120, 235);
$pdf->Image('images/rectangle7.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// TAN IMAGE FOR ASSIGNMENT 8
$pdf->SetXY(120, 240);
$pdf->Image('images/rectangle8.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

//BLACK IMAGE FOR ASSIGNMENT 9
$pdf->SetXY(120, 245);
$pdf->Image('images/rectangle9.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

// PINK IMAGE FOR ASSIGNMENT 10
$pdf->SetXY(120, 250);
$pdf->Image('images/rectangle10.png', '', '', 15, 6, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

$topicname = $row["topicname1"]."\n".$row["topicname2"]."\n".$row["topicname3"]."\n".$row["topicname4"]."\n".$row["topicname5"]."\n".
				$row["topicname6"]."\n".$row["topicname7"]."\n".$row["topicname8"]."\n".$row["topicname9"]."\n".
				$row["topicname10"];
$pdf->SetFillColor(178, 178, 178);
$pdf->MultiCell(100, 75, 'Grade Breakdown '."\n".$topicname, 0, 'C', 1, 0, 105, 200, true);

// END OF GRADE BREAKDOWN

// END OF PAGE 1 OF PDF

// add 2nd page
$pdf->AddPage();
//$pdf->writeHTML($html, true,false,true,false,'');
$html = '<img src="images/weeklyschedule.png" alt="weeklyschedule" align="center">';
$pdf->writeHTML($html, true,false,true,false,'');

$html = '<span style = "color: red"; align = "center">'.$bar[holiday].' Break: '. $bar[startdate]. ' to '. $bar[enddate].'</span>'; 
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
else { // start of MWF portion

if($row[meetingDays] == "MWF" || "Online"){
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
}


$pdf->output('weeklyschedule.pdf', 'I'); // PUT D INSTEAD OF I FOR DOWNLOADING AUTOMATICALLY PDF
$conn->close(); }// end of if else for row and bar
?>
<html>
	<head>	
	</head>
	<body>
	</body>
</html>