<?php
require("session_info.php");

error_reporting(0);

$FKPROFID = $_SESSION["FKPROFID"];
$courseID = $_GET['courseID'];

$servername="localhost";
$dbname="infosyll_info-syllabus";
$username="infosyll_infosyllteam";
$password="#67ivGL#,}yG";

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}
error_reporting(0);

$sql ="SELECT holiday, startdate, enddate, custombreakname, customstartdate, customenddate, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, symbol1_week1, symbol2_week1, symbol3_week1, symbol1_week2, symbol2_week2, symbol3_week2, symbol1_week3, symbol2_week3, symbol3_week3, symbol1_week4, symbol2_week4, symbol3_week4, symbol1_week5, symbol2_week5, symbol3_week5, symbol1_week6, symbol2_week6, symbol3_week6, symbol1_week7, symbol2_week7, symbol3_week7,symbol1_week8, symbol2_week8, symbol3_week8, symbol1_week9, symbol2_week9, symbol3_week9, symbol1_week10, symbol2_week10, symbol3_week10, symbol1_week11, symbol2_week11, symbol3_week11, symbol1_week12, symbol2_week12, symbol3_week12, symbol1_week13, symbol2_week13, symbol3_week13, symbol1_week14, symbol2_week14, symbol3_week14, symbol1_week15, symbol2_week15, symbol3_week15 FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

$result = $conn->query($sql);

$row=mysqli_num_rows($result);

