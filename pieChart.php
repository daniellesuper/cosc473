<?php
error_reporting(0);
$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Username and Password Invaid!". $conn->connect_error);
}

$courseID = $_GET['courseID'];
	
$sql =" Select     
topicname1, topicname2, topicname3, topicname4, topicname5, topicname6, topicname7, 
pointvalue1, pointvalue2, pointvalue3, pointvalue4, pointvalue5, pointvalue6, pointvalue7 FROM courseinfo where PKID = $courseID  ";

//echo $sql; exit;
$result = $conn->query($sql);


  $row=mysqli_num_rows($result);
  
  //echo $topicname1; exit;

if($row>0){ // login successful

$row=$result->fetch_array();


$topicname1 =$row[topicname1];
$topicname2 =$row[topicname2];
$topicname3 =$row[topicname3];
$topicname4 =$row[topicname4];
$topicname5 =$row[topicname5];
$topicname6 =$row[topicname6];
$topicname7 =$row[topicname7];
$pointvalue1 =$row[pointvalue1];
$pointvalue2 =$row[pointvalue2];
$pointvalue3 =$row[pointvalue3];
$pointvalue4 =$row[pointvalue4];
$pointvalue5 =$row[pointvalue5];
$pointvalue6 =$row[pointvalue6];
$pointvalue7 =$row[pointvalue7];
}

$dataPoints = array();

 if($topicname1 !="" || $topicname1!=null || !empty($topicname1))
 {
	 $dataPoints [0] =  array("label"=>$topicname1, "y"=>$pointvalue1);
 }
 
if($topicname2 !="" || $topicname2!=null || !empty($topicname2))
 {
	 $dataPoints [1] =  array("label"=>$topicname2, "y"=>$pointvalue2);
 }
 
 if($topicname3 !="" || $topicname3!=null || !empty($topicname3))
 {
	 $dataPoints [2] =  array("label"=>$topicname3, "y"=>$pointvalue3);
 }
 
 if($topicname4 !="" || $topicname4!=null || !empty($topicname4))
 {
	 $dataPoints [3] =  array("label"=>$topicname4, "y"=>$pointvalue4);
 }
 
 if($topicname5 !="" || $topicname5!=null || !empty($topicname5))
 {
	 $dataPoints [4] =  array("label"=>$topicname5, "y"=>$pointvalue5);
 }
 
 if($topicname6 !="" || $topicname6!=null || !empty($topicname6))
 {
	 $dataPoints [5] =  array("label"=>$topicname6, "y"=>$pointvalue6);
 }
 
 if($topicname7 !="" || $topicname7!=null || !empty($topicname7))
 {
	 $dataPoints [6] =  array("label"=>$topicname7, "y"=>$pointvalue7);
 }

 //$itemName1= "Assignment 1"; // get it from courseinfo table
 //$itemVal1= 10; // get it from courseinfo table
 //echo $topicname1; exit;
 
 /*
 $dataPoints = array();
 $a=0;
 while($a < 2){
	 
	 $dataPoints [$a] =  array("label"=>$itemName1, "y"=>$itemVal1);
	 $a++;
	 
 }*/

/*
$dataPoints = array( 
	array("label"=>$topicname1, "y"=>$pointvalue1),
	array("label"=>$topicname2, "y"=>$pointvalue2),
	array("label"=>$topicname3, "y"=>$pointvalue3),
	array("label"=>$topicname4, "y"=>$pointvalue4),
	array("label"=>$topicname5, "y"=>$pointvalue5),
	array("label"=>$topicname6, "y"=>$pointvalue6),
	array("label"=>$topicname7, "y"=>$pointvalue7)
)*/

?>
<!DOCTYPE HTML>
<html>
<head>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library --><!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript --><!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<header>
-->
<!--
	<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">InfoSyllabus&copy;</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="mainpage.php">Welcome, Professor</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<hr />
-->
</header>
<link href="pdf.css" type="text/css" rel="stylesheet" />
<script>
window.onload = function() { 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
// setTimeout(function(){ window.print(); }, 3000); // print pop up
}
</script>
<div id="chart">
	<script src="canvasjs.min.js"></script>
</div>
</head>
<body>
	<div id="chartContainer"></div>
</body>
</html>