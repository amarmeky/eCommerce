<?php
/*
**title fnction to get the page title
**has varible $pageTitle
*/

function getTitle(){
    global $pageTitle;
    if(isset($pageTitle)){
        echo $pageTitle;
    }else{
        echo 'Default';
    }
}