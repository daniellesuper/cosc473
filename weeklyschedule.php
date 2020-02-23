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
 

<!--
 /*

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

*/
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weekly Schedule</title>
  <link href="weeklyschedule.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php

$sql1 = "SELECT  meetingday FROM courseinfo WHERE PKID = $_GET[courseID]";
 //echo $sql1; exit;
$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";
//

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
 
 if($result1->num_rows > 0) {
  //used for profinfo items
  // output data of each row
  $row = $result1->fetch_assoc(); 

  

  if($result2->num_rows > 0){
    $bar = $result2->fetch_assoc();
  }
//echo $sql2;exit;
?>
<div class="boxes">
  <div id="topBox">
    <div id="ribbon">
      <h1>Weekly Schedule</h1>
    </div>
    <div id="springBreak">
      <h4> <?php  echo $bar["holiday"]. " "; 
                  echo $bar["startdate"].$bar["enddate"];
            ?> <!--insert spring break dates here--></h4>
    </div>
  </div>  

  <div class="row">
      
      <div class="box">
        <div class="circle">1</div>
        <?php 

            echo "Week of ".$bar["week1_of"]."<br>";
            echo $bar["week1_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      

      <div class="box">
        <div class="circle">2</div>
          <?php 

            echo "Week of ".$bar["week2_of"]."<br>";
            echo $bar["week2_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">3</div>

        <?php 

            echo "Week of ".$bar["week3_of"]."<br>";
            echo $bar["week3_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">4</div>

        <?php 

            echo "Week of ".$bar["week4_of"]."<br>";
            echo $bar["week4_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

           ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
  </div>  
  <div class="row">
      <div class="box">
        <div class="circle">5</div>

        <?php 

            echo "Week of ".$bar["week5_of"]."<br>";
            echo $bar["week5_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">6</div>

        <?php 

            echo "Week of ".$bar["week6_of"]."<br>";
            echo $bar["week6_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">7</div>

        <?php 

            echo "Week of ".$bar["week7_of"]."<br>";
            echo $bar["week7_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">8</div>

        <?php 

            echo "Week of ".$bar["week8_of"]."<br>";
            echo $bar["week8_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
  </div>
  <div class="row">
      <div class="box">
        <div class="circle">9</div>

        <?php 

            echo "Week of ".$bar["week9_of"]."<br>";
            echo $bar["week9_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">10</div>

        <?php 

            echo "Week of ".$bar["week10_of"]."<br>";
            echo $bar["week10_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">11</div>

        <?php 

            echo "Week of ".$bar["week11_of"]."<br>";
            echo $bar["week11_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
        <div class="circle">12</div>

        <?php 

            echo "Week of ".$bar["week12_of"]."<br>";
            echo $bar["week12_desc"]."<br>";

            if($row["meetingday"] == "TR"){
             ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
  </div>
  <div class="row">
      <div class="box">
      <div class="circle">13</div>

      <?php 

            echo "Week of ".$bar["week13_of"]."<br>";
            echo $bar["week13_desc"]."<br>";

            if($row["meetingday"] == "TR"){
            ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            echo "hhhhhhhhhhhhhhhhh". $row["meetingday"]; ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
      <div class="circle">14</div>

      <?php 

            echo "Week of ".$bar["week14_of"]."<br>";
            echo $bar["week14_desc"]."<br>";

            if($row["meetingday"] == "TR"){
             ?> 
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      <div class="box">
      <div class="circle">15</div>

      <?php 

            echo "Week of ".$bar["week15_of"]."<br>";
            echo $bar["week15_desc"]."<br>";

            if($row["meetingday"] == "TR"){
             ?>
           
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "T"; ?><br>

            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
            <select id="symbols"> 
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "M"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "W"; ?><br>

            
            <select id="symbols">
                <option value="star">Star</option>
                <option value="Exclamation">Exclamation Point</option>
                <option value="Circle">Circle</option>
                <option value="X">X</option>
                <option value="CheckMark">CheckMark</option>
            </select>
            <?php echo "F" ?><br>

        <?php
              }
           }

        ?>
      </div>
      
      key:
      <div class="box">

        <img src="images/star.png" width="30px" height="20px"/><br>
        <img src="images/x.png" width="30px" height="20px"/><br>
        <img src="images/checkmark.png" width="30px" height="20px"/><br>
        <img src="images/exclamation.png" width="20px" height="20px"/><br>
        <img src="images/circle.png" width="20px" height="20px"/>

      </div>

        



  </div>
</div> <!-- boxes div -->



<?php   
} // end if course info
else { 
  echo "no results meeting days";
}
$conn->close();
//echo "---------------------------------<hr>"; exit;
?> 

  <input id="printButton" type="button" value ="Print" onClick="print();">


</body>

</html>