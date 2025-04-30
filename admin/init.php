<?php
include 'connect.php'; //Database Connection`
//Routes
$tpl='includes/templates/'; //Template Directory
$languages='includes/languages/'; //Language Directory
$css = 'layout/css/'; //Css Directory
$js= 'layout/js/'; //Js Directory

//Include the important files
include $languages.'en.php';
include $tpl. 'header.php';
//include navbar on all pages expect the one with $noNavbar variable
if(!isset($noNavbar)){
    include $tpl.'navbar.php';
}