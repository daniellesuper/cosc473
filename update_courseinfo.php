 
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
die("Username and Password Invalid!". $conn->connect_error);
}
$FKPROFID = $_SESSION['PKID'];
//$FKPROFID = $_SESSION["FKPROFID"];
?>

<?php


$sql = "SELECT      
coursecode, coursename, bookname, bookIsbn, bookAuthor, bookpicture, 
topicname1, topicname2, topicname3, topicname4, topicname5, topicname6, topicname7,  
pointvalue1, pointvalue2, pointvalue3, pointvalue4, pointvalue5, pointvalue6, pointvalue7,
importantpoints, meetingday, img_mime, symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10, assign1, assign2, assign3, assign4, assign5, assign6, assign7, assign8, assign9, assign10 FROM courseinfo where PKID = $_GET[courseID]";

//echo $sql; exit;

$result = $conn->query($sql);


$row=mysqli_num_rows($result);
  
  //echo $topicname1; exit;

if($row>0){ // if course info avaliable

$row=$result->fetch_array();


$courseCode =$row['courseCode'];
$courseName =$row['courseName'];
$bookName = $row['bookName'];
$bookAuthor = $row['bookAuthor'];
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
$importantpoints = $row['importantpoints'];
$meetingDays = $row['meetingDays'];
$bookisbn = $row['bookisbn'];
$symbol1 = $row['symbol1'];
$symbol2 = $row['symbol2'];
$symbol3 = $row['symbol3'];
$symbol4 = $row['symbol4'];
$symbol5 = $row['symbol5'];
$symbol6 = $row['symbol6'];
$symbol7 = $row['symbol7'];
$symbol8 = $row['symbol8'];
$symbol9 = $row['symbol9'];
$symbol10 = $row['symbol10'];
$assign1 = $row['assign1'];
$assign2 = $row['assign2'];
$assign3 = $row['assign3'];
$assign4 = $row['assign4'];
$assign5 = $row['assign5'];
$assign6 = $row['assign6'];
$assign7 = $row['assign7'];
$assign8 = $row['assign8'];
$assign9 = $row['assign9'];
$assign10 = $row['assign10'];

  }
}
//end of if

?>
<html>
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

<body>
<h1 style="padding-left: 25px">Course Information</h1>


<form method="post" action="update_course_info.php" style="padding-left: 25px;" enctype="multipart/form-data">

Course Code&nbsp <input type="text" length="25" name="courseCode" value="<?php echo $courseCode;?>" required > &nbsp; Example: COSC 473<br><br>
Course Name&nbsp; <input type="text" length="50" name="courseName" value="<?php echo $courseName;?>" required> &nbsp; 
Class Days &nbsp; <select name="meetingDays" selected ="<?php echo "$meetingDays"; ?>" required>
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
<textarea name="importantpoints" style="width: 25%;"> <?php echo "$importantpoints"; ?>
</textarea><br>
<script>CKEDITOR.replace('importantpoints'); CKEDITOR.config.width = '50%';</script>

	<!-- Users will have the abilty to customize the look of these points -->
	
Book Name: &nbsp; <input type="text" length="90" name="bookName" value="<?php echo $bookName?>" >&nbsp; 
ISBN:&nbsp; <input type="text" length="90" name="bookisbn" value="<?php echo $bookisbn?>"> &nbsp;
Author: &nbsp; <input type="text" length="90" name="bookAuthor" value="<?php echo $bookAuthor?>"> <br><br>

Book Image: <input type="file" name="bookImage" /><br><br>

Grade Breakdown: <br><br>

<div id="gradeWeight"> 
<p id="grade1">
Name: <input type="text" length="25" name="gradeName1"> &nbsp;
Weight: &nbsp; <input type="text" length="25" name="weight1" value="0"> <br>
</p>
<p id="grade2">
Name: <input type="text" length="25" name="gradeName2"> &nbsp; 
Weight: &nbsp; <input type="text" length="25" name="weight2" value="0"> <br>
</p>
<p id="grade3">
Name: <input type="text" length="25" name="gradeName3"> &nbsp; 
Weight: &nbsp; <input type="text" length="25" name="weight3" value="0"> <br>
</p>
<p id="grade4">
Name: <input type="text" length="25" name="gradeName4"> &nbsp; 
Weight: &nbsp; <input type="text" length="25" name="weight4" value="0"> <br>
</p>
<p id="grade5">
Name: <input type="text" length="25" name="gradeName5"> &nbsp; 
Weight: &nbsp; <input type="text" length="25" name="weight5" value="0"> <br>
</p>
<p id="grade6">
Name: <input type="text" length="25" name="gradeName6"> &nbsp; 
Weight: &nbsp; <input type="text" length="25" name="weight6" value="0"> <br>
</p>
<p id="grade7">
Name: <input type="text" length="25" name="gradeName7"> &nbsp; 
Weight: &nbsp; <input type="text" length="25" name="weight7" value="0"> <br>
</p><br>
</div>

Course symbol & Name: <br><br><!-- make dropdown -->


<div id="symbol_Name">

<?php

function display_symbols(){

  echo" <option value='0'> Select Symbol</option>
        <option value='Star'> Star </option>
        <option value='X'> X </option>
        <option value='CheckMark'> CheckMark </option>
        <option value='Exclamationpoint'> Exclamation Point </option>
        <option value='Circle'> Circle </option>
        <option value='Kite'> Kite </option>
        <option value='Square'> Square </option>
        <option value='Rectangle'> Rectangle </option>
        <option value='Trefoil'> Trefoil </option>
        <option value='Heart'> Heart </option>
    ";
}

?>

<p id="symbol1">
Symbol1:  <select name="symbol1" onchange="changeImage()">
      <?php display_symbols(); ?>
    </select>

Name of Assigment: &nbsp; <input type="text" length="25" name="assign1" value="<?php echo $assign1;?>"> <br>
</p>

<p id="symbol2">
Symbol2:  <select name="symbol2" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign2"> <br>
</p>

<p id="symbol3">
Symbol3: <select name="symbol3" onchange="changeImage()">
    <?php display_symbols(); ?>
    </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign3"> <br>
</p>

<p id="symbol4">
Symbol4:<select name="symbol4" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign4"> <br>
</p>

<p id="symbol5">
Symbol5: <select name="symbol5" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign5"> <br>
</p>
</div>

<p id="symbol6">
Symbol6: <select name="symbol6" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign6"> <br>
</p>

<p id="symbol7">
Symbol7: <select name="symbol7" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign7"> <br>
</p>

<p id="symbol8">
Symbol8: <select name="symbol8" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign8"> <br>
</p>

<p id="symbol9">
Symbol9: <select name="symbol9" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign9"> <br>
</p>

<p id="symbol10">
Symbol10: <select name="symbol10" onchange="changeImage()">
      <?php display_symbols(); ?>
          </select>
Name of Assigment: &nbsp; <input type="text" length="25" name="assign10"> <br>
</p>
</div>

<input type="hidden" name = "courseID" value="<?php echo $courseID ?>">
<button type="submit" class="btn btn-primary">Update</button>

<?php echo $strQuery; exit; ?>
</form>
</body>
</html>