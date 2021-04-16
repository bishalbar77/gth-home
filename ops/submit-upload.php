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

       if(empty(trim($_POST["document"]))) {
          $document_err = "Please upload files.";
       } else {
          $document = trim($_POST["document"]);
       }      

       $workid = trim($_POST["work-id"]);

       $companyid = trim($_POST["company-id"]);

       $vType = trim($_POST["vType"]);

       if(empty($document_err)){    

          $query = "INSERT INTO B2B_upload_files (files,worker_id,company_id,verification_type) VALUES ('$document','$workid','$companyid','$vType')";

          $data = mysqli_query ($link, $query)or die(mysqli_error($link));

          if($data)
          {
             header("location: verifications.php");
          }             

        }

   mysqli_close($link);

}

?>
