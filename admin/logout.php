<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page (you should adjust the path accordingly)
header("Location: admin_login.php");
exit();
?>
