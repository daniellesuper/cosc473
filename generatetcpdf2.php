<?php
// session info
require("session_info.php");
include('library/tcpdf.php');
error_reporting(0);
$servername="localhost";
$dbname="infosyll_info-syllabus";
$username="infosyll_infosyllteam";
$password="#67ivGL#,}yG";
$conn= new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
die("Connection Failed".$conn->connect_error);
}

echo "hello";

$html ='
<!-- EXAMPLE OF CSS STYLE -->
<style>
  h1 {
    color: navy;
    font-family: times;
    font-size: 24pt;
    text-decoration: underline;
  }
  p {
    color: red;
    font-family: helvetica;
    font-size: 12pt;
  }
</style>
<body>
<h1>Example of <i>HTML + CSS</i></h1>
<p>Example of 12pt styled paragraph.</p>
</body>
';

$pdf->writeHTML($html, true, true, true, true, '');

?>