<?php
require("session_info.php");
error_reporting(0);
 
include ('session-connection.php');

// Create connection
$conn= new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM `courseinfo` WHERE `courseinfo`.`PKID` =  $_GET[courseID]";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

@header('Location: mainpage.php?');

$conn->close();
?>
