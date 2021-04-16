<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["opsLoggedIn"]) || $_SESSION["opsLoggedIn"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$yourname = $email = $companyname = $phone = "";

$new_password = $confirm_password = "";

$new_password_err = $confirm_password_err = "";

$final_name = "";


$load_profile = 0;

setcookie("loadprofile", "$load_profile", time() + (60 * 20));

$load_pass = 0;

setcookie("loadprofile", "$load_pass", time() + (60 * 20));


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
                                <div class="col-sm-12 col-md-6"><h4>Company profile</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.php">Dashboard</a>
                                            </li>
                                            <li class="active">Company profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      <?php if($_COOKIE["loadprofile"]!=0){ ?>
                        <div class="alert alert-success alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Profile updated successfully.</strong>
                        </div>
                      <?php } ?>
      
                      <?php if($_COOKIE["loadpass"]!=0){ ?>
                        <div class="alert alert-success alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Password has been updated.</strong>
                        </div>                       
                      <?php } ?>
                      
                        <div class="dashboard-list">
                            <h3 class="heading">Profile details</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">                                
                                <form action="submit-profile.php" method="post" name="updateinfo" enctype="multipart/form-data">
				  <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <!-- Edit profile photo -->
                                        <div class="edit-profile-photo">
                                            <div id="targetLayer"></div>
                                            <div class="imagehidden" id="imagehidden">
                                            <?php  $base_url = "https://".$_SERVER['SERVER_NAME'].'/app/'; 
                                            if(!empty($photo)){ ?>
                                            <img src="<?php echo $base_url.'upload/'.$photo; ?>" alt="profile-photo" class="img-fluid">
                                            <?php } else { ?>
                                            <img src="<?php echo $base_url.'img/dummy-image.jpg'; ?>" alt="profile-photo" class="img-fluid">
                                            <?php } ?>
                                            </div>
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input type="file" class="upload" name="photo" id="photo" accept="image/*" onChange="showPreview(this);" />                                                                                                
                                                </div>                                                 
                                            </div>   
                                                                               
                                        </div>
                                         <?php if(!empty($errors)){ ?>
					     <span class="help-block"><?php echo $errors; ?></span>      
					 <?php } ?> 
													 
                                    </div>
                                    <div class="col-lg-9 col-md-9">                                         
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>Company name</label>
                                                        <input type="text" name="companyname" maxlength="35" class="form-control" placeholder="Company name" value="<?php echo $companyname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group email">
                                                        <label>Your name</label>
                                                        <input type="text" name="yourname" class="form-control" maxlength="35" placeholder="Your name" value="<?php echo $yourname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group subject">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" class="form-control" placeholder="Phone" id="mobile" value="<?php echo $phone; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group message">
                                                        <label>Personal info</label>
                                                        <textarea class="form-control" name="personalinfo" maxlength="100" placeholder="Personal info"><?php echo $address; ?></textarea>
                                                    </div>
                                                </div>

						<div class="col-lg-12">
							<div class="send-btn">
							   <button type="submit" class="btn btn-md button-theme" name="submit" value="update_info">Save Changes</button>
						    	</div>
						</div>
                                            </div>                                       
                                    </div>
  											</div>
                              </form>                              
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dashboard-list">
                                    <h3 class="heading">Change password</h3>
                                    <div class="dashboard-message contact-2">
                                        <form action="submit-profile.php" method="post" name="updatepass"> 
                                            <div class="row">                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>New password</label>
                                                        <input type="password" name="new_password" class="form-control" maxlength="20" placeholder="New Password" value="<?php echo $new_password; ?>">
                                                        <span class="help-block"><?php echo $new_password_err; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group subject">
                                                        <label>Confirm new password</label>
                                                        <input type="password" name="confirm_password" class="form-control" maxlength="20" placeholder="Confirm New Password">
																		  <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="send-btn">  
																			<button type="submit" class="btn btn-md button-theme" name="submit" value="update_pass">Update</button>  																			                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

<script type="text/javascript">
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
         $('#blah').attr('src', e.target.result);
			$("#targetLayer").html('<img src="'+e.target.result+'" width="291px" height="auto" class="upload-preview" />');
			$("#imagehidden").hide();
        }
		fileReader.readAsDataURL(objFileInput.files[0]);
    }
}
</script>


<script>

jQuery(document).ready(function(){	

	jQuery("#mobile").keydown(function (event) {

	  // Allow only backspace and delete

	  if(jQuery(this).val().length <= 10 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )

	  {

	      if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {

	          // let it happen, don't do anything

	      } else {

	          // Ensure that it is a number and stop the keypress

	          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {

	              event.preventDefault();

	          }

	      }

	  }else{

	      event.preventDefault();

	  }      
	  
	});

});	

</script>

