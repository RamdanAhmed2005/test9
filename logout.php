<?php
// Start the session
session_start();

// Remove all session variables
session_unset();

// Destroy the session completely
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit;
?>
