<?php
// Start session
session_start();
// Check if user is logged in   
if (isset($_SESSION['username'])) {
    echo 'welcome ' . $_SESSION['username'];
} else {
echo 'You are not logged in';
header('Location: login.php');//redirect to login page
}