if($row>0){ // login successful
$row=$result->fetch_array();

$holiday = $bar['holiday'];
$startdate = $bar['startdate'];
$enddate = $bar['enddate'];
$custombreakname = $bar['custombreakname'];
$customstartdate = $bar['customstartdate'];
$customenddate = $bar['customenddate'];
$week1_desc = $bar['week1_desc'];
$week2_desc = $bar['week2_desc'];
$week3_desc = $bar['week3_desc'];
$week4_desc = $bar['week4_desc'];
$week5_desc = $bar['week5_desc'];
$week6_desc = $bar['week6_desc'];
$week7_desc = $bar['week7_desc'];
$week8_desc = $bar['week8_desc'];
$week9_desc = $bar['week9_desc'];
$week10_desc = $bar['week10_desc'];
$week11_desc = $bar['week11_desc'];
$week12_desc = $bar['week12_desc'];
$week13_desc = $bar['week13_desc'];
$week14_desc = $bar['week14_desc'];
$week15_desc = $bar['week15_desc'];
$week1_of = $bar['week1_of'];
$week2_of = $bar['week2_of'];
$week3_of = $bar['week3_of'];
$week4_of = $bar['week4_of'];
$week5_of = $bar['week5_of'];
$week6_of = $bar['week6_of'];
$week7_of = $bar['week7_of'];
$week8_of = $bar['week8_of'];
$week9_of = $bar['week9_of'];
$week10_of = $bar['week10_of'];
$week11_of = $bar['week11_of'];
$week12_of = $bar['week12_of'];
$week13_of = $bar['week13_of'];
$week14_of = $bar['week14_of'];
$week15_of = $bar['week15_of'];
$symbol1_week1 = $bar['symbol1_week1'];
$symbol2_week1 = $bar['symbol2_week1'];
$symbol3_week1 = $bar['symbol3_week1'];
$symbol1_week2 = $bar['symbol1_week2'];
$symbol2_week2 = $bar['symbol2_week2'];
$symbol3_week2 = $bar['symbol3_week2'];
$symbol1_week3 = $bar['symbol1_week3'];
$symbol2_week3 = $bar['symbol2_week3'];
$symbol3_week3 = $bar['symbol3_week3'];
$symbol1_week4 = $bar['symbol1_week4'];
$symbol2_week4 = $bar['symbol2_week4'];
$symbol3_week4 = $bar['symbol3_week4'];
$symbol1_week5 = $bar['symbol1_week5'];
$symbol2_week5 = $bar['symbol2_week5'];
$symbol3_week5 = $bar['symbol3_week5'];
$symbol1_week6 = $bar['symbol1_week6'];
$symbol2_week6 = $bar['symbol2_week6'];
$symbol3_week6 = $bar['symbol3_week6'];
$symbol1_week7 = $bar['symbol1_week7'];
$symbol2_week7 = $bar['symbol2_week7'];
$symbol3_week7 = $bar['symbol3_week7'];
$symbol1_week8 = $bar['symbol1_week8'];
$symbol2_week8 = $bar['symbol2_week8'];
$symbol3_week8 = $bar['symbol3_week8'];
$symbol1_week9 = $bar['symbol1_week9'];
$symbol2_week9 = $bar['symbol2_week9'];
$symbol3_week9 = $bar['symbol3_week9'];
$symbol1_week10 = $bar['symbol1_week10'];
$symbol2_week10 = $bar['symbol2_week10'];
$symbol3_week10 = $bar['symbol3_week10'];
$symbol1_week11 = $bar['symbol1_week11'];
$symbol2_week11 = $bar['symbol2_week11'];
$symbol3_week11 = $bar['symbol3_week11'];
$symbol1_week12 = $bar['symbol1_week12'];
$symbol2_week12 = $bar['symbol2_week12'];
$symbol3_week12 = $bar['symbol3_week12'];
$symbol1_week13 = $bar['symbol1_week13'];
$symbol2_week13 = $bar['symbol2_week13'];
$symbol3_week13 = $bar['symbol3_week13'];
$symbol1_week14 = $bar['symbol1_week14'];
$symbol2_week14 = $bar['symbol2_week14'];
$symbol3_week14 = $bar['symbol3_week14'];
$symbol1_week15 = $bar['symbol1_week15'];
$symbol2_week15 = $bar['symbol2_week15'];
$symbol3_week15 = $bar['symbol3_week15'];
}    
if ($_GET['ok'] == 1) {
   echo "Weekly Info has been updated";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="images/favicon.ico" type="image"/>
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

$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate, custombreakname, customstartdate, customenddate, symbol1_week1, symbol2_week1, symbol3_week1, symbol1_week2, symbol2_week2, symbol3_week2, symbol1_week3, symbol2_week3, symbol3_week3, symbol1_week4, symbol2_week4, symbol3_week4, symbol1_week5, symbol2_week5, symbol3_week5, symbol1_week6, symbol2_week6, symbol3_week6, symbol1_week7, symbol2_week7, symbol3_week7,symbol1_week8, symbol2_week8, symbol3_week8, symbol1_week9, symbol2_week9, symbol3_week9, symbol1_week10, symbol2_week10, symbol3_week10, symbol1_week11, symbol2_week11, symbol3_week11, symbol1_week12, symbol2_week12, symbol3_week12, symbol1_week13, symbol2_week13, symbol3_week13, symbol1_week14, symbol2_week14, symbol3_week14, symbol1_week15, symbol2_week15, symbol3_week15 FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

if($result1->num_rows > 0) {
 //used for profinfo items
 // output data of each row
 $row = $result1->fetch_assoc(); 

 if($result2->num_rows > 0){
   $bar = $result2->fetch_assoc();
 }
?>
<?php
   function display_options(){
               echo 
               '
               <option value=" ">Select Symbol</option>
               <option value="Star" > Star </option>
               <option value="X"> X </option>
               <option value="CheckMark"> CheckMark </option>
               <option value="Exclamationpoint"> Exclamation Point </option>
               <option value="Circle"> Circle </option>
               <option value="Kite"> Kite </option>
               <option value="Square"> Square </option>
               <option value="Rectangle"> Rectangle </option>
               <option value="Trefoil"> Trefoil </option>
               <option value="Heart"> Heart </option>
            '; 
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
<div id="breakLeft">
  Break:  &nbsp; <select name="holiday_name" value="<?php echo $bar[holiday]; ?>">
        <option value="">Select</option>
        <option value="Thanksgiving">Thanksgiving</option> 
        <option value="Spring">Spring</option>
        </select> &nbsp
  <br />
  Date To: &nbsp; &nbsp;<input type="date" name="startdate1" value ="<?php echo $bar[startdate]; ?>"> &nbsp;
  <br />
  Date End: <input type="date" name="enddate" value="<?php echo $bar[enddate]; ?>"> <br>
</div>

<div id="breakRight">
  Custom break: <input type="text" name="custombreakname" value ="<?php echo $bar[custombreakname]; ?>"> &nbsp; 
  <br />
  Date To: &nbsp; &nbsp;<input type="date" name="customstartdate" value ="<?php echo $bar[customstartdate]; ?>"> &nbsp;
    <br />
  Date End: <input type="date" name="customenddate" value="<?php echo $bar[customenddate]; ?>"> <br>
</div>

</div><!-- end of breakheader div -->
<br /><br /><br /><br />
 <div class="row">
     <div class="box">
       <div class="circle">1</div>
       <?php 
           if($row["meetingDays"] == "TTR"){
           ?>
            Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">
               <?php
                  display_options();
               ?>

           </select>

           <?php echo "T"; ?><br>
           <select name="symbol2_week1" value="<?php echo $bar[symbol2_week1]; ?>">
               <?php

                        display_options();
               ?>
           </select>

           <?php echo "TR"; ?><br>

           <?php
 
         } 

         elseif ($row["meetingDays"] == "OAW"){
          ?>
              Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>
              Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>
              Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>
              Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>
              Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>
              Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

        elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
Description &nbsp;   <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">

            <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week1" value="<?php echo $bar[symbol2_week1]; ?>">
               <?php

                        display_options();
               ?>  
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week1" value="<?php echo $bar[symbol3_week1]; ?>">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "F" ?><br>
           <?php

        }

           else{

           ?><br>


Week of &nbsp; <input type="text" name="week1_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
Description &nbsp;   <input type="text" length="255" name="week1_desc" value="<?php echo $bar[week1_desc]; ?>" > 
           <select name="symbol1_week1" value="<?php echo $bar[symbol1_week1]; ?>">

            <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week1" value="<?php echo $bar[symbol2_week1]; ?>">
               <?php

                        display_options();
               ?>  
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week1" value="<?php echo $bar[symbol3_week1]; ?>">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>
           

       <?php
             
    }
           
       ?>


     </div>

<div class="box">
       <div class="circle">2</div>
         <?php 

         if($row["meetingDays"] == "TTR"){
           ?>
            Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">
               <?php
                  display_options();
               ?>

           </select>

           <?php echo "T"; ?><br>
           <select name="symbol2_week2" value="<?php echo $bar[symbol2_week2]; ?>">
               <?php

                        display_options();
               ?>
           </select>

           <?php echo "TR"; ?><br>

           <?php
 
         } 

         elseif ($row["meetingDays"] == "OAW"){
          ?>
              Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>
              Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>
              Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>
              Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>
              Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>
              Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
            Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">
               <?php
                  display_options();
               ?>

           </select>
         
         <?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>

Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 

<select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">

            <?php

                        display_options();
               ?>
           </select>
           <?php echo "M"; ?><br>


           <select name="symbol2_week2" value="<?php echo $bar[symbol2_week2]; ?>">
               <?php

                        display_options();
               ?>  
           </select>
           <?php echo "W"; ?><br>


           <select name="symbol3_week2" value="<?php echo $bar[symbol3_week2]; ?>">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "F" ?><br>
           

       <?php
     }
           else{

           ?><br>


Week of &nbsp; <input type="text" name="week2_of" value ="<?php echo $bar[week2_of]; ?>"> &nbsp; <br>
Description &nbsp;   <input type="text" length="255" name="week2_desc" value="<?php echo $bar[week2_desc]; ?>" > 
           <select name="symbol1_week2" value="<?php echo $bar[symbol1_week2]; ?>">

            <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week2" value="<?php echo $bar[symbol2_week2]; ?>">
               <?php

                        display_options();
               ?>  
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week2" value="<?php echo $bar[symbol3_week2]; ?>">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>
           

       <?php
             
    }
           
       ?>
     </div>

<div class="box">
       <div class="circle">3</div>

       <?php 

           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

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

         elseif ($row["meetingDays"] == "OAW"){
          ?>
Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?>
           </select>

           <?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>
Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?>
           </select>

           <?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>
Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?>
           </select>

           <?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>
Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?>
           </select>

           <?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>
Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?>
           </select>

           <?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>
Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?>
           </select>

           <?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" >

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
               
           else{

           ?><br>

Week of &nbsp; <input type="text" name="week3_of" value ="<?php echo $bar[week3_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week3_desc" value="<?php echo $bar[week3_desc]; ?>" > 

           <select name="symbol1_week3">

               <?php

                        display_options();
               ?> 
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week3">

               <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week3">

               <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             }
        
       ?>
     </div>

<div class="box">
       <div class="circle">4</div>

       <?php 
           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>
Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
           <select name="symbol1_week4">
                           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>
Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
           <select name="symbol1_week4">
                           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>
Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
           <select name="symbol1_week4">
                           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>
Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
           <select name="symbol1_week4">
                           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>
Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
           <select name="symbol1_week4">
                           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>
Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
           <select name="symbol1_week4">
                           <?php

                        display_options();
               ?>
           </select>
<?php
       }

        elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week4_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" >

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


           else{

           ?><br>

Week of &nbsp; <input type="text" name="week4_of" value ="<?php echo $bar[week1_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week4_desc" value="<?php echo $bar[week4_desc]; ?>" > 
           <select name="symbol1_week4">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week4">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week4">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>           

</div>  
 <div class="row">
     <div class="box">
       <div class="circle">5</div>

       <?php 
           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

          Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

          Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

          Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

          Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

          Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

          Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 

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

           else{

           ?><br>

           Week of &nbsp; <input type="text" name="week5_of" value ="<?php echo $bar[week5_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week5_desc" value="<?php echo $bar[week5_desc]; ?>" > 
           <select name="symbol1_week5">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


          <select name="symbol2_week5">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week5">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             }
          

       ?>
     </div>

<div class="box">
       <div class="circle">6</div>

       <?php 
           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

        elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" >

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

           else{

           ?><br>
           Week of &nbsp; <input type="text" name="week6_of" value ="<?php echo $bar[week6_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week6_desc" value="<?php echo $bar[week6_desc]; ?>" > 
           <select name="symbol1_week6">
           <?php

                        display_options();
               ?>  
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week6">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week6">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>
     <div class="box">
       <div class="circle">7</div>

       <?php 
           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" >

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

           else{

           ?><br>
           Week of &nbsp; <input type="text" name="week7_of" value ="<?php echo $bar[week7_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week7_desc" value="<?php echo $bar[week7_desc]; ?>" > 
           <select name="symbol1_week7">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week7">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week7">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             }
          

       ?>
     </div>
     <div class="box">
       <div class="circle">8</div>

       <?php 
           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
           <select name="symbol1_week8">
          <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
           <select name="symbol1_week8">
          <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
           <select name="symbol1_week8">
          <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
           <select name="symbol1_week8">
          <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
           <select name="symbol1_week8">
          <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
           <select name="symbol1_week8">
          <?php

                        display_options();
               ?>
           </select>
<?php
       }


        elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 

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

           else{

           ?><br>
Week of &nbsp; <input type="text" name="week8_of" value ="<?php echo $bar[week8_of]; ?>"> &nbsp; <br>
Description  &nbsp; <input type="text" length="255" name="week8_desc" value="<?php echo $bar[week8_desc]; ?>" > 
           <select name="symbol1_week8">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week8">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week8">
               <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
</div>
 </div>
 <div class="row">
     <div class="box">
       <div class="circle">9</div>

       <?php 

           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

        elseif($row["meetingDays"] == "MWF"){
          ?>

Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" >

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

           else{

           ?><br>
           Week of &nbsp; <input type="text" name="week9_of" value ="<?php echo $bar[week9_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week9_desc" value="<?php echo $bar[week9_desc]; ?>" > 
           <select name="symbol1_week9">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week9">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week9">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>
     <div class="box">
       <div class="circle">10</div>

       <?php 

           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>
Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>  

<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>
Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>  

<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>
Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>  

<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>
Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>  

<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>
Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>  

<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>
Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>  

<?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>

Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 

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

           else{

           ?><br>

Week of &nbsp; <input type="text" name="week10_of" value ="<?php echo $bar[week10_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week10_desc" value="<?php echo $bar[week10_desc]; ?>" > 
           <select name="symbol1_week10">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week10">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week10">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>
     <div class="box">
       <div class="circle">11</div>

       <?php 
           if($row["meetingDays"] == "TTR" ){
           ?>
Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
<?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" >

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

           else{

           ?><br>

Week of &nbsp; <input type="text" name="week11_of" value ="<?php echo $bar[week11_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week11_desc" value="<?php echo $bar[week11_desc]; ?>" > 
           <select name="symbol1_week11">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week11">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week11">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>
     <div class="box">
       <div class="circle">12</div>

       <?php 
           if($row["meetingDays"] == "TTR" ){
            ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>

<?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 

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

           else{

           ?><br>

Week of &nbsp; <input type="text" name="week12_of" value ="<?php echo $bar[week12_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week12_desc" value="<?php echo $bar[week12_desc]; ?>" > 
           <select name="symbol1_week12">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week12">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week12">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>
 </div>
 <div class="row">
     <div class="box">
     <div class="circle">13</div>

     <?php 
           if($row["meetingDays"] == "TTR" ){
           ?>

Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>

          <?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>

          <?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>

          <?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>

          <?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>

          <?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>

          <?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 

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

           else{

           ?><br>


Week of &nbsp; <input type="text" name="week13_of" value ="<?php echo $bar[week13_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week13_desc" value="<?php echo $bar[week13_desc]; ?>" > 
           <select name="symbol1_week13">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week13">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week13">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>
     <div class="box">
     <div class="circle">14</div>

     <?php 

           if($row["meetingDays"] == "TTR" ){
            ?> 

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>
 
 <?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>
 
 <?php
       }

       elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>
 
 <?php
       }

       elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>
 
 <?php
       }

       elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>
 
 <?php
       }

       elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "T"; ?><br>
 
 <?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" >

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

           else{

           ?><br>

Week of &nbsp; <input type="text" name="week14_of" value ="<?php echo $bar[week14_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week14_desc" value="<?php echo $bar[week14_desc]; ?>" > 
           <select name="symbol1_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>


           <select name="symbol3_week14">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
          }

       ?>
     </div>
     <div class="box">
     <div class="circle">15</div>

     <?php 
           if($row["meetingDays"] == "TTR" ){
            ?>

Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
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

         elseif ($row["meetingDays"] == "OAW"){
          ?>

Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>
           </select>

 <?php
       }

       elseif ($row["meetingDays"] == "M"){
          ?>

Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>
           </select>

 <?php
       }

        elseif ($row["meetingDays"] == "T"){
          ?>

Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>
           </select>

 <?php
       }

        elseif ($row["meetingDays"] == "W"){
          ?>

Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>
           </select>

 <?php
       }

        elseif ($row["meetingDays"] == "TR"){
          ?>

Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>
           </select>

 <?php
       }

        elseif ($row["meetingDays"] == "F"){
          ?>

Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>
           </select>

 <?php
       }

       elseif($row["meetingDays"] == "MWF"){
          ?>
Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
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

           else{

           ?><br>

           Week of &nbsp; <input type="text" name="week15_of" value ="<?php echo $bar[week15_of]; ?>"> &nbsp; <br>
Description   &nbsp; <input type="text" length="255" name="week15_desc" value="<?php echo $bar[week15_desc]; ?>" > 
           <select name="symbol1_week15">
           <?php

                        display_options();
               ?>  
           </select>
           <?php echo ""; ?><br>


           <select name="symbol2_week15">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo ""; ?><br>



           <select name="symbol3_week15">
           <?php

                        display_options();
               ?>
           </select>
           <?php echo "" ?><br>

       <?php
             
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
    <div class="keybox">
      <h3 id="keyHeader">Key:</h3>
       <div class="symbolassignment">
         <div id="symbols">
           <?php
               foreach($row as $symbol){ 
                   if ($symbol == "Star"){
                     echo '<img src="images/star.jpeg"  width="30px" height="30px"/>'."<br>"."<br>";
                   } 
                   if ($symbol == "X"){
                     echo '<img src="images/x.jpeg"  width="30px" height="30px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "CheckMark"){
                     echo '<img src="images/checkmark.jpeg"  width="30px" height="20px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "Exclamationpoint"){
                     echo '<img src="images/exclamation1.png"  width="30px" height="30px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "Circle"){
                     echo '<img src="images/circle.png"  width="30px" height="30px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "Kite"){
                     echo '<img src="images/Kite.png"  width="30px" height="30px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "Square"){
                     echo '<img src="images/Square.jpeg"  width="20px" height="20px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "Rectangle"){
                     echo '<img src="images/Rectangle.png"  width="40px" height="20px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "Trefoil"){
                     echo '<img src="images/Trefoil.png"  width="30px" height="30px"/>'."<br>"."<br>";
                   }
                   if ($symbol == "Heart"){
                     echo '<img src="images/Heart.png"  width="30px" height="30px"/>'."<br>";
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

}// end if course info
/* 
else { 
 echo "no results meeting days";
} 
*/
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

<?php //echo $conn->query($strQuery);?>
</form>
</body>

</html>