<?php
// Start session
session_start();
include 'init.php'; 
// Check if user is logged in   
if (isset($_SESSION['username'])) {
    echo 'welcome ' . $_SESSION['username'];
} 