<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["opsLoggedIn"]) || $_SESSION["opsLoggedIn"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$param_id = $_SESSION["opsId"];

$operationsId = trim($_REQUEST["operationsId"]);

$workerId = trim($_REQUEST["workerId"]);

$verificationType = trim($_REQUEST["verificationType"]);

if($operationsId){

	$delQuery = "DELETE FROM `B2B_assign_verification` WHERE `workerId` = '$workerId' AND `verificationType` = '$verificationType'";

	mysqli_query ($link, $delQuery)or die(mysqli_error($link));

	$query = "INSERT INTO B2B_assign_verification (workerId,operationsId,verificationType) VALUES ('$workerId','$operationsId','$verificationType')";

	$data = mysqli_query ($link, $query)or die(mysqli_error($link));

	if($data) {
		header("location: verifications.php");
	}

	echo "string";
}