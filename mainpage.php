<?php
require("session_info.php");
error_reporting(0);
 
include ('session-connection.php');

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}

$profID = $_SESSION["FKPROFID"];
$courseID = $_GET["courseID"];
?>

<html> 
	<head>
	<link href="mainpage.css" type="text/css" rel="stylesheet"/>
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
	</div>
	<h2 id="existingSyllabi"><u>Existing Syllabi</u></h2>

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
						<li>
							<span id="courseName"><?php echo $course; ?></span>
							<div id="buttons">
								<button type="button" class= "btn btn-primary btn-lg">
									<a href="update_courseinfo.php?courseID=<?php echo $courseID ?>" >
										Update Course Info 
									</a>
								</button>
								<!-- <button type="button" class="btn btn-primary btn-lg">
									<a href="pdf.php?courseID=<?php echo $courseID ?>">
										HTML 1st Page(Useless)
									</a>
								</button> -->
								<button type="button" class="btn btn-primary btn-lg">
									<a href="weeklyschedule1.php?courseID=<?php echo $courseID ?>"> 
										Create Weekly Info
									</a>
								</button>
								<button type="button" class="btn btn-primary btn-lg">
									<a href="update_weekly_info.php?courseID=<?php echo $courseID ?>"> 
										Update Weekly Info
									</a>
								</button>
								<button type="button" class="btn btn-primary btn-lg">
									<a href="generateTCPDFfinal.php?courseID=<?php echo $courseID ?>">
										Download a PDF
									</a>
								</button>
								<button type="button" onclick="deleteClass()" class="deleteButton">
									<a href="deleteclass.php?courseID=<?php echo $courseID ?>">
										X
									</a>
								</button>
							</div>
						</li>
					</ul>
       </div>
    	<?php 
     } ?>
	

	</body>
	<div id="spacer"></div>
	<footer>
		<hr />
		<p>PSH Web Design, &copy; 2020</p>
	</footer>
</html>