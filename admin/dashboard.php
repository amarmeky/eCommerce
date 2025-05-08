<?php
// Start session
session_start();
$pageTitle = 'Dashboard';
// Check if user is logged in   
if (isset($_SESSION['username'])) {
    include 'init.php';
    print_r($_SESSION);
    include $tpl . 'footer.php';
} else {
    header('Location: index.php'); //redirect to login page
    exit();
}
