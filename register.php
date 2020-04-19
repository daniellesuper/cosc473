<html>
<head>
  <link rel="icon" href="images/favicon.ico" type="image"/>
</head>
<body>
<link rel="stylesheet" type="text/css" href="landingpage.css">
<header>
    <div class="container"> 
      <div id="branding">
        <a href="index.html"><span class="highlight"><img src="./images/logofinal.png"></span></a>
      </div><!--end branding-->
      <nav>
        <div id="links">
        <ul>
          <li class="current"><a href="index.html">Home</a></li>
          <li class="current"><a href="register.php">Register</a></li>
          <li class="current"><a href="login.php">Login</a></li>  
        </ul>
        </div><!--end links-->
      </nav>
    </div><!--end container-->
  </header>
  <form name="register" action="insert_prof_reg.php" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
<?php error_reporting(0); 
 $error=0;
 
   if($_REQUEST['error']==1){ 
?>
  <tr>
     <td colspan="4"  style="color:green" align="center">You are already registered. 
        &nbsp; <a href="forgot_password.php">Forgot Login info?</a>
     </td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
  </tr>
 <?php }?> 

 <tr>
     <td colspan="4" align="center">    <b>Professor's Registration </b>   </td>
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
      <SELECT NAME="title" required>
       <OPTION VALUE="">Select</option>
       
         <OPTION VALUE="Dr.">Dr.</option>
		 <OPTION VALUE="Mr.">Mr.</option>
		 <OPTION VALUE="Mrs.">Mrs.</option>
		 <OPTION VALUE="Ms.">Ms.</option>
		 <OPTION VALUE="Prof.">Prof.</option>     
      </SELECT>
    </td>
  </tr>
 <tr>
   <td width="10%" align="left" valign="top">
    <div align="right" >*</div>
   </td>
   <td width="25%" align="left" valign="top">Full Name:</td>
   <td width="30%">
    <input type="text" name="full_name" style="text-color: #000000" size="25"  value="" required>
   </td>
   <td width="35%">&nbsp;</td>
 </tr>

 <tr>
   <td width="10%" align="left" valign="top">
    <div align="right" >*</div>
   </td>
   <td width="25%" align="left" valign="top">Username:</td>
   <td width="30%">
    <input type="text" name="user_name" style="text-color: #000000" size="25"  value=""required>
   </td>
   <td width="35%">&nbsp;</td>
 </tr>
 
 <tr>
  <td align="left" valign="top">
  <div align="right" >*</div>
  </td>
  <td align="left" valign="top">Password:</td>
  <td colspan=2>
   <input type="password" name="user_pw" style="htext-color: #000000; " size="25" required>
  </td>
 </tr>
 
 <tr>
    <td align="left" valign="top">
      <div align="right">*</div>
    </td>
    <td align="left" valign="top">Confirm  Password:</td>
    <td colspan=2>
      <input type="password" name="password2" style="text-color: #000000" size="25"required>
    </td>
 </tr>
 
 <tr>
   <td align="left" valign="top">
    <div align="right" >*</div>
   </td>
   <td align="left" valign="top">Email:</td>
   <td colspan=2>
    <input type="text" name="email" style="text-color: #000000" size="25"  value="" required>
   </td>
 </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
  </tr>
  <tr> 
   <td align="left" valign="top"><div align="right" >*</div></td>
   <td align="left" valign="top">Office Phone No: </td>
   <td colspan=2>
    <input type="text" name="phone_no" style="text-color: #000000" size="25"  value=""required>
   </td>
 </tr>

  <tr> 
   <td align="left" valign="top"><div align="right" >*</div></td>
   <td align="left" valign="top">Office Address: </td>
   <td colspan=2>
    <input type="text" name="address" style="text-color: #000000" size="25"  value=""required>
   </td>
 </tr> 
 <tr>
     <td colspan="3">&nbsp;</td>
 </tr>
 <tr>
     <td colspan="2">&nbsp;</td>
     <td colspan=2>
       <input type="submit" value="Register" >
       <input type="reset" value="Clear" >
     </td>
  </tr>
</table>
</form>
</body>
<footer>
  <p>Info-Syllabus Team, &copy; 2020</p>
</footer>
</html>