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
    	
if(!empty($param_id)){  
    	  	
  $query = "SELECT * FROM B2B_company_details WHERE ID='$param_id'";

  $result = mysqli_query($link, $query) or die(mysqli_error($link));

  $fetch = mysqli_fetch_row($result);	

  $current_id = $fetch[0];

  $yourname = $fetch[1];

  $email = $fetch[2];

  $address = $fetch[4];

  $companyname = $fetch[6];

  $photo = $fetch[5];

  $phone = $fetch[7];	

  $role = $fetch[13];		  
}

?>

<?php include "header.php"; ?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>

<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="index.php">
                <img src="img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-nones" id="navbarSupportedContent">               
                <div class="navbar-buttons ml-auto d-xl-block d-lg-block d-nones">
                    <ul>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <?php  $base_url = "https://".$_SERVER['SERVER_NAME'].'/app/'; 
                                    if(!empty($photo)){ ?>
                                    <img src="<?php echo $base_url.'upload/'.$photo; ?>" alt="avatar">
                                    <?php } else { ?>
                                    <img src="https://placehold.it/45x45" alt="avatar">
                                    <?php } ?>
                                    My Account
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.php">Dashboard</a>
                                    <a class="dropdown-item padding_menu" href="verifications.php">Verifications</a>
                                    <a class="dropdown-item" href="my-profile.php">My profile</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Dashboard start -->
<div class="dashboard submit-property">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-nones hide_div d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                        <h4>Listings</h4>
                        <ul>
                           <li><a href="verifications.php"><i class="flaticon-plus"></i>Verifications</a></li>
                        </ul>
                        <h4>Account</h4>
                        <ul>
                            <li><a href="my-profile.php"><i class="flaticon-people"></i>My Profile</a></li>
                            <li><a href="logout.php"><i class="flaticon-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Verifications</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">Verifications</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address table-responsive dashboard-list">
                      <table class="tabel table-striped custom-table">
                        <tr>
                          <th>S.no.</th>
                          <th>Company name</th>
                          <th>Employee name</th>
                          <th>Messages / Files</th>
                          <th>Verification Type</th>
                          <th>Status</th>
                          <th>Assign</th>
                          <th>Action</th>
                        </tr>
                  			<?php
                  				$queryes  = "SELECT * FROM B2B_workers";
                  				$resultes = mysqli_query($link, $queryes) or die(mysqli_error($link));
                  				$count    = 1;
                          $siCount  = 0;
                          $messagesQuery = $messagesResult = $filesQuery = $filesResult = $rowss = $rows = '';

                          if ($resultes->num_rows!=0) {
                    				
                            while ($row=mysqli_fetch_row($resultes)){
                              $WorkerID = $row[0];
                              $CompanyID = $row[1];
                              $verifications = explode (",", $row[19]);
                              
                              if(!empty($CompanyID)){
                                $compNameQuery = "SELECT `company_name` FROM `B2B_company_details` WHERE `ID`= ".$CompanyID;
                                $compNameResult = mysqli_query($link, $compNameQuery) or die(mysqli_error($link)); 
                                $compNameResultVal = mysqli_fetch_assoc($compNameResult);
                                $com_name = ucfirst($compNameResultVal['company_name']);
                              } else {
                                $com_name = '--';  
                              }
                    				  
                              $emp_name = ucfirst($row[2]);
                    				  $stats = $row[21];
                              
                              if($stats==1){
                                $sate = '<i class="fa fa-check" style="color:#28a745;font-size: 35px;"></i>';
                              } else if($stats==2){
                                $sate = '<i class="fa fa-clock-o" style="color:#4393d7;font-size: 35px;"></i>';	
                              } else if($stats==0){
                                $sate = '<i class="fa fa-ban" style="color:#ff0000;font-size: 35px;"></i>';			
                              }

                              foreach ($verifications as $verification) {
                                $siCount++;
                          ?>
                          <tr>
                            <td><?php echo $siCount; ?></td>
                            <td><?php echo $com_name; ?></td>
                            <td><?php echo $emp_name; ?></td>
                            <td>
                            <?php
                              $messagesQuery = "SELECT * FROM B2B_messages WHERE company_id='$CompanyID' AND worker_id='$WorkerID' AND verification_type='$verification'"; 
                              $messagesResult = mysqli_query($link, $messagesQuery);
                              $counts = 1; 
                              if ($messagesResult->num_rows!=0) {
                                while ($rowss=mysqli_fetch_row($messagesResult)){
                                  $title = ucfirst($rowss[3]);
                                  $lastDate = $rowss[5];
                                  $message = $rowss[4];
                                  echo "<div class='message_listing' style='margin-bottom:5px;'>";
                                  echo "<b>".$counts.") "; 
                                  echo  $title."</b>: ".$message;
                                  echo "</br><b>Date:</b> ".$lastDate;
                                  echo "</div>";
                                  $counts++; 
                                } 
                              } else {
                                echo "N/A";
                              }

                              echo "</br><b>File:</b></br>";

                              $filesQuery   = "SELECT * FROM B2B_upload_files WHERE company_id='$CompanyID' AND worker_id='$WorkerID' AND verification_type='$verification'"; 
                              $filesResult  = mysqli_query($link, $filesQuery);
                              $cout         = 1;
                              
                              if ($filesResult->num_rows!=0) {
                                while ($rows = mysqli_fetch_row($filesResult)){
                                  $photose    = $rows[1];
                                  $extension  = end(explode(".", $photose));
                                  $cleanStr   = preg_replace('/[^A-Za-z0-9]/', '', $extension);
                                  $base_url   = "https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; 
                                  
                                  if($cleanStr == "pdf"){ ?>  
                                    <a href="<?php echo $base_url.'upload/'.rtrim($photose, ","); ?>" target="_blank" style="color:#4393d7;"><?php echo $cout; ?>) View PDF</a></br> 
                                <?php 
                                  } else {
                                    if(!empty($photose)){
                                ?>
                                      <a href="<?php echo $base_url.'upload/'.rtrim($photose, ","); ?>" target="_blank" style="color:#4393d7;"><?php echo $cout; ?>) View image</a></br>
                                <?php
                                    }
                                  }
                                  $cout++; 
                                } 
                              } else {
                                echo "N/A</br>";
                              }
                            ?>
				                    </td>
                            <td style="text-align: center;">
                              <?php
                                if(!empty($verification)){
                                  $verificationNameQuery = "SELECT `verification_type` FROM `B2B_verification_type` WHERE `ID`= ".$verification;
                                  $verificationNameResult = mysqli_query($link, $verificationNameQuery) or die(mysqli_error($link)); 
                                  $verificationNameResultVal = mysqli_fetch_assoc($verificationNameResult);
                                  $verification_type_name = ucfirst($verificationNameResultVal['verification_type']);
                                  echo $verification_type_name;
                                }
                              ?>
                            </td>
                            <td style="text-align: center;"><?php echo $sate; ?></td>
                            <td>
                              <?php
                                $operationsQuery = "SELECT `ID`,`rep_full_name` FROM `B2B_company_details` WHERE `role`= '2'";
                                $operationsResult = mysqli_query($link, $operationsQuery) or die(mysqli_error($link)); 
                                $operationsResultVal = $operationsResult->fetch_all(MYSQLI_ASSOC);

                                $opUserId = '';

                                $assignedQuery      = "SELECT `operationsId` FROM `B2B_assign_verification` WHERE `workerId`= '$WorkerID' AND `verificationType`= '$verification'";
                                $assignedResult     = mysqli_query($link, $assignedQuery) or die(mysqli_error($link)); 
                                $assignedResultVal  = mysqli_fetch_row($assignedResult);

                                if(!empty($assignedResultVal) && is_array($assignedResultVal)){
                                  $opUserId = $assignedResultVal[0];
                                }

                              ?>
                              <select class="browser-default custom-select assign-operations">
                                <option>Select Person</option>
                                <?php if(!empty($operationsResultVal)): ?>
                                  <?php foreach ($operationsResultVal as $key => $operations): ?>
                                    <option <?php echo $opUserId == $operations['ID'] ? 'selected' : ''; ?> data-type="<?php echo $verification; ?>" data-id="<?php echo $WorkerID; ?>" value="<?php echo $operations['ID']; ?>"><?php echo $operations['rep_full_name']; ?></option>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                            </td>
                            <td>
                              <div class="col-sm-12">
                                <select class="browser-default custom-select actionID" name="actionOptions">
                                  <option value="">Choose action</option>  
                                  <option value="addmessage" data-type="<?php echo $verification; ?>" data-id="<?php echo $WorkerID; ?>" data-company="<?php echo $CompanyID; ?>">Add a message</option>
                                  <option value="addfile" data-type="<?php echo $verification; ?>" data-id="<?php echo $WorkerID; ?>" data-company="<?php echo $CompanyID; ?>">Add file</option>
                                  <?php if($stats!=1){ ?>
                                    <option value="approve" data-type="<?php echo $verification; ?>" data-id="<?php echo $WorkerID; ?>" data-company="<?php echo $CompanyID; ?>">Approve</option>
                                  <?php } ?>
                                  <?php if($stats!=0){ ?>
                                    <option value="reject" data-type="<?php echo $verification; ?>" data-id="<?php echo $WorkerID; ?>"data-company="<?php echo $CompanyID; ?>">Reject</option>
                                  <?php } ?>
                                </select>
                              </div>
                            </td>
			                    </tr>
			                  <?php } $count++; } } ?>
			                </table> 
                    </div>
                    <p class="sub-banner-2 text-center">Copyright 2019, TrueHelp Enterprise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard end -->

