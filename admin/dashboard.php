<?php
// Start session
session_start();
// Check if user is logged in   
if (isset($_SESSION['username'])) {
    include 'init.php'; 
    include $tpl. 'footer.php';
}else{
    header('Location: index.php');//redirect to login page
    exit();
}