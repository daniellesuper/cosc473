<head>
	<link href="mainpage.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet"> 
	</head>
	<body>
	<header>
	<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">InfoSyllabus&copy;</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="mainpage.php">Welcome, Professor!</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
	
	<hr />

	</header>

<?php
$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Username and Password Invaid!". $conn->connect_error);
}
error_reporting(0);
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1 style="padding-left: 25px;">Weekly Calendar</h1>

<form action="update_weekly_info.php" form="get" style="padding-left: 25px;">

Break:	&nbsp <select name="holiday_name">
		<option value="0">Select</option>
		<option value="Thanksgiving">Thanksgiving</option> 
		<option value="Spring">Spring</option>
		</select> &nbsp
		
Date To: &nbsp <input type="date" name="startdate" value =""> &nbsp
Date End: &nbsp <input type="date" name="enddate" value=""> <br><br>

Week of &nbsp <input type="text" name="weekofheading1" value=""> <br><br>
Description &nbsp   <input type="text" length="255" name="week1_info" value=""> &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week1assessment" value="" > &nbsp
Image &nbsp <select name="symbol21">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
<br><br>
			
Week of &nbsp <input type="text" name ="weekofheading2" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week2_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week2assessment" value="" > &nbsp
Image &nbsp <select name="symbol2">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>
		
Week of &nbsp <input type="text" name = "weekofheading3" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week3_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week3assessment" value="" > &nbsp
Image &nbsp <select name="symbol3">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>

<br><br>

Week of &nbsp <input type="text" name = "weekofheading4" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week4_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week4assessment" value="" > &nbsp
Image &nbsp <select name="symbol4">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading5" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week5_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week5assessment" value="" > &nbsp
Image &nbsp <select name="symbol5">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading6" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week6_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week6assessment" value="" > &nbsp
Image &nbsp <select name="symbol6">
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading7" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week7_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week7assessment" value="" > &nbsp
Image &nbsp <select name="symbol7">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading8" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week8_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week8assessment" value="" > &nbsp
Image &nbsp <select name="symbol8">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading9" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week9_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week9assessment" value="" > &nbsp
Image &nbsp <select name="symbol9">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading10" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week10_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week10assessment" value="" > &nbsp
Image &nbsp <select name="symbol10">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading11" value="">: <br><br>
Description   &nbsp <input type="text" length="255" name="week11_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week11assessment" value="" > &nbsp
Image &nbsp <select name="symbol11">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading12" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week12_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week12assessment" value="" > &nbsp
Image &nbsp <select name="symbol12">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading13" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week13_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week13assessment" value="" > &nbsp
Image &nbsp <select name="symbol13">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading14" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week14_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week14assessment" value="" > &nbsp
Image &nbsp <select name="symbol14">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

Week of &nbsp <input type="text" name = "weekofheading15" value=""> <br><br>
Description   &nbsp <input type="text" length="255" name="week15_info" value="" > &nbsp
Assesment Due &nbsp <input type="text" length="255" name="week15assessment" value="" > &nbsp
Image &nbsp <select name="symbol15">
			<option value=""> --</option>
			<option value="star">Star</option>
			<option value="point">Exclamation Point</option>
			</select>
		
<br><br>

<button type="submit" class="btn btn-primary">Update Weekly Calendar</button>

</form>
</body>
</html>
