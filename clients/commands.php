<?php 
$hostname = "localhost";
$username = "pastterman";
$pass = "JS9iHX4TdF";
$con = mysqli_connect($hostname, $username, $pass, 'pastterman_phpdata');




if (isset($_GET['clientid']) && isset($_GET['Sendmsg'])) {
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
	//$sql = "DELETE FROM messages WHERE clientid = '$clientid'";
	//$query = mysqli_query($con, $sql);
	die();
}




if (isset($_GET['clientid'])) {
	$clientid = $_GET['clientid'];
	$clientid = strip_tags($clientid);
	$clientid = stripslashes($clientid);
	$clientid = mysqli_real_escape_string($con, $clientid);

	$sql = "SELECT command FROM clients WHERE clientid= '$clientid'";
	$query= mysqli_query($con, $sql);
	$result = mysqli_fetch_array($query);
	echo $result['command'];
	die();
}


 ?>