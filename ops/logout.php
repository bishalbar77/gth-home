<?php
// Initialize the session
session_start();
 
$_SESSION = array();
 
session_destroy();
 
header("location: login.php");

setcookie("visit", "false", time()+60*60*24*600);

exit;
?>
