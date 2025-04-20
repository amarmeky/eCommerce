<?php
// English Language File
function lang($phrase) {
    static $lang = array(
        "MESSAGE" => "Welcome to our company",
        "ADMIN"=> "amar",
    );
    return $lang[$phrase];
}
