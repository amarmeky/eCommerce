<?php

/*
==manage members page
== you can add | edit | delete members from here
*/
// Start session
session_start();
$pageTitle = 'Members'; //Page Title

// Check if user is logged in   
if (isset($_SESSION['username'])) {
    include 'init.php';
    $do = "";
    if (isset($_GET["do"])) {
        $do = $_GET["do"];
    } else {
        $do = "Manage";
    }
    if ($do == "Manage") {
        //Manage page
    } elseif ($do == "Edit") {     //Edit page 
        //ceck if the user id is numeric and get its integer value
        $userid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        //check if the user id exist in database
        $stmt = $con->prepare("SELECT * FROM users WHERE UserID=? LIMIT 1");
        $stmt->execute(array($userid));
        $row = $stmt->fetch();
        if ($row > 0) {
            //Show the edit form
?>
            <h1 class="text-center">Edit Member</h1>
            <div class="container" >
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <!-- Start hidden field to store the user id -->
                    <input type="hidden" name="userid" value="<?php echo $userid ?>" />
                    <!-- Start Username Field -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="<?php echo $row['UserName'] ?>" class="form-control" autocomplete="off"  placeholder="Username" required="required" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Email Field -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="<?php echo $row['Email'] ?>" autocomplete="off" class="form-control"  placeholder="Email" required="required"/>
                        </div>
                    </div>
                    <!-- End Email Field -->
                    <!-- Start Password Field -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>" />
                            <input type="password" name="newpassword" class="form-control" autocomplete="off"  placeholder="Leave the password if you dont to change " />
                        </div>
                    </div>
                    <!-- End Password Field -->
                    <!-- Start Email Field -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" class="form-control" value="<?php echo $row['FullName'] ?>" autocomplete="off"  placeholder="Full Name" required="required"/>
                        </div>
                    </div>
                    <!-- End Email Field -->
                    <!-- Start Submit/Cancel/reset Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                                <!-- Start Submit Button -->
                            <input type="submit" name="save" class="btn btn-primary" value="Save Changes" />
                                                    <!-- End Submit Button -->
                                                <!-- Start reset Button -->
                            <input type="button" class="btn btn-secondary" value="Reset" onclick="clearForm(this.form)" />
                            <script>
                                function clearForm(form) {
                                    const inputs = form.querySelectorAll('input');
                                    inputs.forEach(input => {
                                        if (input.type !== 'submit' && input.type !== 'button' && input.type !== 'reset') {
                                            input.value = '';
                                        }
                                    });
                                }
                            </script>
                                                    <!-- End reset Button -->
                                                <!-- Start Cancel Button -->
                            <input type="button" value="Cancel" class="btn btn-danger" onclick="history.back();" />
                                                    <!-- End cancel Button -->
                        </div>
                        <!-- End Submit/cancel/reset Button -->
                    </div>
                </form>
            </div>
            <?php } else { //if the user id not exist in database
            echo "thers no such id";
        }
    }elseif($do=="Update"){
        echo "<h1 class='text-center'>Update Member</h1>";
        echo "<div class='container'>";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id=$_POST['userid'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $fullname=$_POST['fullname'];
            //password hashing
            $pass=(empty($_POST['newpassword']))?$_POST['oldpassword']:sha1($_POST['newpassword']);
            //validate the form
            $formErrors=array();
            if(strlen($username)<4){
                $formErrors[]='<div class ="alert alert-danger"> UserName must be at least<strong> 4 characters</strong></div>';
            }
            if(strlen($username)>20){
                $formErrors[]= '<div class ="alert alert-danger"> UserName must be at more <strong>20 characters</strong></div>';
            }
            if(empty($username)){
                $formErrors[]= '<div class ="alert alert-danger"> UserName  cannot be <strong>empty</strong> </div>';
            }
            if(empty($email)){
                $formErrors[]='<div class ="alert alert-danger"> Email  cannot be <strong>empty</strong> </div>';
            }
            if(empty($fullname)){
                $formErrors[]='<div class ="alert alert-danger"> FullName  cannot be <strong>empty</strong> </div>';
            }
            //loop over errors and echo them
            foreach($formErrors as $error)
            {
                echo $error ;
            }
            //check if there is no error in the form then update the user data in database
            if(empty($formErrors)){
            //uPdate the user data in database
            $stmt=$con->prepare("UPDATE users SET UserName=?,Email=?,FullName=? ,Password=? WHERE UserID=?");
            $stmt->execute(array($username,$email,$fullname, $pass,$id));
            //echo success message
            echo'<div class="alert alert-success">'.$stmt->rowCount(). '   record updated</div>';
            }
        }else{
            echo "you can not access this page directly";
        }
        echo "</div>";
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php'); //redirect to login page
    exit();
}
