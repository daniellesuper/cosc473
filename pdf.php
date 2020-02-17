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




$result = $conn->query($sql);


if($result->num_rows > 0) {
	//used for profinfo items
	// output data of each row
	$row = $result->fetch_assoc(); 

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
				echo $row["coursecode"]." "."<br>"; 
				echo $row["coursename"]." "."<br>";
				?>
			</div><!-- div end for ribbon -->
		</div><!-- end of courseinfo div -->
	</div><!--nameBanner-->

	<div id="officeEmailPhone">
		Faculty Office<br><?php
		echo "<b>".$row["officeaddress"]."</b>";?><br>
		Contact Email<br><?php
		echo "<b>".$row["email"]."</b>";?><br>
		Office Phone<br><?php
		echo "<b>".$row["officephone"]."</b>";?>
	</div><!-- end div for officeEmailPhone -->

	<div id="officeHours">
		<h3>Office Hours:</h3>
		Monday:<?php 
		echo "<b>".$row["monday"]."</b>";?><br>
		Tuesday:<?php
		echo "<b>".$row["tuesday"]."</b>";?><br>
		Wednesday:<?php
		echo "<b>".$row["wednesday"]."</b>";?><br>
		Thursday:<?php
		echo "<b>".$row["thursday"]."</b>";?><br>
		Friday:<?php
		echo "<b>".$row["friday"]."</b>";?>
		<br>*or by appointment
	</div><!-- end div for officeHours -->
</div><!-- officeinfo div -->

<?php } // end if prof info


// start course info


/*
$points = "SELECT importantpoint1, importantpoint2, importantpoint3, importantpoint4, importantpoint5 FROM courseinfo WHERE PKID = $FKPROFID";

$book = "SELECT bookname, bookisbn, bookauthor, bookpicture FROM courseinfo WHERE PKID = $_GET[courseID]";

$assignments ="SELECT topicname1, topicname2, topicname3, topicname4, topicname5, topicname6, topicname7 FROM courseinfo WHERE PKID = $FKPROFID";
*/


$sql = "SELECT coursecode, coursename, bookname, bookisbn, bookauthor, important_points FROM courseinfo WHERE PKID = $_GET[courseID]"; 

$result = $conn->query($sql); /* used for coursecode */
if($result->num_rows > 0) {
	//used for profinfo items
	// output data of each row
	$row = $result->fetch_assoc(); 



?>
<div class="bookInfo">
		<div id="topBox">
			
		</div>
		<div id="bookImage">
				<?php
				// echo $book["bookpicture"];
				?>
				BOOK IMAGE GOES HERE </div>
		<div id="bookName">
			<?php
				echo $row["bookname"]."<br>";
				echo "ISBN:".$row["bookisbn"]."<br>";
				echo "Author: ".$row["bookauthor"];
			?></div>
</div><!--end bookInfo-->

<div class="importantpoints">
	<div id="ribbon2">Important Points</div>
	<div id="pointsContainer">
		<?php
		$imp_points = $row["important_points"];

		$imp_points = html_entity_decode($imp_points);
		echo"$imp_points";
		
		/*echo"<b>".$points["importantpoints2"]."</b>";
		echo"<b>".$points["importantpoints3"]."</b>";
		echo"<b>".$points["importantpoints4"]."</b>";
		echo"<b>".$points["importantpoints5"]."</b>";*/
		?>
		
	</div> <!--end pointsContainer-->
</div> <!-- end of div for importantpoints -->
	


	<!--if else for professor info -->
		<?php 	
	} // end if course info
 else { 
	echo "no results prof info";
}

$conn->close();
//echo "---------------------------------<hr>"; exit;
?> 
	
<!-- pieChart link -->
<div id="pieChart">
	<div><?php include 'pieChart.php' ?></div>
		<div id="breakdown">
			<?php
			echo $assignments["topicname1"]."<br>";
			echo $assignments["topicname2"]."<br>";
			echo $assignments["topicname3"]."<br>";
			echo $assignments["topicname4"]."<br>";
			echo $assignments["topicname5"]."<br>";
			echo $assignments["topicname6"]."<br>";
			echo $assignments["topicname7"];
			?>
		</div><!--end breakdown-->
</div><!--end piechart-->

<!--
<div class="pagebreak"> </div>
<div class="pagebreak"> </div>
<div id="page2">
	<div><?php //include 'weeklyschedule.php' ?></div>
</div>
<?php

//require "pdfcrowd.php";

//$api = new \Pdfcrowd\HtmlToPdfClient("demo", //"ce544b6ea52a5621fb9d55f8b542d14d");
//$api->convertUrlToFile("http://localhost/473/pdf.php?//courseID=15", "syllabus.pdf");
?>


</body>

</html>
