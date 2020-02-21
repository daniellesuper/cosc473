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