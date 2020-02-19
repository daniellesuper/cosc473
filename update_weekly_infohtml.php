<?php


require("session_info.php");
error_reporting(0);

$courseID = $_GET['courseID'];
	
$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Username and Password Invaid!". $conn->connect_error);
}
error_reporting(0);

$sql =" Select     
     holiday, month, startdate, enddate, weekofheading1, weekofheading2, weekofheading3, weekofheading4, weekofheading5, weekofheading6, weekofheading7, weekofheading8, weekofheading9, weekofheading10, weekofheading11, weekofheading12, weekofheading13, weekofheading14, weekofheading15, 
	 subheading1, subheading2, subheading3, subheading4, subheading5, subheading6, subheading7, subheading8, subheading9, subheading10, subheading11, subheading12, subheading13, subheading14, subheading15, 
	 week1assessment, week2assessment, week3assessment, week4assessment, week5assessment, week6assessment, week7assessment, week8assessment, week9assessment, week10assessment, week11assessment, week12assessment, week13assessment, week14assessment, week15assessment, fkprofid, fkcourseid 
	 FROM weeklyinfo where fkcourseid= $courseID ";
	 
//echo $sql; exit;

$result = $conn->query($sql);


  $row=mysqli_num_rows($result);
  
  //echo $row; exit;

if($row>0){ // login successful

$row=$result->fetch_array();


$holiday =$row['holiday_name'];
$startdate =$row['startdate'];
$enddate =$row['enddate'];
$weekofheading1 = $row['weekofheading1'];
$weekofheading2 = $row['weekofheading2'];
$weekofheading3 = $row['weekofheading3'];
$weekofheading4 = $row['weekofheading4'];
$weekofheading5 = $row['weekofheading5'];
$weekofheading6 = $row['weekofheading6'];
$weekofheading7 = $row['weekofheading7'];
$weekofheading8 = $row['weekofheading8'];
$weekofheading9 = $row['weekofheading9'];
$weekofheading10 = $row['weekofheading10'];
$weekofheading11 = $row['weekofheading11'];
$weekofheading12 = $row['weekofheading12'];
$weekofheading13 = $row['weekofheading13'];
$weekofheading14 = $row['weekofheading14'];
$weekofheading15 = $row['weekofheading15'];
$subheading1 = $row['subheading1'];
$subheading2 = $row['subheading2'];
$subheading3 = $row['subheading3'];
$subheading4 = $row['subheading4'];
$subheading5 = $row['subheading5'];
$subheading6 = $row['subheading6'];
$subheading7 = $row['subheading7'];
$subheading8 = $row['subheading8'];
$subheading9 = $row['subheading9'];
$subheading10 = $row['subheading10'];
$subheading11 = $row['subheading11'];
$subheading12 = $row['subheading12'];
$subheading13 = $row['subheading13'];
$subheading14 = $row['subheading14'];
$subheading15 = $row['subheading15'];
$week1assessment = $row['week1assessment'];
$week2assessment = $row['week2assessment'];
$week3assessment = $row['week3assessment'];
$week4assessment = $row['week4assessment'];
$week5assessment = $row['week5assessment'];
$week6assessment = $row['week6assessment'];
$week7assessment = $row['week7assessment'];
$week8assessment = $row['week8assessment'];
$week9assessment = $row['week9assessment'];
$week10assessment = $row['week10assessment'];
$week11assessment = $row['week11assessment'];
$week12assessment = $row['week12assessment'];
$week13assessment = $row['week13assessment'];
$week14assessment = $row['week14assessment'];
$week15assessment = $row['week15assessment'];

//echo $title; exit;

}	 

if ($_GET['ok'] == 1) {
	echo "Weekly Info has been updated";
}

?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
</head>
<body>
<h1 style="padding-left: 25px;">Weekly Calendar</h1>

<form action="update_weekly_info.php" form="get" style="padding-left: 25px;">

Break:	&nbsp <select name="holiday_name">
		<option value="">Select</option>
		<option value="Thanksgiving">Thanksgiving</option> 
		<option value="Spring">Spring</option>
		</select> &nbsp
		
