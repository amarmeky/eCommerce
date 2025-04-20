<?php
// Arabic Language File
function lang($phrase) {
    static $lang = array(
        "MESSAGE" => "مرحبا في شركتك",
        "ADMIN"=> "عمار",
    );
    return $lang[$phrase];
}
