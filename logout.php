<?php
session_start();  // Start the session

// Destroy the session to log the user out
session_unset();  // Remove all session variables
session_destroy();  // Destroy the session

// Redirect the user to the home page or login page
header("Location: /rentitall-main/index.php");  // Change this to the page where you want to redirect after logout
exit();  // Ensure no further code is executed
?>
