<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["opsLoggedIn"]) || $_SESSION["opsLoggedIn"] !== true){
    header("location: login.php");
    exit;
}


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


if(isset($_COOKIE['visit']) && $_COOKIE['visit'] == "true"){
    $load = false;
} else {
    $load = true;
    setcookie("visit", "true", time()+60*60*24*600);
}

?>

<?php include "header.php"; ?>

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

<!-- Dashbord start -->
<div class="dashboard">
    <div class="container-fluid">
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
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">                            
                                <?php $val = ""; ?>
                                <div class="col-sm-12 col-md-6"><h4>Hello, <?php echo ucfirst($yourname); ?></h4></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                        </div>
                        
                      <?php if($load == true){ ?>
                        <div class="alert alert-success alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Hello, <?php echo $yourname; ?> </strong> Welcome to True Help App.
                        </div>      
                      <?php } ?>                 
                        
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="#">
                                    <div class="ui-item bg-dark">
                                        <div class="left">
                                            <?php  $param_id = $_SESSION["opsId"];
                                                if(!empty($param_id)){
                                                    $query = "SELECT * FROM B2B_workers WHERE company_id = '$current_id'";
                                                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                                                    $rowcount = mysqli_num_rows($result);
                                                } 
                                            ?>
                                            <h4><?php echo $rowcount; ?></h4>
                                            <p>Registered<br />Employees</p>
                                        </div>
                                        <div class="right">
                                            <i class="fa fa-user-o"></i>
                                        </div>
                                    </div>
				                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                               <a href="#">
				                    <div class="ui-item bg-success">
                                        <div class="left">
                                            <?php
                                                $param_id = $_SESSION["opsId"];
                                                if(!empty($param_id)){
                                                    $query = "SELECT * FROM B2B_workers WHERE company_id = '$current_id' AND status = 1";
                                                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                                                    $rowcount = mysqli_num_rows($result);
                                                } 
                                            ?>
                                            <h4><?php echo $rowcount; ?></h4>
                                            <p>Verified<br />Employees</p>
                                        </div>
                                        <div class="right">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
				                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="#">
				                    <div class="ui-item bg-active">
                                        <div class="left">
                                            <?php
                                                $param_id = $_SESSION["opsId"];
                                                if(!empty($param_id)){ 
                                                    $query = "SELECT * FROM B2B_workers WHERE company_id = '$current_id' AND status = 2";
                                                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                                                    $rowcount = mysqli_num_rows($result);
                                                } 
                                            ?>
                                            <h4><?php echo $rowcount; ?></h4>
                                            <p>Pending<br />Verifications</p>
                                        </div>
                                        <div class="right">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                               <a href="#">
				                    <div class="ui-item" style="background:#ff0000;">
                                        <div class="left">
                                             <?php
                                                $param_id = $_SESSION["opsId"];
                                                if(!empty($param_id)){
                                                    $query = "SELECT * FROM B2B_workers WHERE company_id = '$current_id' AND status = 0";
                                                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                                                    $rowcount = mysqli_num_rows($result);
                                                } 
                                            ?>
                                            <h4><?php echo $rowcount; ?></h4>
                                            <p>Failed<br />Verifications</p>
                                        </div>
                                        <div class="right">
                                            <i class="fa fa-ban"></i>
                                        </div>
                                    </div>
				                </a>
                            </div>
                        </div>                        
                    </div>
                    <p class="sub-banner-2 text-center">Copyright 2019, TrueHelp Enterprise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashbord end -->
<?php include("footer.php"); ?>