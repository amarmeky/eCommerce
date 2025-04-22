<?php
include 'init.php';
include $tpl. "header.php";
include "includes/languages/en.php";
?>
<form class="login">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control " id="user" type="text" placeholder="Username" autocomplete="off" required>
    <input class="form-control " id="pass" type="password" placeholder="Password" autocomplete="new-password" required>
    <input class="btn btn-primary btn-block" id="log" type="submit" value="Login">
</form>
<?php
include $tpl."footer.php";
?>