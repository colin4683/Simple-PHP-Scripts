<?php
$hostname = "localhost";
$username = "";
$pass = "";
$con = mysqli_connect($hostname, $username, $pass, '');



$clientid = $_GET['clientid'];
$clientid = strip_tags($clientid);
$clientid = stripslashes($clientid);
$clientid = mysqli_real_escape_string($con, $clientid);



$sql = "SELECT msg FROM messages WHERE clientid = '$clientid'";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_array($query);
echo $result['msg'];
$sql = "UPDATE clients SET command = '0' WHERE clientid = '$clientid'";
$query = mysqli_query($con, $sql);
$sql = "DELETE FROM messages WHERE clientid = '$clientid'";
$query = mysqli_query($con, $sql);
die();
?>
