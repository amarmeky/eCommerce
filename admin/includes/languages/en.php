<?php
// English Language File
function lang($phrase)
{
    static $lang = array(
        //dashboard page navbar
        'ADMAIN_HOME'  => 'Home',
        'CATEGORES'   => 'Categorys',
        'ITEMS'       => 'Items',
        'MEMBERS'     => 'Members',
        'STATISTICS'  => 'Statistics',
        'LOGS'        => 'Logs',
        'PROFILE'     => 'Amar',
        'EDIT_PROFILE' => 'Edit profile',
        'SETTINGS'     => 'Setting',
        'LOGOUT'      => 'Logout',
    );
    return $lang[$phrase];
}
