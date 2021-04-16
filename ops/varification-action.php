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

$VerfyID = $_REQUEST["verifyid"];

$action = $_REQUEST["action"];

$state = $_REQUEST["status"];

if($action=="update"){

   if(!empty($VerfyID)){

          $query = "UPDATE B2B_verification_type SET verification_status=$state WHERE ID='$VerfyID'";

          $data = mysqli_query ($link, $query)or die(mysqli_error($link));

          if($data)
          {
             header("location: manage-verification-type.php");
          }             

} else {

     header("location: manage-verification-type.php");

}

} else {

   header("location: manage-verification-type.php");

}

mysqli_close($link);

?>
