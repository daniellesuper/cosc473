<?php
require("session_info.php");

error_reporting(0);

$FKPROFID = $_SESSION["FKPROFID"];
$courseID = $_GET['courseID'];


$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
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
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weekly Schedule</title>
  <link href="weeklyschedule.css" type="text/css" rel="stylesheet" />


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   
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
  </div>  


<form action="insert_weekly_info.php" form="get" style="padding-left: 25px;">


Break:  &nbsp <select name="holiday_name">
        <option value="">Select</option>
        <option value="Thanksgiving">Thanksgiving</option> 
        <option value="Spring">Spring</option>
        </select> &nbsp
        
Date To: &nbsp <input type="date" name="startdate1" value ="<?php echo $startdate; ?>"> &nbsp;
Date End: &nbsp <input type="date" name="enddate" value="<?php echo $enddate; ?>"> <br><br>



  <div class="row">
      
      <div class="box">
        <div class="circle">1</div>
        <?php 

            if($row["meetingday"] == "TR"){
            ?>

Week of &nbsp <input type="text" name="week1_of" value =""> &nbsp; <br>
Description &nbsp   <input type="text" length="255" name="week1_desc" value="<?php echo $subheading1; ?>" > 
            <select name="symbol1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
         
            <?php echo "T"; ?><br>
            <select name="symbol1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
           
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week1_of" value =""> &nbsp; <br>
Description &nbsp   <input type="text" length="255" name="week1_desc" value="<?php echo $subheading1; ?>" > 
            <select name="symbol1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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

            if($row["meetingday"] == "TR"){
            ?>

Week of &nbsp <input type="text" name="week2_of" value ="<?php echo $startdate; ?>"> &nbsp;<br>
Description   &nbsp <input type="text" length="255" name="week2_desc" value="<?php echo $subheading2; ?>" > 
         <select name="symbol2">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol2">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
Week of &nbsp <input type="text" name="week2_of" value ="<?php echo $startdate; ?>"> &nbsp;<br>
Description   &nbsp <input type="text" length="255" name="week2_desc" value="<?php echo $subheading2; ?>" > 
         <select name="symbol2">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol2">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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

            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week3_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week3_desc" value="<?php echo $subheading3; ?>" > 

            <select name="symbol3">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol3">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
                       
Week of &nbsp <input type="text" name="week3_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week3_desc" value="<?php echo $subheading3; ?>" > 

            <select name="symbol3">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol3">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol3">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week4_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week4_desc" value="<?php echo $subheading4; ?>" > 
            <select name="symbol4">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol4">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

           ?><br>
               
           
Week of &nbsp <input type="text" name="week4_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week4_desc" value="<?php echo $subheading4; ?>" > 
            <select name="symbol4">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol4">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol4">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week5_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week5_desc" value="<?php echo $subheading5; ?>" > 
            <select name="symbol5">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol5">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
Week of &nbsp <input type="text" name="week5_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week5_desc" value="<?php echo $subheading5; ?>" > 
            <select name="symbol5">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
           <select name="symbol5">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol5">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week6_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week6_desc" value="<?php echo $subheading6; ?>" > 
            <select name="symbol6">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
        
            <?php echo "T"; ?><br>

            <select name="symbol6">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week6_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week6_desc" value="<?php echo $subheading6; ?>" > 
            <select name="symbol6">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol6">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol6">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week7_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week7_desc" value="<?php echo $subheading7; ?>" > 
            <select name="symbol7">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

           <select name="symbol7">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week7_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week7_desc" value="<?php echo $subheading7; ?>" > 
            <select name="symbol7">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol7">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol7">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week8_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week8_desc" value="<?php echo $subheading8; ?>" > 
            <select name="symbol8">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol8">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week8_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week8_desc" value="<?php echo $subheading8; ?>" > 
            <select name="symbol8">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol8">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            
            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week9_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week9_desc" value="<?php echo $subheading9; ?>" >
            <select name="symbol9">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol9">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week9_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week9_desc" value="<?php echo $subheading9; ?>" > 
            <select name="symbol9">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol9">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol9">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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

            if($row["meetingday"] == "TR"){
            ?>
           
Week of &nbsp <input type="text" name="week10_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week10_desc" value="<?php echo $subheading10; ?>" > 
            <select name="symbol10">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol10">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week10_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week10_desc" value="<?php echo $subheading10; ?>" > 
            <select name="symbol10">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol10">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol10">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
            ?>
Week of &nbsp <input type="text" name="week11_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week11_desc" value="<?php echo $subheading11; ?>" > 
            <select name="symboll1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symboll1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               

Week of &nbsp <input type="text" name="week11_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week11_desc" value="<?php echo $subheading11; ?>" > 
            <select name="symboll1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symboll1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symboll1">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
             ?>

Week of &nbsp <input type="text" name="week12_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week12_desc" value="<?php echo $subheading12; ?>" > 
            <select name="symbol12">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

           <select name="symbol12">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week12_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week12_desc" value="<?php echo $subheading12; ?>" > 
            <select name="symbol12">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol12">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol12">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
            ?>

Week of &nbsp <input type="text" name="week13_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week13_desc" value="<?php echo $subheading13; ?>" > 
            <select name="symbol13">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol13">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
           
Week of &nbsp <input type="text" name="week13_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week13_desc" value="<?php echo $subheading13; ?>" > 
            <select name="symbol13">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol13">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol13">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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

            if($row["meetingday"] == "TR"){
             ?> 
           
Week of &nbsp <input type="text" name="week14_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week14_desc" value="<?php echo $subheading14; ?>" > 
            <select name="symbol14">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol14">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               
Week of &nbsp <input type="text" name="week14_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week14_desc" value="<?php echo $subheading14; ?>" > 
            <select name="symbol14">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol14">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
            <select name="symbol14">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
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
            if($row["meetingday"] == "TR"){
             ?>
           
Week of &nbsp <input type="text" name="week15_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week15_desc" value="<?php echo $subheading15; ?>" > 
            <select name="symbol15">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "T"; ?><br>

            <select name="symbol15">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "TR"; ?><br>
            
            <?php

          }
           else {
            
            if($row["meetingday"] == "MWF"){

            ?><br>
               

Week of &nbsp <input type="text" name="week15_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week15_desc" value="<?php echo $subheading15; ?>" > 
            <select name="symbol15">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "M"; ?><br>

            
            <select name="symbol15">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "W"; ?><br>

            
           
            <select name="symbol15">
            <option value="star">Star</option>
            <option value="Exclamation Point">Exclamation Point</option>
            <option value="Circle">Circle</option>
            <option value="X">X</option>
            <option value="Check Mark">Check Mark</option> 
            </select>
            <?php echo "F" ?><br>

        <?php
              } 
           }
 
        ?>
      </div>
      
      key: 
      <div class="box">

        <img src="images/star.jpeg" width="30px" height="20px"/> - 
        <input type="text"></input><br>
        
        <img src="images/x.jpeg" width="30px" height="20px"/> - 
        <input type="text"></input><br>
        
        <img src="images/checkmark.jpeg" width="30px" height="20px"/> - 
        <input type="text"></input><br>
        
        <img src="images/exclamation1.png" width="30px" height="20px"/> - 
        <input type="text"></input><br>
        
        <img src="images/circle.png" width="30px" height="20px"/> -
        <input type="text"></input>

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
  <input type="hidden" name = "courseID" value="<?php echo $courseID ?>">
  <button type="submit" class="btn btn-primary" onclick="myFunction()">Update Weekly Calendar</button>

<script>
     function myFunction(){
        alert('Weekly Schedule has been updated!');
     }

</script>


</form>
</body>

</html>