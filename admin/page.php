<?php

$do = "";
if (isset($_GET["do"])) {
    $do = $_GET["do"];
} else {
    $do = "Manage";
}

if ($do == "Manage") {
    echo "welcome to Manage page";
} elseif ($do == "Categories") {
    echo "welcome to Categories page";
} elseif ($do == "Items") {
    echo "welcome to Items page";
} elseif ($do == "Members") {
    echo "welcome to Members page";
} elseif ($do == "Orders") {
    echo "welcome to Orders page";
} else {
    echo "error 404 page not found";
}
