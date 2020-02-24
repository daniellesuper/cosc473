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

$sql =" Select     
topicname1, topicname2, topicname3, topicname4, topicname5, topicname6, topicname7, 
pointvalue1, pointvalue2, pointvalue3, pointvalue4, pointvalue5, pointvalue6, pointvalue7,
bookname, bookisbn, bookauthor, bookpicture, bookpicture, img_mime, important_points FROM courseinfo where PKID = $courseID   ";

$result = $conn->query($sql);

$row=mysqli_num_rows($result);
  
  //echo $topicname1; exit;

if($row>0){ // if course info avaliable

$row=$result->fetch_array();


$topicname1 =$row[topicname1];
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


<h1 style="padding-left: 25px">Course Information</h1>

<form method="post" action="insert_course_info.php" style="padding-left: 25px;" enctype="multipart/form-data">

Course Code&nbsp <input type="text" length="25" name="courseCode"> &nbsp Example: COSC 473<br><br>
Course Name&nbsp <input type="text" length="50" name="courseName"> &nbsp 
Class Days &nbsp <select name="meetingDays">
				<option value="0"> -- </option>
				<option value="online"> online </option>
				<option value="MWF"> MWF </option>
				<option value="MF"> MF </option>
				<option value="WF"> WF </option>
				<option value="MW"> MW </option>
				<option value="TR"> TR </option>
				<option value="M"> M </option>
				<option value="T"> T </option>
				<option value="W"> W </option>
				<option value="R"> R </option>
				<option value="F"> F </option>
				<option value="other"> other </option>
				<!-- Code for other option when clicked text box appears -->
			</select><br><br>
Important Points:<br><br>
<textarea name="importantpoints" style="width: 25%;">
</textarea><br>
<script>CKEDITOR.replace('importantpoints'); CKEDITOR.config.width = '50%';</script>

	<!-- Users will have the abilty to customize the look of these points -->
	
Book Name: &nbsp <input type="text" length="90" name="bookName">&nbsp 
ISBN:&nbsp <input type="text" length="90" name="isbn"> &nbsp
Author: &nbsp <input type="text" length="90" name="author"> <br><br>

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

<!-- <button type="button" class="btn btn-info" onClick="addGrade();">Add More</button><br><br>-->
<button type="submit" class="btn btn-primary">Submit</button>

<script type="text/javascript">
	/*
	function addElement(parentid, elementTag, elementid, html){
		var p = document.getElementById(parentid);
		var newElement = document.createElement(elementTag);
		newElement.setAttribute('id', elementid);
		newElement.innerHTML = html;
		p.appendChild(newElement);
	}
	
	var gradeId = 1;
	function addGrade(){
		gradeId++;
		var grade = 'gradeName' + gradeId;
		var divName = 'grade' + gradeId;

		var html = 
					'Name: <input type="text" length="25" name="gradeName'+gradeId+'"> &nbsp' +
					'Weight: &nbsp <input type="text" length="25" name="weight' + gradeId + '"> &nbsp'
					+'<a href="" onclick="removeElement(divName); return false;">Remove</a>'

		alert (divName);
		var html = 
					'Name: <input type="text" length="25" name="gradeName'+gradeId+'"> &nbsp' +
					'Weight: &nbsp <input type="text" length="25" name="weight' + gradeId + '"> &nbsp'
					+'<a href="" onClick="removeElement(divName);return false;">Remove</a>'

					;
		addElement('gradeWeight', 'p', 'grade' + gradeId, html);
	}
	
	function removeElement(elementId){

		var element = document.getElementById(elementId);
		element.remove();
		alert ("removed successfully!");
	}

		
		var element = document.getElementById(elementId);
		element.parentNode.removeChild(element);
	}*/

</script>
</form>
</body>