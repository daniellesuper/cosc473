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

$bar = "SELECT coursecode, coursename, important_points FROM courseinfo WHERE PKID = $_GET[courseID]";

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
	<div id="nameBanner">
		<div id="ribbon">
			<span id="content">
				<?php
				echo $row["title"]." ";
				echo $row["fullname"];
				?>
			</span>
		</div><!-- div end for ribbon -->
		<div class = "courseinfo">
			<div id="ribbon">
				<?php
				echo $bar["coursecode"]." "."<br>"; 
				echo $bar["coursename"]." "."<br>";
				?>
			</div><!-- div end for ribbon -->
		</div><!-- end of courseinfo div -->
	</div><!--nameBanner-->

	<div id="officeEmailPhone">
		Faculty Office<br><?
		echo "<b>".$row["officeaddress"]."</b>";?><br>
		Contact Email<br><?
		echo "<b>".$row["email"]."</b>";?><br>
		Office Phone<br><?
		echo "<b>".$row["officephone"]."</b>";?>
	</div><!-- end div for officeEmailPhone -->

	<div id="officeHours">
		<h3>Office Hours</h3>
		Monday:<? 
		echo "<b>".$row["monday"]."</b>";?><br>
		Tuesday:<?
		echo "<b>".$row["tuesday"]."</b>";?>
		Wednesday:<?
		echo "<b>".$row["wednesday"]."</b>";?>
		Thursday:<?
		echo "<b>".$row["thursday"]."</b>";?>
		Friday:<?
		echo "<b>".$row["friday"]."</b>";?>
		<br>*or by appointment
	</div><!-- end div for officeHours -->
</div><!-- officeinfo div -->

<div class="bookInfo">
		<div id="topBox">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus voluptates magni praesentium officiis inventore, ipsum voluptate maiores. Aspernatur, reprehenderit quidem adipisci quod debitis ex unde dolores vel quas ut aliquam?</div>
		<div id="bookImage">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, similique ab quo pariatur doloribus tempore libero beatae, magni consectetur consequatur </div>
		<div id="bookName">Book Name</div>
</div><!--end bookInfo-->

<div class="importantpoints">
	<div id="ribbon2">Important Points</div>
	<div id="pointsContainer">
		<?php
		$imp_points = $bar["important_points"];

		$imp_points = html_entity_decode($imp_points);
		echo"$imp_points";
		
		/*echo"<b>".$points["importantpoints2"]."</b>";
		echo"<b>".$points["importantpoints3"]."</b>";
		echo"<b>".$points["importantpoints4"]."</b>";
		echo"<b>".$points["importantpoints5"]."</b>";*/
		?>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde omnis molestias rem. Nostrum voluptatibus quos debitis magni asperiores natus vel fugiat beatae quod quisquam assumenda quibusdam, odit consequuntur. Corporis, nobis?
		</p>
	</div> <!--end pointsContainer-->
</div> <!-- end of div for importantpoints -->
	<!--if else for professor info -->
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
<div id="pieChart">
	<div><?php include 'pieChart.php' ?></div>
</div><!--end piechart-->
<div class="pagebreak"> </div>
<div class="pagebreak"> </div>
<div id="page2">
	<div><?php include 'weeklyschedule.php' ?></div>
</div><!--end page2-->
<?
require "pdfcrowd.php";

$api = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");
$api->convertUrlToFile("http://localhost/473/pdf.php?courseID=15", "syllabus.pdf");
?>
</body>

</html>