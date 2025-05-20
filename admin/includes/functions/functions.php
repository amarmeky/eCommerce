<?php
/*
**title fnction to get the page title v1.0
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

/*
**home redirect function v2.0
**this function accept parameters
**$meesage = echo the message[success, error, ...]
**$secound = seconds to redirect
**$url = the url to redirect to
*/
function redirectHome($meesage,$url=null, $secound = 3)
{
    if($url==null){
        $url = 'index.php';
        $link = 'Home Page';
    }else{
        if(isset($_SERVER['HTTP_REFERER'])&& $_SERVER['HTTP_REFERER']!=""){
            $url = $_SERVER['HTTP_REFERER'];
            $link = 'Previous Page';
        }
        else{
            $url = 'index.php';
            $link = 'Home Page';
        }
    }
    echo $meesage ;
    echo "<div class='alert alert-info'>You Will Be Redirected to $link After   $secound  Seconds</div>";
    header("refresh:$secound;url=$url");
    exit();
}


/*check item function v1.0
**this function accept parameters
**$select = the item to select[user, item, ...]
**$from = the table to select from[users, items, ...]
**$value = the value of the select [user_id, item_id, ...]
*/
function checkItem($select, $from, $value)
{
    global $con;
    $statment = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
    $statment->execute(array($value));
    $count = $statment->rowCount();
    return $count;

}
