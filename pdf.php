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
$sql1 = "SELECT title, fullname, officeaddress, email, officephone, monday, tuesday, wednesday, thursday, friday FROM profinfo WHERE PKID = $FKPROFID;";

$sql = "SELECT coursecode, coursename FROM courseinfo WHERE PKID = $_GET[courseID]";

$result2 = $conn->query($sql); //used for courseinfo
$result = $conn->query($sql1); // used for profinfo

if($result->num_rows > 0) {
	//used for profinfo items
	// output data of each row
	$row = $result->fetch_assoc(); 

	if($result2->num_rows > 0){
		$bar = $result2->fetch_assoc(); // used for courseinfo
	}
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
		<img src="images/email-logo.png" id="emailLogo">
		Faculty Office<br><?php
		echo "<b>".$row["officeaddress"]."</b>";?><br>
		Contact Email<br><?php
		echo "<b>".$row["email"]."</b>";?><br>
		Office Phone<br><?php
		echo "<b>".$row["officephone"]."</b>";?>
	</div><!-- end div for officeEmailPhone -->

	<div id="officeHours">
		<img src="images/house.png" id="houseLogo">
		<span id="officeHeading">Office Hours:</span>
	 <?php
		if(!empty($row['monday'])){
		echo "Monday: "."<b>".$row["monday"]."</b>"."<br>";
		} else { echo "";
		}?> 
	<?php
		if(!empty($row['tuesday'])){
		echo "Tuesday: "."<b>".$row["tuesday"]."</b>"."<br>";
		} else { echo "";
		}?>	
	<?php
		if(!empty($row["wednesday"])){
		echo "Wednesday: "."<b>".$row["wednesday"]."</b>"."<br>";
		} else { echo "";
		}?>
	<?php
		if(!empty($row["thursday"])){
		echo "Thursday: "."<b>".$row["thursday"]."</b>"."<br>";
		 } else { echo "";
		}?>
	<?php
		if(!empty($row["friday"])){
		echo "Friday: "."<b>".$row["friday"]."</b>"."<br>";
		} else { echo ""; 
		}?>
		<b>*or by appointment</b>
	</div><!-- end div for officeHours -->
</div><!-- officeinfo div -->
<?php } // end if prof info


// start course info

$sql = "SELECT coursecode, coursename, bookname, bookisbn, bookauthor, important_points FROM courseinfo WHERE PKID = $_GET[courseID]"; 

$result = $conn->query($sql); /* used for coursecode */
if($result->num_rows > 0) {
	//used for profinfo items
	// output data of each row
	$row = $result->fetch_assoc(); 
?>
<div class="bookInfo">
		<div id="infoBox">
			this is the box for random info that we dont know where it comes from
		</div>
		<div id="bookImage">
				
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
		?>
	</div> <!--end pointsContainer-->
</div> <!-- end of div for importantpoints -->
	   
<?php
	$sql = "SELECT topicname1,topicname2,topicname3,topicname4,topicname5,topicname6,topicname7 FROM courseinfo WHERE PKID = $_GET[courseID]"; 

	 $result = $conn->query($sql); /* used for coursecode */
	if($result->num_rows > 0) {
		//used for profinfo items
		// output data of each row
		$row = $result->fetch_assoc(); 

?>
		
		<!-- this is the topic breakdown for piechart -->   	
		<div id="breakdown">
			<?php
			
			$image = images/rectangle.png; 

			if(!empty($row["topicname1"])){
				echo '<img src="images/rectangle1.png" width="30px"/>'. $row["topicname1"]."<br>";
			} else { echo ""; }

			if(!empty($row["topicname2"])){
				echo '<img src="images/rectangle2.png" width="30px"/>'. $row["topicname2"]."<br>";
			} else { echo ""; }

			if(!empty($row["topicname3"])){
				echo '<img src="images/rectangle3.png" width="30px"/>'. $row["topicname3"]."<br>";
			} else { echo ""; }
 
			if(!empty($row["topicname4"])){ 
				echo '<img src="images/rectangle4.png" width="30px"/>'. $row["topicname4"]."<br>";
			} else { echo ""; }

			if(!empty($row["topicname5"])){
				echo '<img src="images/rectangle5.png" width="30px"/>'. $row["topicname5"]."<br>";
			} else { echo ""; }

			if(!empty($row["topicname6"])){
				echo '<img src="images/rectangle6.png" width="30px"/>'. $row["topicname6"]."<br>";
			} else { echo ""; }

			if(!empty($row["topicname7"])){
				echo '<img src="images/rectangle7.png" width="30px"/>'. $row["topicname7"]."<br>";
			} else { echo ""; } 

			 
			/*
			echo "<img src=images/rectangle.png>".$row["topicname2"]."<br>";
			
			echo $row["topicname3"]."<br>";
			
			echo $row["topicname4"]."<br>";
			
			echo $row["topicname5"]."<br>";
			
			echo $row["topicname6"]."<br>"; 
			
			echo $row["topicname7"];

			*/
			?>
		</div><!--end breakdown-->
	<!--if else for professor info -->
		<?php 	
	} // end if course info
else { 
	echo "no results prof info";
}
$conn->close();
//echo "---------------------------------<hr>"; exit;
?> 

<?php 	/* used for topicname */
	} // end if course info
else { 
	echo "no results prof info";
}

$conn->close();
//echo "---------------------------------<hr>"; exit;
?> 
	
<!-- pieChart link -->
	<div id="pieChart">
		<?php include 'pieChart.php' ?>
	</div><!--end piechart-->

	<div class="pagebreak"> </div>
	<div class="pagebreak"> </div>
	<div id="page2">
		<div><?php //include 'weeklyschedule.php' ?></div>
	</div>
</body>
</html>