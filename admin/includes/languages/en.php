<?php
// English Language File
function lang($phrase) {
    static $lang = array(
//dashboard page
'Admin_home'=>'home',
'Categorys'=>'categorys',
'Profile'=>'amar',
'Edit_Profile'=>'edite profile',
'Setting'=>'setting',
'Logout'=> 'logout',
);
return $lang[$phrase];
}
