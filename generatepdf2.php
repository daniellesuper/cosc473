<!--
  This file is to take the pdf.php file that is rendered on the webbrowser and transfer it to a PDF document that will be downloaded from the web browser
 -->
 <?php

require("session_info.php");
include ('library/tcpdf.php');
error_reporting(0);

$servername="localhost";
$dbname="info-syllabus";
$username="root";
$password="";

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed".$conn->connect_error);
}
error_reporting(0);

$FKPROFID = $_SESSION["FKPROFID"];
$courseID = $_GET["courseID"];

$sql1 = "SELECT  meetingDays, symbol1, symbol2, symbol3, symbol4, symbol5, symbol6, symbol7, symbol8, symbol9, symbol10, assign1, assign2, assign3, assign4, assign5, assign6, assign7, assign8, assign9, assign10 FROM courseinfo WHERE PKID = $_GET[courseID]";
 //echo $sql1; exit;
$sql2 = "SELECT week1_of, week2_of, week3_of, week4_of, week5_of, week6_of, week7_of, week8_of, week9_of, week10_of, week11_of, week12_of, week13_of, week14_of, week15_of, week1_desc, week2_desc, week3_desc, week4_desc, week5_desc, week6_desc, week7_desc, week8_desc, week9_desc, week10_desc, week11_desc, week12_desc, week13_desc, week14_desc, week15_desc, holiday, startdate, enddate, symbol1_week1, symbol2_week1, symbol3_week1, symbol1_week2, symbol2_week2, symbol3_week2, symbol1_week3, symbol2_week3, symbol3_week3, symbol1_week4, symbol2_week4, symbol3_week4, symbol1_week5, symbol2_week5, symbol3_week5, symbol1_week6, symbol2_week6, symbol3_week6, symbol1_week7, symbol2_week7, symbol3_week7, symbol1_week8, symbol2_week8, symbol3_week8, symbol1_week9, symbol2_week9 , symbol3_week9, symbol1_week10, symbol2_week10, symbol3_week10, symbol1_week11, symbol2_week11, symbol3_week11, symbol1_week12, symbol2_week12, symbol3_week12, symbol1_week13, symbol2_week13, symbol3_week13, symbol1_week14, symbol2_week14, symbol3_week14, symbol1_week15, symbol2_week15, symbol3_week15 FROM weeklyinfo WHERE fkcourseid= $_GET[courseID]";

//echo $sql2;exit;
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


<hmtl>
  

  <head>


  </head>
<!-- start css here -->

<style>
#topBox{
  width: 80%;
  height: auto;
  padding: 5px;
  margin: auto;
  background-color: transparent;
  display: flex;
  flex-direction: column;
  align-items: center;
  top: 0;
  
}
h1{
  padding: 5px;
  margin: 0;
}
#springBreak h4{
  text-align: center;
}
#ribbon {
  padding: 0 ;
  margin: 15px;
  width: 90%;
  position:relative;
  color: #ffffff;
  font: 16pt 'Patua One', sans-serif;
  text-align: center;
  letter-spacing:0.1em;
  text-shadow: 0px -1px 0px rgba(0,0,0,0.3);
  box-shadow: inset 0px 1px 0px rgba(255,255,255,.3),
        inset 0px 0px 20px rgba(0,0,0,0.1),
        0px 1px 1px rgba(0,0,0,0.4);
  background: -webkit-linear-gradient(top,#17a7d2, #17a7d2);
  display: inline-block;
}
#ribbon:before, #ribbon:after {
  content: "";
  width:.2em;
  bottom:-.5em;
  position:absolute;
  display:block;
  border: .9em solid #17a7d2;
  box-shadow:0px 1px 0px rgba(0,0,0,0.4);
  z-index:-2;
}
#ribbon:before {
  left:-1.35em;
  border-right-width: .75em;
  border-left-color:transparent;
}
#ribbon:after {
  right:-1.35em;
  border-left-width: .75em;
  border-right-color:transparent;
  margin-right: 3px;
}
.box{
    width: 200px;
    height: 130px;
    background-color: lightgrey;
    border: solid 1px black;
    position: relative;
    margin: 15px;
    overflow: visible;
    
}
.box:after {
  content: "";
  position: absolute;
  left: 100%;
  top: 26px;
  width: 0;
  height: 0;
  border-top: 13px solid transparent;
  border-left: 26px solid lightgray;
  border-bottom: 13px solid transparent;
}
.circle{
  height: 45px;
   width: 45px; 
   border-radius: 50px; /*this only needs to be half of the total width*/
   background: white; /*background color of the tag*/
   border: 2px solid black; /*sets the border width, type, and color*/
   position: absolute;
   left: -20px;
   top: -20px;
   text-align: center;
   line-height: 2.7rem;
} 

</style> 
<!-- end of css -->
<body>


<div class="boxes">
  <div id="topBox">
    <div id="ribbon">
      <h1>Weekly Schedule</h1>
    </div><!-- ribbon div -->
  </div> <!-- topBox div -->

<div class="breakheader">

<p>Break: <?php echo $bar[holiday]; ?> | Start date: <?php echo $bar[startdate];?> | Date End: <?php echo $bar[enddate] ?></p>

</div><!-- end of class breakheader -->

<div class="row">
      
      <div class="box">
        <div class="circle">1</div>
        <?php 

            if($row["meetingDays"] == "TTR"){
            ?>

Week of <?php echo $bar[week1_of]; ?> <br>
Description  <?php echo $bar[week1_desc]; ?>
            
            <?php echo "T". $bar[symbol1_week1]?><br>
              
            <?php echo "TR"; 

              echo $bar[symbol2_week1]?><br>
            
            <?php

          }
           else {
            
            if($row["meetingDays"] == "MWF"){
              ?>

Week of <?php echo $bar[week1_of]; ?> <br>
Description  <?php echo $bar[week1_desc]; ?><br>

            <?php echo "M ".$bar[symbol1_week1];?> <br>

            <?php echo "W " . $bar[symbol2_week1];?> <br>

            <?php echo "F " . $bar[symbol3_week1];?> <br>

        <?php
              }
           }

        ?>
      </div><!-- circle div -->
  </div><!-- box div -->
</div><!-- row div -->

  </body>
  <!-- this source is NEEDED DO NOT DELETE -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  


  <script>
    var doc = new jsPDF();

    // calling for the weekly schedule ribbon
    var h1  =document.querySelector('#topBox')
    doc.fromHTML(h1,15,15)

    // calling for the break, start date, end date
    var breakheader = document.querySelector('.breakheader')
    doc.fromHTML(breakheader, 25,25)

    var box = document.querySelector('.box')
    doc.fromHTML(box, 40,40)

    doc.save("output.pdf")

  </script>
</hmtl>



<?php 
$conn->close(); }// end of if else for row and bar
?>