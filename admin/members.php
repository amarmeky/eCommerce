<?php

/*
==manage members page
== you can add | edit | delete members from here
*/
// Start session
session_start();
$pageTitle = 'Members'; //Page Title

// Check if user is logged in   
if (isset($_SESSION['username'])) {
    include 'init.php';
    $do = "";
    if (isset($_GET["do"])) {
        $do = $_GET["do"];
    } else {
        $do = "Manage";
    }
    if ($do == "Manage") {
        //Manage page
    } elseif ($do == "Edit") {
        //Edit page
        echo "welcome to Edit page id is " . $_GET['id'];
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php'); //redirect to login page
    exit();
}
