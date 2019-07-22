<?php 

$hostname = "localhost";
$username = "pastterman";
$pass = "JS9iHX4TdF";
$con = mysqli_connect($hostname, $username, $pass, 'pastterman_phpdata');
if (isset($_GET['check'])) {
	$hash = $_GET['hash'];
	$hash = stripslashes($hash);
	$hash = strip_tags($hash);
	$hash = mysqli_real_escape_string($con, $hash);


	$sql = "SELECT * FROM clients WHERE hash='$hash' LIMIT 1";
	$query = mysqli_query($con, $sql);
	$rows = mysqli_num_rows($query);
	if ($rows != 0) {
		$rowArray = mysqli_fetch_array($query);
		$clientid = $rowArray['clientid'];
		echo $clientid;
		$sql = "UPDATE clients SET open=1 WHERE clientid='$clientid'";
		$query = mysqli_query($con, $sql);
	} else {
		echo "false";
	}

}

if (isset($_GET['new'])) {
	$hash = $_GET['hash'];
	$hash = stripslashes($hash);
	$hash = strip_tags($hash);
	$hash = mysqli_real_escape_string($con, $hash);


	$hostname = $_GET['hostname'];
	$hostname = stripslashes($hostname);
	$hostname = strip_tags($hostname);
	$hostname = mysqli_real_escape_string($con, $hostname);

	$ipaddress = $_GET['ipaddress'];
	$ipaddress = stripslashes($ipaddress);
	$ipaddress = strip_tags($ipaddress);
	$ipaddress = mysqli_real_escape_string($con, $ipaddress);

	$sql = "INSERT INTO clients(hash, hostname, ipaddress, open) VALUES ('$hash', '$hostname', '$ipaddress', '1')";
	$query = mysqli_query($con, $sql);

	$sql = "SELECT clientid FROM clients WHERE hash = '$hash'";
	$query = mysqli_query($con, $sql);
	$rows = mysqli_fetch_array($query);
	echo $rows['clientid'];

}
?>