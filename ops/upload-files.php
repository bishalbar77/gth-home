<?php
if(!empty($_FILES)){
	
// Include config file
require_once "config.php";
    
    $targetDir = $base_url = dirname(__FILE__).'/upload/';
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir.$fileName;    
    
   
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
   	
	echo $fileName;	
        	
    }

}

?>
