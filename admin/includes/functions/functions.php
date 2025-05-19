<?php
/*
**title fnction to get the page title
**has varible $pageTitle
*/

function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo 'Default';
    }
}
function redirectHome($meesage, $secound = 3)
{
    echo '<div class="alert alert-danger">' . $meesage . '</div>';
    echo '<div class="alert alert-info">You Will Be Redirected After ' . $secound . ' Seconds</div>';
    header("refresh:$secound;url=dashboard.php");
    exit();
}
