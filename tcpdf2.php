<?php
require("session_info.php");
function fetch_data(){
	$output = '';
	$connect = mysqli_connect("localhost","root","","info-syllabus");
	$sql1 = "SELECT  meetingDays FROM courseinfo WHERE PKID = $_GET[courseID]";
 	//echo $sql1; exit;
	$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";
	$result = mysqli_query($connect,$sql1);
	$result2 = mysqli_query($connect,$sql2);

	while($row = mysqli_fetch_array($result)){
		$output .= '<div class="box">'. $row[week1_of]."<br>". $row[week1_desc];'

		</div>

		';
	}

	return $output;
}

if(isset($_POST["create_pdf"])){
	require_once('library/tcpdf.php');
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->SetTitle("Weekly Schedule");
	$obh_pdf->SetHeaderData('','',PDF_HEADER_TITLE, PDF_HEADER_STRING);
	$obj_pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$obj_pdf->SetFooterFont(array(PDF_FONT_NAME_MAIN, '',PDF_FONT_SIZE_MAIN));
	$obj_pdf->SetDefaultMonospacedFont('helvetica');
	$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
	$obj_pdf->setPrinterHeader(false);
	$obj_pdf->setPrintFooter(false);
	$obj_pdf->setAutopageBreak(TRUE, 10);
	$obj_pdf->setFont('helvetica','',12);

	$content = '';

	$content .= '
			<div class="box">
        <div class="circle">1</div>
        </div>
        </div>

	';

	$content .= fetch_data();

	$content .= '<div>';

	$obj_pdf->writeHTML($content);
	$obj_pdf->output("weeklyschedule","I");
}

?>

<!DOCTYPE html>
<html>
<head>
	

	<title>
		Weekly Schedule
	</title>

	<!-- css linnk -->
	  <link href="weeklyschedule.css" type="text/css" rel="stylesheet" />

</head>
<body>


	<div class="boxes">
  <div id="topBox">
    <div id="ribbon">
      <h1>Weekly Schedule</h1>
    </div><!-- ribbon div  -->
  </div><!-- topbox div -->




  <div class="row">
      
      <div class="box">
        <div class="circle">1</div>

        	<?php echo fetch_data(); ?>

    
</div><!-- box div -->



</div><!-- row div -->


</div><!-- boxes div -->

</body>
</html>