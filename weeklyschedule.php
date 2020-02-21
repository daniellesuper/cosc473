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

 

$sql = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc FROM weeklyinfo WHERE PKID = $_GET[courseID]";

//echo $sql; exit;

$result = $conn->query($sql);

if($result->num_rows > 0) {
  //used for profinfo items
  // output data of each row
  $row = $result->fetch_assoc(); 

  }   // end if course info
else { 
  echo "no weekly info";
}
$conn->close();
//echo "---------------------------------<hr>"; exit;
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weekly Schedule</title>
  <link href="weeklyschedule.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <div id="topBox">
    <div id="ribbon">
      <h1>Weekly Schedule</h1>
    </div>
    <div id="springBreak">
      <h4>Spring Break is <!--insert spring break dates here--></h4>
    </div>
  </div>  

  <div class="row">
      
      <div class="box">
        <div class="circle">1</div>
        <?php 

            echo 'heeeeeeeeeeeeeeeeee';
        ?>
      </div>
      

      <div class="box">
        <div class="circle">2</div>
      </div>
      <div class="box">
        <div class="circle">3</div>
      </div>
      <div class="box">
        <div class="circle">4</div>
      </div>
  </div>  
  <div class="row">
      <div class="box">
        <div class="circle">5</div>
      </div>
      <div class="box">
        <div class="circle">6</div>
      </div>
      <div class="box">
        <div class="circle">7</div>
      </div>
      <div class="box">
        <div class="circle">8</div>
      </div>
  </div>
  <div class="row">
      <div class="box">
        <div class="circle">9</div>
      </div>
      <div class="box">
        <div class="circle">10</div>
      </div>
      <div class="box">
        <div class="circle">11</div>
      </div>
      <div class="box">
        <div class="circle">12</div>
      </div>
  </div>
  <div class="row">
      <div class="box">
      <div class="circle">13</div>
      </div>
      <div class="box">
      <div class="circle">14</div>
      </div>
      <div class="box">
      <div class="circle">15</div>
      </div>
      <div class="box">key</div>
  </div>
  <input id="printButton" type="button" value ="Print" onClick="print();">

</body>

</html>