<?php
// Include config file
require_once "config.php";
 
$email = "";

$error = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){ 

      if(empty(trim($_POST["email"]))){
          $email_err = "Please enter email address.";
      } else {
          $email = trim($_POST["email"]);	

      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      if (!$email) {
  	$error .="<p>Invalid email address please type a valid email address!</p>";
	}else{
	$sel_query = "SELECT * FROM B2B_company_details WHERE email='".$email."'";
	$results = mysqli_query($link,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "No user is registered with this email address!";
		}
	}
	if($error!=""){
		}else{
	date_default_timezone_set('Asia/Kolkata');       
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5(2418*2+$email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$keyes = $key . $addKey;
        // Insert Temp Table
        mysqli_query($link, "INSERT INTO B2B_password_reset_temp (email, emailkey, expDate) VALUES ('".$email."', '".$keyes."', '".$expDate."');");

        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="http://gettruehelp.com/ops/reset-password.php?key='.$keyes.'&action=reset" target="_blank">http://gettruehelp.com/ops/reset-password.php?key='.$keyes.'&action=reset</a></p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link into your browser. The link will expire after 1 day for security reason.</p>';
        $output.='<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>';   	
        $output.='<p>Thanks,</p>';
        $output.='<p>True Help Team</p>';
        $body = $output; 
        $subject = "Password Recovery - TrueHelp Enterprise";		
        $to = $email;
    
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@gettruehelp.com" . "\r\n" ."CC: support@gettruehelp.com";

        if (mail($to, $subject, $body, $headers)) {
           $msg =  "Mail Sent please check your mailbox.";
        } else {
           $msg =  "failed, please try again";
        }
    
	}
    
   }

    mysqli_close($link);
}
?>

<?php include("header.php"); ?>

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
                        <span class="help-blockS" style="color:green;"><?php if(!empty($msg)){ echo $msg; } ?></span>
                        <!-- Form start -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <input type="email" name="email" maxlength="40" class="input-text" placeholder="Email Address">
                                <span class="help-block"><?php echo $email_err.''.$error; ?></span>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block" value="forgot">Send Me Email</button>
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

<?php include("footer.php"); ?>

