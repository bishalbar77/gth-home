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

if($_SERVER["REQUEST_METHOD"] == "POST"){


       if(empty(trim($_POST["title"]))) {
          $title_err = "Please enter your title.";
       } else {
          $title = trim($_POST["title"]);
       }

       if(empty(trim($_POST["message"]))) {
          $message_err = "Please enter your message.";
       } else {
          $message = trim($_POST["message"]);
       }      

       $workid = trim($_POST["work-id"]);

       $companyid = trim($_POST["company-id"]);

       $vType = trim($_POST["vType"]);

       date_default_timezone_set("Asia/Kolkata");

       $last_date = date("Y-m-d h:i:s");

       if(empty($title_err) && empty($message_err)){    

          $query = "INSERT INTO B2B_messages (worker_id,company_id,message_title,message_body,message_time,message_status,verification_type) VALUES ('$workid','$companyid','$title','$message','$last_date','1','$vType')";

          $data = mysqli_query ($link, $query)or die(mysqli_error($link));

          if($data)
          {
             header("location: verifications.php");
          }             

	}

   mysqli_close($link);

}

 ?>
