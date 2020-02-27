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
      <h4> <?php  echo $bar["holiday"]. " break is "; 
                  echo $bar["startdate"]." through ".$bar["enddate"];
            ?> <!--insert spring break dates here--></h4>
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

<?php
 

    function load_info(){

        for($i = 0; $i < 15; $i++){
            echo "<div class='row'>";
            echo "<div class='box'>"."<br>";
            echo "<div class='circle'>"."</div>";
            
            echo "Week of: "."<input type='text'>"."<br>";
            echo "Assigment: ". "<input type='text'>"."<br>";


           echo  "<select id='symbols'>";
                echo "<option value='Star'>Star</option>";
                echo "<option value='Exclamation'>Exclamation Point</option>";
                echo "<option value='Circle'>Circle</option>";
                echo "<option value='X'>X</option>";
                echo "<option value='CheckMark'>CheckMark</option>";
           echo  "</select>"; 
         
             echo "T"; ?><br><?php

            echo  "<select id='symbols'>";
                echo "<option value='Star'>Star</option>";
                echo "<option value='Exclamation'>Exclamation Point</option>";
                echo "<option value='Circle'>Circle</option>";
                echo "<option value='X'>X</option>";
                echo "<option value='CheckMark'>CheckMark</option>";
            echo "</select>"; 
        
            echo "TH"; ?><br><?php

            echo "</div>"; // circle div 
            echo "</div>"; // box div
            echo "</div>"; //row div
                  

        } // for loop bracket

    } //function bracket

 load_info();
 }

  $conn->close();
  ?>

 

  <input id="printButton" type="button" value ="Print" onClick="print();">

</form>
</body>

</html>