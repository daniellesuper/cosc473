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

$sql1 = "SELECT  meetingDays FROM courseinfo WHERE PKID = $_GET[courseID]";
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

<?php

   function display_options(){

               echo 
               "<option value='Star'> Star </option>
               <option value='X'> X </option>
               <option value='CheckMark'> CheckMark </option>
               <option value='Exclamationpoint'> Exclamation Point </option>
               <option value='Circle'> Circle </option>
               <option value='Kite'> Kite </option>
               <option value='Square'> Square </option>
               <option value='Rectangle'> Rectangle </option>
               <option value='Trefoil'> Trefoil </option>
               <option value='Heart'> Heart </option>"; 

   }
?>


<div class="boxes">
 <div id="topBox">
   <div id="ribbon">
     <h1>Weekly Schedule</h1>
   </div>
 </div>  


<form action="insert_weekly_info.php" form="get" style="padding-left: 25px;">

<div class="breakheader">
Break:  &nbsp <select name="holiday_name">
       <option value="">Select</option>
       <option value="Thanksgiving">Thanksgiving</option> 
       <option value="Spring">Spring</option>
       </select> &nbsp
<br />
Date To: &nbsp &nbsp<input type="date" name="startdate1" value ="<?php echo $startdate; ?>"> &nbsp;
<br />
Date End: <input type="date" name="enddate" value="<?php echo $enddate; ?>"> <br><br>

</div><!-- end of breakheader div -->

 <div class="row">
     <div class="box">
       <div class="circle">1</div>
       <?php 
           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week1_of" value =""> &nbsp; <br>
Description &nbsp   <input type="text" length="255" name="week1_desc" value="<?php echo $subheading1; ?>" > 
           <select name="symbol1_week1">
               <?php

                        display_options();
               ?>

           </select>

           <?php echo "T"; ?><br>
           <select name="symbol2_week1">
               <?php

                        display_options();
               ?>
           </select>

           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week1_of" value =""> &nbsp; <br>
Description &nbsp   <input type="text" length="255" name="week1_desc" value="<?php echo $subheading1; ?>" > 
           <select name="symbol1_week1">

           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week1">
               <?php

                        display_options();
               ?>  
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week1">
               <?php

                        display_options();
               ?>
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

           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week2_of" value ="<?php echo $startdate; ?>"> &nbsp;<br>
Description   &nbsp <input type="text" length="255" name="week2_desc" value="<?php echo $subheading2; ?>" > 
        <select name="symbol1_week2">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week2">
               <?php

                        display_options();
               ?> 
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>

Week of &nbsp <input type="text" name="week2_of" value ="<?php echo $startdate; ?>"> &nbsp;<br>
Description   &nbsp <input type="text" length="255" name="week2_desc" value="<?php echo $subheading2; ?>" > 
        <select name="symbol1_week2">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>

           <select name="symbol2_week2">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week2">
              <?php

                        display_options();
               ?>
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

           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week3_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week3_desc" value="<?php echo $subheading3; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week3">

               <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>



Week of &nbsp <input type="text" name="week3_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week3_desc" value="<?php echo $subheading3; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?> 
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week3">

               <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week3">

               <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week4_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week4_desc" value="<?php echo $subheading4; ?>" > 
           <select name="symbol1_week4">
                           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week4">

               <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

          ?><br>


Week of &nbsp <input type="text" name="week4_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week4_desc" value="<?php echo $subheading4; ?>" > 
           <select name="symbol1_week4">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week4">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week4">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week5_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week5_desc" value="<?php echo $subheading5; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week5">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>

Week of &nbsp <input type="text" name="week5_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week5_desc" value="<?php echo $subheading5; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


          <select name="symbol2_week5">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week5">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week6_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week6_desc" value="<?php echo $subheading6; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>
           </select>

           <?php echo "T"; ?><br>

           <select name="symbol2_week6">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week6_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week6_desc" value="<?php echo $subheading6; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>  
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week6">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week6">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week7_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week7_desc" value="<?php echo $subheading7; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

          <select name="symbol2_week7">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week7_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week7_desc" value="<?php echo $subheading7; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week7">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week7">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week8_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week8_desc" value="<?php echo $subheading8; ?>" > 
           <select name="symbol1_week8">
          <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week8">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week8_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week8_desc" value="<?php echo $subheading8; ?>" > 
           <select name="symbol1_week8">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week8">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week8">
               <?php

                        display_options();
               ?>
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

           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week9_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week9_desc" value="<?php echo $subheading9; ?>" >
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week9">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week9_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week9_desc" value="<?php echo $subheading9; ?>" > 
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week9">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week9">
           <?php

                        display_options();
               ?>
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

           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week10_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week10_desc" value="<?php echo $subheading10; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week10">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week10_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week10_desc" value="<?php echo $subheading10; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week10">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week10">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
           ?>
