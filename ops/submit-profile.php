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

$param_id = $_SESSION["opsId"]; 

//$load_profile = false;

//$load_pass = false;
    	
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
		  
}



 
if($_SERVER["REQUEST_METHOD"] == "POST"){	
	
      if($_POST['submit']=='update_info'){
  			
  			
      if($_FILES['photo']['name']){
  			
      $target_path = $base_url = dirname(__FILE__).'/upload/';      
      $errors= "";
      $file_name = $_FILES['photo']['name'];
      $file_size = $_FILES['photo']['size'];
      $file_tmp = $_FILES['photo']['tmp_name'];
      $file_type = $_FILES['photo']['type'];
      $file_et = end(explode('.', $file_name));
      $file_ext = strtolower($file_et);
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
      	$num = rand(10,100);
      	$getfilename =  str_replace(' ', '_', $file_name);
      	$final_name = $num.'_'.$getfilename;
      	$result = 1;
         move_uploaded_file($file_tmp,$target_path.$final_name);          
      }
  			
  		} else {
  			$final_name = $photo;
  		}	
      
			$companyname = trim($_POST["companyname"]); 
			
			$yourname = trim($_POST["yourname"]); 
			
			$phone = trim($_POST["phone"]);
			
			$address = $_POST["personalinfo"];			
		
			$sql = "UPDATE B2B_company_details SET rep_full_name = '$yourname', address = '$address', photo = '$final_name', phone = '$phone', company_name = '$companyname' WHERE ID =$current_id"; 
      	  
                	$data = mysqli_query($link, $sql)or die(mysqli_error($link));			
	
			$load_profile = 1;

                        setcookie("loadprofile", "$load_profile", time() + 10);
			
			if($data){
			    header("location: my-profile.php");
			}
			
	
		} else if($_POST['submit']=='update_pass') {
	
	
	 if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);        
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm new the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    if(empty($new_password_err) && empty($confirm_password_err)){
    	
    	  $param_id = $_SESSION["opsId"];    	  
    	  	
    	  $query = "SELECT * FROM B2B_company_details WHERE ID='$param_id'";
	 
		  $result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		  $fetch = mysqli_fetch_row($result);
	
		  $email = $fetch[2];    	  
    	  
    	  if(!empty($param_id)){
    	  	
    	  	  $load_pass = 1;
          
                  setcookie("loadpass", "$load_pass", time() + 10);
    	  	
    		  $param_password = md5($new_password);
      
      	  $sql = "UPDATE B2B_company_details SET pass = '$param_password' WHERE email ='$email'";
      	  
      	  $data = mysqli_query($link, $sql)or die(mysqli_error($link));
      	  
           session_destroy();

           header("location: login.php");

           exit();
    	  
    	  } else {
    	     echo "Oops! Something went wrong. Please try again later.";
    	  }
    	
    }  
	
	
}  

    mysqli_close($link);
}
?>
