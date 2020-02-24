 
<?php
require("session_info.php");

if(isset($_GET['courseID'])){
	$courseID = $_GET['courseID'];
	
error_reporting(0);
$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Username and Password Invaid!". $conn->connect_error);
}

$FKPROFID = $_SESSION["FKPROFID"];
?>

<?php

$sql = "SELECT      
coursecode, coursename, bookname, bookisbn, bookauthor, bookpicture, 
topicname1, topicname2, topicname3, topicname4, topicname5, topicname6, topicname7,  
pointvalue1, pointvalue2, pointvalue3, pointvalue4, pointvalue5, pointvalue6, pointvalue7,
important_points, meetingday, img_mime FROM courseinfo where PKID = $_GET[courseID]";

//echo $sql; exit;

$result = $conn->query($sql);


$row=mysqli_num_rows($result);
  
  //echo $topicname1; exit;

if($row>0){ // if course info avaliable

$row=$result->fetch_array();


$course_code =$row['coursecode'];
$course_name =$row['coursename'];
$book_name = $row['bookname'];
$book_author = $row['bookauthor'];
$topicname1 = $row['topicname1'];
$topicname2 = $row['topicname2'];
$topicname3 = $row['topicname3'];
$topicname4 = $row['topicname4'];
$topicname5 = $row['topicname5'];
$topicname6 = $row['topicname6'];
$topicname7 = $row['topicname7'];
$pointvalue1 = $row['pointvalue1'];
$pointvalue2 = $row['pointvalue2'];
$pointvalue3 = $row['pointvalue3'];
$pointvalue4 = $row['pointvalue4'];
$pointvalue5 = $row['pointvalue5'];
$pointvalue6 = $row['pointvalue6'];
$pointvalue7 = $row['pointvalue7'];
$important_points = $row['important_points'];
$meetingDays = $row['meetingday'];
$isbn = $row['bookisbn'];
}
}
//end of if
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<header>
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
</header>

<h1 style="padding-left: 25px">Course Information</h1>

<form method="post" action="update_course_info.php" style="padding-left: 25px;" enctype="multipart/form-data">

Course Code&nbsp <input type="text" length="25" name="courseCode" value="<?php echo $course_code?>" required > &nbsp Example: COSC 473<br><br>
Course Name&nbsp <input type="text" length="50" name="courseName" value="<?php echo $course_name?>" required> &nbsp 
Class Days &nbsp <select name="meetingDays" selected ="<?php echo "$meetingDays"; ?>" required>
				<option value="">--</option>
			
			<?php
				if($meetingDays=="online")
            {
                echo " <OPTION VALUE=\"Online\"  selected>Online</option>";
            }else{
            	echo " <OPTION VALUE=\"Online\"  >Online</option>";
			} 
				if($meetingDays=="MWF")
            {
                echo " <OPTION VALUE=\"MWF\"  selected>MWF</option>";
            }else{
				echo " <OPTION VALUE=\"MWF\"  >MWF</option>";
			}  
				if($meetingDays=="MF")
            {
                echo " <OPTION VALUE=\"MF\"  selected>MF</option>";
            }else{
				echo " <OPTION VALUE=\"MF\"  >MF</option>";
			}  
				if($meetingDays=="WF")
            {
                echo " <OPTION VALUE=\"WF\"  selected>WF</option>";
            }else{
				echo " <OPTION VALUE=\"WF\"  >WF</option>";
			}  
				if($meetingDays=="MW")
            {
                echo " <OPTION VALUE=\"MW\"  selected>MW</option>";
            }else{
				echo " <OPTION VALUE=\"MW\"  >MW</option>";
			}  
				if($meetingDays=="TTR")
			{
				echo " <OPTION VALUE=\"TTR\"  selected>TTR</option>";
			}else{
				echo " <OPTION VALUE=\"TTR\"  >TTR</option>";
			}
				if($meetingDays=="M")
            {
                echo " <OPTION VALUE=\"M\"  selected>M</option>";
            }else{
				echo " <OPTION VALUE=\"M\"  >M</option>";
			}  
				if($meetingDays=="T")
            {
                echo " <OPTION VALUE=\"T\"  selected>T</option>";
            }else{
				echo " <OPTION VALUE=\"T\"  >T</option>";
			}  
				if($meetingDays=="W")
            {
                echo " <OPTION VALUE=\"W\"  selected>W</option>";
            }else{
				echo " <OPTION VALUE=\"W\"  >W</option>";
			}  
				if($meetingDays=="R")
            {
                echo " <OPTION VALUE=\"R\"  selected>R</option>";
            }else{
				echo " <OPTION VALUE=\"R\"  >R</option>";
			}  
				if($meetingDays=="F")
            {
                echo " <OPTION VALUE=\"F\"  selected>F</option>";
            }else{
				echo " <OPTION VALUE=\"F\"  >F</option>";
			}
			if($meetingDays=="Other")
            {
                echo " <OPTION VALUE=\"Other\"  selected>Other</option>";
            }else{
				echo " <OPTION VALUE=\"Other\"  >Other</option>";
			}
			  ?>
			</SELECT>

				<!-- Code for other option when clicked text box appears -->
			</select><br><br>
Important Points:<br><br>
<textarea name="importantpoints" style="width: 25%;"> <?php echo "$important_points"; ?>
</textarea><br>
<script>CKEDITOR.replace('importantpoints'); CKEDITOR.config.width = '50%';</script>

	<!-- Users will have the abilty to customize the look of these points -->
	
Book Name: &nbsp <input type="text" length="90" name="bookName" value="<?php echo $book_name?>" >&nbsp 
ISBN:&nbsp <input type="text" length="90" name="isbn" value="<?php echo $isbn?>"> &nbsp
Author: &nbsp <input type="text" length="90" name="author" value="<?php echo $book_author?>"> <br><br>

Book Image: <input type="file" name="bookImage" /><br><br>

Grade Breakdown: <br><br>

<div id="gradeWeight">
<p id="grade1">
Name: <input type="text" length="25" name="gradeName1"> &nbsp 
Weight: &nbsp <input type="text" length="25" name="weight1" value="0"> <br>
</p>
<p id="grade2">
Name: <input type="text" length="25" name="gradeName2"> &nbsp 
Weight: &nbsp <input type="text" length="25" name="weight2" value="0"> <br>
</p>
<p id="grade3">
Name: <input type="text" length="25" name="gradeName3"> &nbsp 
Weight: &nbsp <input type="text" length="25" name="weight3" value="0"> <br>
</p>
<p id="grade4">
Name: <input type="text" length="25" name="gradeName4"> &nbsp 
Weight: &nbsp <input type="text" length="25" name="weight4" value="0"> <br>
</p>
<p id="grade5">
Name: <input type="text" length="25" name="gradeName5"> &nbsp 
Weight: &nbsp <input type="text" length="25" name="weight5" value="0"> <br>
</p>
<p id="grade6">
Name: <input type="text" length="25" name="gradeName6"> &nbsp 
Weight: &nbsp <input type="text" length="25" name="weight6" value="0"> <br>
</p>
<p id="grade7">
Name: <input type="text" length="25" name="gradeName7"> &nbsp 
Weight: &nbsp <input type="text" length="25" name="weight7" value="0"> <br>
</p>
</div>

<input type="hidden" name = "courseID" value="<?php echo $courseID ?>">
<button type="submit" class="btn btn-primary">Update</button>

<?php echo $strQuery; exit; ?>
</form>