Date To: &nbsp <input type="date" name="startdate" value ="<?php echo $startdate; ?>"> &nbsp
Date End: &nbsp <input type="date" name="enddate" value="<?php echo $enddate; ?>"> <br><br>

Week of &nbsp <input type="text" name="weekofheading1" value="<?php echo $weekofheading1; ?>"> <br><br>
Description &nbsp   <input type="text" length="255" name="week1_info" value="<?php echo $subheading1; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week1assessment" value="<?php echo $week1assessment; ?>" > &nbsp
Image &nbsp <select name="symbol1">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
<br><br>
			
Week of &nbsp <input type="text" name ="weekofheading2" value="<?php echo $weekofheading2; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week2_info" value="<?php echo $subheading2; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week2assessment" value="<?php echo $week2assessment; ?>" > &nbsp
Image &nbsp <select name="symbol2">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>
		
Week of &nbsp <input type="text" name = "weekofheading3" value="<?php echo $weekofheading3; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week3_info" value="<?php echo $subheading3; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week3assessment" value="<?php echo $week3assessment; ?>" > &nbsp
Image &nbsp <select name="symbol3">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>

<br><br>

Week of &nbsp <input type="text" name = "weekofheading4" value="<?php echo $weekofheading4; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week4_info" value="<?php echo $subheading4; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week4assessment" value="<?php echo $week4assessment; ?>" > &nbsp
Image &nbsp <select name="symbol4">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading5" value="<?php echo $weekofheading5; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week5_info" value="<?php echo $subheading5; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week5assessment" value="<?php echo $week5assessment; ?>" > &nbsp
Image &nbsp <select name="symbol5">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading6" value="<?php echo $weekofheading6; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week6_info" value="<?php echo $subheading6; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week6assessment" value="<?php echo $week6assessment; ?>" > &nbsp
Image &nbsp <select name="symbol6">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading7" value="<?php echo $weekofheading7; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week7_info" value="<?php echo $subheading7; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week7assessment" value="<?php echo $week7assessment; ?>" > &nbsp
Image &nbsp <select name="symbol7">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading8" value="<?php echo $weekofheading8; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week8_info" value="<?php echo $subheading8; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week8assessment" value="<?php echo $week8assessment; ?>" > &nbsp
Image &nbsp <select name="symbol8">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading9" value="<?php echo $weekofheading9; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week9_info" value="<?php echo $subheading9; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week9assessment" value="<?php echo $week9assessment; ?>" > &nbsp
Image &nbsp <select name="symbol9">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading10" value="<?php echo $weekofheading10; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week10_info" value="<?php echo $subheading10; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week10assessment" value="<?php echo $week10assessment; ?>" > &nbsp
Image &nbsp <select name="symbol10">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading11" value="<?php echo $weekofheading11; ?>">: <br><br>
Description   &nbsp <input type="text" length="255" name="week11_info" value="<?php echo $subheading11; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week11assessment" value="<?php echo $week11assessment; ?>" > &nbsp
Image &nbsp <select name="symboll1">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading12" value="<?php echo $weekofheading12; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week12_info" value="<?php echo $subheading12; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week12assessment" value="<?php echo $week12assessment; ?>" > &nbsp
Image &nbsp <select name="symbol12">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading13" value="<?php echo $weekofheading13; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week13_info" value="<?php echo $subheading13; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week13assessment" value="<?php echo $week13assessment; ?>" > &nbsp
Image &nbsp <select name="symbol13">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading14" value="<?php echo $weekofheading14; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week14_info" value="<?php echo $subheading14; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week14assessment" value="<?php echo $week14assessment; ?>" > &nbsp
Image &nbsp <select name="symbol14">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading15" value="<?php echo $weekofheading15; ?>"> <br><br>
Description   &nbsp <input type="text" length="255" name="week15_info" value="<?php echo $subheading15; ?>" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week15assessment" value="<?php echo $week15assessment; ?>" > &nbsp
Image &nbsp <select name="symbol15">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

<input type="hidden" name = "courseID" value="<?php echo $courseID ?>">
<button type="submit" class="btn btn-primary">Update Weekly Calendar</button>

</form>
</body>
</html>
