<?php
// Start session
session_start();
// Check if user is logged in   
if (isset($_SESSION['username'])) {
    echo 'welcome ' . $_SESSION['username'];
} else {
header('Location: index.php');//redirect to login page
exit();
}