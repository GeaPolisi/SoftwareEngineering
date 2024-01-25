<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the main page after logout
header("Location: main.php");
exit();
?>
