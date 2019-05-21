<?php
include 'includes/connection.php';
session_start();
// Check, if username session is NOT set then this page will jump to login page
$uname = $_SESSION['username'];


// Delete certain session
unset($_SESSION['username']);
// Jump to login page

header('Location: index');
?>
