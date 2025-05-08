<?php
// Start session
session_start();
$noNavbar="";
$pageTitle = 'Login'; //Page Title
// Include database connection file 
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');//redirect to dashboard page
} 
include 'init.php';



//check if user coming fom http post request
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $user= $_POST['user'];  
    $password= $_POST['pass'];
    $hashedpass=sha1($password);
    //check if the user exist in database
    $stmt= $con->prepare("SELECT UserName,Password FROM users WHERE Username=? AND Password=? AND GroupID=1 "); 
    $stmt->execute(array($user,$hashedpass));
    $count= $stmt->rowCount();
    //get the user data from database
    if($count>0){
        $_SESSION['username']= $user; //Register session name
        header('Location: dashboard.php'); //redirect to dashboard page
        exit();
    }  
}

?>
<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control " id="user" name="user" type="text" placeholder="Username" autocomplete="off" required>
    <input class="form-control " id="pass" name="pass" type="password" placeholder="Password" autocomplete="new-password" required>
    <input class="btn btn-primary btn-block" id="log" type="submit" value="Login">
</form>
<?php
include $tpl."footer.php";
?>