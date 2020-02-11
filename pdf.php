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

$profName = $_SESSION["FULLNAME"];

?>

 <?php 
 
$sql = "SELECT title, fullname FROM profinfo WHERE username = 'joe'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo $row["title"]. " ". $row["fullname"];
	}
} else {
	echo "no results";
}

$conn->close();


?> 
	