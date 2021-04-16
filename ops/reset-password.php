<?php include("header.php"); ?>

<?php
// Include config file
require_once "config.php";

if (($_REQUEST["key"]) && ($_REQUEST["action"]) && ($_REQUEST["action"]=="reset")){

$key = $_REQUEST["key"];

date_default_timezone_set('Asia/Kolkata');

$curDate = date("Y-m-d H:i:s");

$query = mysqli_query($link,"SELECT * FROM B2B_password_reset_temp WHERE emailkey = '".$key."'");

$row = mysqli_num_rows($query);

if ($row==""){

$error .= '

<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <div class="details">
                        <!-- Logo -->
                        <a href="index.php">
                        <img src="img/logos/black-logo.png" class="cm-logo" alt="black-logo">
                        </a>
                        <h3>Invalid Link</h3>
                        <p>The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used the key in which case it is deactivated.</p>
                        <p><a href="http://gettruehelp.com/ops/forgot-password.php" style="color:#4393d7;">Click here</a> to reset password.</p>
                      </div>
                 </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
';
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
	
	<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        <a href="index.php">
                        <img src="img/logos/black-logo.png" class="cm-logo" alt="black-logo">
                        </a>
                        <!-- Name -->
                        <h3>Recover your password</h3>
                        <!-- Form start -->

	                    <form method="post" action="" name="update">
                          <input type="hidden" name="action" value="update" />
	                       <div class="form-group">
	                         <input type="password" class="input-text" name="pass1" id="pass1" maxlength="15" placeholder="Enter new password" required />
	                       </div>
	                       
                          <div class="form-group">
	                         <input type="password" class="input-text" name="pass2" id="pass2" maxlength="15" placeholder="Enter confirm password" required/>
	                       </div>
	                       
                          <div class="form-group mb-0">
                            <input type="hidden" name="key" value="<?php echo $key;?>"/>
	                         <input type="submit" class="btn-md button-theme btn-block" id="reset" value="Reset Password" />
                          </div>
	                    </form>
	
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Already a member? <a href="login.php">Login here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->
	
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).<br /><br /></p>";
				}
		}
if($error!=""){
	echo "<div class='error'>".$error."</div><br />";
	}			
} // isset email key validate end


if(($_POST["key"]) && ($_POST["action"]=="update")){

    echo "string";

    $error="";

    $key = $_POST["key"];

    $pass1 = mysqli_real_escape_string($link,$_POST["pass1"]);

    $pass2 = mysqli_real_escape_string($link,$_POST["pass2"]);

    $query = "SELECT * FROM B2B_password_reset_temp WHERE emailkey='$key'";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $fetch = mysqli_fetch_row($result);	

    $email = $fetch[1];

    $curDate = date("Y-m-d H:i:s");
    
    if ($pass1!=$pass2){
        $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
    }
    
    if($error!=""){
    ?>

    <div class="contact-section overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form content box start -->
                    <div class="form-content-box">
                        <div class="details">
                            <!-- Logo -->
                            <a href="index.php">
                                <img src="img/logos/black-logo.png" class="cm-logo" alt="black-logo">
                            </a>
                            <p><?php echo "<div class='error'>".$error."</div><br />"; ?></p>
                            <p><a href="javascript:void(0)" onclick="goBack()" style="color:#4393d7;">Back</a></p>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
	<?php } else {
        $pass1 = md5($pass1);
        mysqli_query($link, "UPDATE B2B_company_details SET pass = '".$pass1."' WHERE email = '".$email."'");
        mysqli_query($link,"DELETE FROM B2B_password_reset_temp WHERE emailkey = '".$key."';");		
    ?>	
        <div class="contact-section overview-bgi">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Form content box start -->
                        <div class="form-content-box">
                            <div class="details">
                                <!-- Logo -->
                                <a href="index.php">
                                <img src="img/logos/black-logo.png" class="cm-logo" alt="black-logo">
                                </a>
                                <p>Congratulations! Your password has been updated successfully.</p>
                                <p><a href="http://gettruehelp.com/ops/login.php" style="color:#4393d7;">Click here</a> to login.</p>
                              </div>
                         </div>
                        <!-- Form content box end -->
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
<?php } ?>
<?php include("footer.php"); ?>