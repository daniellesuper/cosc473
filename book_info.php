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

$sql =" Select bookname, bookisbn, bookauthor, bookpicture, bookpicture, img_mime, important_points     
 FROM courseinfo where PKID = 23";

//echo $sql; exit;

$result = $conn->query($sql);


  $row=mysqli_num_rows($result);
  
  //echo $row; exit;

if($row>0){ // login successful

$row=$result->fetch_array();
$bookname = $row[bookname];
$bookisbn = $row[bookisbn];
$bookauthor = $row[bookauthor];
$bookpicture= $row['bookpicture'];
$img_mime=$row['img_mime'];
$imp_points = $row['important_points'];
//echo '<img src="data:$img_mime;base64,'.base64_encode( $bookpicture ).'"/>';
 }

?>

<html>
<body>

<table border=1 width="900px" height="900px">
  <tr>
    <td width="500px" valign="top">
		<?php echo '<img src="data:$img_mime;base64,'.base64_encode( $bookpicture ).'"/>'; ?>
		
	</td>
    <td width="500px" valign="top">
	   <strong><?php echo $bookname;?><br></strong>
	   ISBN: <?php echo $bookisbn;?><br>
	   Author: <?php echo $bookauthor;?><br>
		
    </td>
		
	<td width="500px" valign="top">
		<?php echo html_entity_decode($imp_points);?>
	</td>
  </tr>	
</table>

</body>
</html>

