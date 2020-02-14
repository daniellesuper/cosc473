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

$points = "SELECT importantpoint1, importantpoint2, importantpoint3, importantpoint4, importantpoint5 FROM courseinfo WHERE PKID = $FKPROFID";

$result = $conn->query($sql);
$result1 = $conn->query($bar); /* used for coursecode */
$result2 = $conn->query($points); /* used for importantpoints */

     
if($result->num_rows > 0) {
	//used for profinfo items
	// output data of each row
	while($row = $result->fetch_assoc()) {

		
		/* used for cousecode */		
		if($result1->num_rows > 0) {	
	// output data of each row
	while($bar = $result1->fetch_assoc()) {

		/* used for cousecode */		
		if($result2->num_rows > 0) {	
	// output data of each row
	while($points = $result2->fetch_assoc()) {
		
?> 	


 

<div class = "officeinfo">  

	<div id="titleName">
		<?php
		echo $row["title"]." ";
		echo $row["fullname"];
		
		?>
	</div><!-- div end for titleName -->
		
<div class = "courseinfo">
	
	<div id="coursecode">
		<?php
		echo $bar["coursecode"]." "."<br>"; 
		echo $bar["coursename"]." "."<br>";
		?>
	</div><!-- div end for titleName -->
	
</div><!-- end of courseinfo div -->

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

<div class="importantpoints">

	<h>Important Points</h><?
	echo"<b>".$points["importantpoints1"]."</b>";
	echo"<b>".$points["importantpoints2"]."</b>";
	echo"<b>".$points["importantpoints3"]."</b>";
	echo"<b>".$points["importantpoints4"]."</b>";
	echo"<b>".$points["importantpoints5"]."</b>";
	?>

	</div><!-- end of div for importantpoints -->
 

 	
 	<!-- if else for professor info -->
		<?php 	
	}


} else {
	echo "no results";
}

$conn->close();

?> 

	<!-- if else for courseinfo -->
		<?php 	
	}


} else {
	echo "no results";
}

$conn->close();

?> 

	<!-- if else for importantpoint -->
		<?php 	
	}


} else {
	echo "no results";
}

$conn->close();

?> 

<!-- pieChart link -->
<?php include 'pieChart.php' ?>

</body>

</html>