<?php include("footer.php"); ?>

<script>
  jQuery(function($){
    $('.actionID').on('change', function () {
      var url = $(this).val();
      var workID = $(this).find(':selected').data("id");
      var companyID = $(this).find(':selected').data("company");
      var verificationType = $(this).find(':selected').data("type");
      if (url=='addmessage') { 
        window.location = "new-message.php?workerid="+ workID +"&companyid=" + companyID +"&vType=" + verificationType;
      } else if(url=='addfile'){
        window.location = "upload-file.php?workerid="+ workID +"&companyid=" + companyID +"&vType=" + verificationType +"&status=1";
      } else if(url=='approve'){
        var results = confirm("Are you sure you want to approve?"); 
        if (results == true) { 
          window.location = "process.php?workerid="+ workID +"&companyid=" + companyID +"&status=1";
        } else {
          window.location = "verifications.php";
        }
      } else if(url=='reject'){
        var result = confirm("Are you sure you want to reject?"); 
        if (result == true) { 
          window.location = "process.php?workerid="+ workID +"&companyid=" + companyID +"&status=0";
        } else {
          window.location = "verifications.php";
        }
      }
      return false;
    });

    $('.assign-operations').on('change', function(){
      var operationsId = $(this).find(':selected').val(); 
      var workerId = $(this).find(':selected').data("id"); 
      var verificationType = $(this).find(':selected').data("type");

      window.location = "assign-operations.php?workerId="+ workerId +"&operationsId=" + operationsId +"&verificationType=" + verificationType;
    });
  });
</script>


