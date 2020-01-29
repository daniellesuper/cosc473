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

$sql =" Select important_points from courseinfo where PKID = 23";

//echo $sql; exit;

$result = $conn->query($sql);


  $row=mysqli_num_rows($result);
  
  //echo $row; exit;

if($row>0){ // login successful

$row=$result->fetch_array();
$important_points = $row[important_points];
echo $important_points; exit;

}


?>

<html>
<body>

<table border=1 width="900px" height="900px">
  <tr>
    <td width="500px" valign="top">
		<?php echo '<img src="data:$img_mime;base64,'.base64_encode( $bookpicture ).'"/>'; ?>
		
	</td>
    <td width="500" valign="top">
		
		
    </td>
  </tr>	
</table>

</body>
</html>

 
 ?>