Week of &nbsp <input type="text" name="week11_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week11_desc" value="<?php echo $subheading11; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week11">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week11_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week11_desc" value="<?php echo $subheading11; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week11">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week11">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
            ?>

Week of &nbsp <input type="text" name="week12_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week12_desc" value="<?php echo $subheading12; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

          <select name="symbol2_week12">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week12_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week12_desc" value="<?php echo $subheading12; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week12">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week12">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
           ?>

Week of &nbsp <input type="text" name="week13_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week13_desc" value="<?php echo $subheading13; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week13">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week13_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week13_desc" value="<?php echo $subheading13; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week13">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week13">
           <?php

                        display_options();
               ?>
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

           if($row["meetingDays"] == "TTR"){
            ?> 

Week of &nbsp <input type="text" name="week14_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week14_desc" value="<?php echo $subheading14; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>

Week of &nbsp <input type="text" name="week14_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week14_desc" value="<?php echo $subheading14; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week14">
           <?php

                        display_options();
               ?>
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
           if($row["meetingDays"] == "TTR"){
            ?>

Week of &nbsp <input type="text" name="week15_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week15_desc" value="<?php echo $subheading15; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>

           <select name="symbol2_week15">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "TR"; ?><br>

           <?php

         }
          else {

           if($row["meetingDays"] == "MWF"){

           ?><br>


Week of &nbsp <input type="text" name="week15_of" value ="<?php echo $startdate; ?>"> &nbsp; <br>
Description   &nbsp <input type="text" length="255" name="week15_desc" value="<?php echo $subheading15; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>  
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week15">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "W"; ?><br>



           <select name="symbol3_week15">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "F" ?><br>

       <?php
             } 
          }   

       ?>
     </div>

<?php



$sql = "SELECT symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10
           FROM courseinfo WHERE PKID = $_GET[courseID]";


$sql_assign ="SELECT assign1, assign2, assign3, assign4, assign5, assign6, assign7, assign8, assign9, assign10 
                   FROM courseinfo WHERE PKID = $_GET[courseID]";

   $result = $conn->query($sql);
   $result_assign = $conn->query($sql_assign);


if($result->num_rows > 0) {
 //used for profinfo items
 // output data of each row
 $row = $result->fetch_assoc(); 

 if ($result_assign->num_rows > 0){
   $col = $result_assign->fetch_assoc();

 }
}


?>
     key:
     <div class="keybox">
       <div class="symbolassignment">
         <div id="symbols">

           <?php

               foreach($row as $symbol){ 

                   if ($symbol == "Star"){
                     echo '<img src="images/star.jpeg"  width="30px" height="20px"/>'."<br>"."<br>";
                   } 

                   if ($symbol == "X"){
                     echo '<img src="images/x.jpeg"  width="30px" height="10px"/>'."<br>"."<br>";

                   }

                   if ($symbol == "CheckMark"){
                     echo '<img src="images/checkmark.jpeg"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Exclamationpoint"){
                     echo '<img src="images/exclamation1.png"  width="40px" height="40px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Circle"){
                     echo '<img src="images/circle.png"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Kite"){
                     echo '<img src="images/Kite.png"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Square"){
                     echo '<img src="images/Square.jpeg"  width="20px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Rectangle"){
                     echo '<img src="images/Rectangle.png"  width="40px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Trefoil"){
                     echo '<img src="images/Trefoil.png"  width="30px" height="20px"/>'."<br>"."<br>";
                   }

                   if ($symbol == "Heart"){
                     echo '<img src="images/Heart.png"  width="30px" height="20px"/>'."<br>";
                   } 
               } 

              ?>  
           </div><!-- symbols id div -->


           <div id="assignmentList">

             <?php 
              //echo '<ul>';

               foreach($col as $assignment){
                 echo '<li>'.$assignment.'</li>'."<br>";

               }

              // echo '</ul>';

             ?>
           </div> <!-- end of assignmentList div --> 
         </div><!-- symbol assignment class div -->

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
 <button id="submitbutton" type="submit" class="btn btn-primary" onclick="myFunction()">Update Weekly Calendar</button>


<script>
    function myFunction(){
       alert('Weekly Schedule has been updated!');
    }

</script>


</form>
</body>

</html>