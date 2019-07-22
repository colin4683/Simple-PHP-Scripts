<?php 
$hostname = "localhost";
$username = "pastterman";
$pass = "JS9iHX4TdF";
$con = mysqli_connect($hostname, $username, $pass, 'pastterman_phpdata');


$clientid = $_GET['clientid'];
$clientid = strip_tags($clientid);
$clientid = stripslashes($clientid);
$clientid = mysqli_real_escape_string($con, $clientid);

$msg = $_GET['msg'];
$msg = strip_tags($msg);
$msg = stripslashes($msg);
$msg = mysqli_real_escape_string($con, $msg);


$sql = "INSERT INTO messages (clientid, msg) VALUES ('$clientid', '$msg')";
$query = mysqli_query($con, $sql);
$sql =  "UPDATE clients SET command='Sndmsg' WHERE clientid='$clientid'";
$query = mysqli_query($con, $sql);
echo "message sent";
 ?>