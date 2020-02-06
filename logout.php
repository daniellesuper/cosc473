<?php
require("session_info.php"); 

unset ($_SESSION["FKPROFID"]);

session_start();
$time = date("H:i:s");
mysqli_query($conn, "UPDATE track_log_user SET logout_time = '$time' WHERE username = '$_SESSION[FKPROFID]'");
$_SESSION = NULL;
$_SESSION = [];
session_unset();

session_destroy();
$PKID = $_SESSION["FKPROFID"];
header("location: index.html");

//echo $PKID;


?>