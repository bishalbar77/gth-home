<?php 
// Initialize the session
session_start();
 
if(!isset($_SESSION["opsLoggedIn"]) || $_SESSION["opsLoggedIn"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$title = "";

$message = "";

$param_id = $_SESSION["opsId"];

$workid = $_REQUEST["workerid"];

$companyid = $_REQUEST["companyid"];

$vType = $_REQUEST["vType"];
 
if(empty($workid) || empty($companyid)){
    header("location: verifications.php");
    exit;
}

    	
if(!empty($param_id)){  
    	  	
   $query = "SELECT * FROM B2B_company_details WHERE ID='$param_id'";
	 
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	$fetch = mysqli_fetch_row($result);	
		  
	$current_id = $fetch[0];	

	$photo = $fetch[5];	  
		  
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
                                    <?php  $base_url = "http://".$_SERVER['SERVER_NAME'].'/app/'; 
                                    if(!empty($photo)){ ?>
                                    <img src="<?php echo $base_url.'upload/'.$photo; ?>" alt="avatar">
                                    <?php } else { ?>
                                    <img src="http://placehold.it/45x45" alt="avatar">
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
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>New message</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="verifications.php">Verifications</a>
                                        </li>
                                        <li class="active">New message</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                         <form action="submit-message.php" method="post">  
                             <h4 class="bg-grea-3">Title</h4>                         
                            <div class="row pad-20">
                                <div class="col-lg-12">                                   
                                    <input type="text" class="input-text" maxlength="100" name="title" id="title" placeholder="Enter title">
				    <div id="titleError" class="help-block"></div>
                                </div>
                            </div>

                            <h4 class="bg-grea-3">Enter your message</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea class="input-text" name="message" maxlength="250" id="message" placeholder="Enter message here..."></textarea>
				    <div id="messageError" class="help-block"></div>
                                </div>
                            </div>
                         
                            <div class="row pad-20">
                            <div class="col-lg-4 col-md-12 col-sm-12">                                 
                                    <input type="hidden" name="work-id" value="<?php echo $workid; ?>" />
				    <input type="hidden" name="company-id" value="<?php echo $companyid; ?>" />
                    <input type="hidden" name="vType" value="<?php echo $vType; ?>" />
				    <input type="submit" class="btn btn-md button-theme" name="add_message" value="Submit" onclick="return formsubmit();" />                                 
                                </div>
                            </div>
                        </form>
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

function formsubmit()
{

var er=0;

if(jQuery('#title').val().trim()=='')
{

jQuery("#titleError").html("Please enter your title.");

er=er+1; 

}

if(jQuery('#message').val().trim()=='')
{

jQuery("#messageError").html("Please enter your message.");

er=er+1; 

}


if(er>0)

{

return false;

}

else

{

return true;

}

}



function checkEmail(e){return splitVal=e.split("@"),splitVal.length<=1?!1:splitVal[0].length<=0||splitVal[1].length<=0?!1:(splitDomain=splitVal[1].split("."),splitDomain.length<=1?!1:splitDomain[0].length<=0||splitDomain[1].length<=1?!1:!0)}

function removeError(e){jQuery("#"+e+"Error").html("")}

</script>


