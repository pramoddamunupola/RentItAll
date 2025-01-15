<?php
session_start(); 

session_unset();  
session_destroy();  

// Redirect the user to the home page or login page
header("index.php");
exit();  
?>
