<?php
/* Database credentials. */
define('DB_SERVER', 'truehelp.cs0fysp8nud0.ap-south-1.rds.amazonaws.com');
define('DB_USERNAME', 'truehelp');
define('DB_PASSWORD', '4Hf-ZJJ-W6f-zXn');
define('DB_NAME', 'truehelp');
 
/* Connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>


