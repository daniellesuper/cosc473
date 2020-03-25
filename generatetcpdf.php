<?php
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

function showSymbols(){

	global $row;
	
	foreach($row as $symbol){ 

                   if ($symbol == "Star"){
                     echo '<img src="images/star.jpeg"  width="30px" height="20px"/>'."<br>"."<br>";
                   } 

                   if ($symbol == "X"){
                     echo '<img src="images/x.jpeg"  width="30px" height="10px"/>'."<br>"."<br>";

                   }

                   if ($symbol == "CheckMark"){
                     echo '<img src="images/checkmark.jpeg"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Exclamationpoint"){
                     echo '<img src="images/exclamation1.png"  width="40px" height="40px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Circle"){
                     echo '<img src="images/circle.png"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Kite"){
                     echo '<img src="images/Kite.png"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Square"){
                     echo '<img src="images/Square.jpeg"  width="20px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Rectangle"){
                     echo '<img src="images/Rectangle.png"  width="40px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Trefoil"){
                     echo '<img src="images/Trefoil.png"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Heart"){
                     echo '<img src="images/Heart.png"  width="30px" height="20px"/>'."<br>";
                   } // last if bracket
               } // foreach bracket
		}// function bracket

//showSymbols(); //throws error when its called "TCPDF ERROR: Some data has already been output, cant send PDF File"


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

//
// start of the if statememt for outputting correct # of boxes and info
//

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
			<p>'.$row[symbol1]." = ".$row[assign1].'</p>
			<p>'.$row[symbol2]." = ".$row[assign2].'</p>
			<p>'.$row[symbol3]." = ".$row[assign3].'</p>
			<p>'.$row[symbol4]." = ".$row[assign4].'</p>
			<p>'.$row[symbol5]." = ".$row[assign5].'</p>
			<p>'.$row[symbol6]." = ".$row[assign6].'</p>
			<p>'.$row[symbol7]." = ".$row[assign7].'</p>
			<p>'.$row[symbol8]." = ".$row[assign8].'</p>
			<p>'.$row[symbol9]." = ".$row[assign9].'</p>
			<p>'.$row[symbol10]." = ".$row[assign10].'</p>
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
			<p>'.$row[symbol1]." = ".$row[assign1].'</p>
			<p>'.$row[symbol2]." = ".$row[assign2].'</p>
			<p>'.$row[symbol3]." = ".$row[assign3].'</p>
			<p>'.$row[symbol4]." = ".$row[assign4].'</p>
			<p>'.$row[symbol5]." = ".$row[assign5].'</p>
			<p>'.$row[symbol6]." = ".$row[assign6].'</p>
			<p>'.$row[symbol7]." = ".$row[assign7].'</p>
			<p>'.$row[symbol8]." = ".$row[assign8].'</p>
			<p>'.$row[symbol9]." = ".$row[assign9].'</p>
			<p>'.$row[symbol10]." = ".$row[assign10].'</p>
		</td>
	</tr>
</table>

';

$pdf->writeHTML($html, true, false, true, false, '');
	}
}

//ob_end_clean();

$pdf->output('weeklyschedule.pdf', 'I'); // PUT D INSTEAD OF I FOR DOWNLOADING AUTOMATICALLY PDF
$conn->close(); }// end of if else for row and bar
?>
<html>
	
	<head>
		
	</head>
	<body>

	</body>
</html>