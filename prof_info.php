
<head>
  <link href="mainpage.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet"> 
  <link rel="icon" href="images/favicon.ico" type="image"/>
  </head>
  <body>
  <header>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">InfoSyllabus&copy;</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="mainpage.php">Welcome, Professor!</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
  <hr />

  </header>





<?php
require("session_info.php");
error_reporting(0);

$servername="localhost";
$dbname="infosyll_info-syllabus";
$username="infosyll_infosyllteam";
$password="#67ivGL#,}yG";

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed". $conn->connect_error);
}

$profID = $_SESSION["FKPROFID"];

$sql =" SELECT     
     title, fullname, username, password, email, officephone, officeaddress, monday, tuesday, wednesday, thursday, friday FROM profinfo where PKID= $profID ";

//echo $sql; exit;

$result = $conn->query($sql);


  $row=mysqli_num_rows($result);
  
  //echo $row; exit;

if($row>0){ // login successful

$row=$result->fetch_array();


$title =$row['title'];
$fullname =$row['fullname'];
$username =$row['username'];
$password =$row['password'];
$email =$row['email'];
$officephone =$row['officephone'];
$officeaddress =$row['officeaddress'];
$monday =$row['monday'];
$tuesday =$row['tuesday'];
$wednesday =$row['wednesday'];
$thursday =$row['thursday'];
$friday =$row['friday'];


//echo $title; exit;

}

?>


<html>
<body>

<form name="register" action="update_prof.php" method="get">

 
 <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
 <?php error_reporting(0); 
 $error=0;
 
   if($_REQUEST['error']==1){ 
?>
  <tr>
     <td colspan="4"  style="color:green" align="center">You are already registered. 
        &nbsp; <a href="forgotpassword.php">Forgot Login info?</a>
     </td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>0
  </tr>
 <?php }?> 

 <tr>
     <td colspan="4" align="center">    <b>Update Info </b>   </td>
 </tr>
                                        
                                                                                 
 <tr >
 <td colspan="4">&nbsp;</td>
 </tr>
  <tr>
    <td align="left" valign="top">
      <div align="right" class="noteRed">*</div>
    </td>
    <td>Title: </td>
    <td colspan=2>
      <SELECT NAME="title">
      <OPTION VALUE="0">Select</option>
       <?php
             if($title=="Dr.")
             {
                echo " <OPTION VALUE=\"Dr.\"  selected>Dr.</option>";
             }else{
              echo " <OPTION VALUE=\"Dr.\"  >Dr.</option>";
             }

             if($title=="Mr.")
             {
                echo " <OPTION VALUE=\"Mr.\"  selected>Mr.</option>";
             }else{
              echo " <OPTION VALUE=\"Mr.\"  >Mr.</option>";
             }

             if($title=="Mrs.")
             {
                echo " <OPTION VALUE=\"Mrs.\"  selected>Mrs.</option>";
             }else{
              echo " <OPTION VALUE=\"Mrs.\"  >Mrs.</option>";
             }

             if($title=="Ms.")
             {
                echo " <OPTION VALUE=\"Ms.\"  selected>Ms.</option>";
             }else{
              echo " <OPTION VALUE=\"Ms.\"  >Ms.</option>";
             }

             if($title=="Prof.")
             {
                echo " <OPTION VALUE=\"Prof.\"  selected>Prof.</option>";
             }else{
              echo " <OPTION VALUE=\"Prof.\"  >Prof.</option>";
             }
            ?>     
      </SELECT>
    </td>
  </tr>
 <tr>
   <td width="10%" align="left" valign="top">
    <div align="right" >*</div>
   </td>
   <td width="25%" align="left" valign="top">Full Name:</td>
   <td width="30%">
   
	 <input type="text" name="full_name" value="<?php echo $fullname;?>" style="text-color: #000000" size="25" >
   </td>
   <td width="35%">&nbsp;</td>
 </tr>

 <tr>
   <td width="10%" align="left" valign="top">
    <div align="right" >*</div>
   </td>
   <td width="25%" align="left" valign="top">Username:</td>
   <td width="30%">
    <input type="text" name="user_name" value="<?php echo $username;?>" style="text-color: #000000" size="25" >
   </td>
   <td width="35%">&nbsp;</td>
 </tr>
 
 <tr>
  <td align="left" valign="top">
  <div align="right" >*</div>
  </td>
  <td align="left" valign="top">Password:</td>
  <td colspan=2>
   <input type="password" name="user_pw" value="<?php echo $password;?>" style="text-color: #000000" size="25" >
  </td>
 </tr>
 
 <tr>
    <td align="left" valign="top">
      <div align="right">*</div>
    </td>
    <td align="left" valign="top">Confirm  Password:</td>
    <td colspan=2>
      <input type="password" name="password2" value="<?php echo $password;?>" style="text-color: #000000" size="25">
    </td>
 </tr>
 
 <tr>
   <td align="left" valign="top">
    <div align="right" >*</div>
   </td>
   <td align="left" valign="top">Email:</td>
   <td colspan=2>
    <input type="text" name="email" value="<?php echo $email;?>" style="text-color: #000000" size="25" >
   </td>
 </tr>
 
 
 

  <tr>
     <td colspan="4">&nbsp;</td>
  </tr>
  <tr> 
   <td align="left" valign="top"><div align="right" >*</div></td>
   <td align="left" valign="top">Office Phone No: </td>
   <td colspan=2>
    <input type="text" name="phone_no" value="<?php echo $officephone;?>" style="text-color: #000000" size="25">
   </td>
 </tr>

  <tr> 
   <td align="left" valign="top"><div align="right" >*</div></td>
   <td align="left" valign="top">Office Address: </td>
   <td colspan=2>
    <input type="text" name="address" value="<?php echo $officeaddress;?>" style="text-color: #000000" size="25" >
   </td>
 </tr> 
 
  <tr> 
    <td align="left" valign="top"><div align="right" >Monday Office Hours: </td>   
    <td>
      <input type="text" name="monday" value="<?php echo $monday;?>" style="text-color: #000000" size="10">
    </td>
   </tr>
   
   <tr> 
     <td align="left" valign="top"><div align="right" >Tuesday Office Hours: </td>   
    <td>
      <input type="text" name="tuesday" value="<?php echo $tuesday;?>" style="text-color: #000000" size="10">
    </td>
   </tr>
   
   <tr> 
     <td align="left" valign="top"><div align="right" >Wednesday Office Hours: </td>   
    <td>
      <input type="text" name="wednesday" value="<?php echo $wednesday;?>" style="text-color: #000000" size="10">
    </td>
   </tr>
   
   <tr> 
      <td align="left" valign="top"><div align="right" >Thursday Office Hours: </td>   
    <td>
      <input type="text" name="thursday" value="<?php echo $thursday;?>" style="text-color: #000000" size="10">
    </td>
   </tr>
   
   <tr> 
    <td align="left" valign="top"><div align="right" >Friday Office Hours: </td>   
    <td>
      <input type="text" name="friday" value="<?php echo $friday;?>" style="text-color: #000000" size="10">
    </td>
   </tr>
 
 
 <tr>
     <td colspan="3">&nbsp;</td>
 </tr>
 <tr>
     <td colspan="2">&nbsp;</td>
     <td colspan=2>
       <input type="submit" value="Update Profile" >
       <input type="reset" value="Clear" >
     </td>
  </tr>
</table>


</form>
</body>
</html>