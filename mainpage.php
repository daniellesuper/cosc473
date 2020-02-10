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

$profID = $_SESSION["FKPROFID"];
?>

<html>
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
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a href="contact.html">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
	
	<hr />

	</header>
	
	<div style="font-family: Tangerine; text-align: center; font-size: 45pt; font-weight: bold; margin-bottomm: 20px;">
		Welcome, Professor! 
	</div>
	
	<div class="prof-course-info">
		<a href="prof_info.php?profID=<?php echo $profID ?>" ><button type="button" class="btn btn-primary btn-lg"> Update Professor Info</a></button>
		<a href="courseinfo.php"><button type="button" class="btn btn-primary btn-lg">New Course Info</a></button>
		<a href="weekly_info.php"><button type="button" class="btn btn-primary btn-lg">New Weekly Schedule</a></button>
		
	</div>
	
	<h2 id="existingSyllabi">Existing Syllabi</h2>
	
	<?php
	
	
    function get_course_list($conn, $profID)
    {
 
        $sql = "SELECT * FROM courseinfo WHERE FKprofID = $profID";
        $result = $conn->query($sql);
		
		$row = mysqli_num_rows($result);
		
		if($row == 0){
			echo "No Syllabus Created"; exit;

		}

        while($ar = mysqli_fetch_assoc($result))
        {
            $ret[] = $ar;
        }
        return $ret;
    }
	
      $courses = get_course_list($conn, $profID); 
      foreach($courses as $ap) {
          $course = $ap['coursecode'];
		  $courseID = $ap['PKID'];
	
          ?>
          <div class="syllabusList">
		  <ul>
				<li><?php echo $course; ?>
				<a href="update_courseinfo.php?courseID=<?php echo $courseID ?>" ><button type="button" class= "btn btn-primary btn-lg"> Update Course Info </a></button>
				<a href="update_weekly_infohtml.php?courseID=<?php echo $courseID ?>" ><button type="button" class="btn btn-primary btn-lg">Weekly Schedule</a></button>
				<a href="pieChart.php?courseID=<?php echo $courseID ?>"><button type="button" class="btn btn-primary btn-lg">Preview</a></button>
				<a href=""><button type="button" class="btn btn-primary btn-lg">Download</a></button></li>
		  </ul>
          </div>
          <?php 
     } ?>
	

	</body>
	<footer>
		<hr />
		<p>&copy; 2019 Info-Syllabus</p>
	</footer>
</html>