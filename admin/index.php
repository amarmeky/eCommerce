<?php
include 'init.php';
include $tpl. "header.php";
include "includes/languages/en.php";
?>
<form class="login">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control " type="text" placeholder="Username" autocomplete="off">
    <input class="form-control " type="password" placeholder="Password">
    <input class="btn btn-primary btn-block" type="submit" value="Login">
</form>
<?php
include $tpl."footer.php";
?>