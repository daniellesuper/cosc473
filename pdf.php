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
 
$FKPROFID = $_SESSION["FKPROFID"];
 
?>

 <html>
 <head>

 	<link href="pdf.css" type="text/css" rel="stylesheet" />

 </head>

 <body>

 <?php

$sql = "SELECT title, fullname, officeaddress, email, officephone, monday, tuesday, wednesday, thursday, friday FROM profinfo WHERE PKID = $FKPROFID";

$bar = "SELECT coursecode, coursename FROM courseinfo WHERE PKID = $FKPROFID";

$result = $conn->query($sql);
$result1 = $conn->query($bar); /* used for coursecode */


if($result->num_rows > 0) {
	
	//used for profinfo items
	// output data of each row
	while($row = $result->fetch_assoc()) {

		
		/* used for cousecode */		
		if($result1->num_rows > 0) {	
	// output data of each row
	while($bar = $result1->fetch_assoc()) {
		
?> 	

	<div id="coursecode">
		<?php
		echo $bar["coursecode"]." "."<br>"; 
		echo $bar["coursename"];
		?>
	</div><!-- div end for titleName -->
		

 

<div class = "officeinfo">  

	<div id="titleName">
		<?php
		echo $row["title"]." ";
		echo $row["fullname"];
		
		?>
	</div><!-- div end for titleName -->
		
	<div id="officeEmailPhone">
		
		<p>Faculty Office</p><?
		echo "<b>".$row["officeaddress"]."</b>";
		
		?>
		
		<p>Contact Email</p><?
		echo "<b>".$row["email"]."</b>";

		?>
		<p>Office Phone</p><?
		echo "<b>".$row["officephone"]."</b>";
		
		?>
	</div><!-- end div for officeEmailPhone -->

	<div id="officeHours">

		<p>Office Hours</p>
		
		<p>Monday:</p><?
		echo "<b>".$row["monday"]."</b>";
		?>
		
		<p>Tuesday:</p><?
		echo "<b>".$row["tuesday"]."</b>";
		?>

		<p>Wednesday:</p><?
		echo "<b>".$row["wednesday"]."</b>";
		?>

		<p>Thursday:</p><?
		echo "<b>".$row["thursday"]."</b>";
		?>

		<p>Friday:</p><?
		echo "<b>".$row["friday"]."</b>";
		?>
		<p> *or by appointment</p>

	</div><!-- end div for officeHours -->

</div><!-- officeinfo div -->


		<?php 	
	}


} else {
	echo "no results";
}

$conn->close();

?> 

		<?php 	
	}


} else {
	echo "no results";
}

$conn->close();

?> 

</body>

</html>