<?php
// Start session
session_start();
$pageTitle = 'Dashboard';
// Check if user is logged in   
if (isset($_SESSION['username'])) {
    include 'init.php'; 
    echo "welcome";
    include $tpl. 'footer.php';
}else{
    header('Location: index.php');//redirect to login page
    exit();
}