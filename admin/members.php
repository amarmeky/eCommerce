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
    $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";
    if ($do == "Manage") { //Manage member page 
        //select all users except admin
        $stmt = $con->prepare("SELECT * FROM users WHERE GroupID	!=1");
        //execute the statement
        $stmt->execute();
        //fetch all users
        $rows = $stmt->fetchAll();
?>
        <h1 class="text-center">Manage Members</h1>
        <div class="container">
            <a href="members.php?do=Add" class="btn btn-primary mb-2"> <i class="fa fa-plus "> </i> Add Member</a>
            <div class="table-responsive">
                <table class="main-table table table-bordered  text-center">
                    <tr>
                        <td>#ID</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Full Name</td>
                        <td>Register Date</td>
                        <td>Control</td>
                    </tr>
                    <?php
                    //loop over the users
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["UserID"] . "</td>";
                        echo "<td>" . $row["UserName"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["FullName"] . "</td>";
                        echo "<td>" . "</td>";
                        echo "<td>
<a href='members.php?do=Edit&id=$row[UserID]' class='btn btn-success'>Edit</a>
<a href='members.php?do=Delete&id=$row[UserID]' class='btn btn-danger confirm'>Delete</a>
</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div><?php
                } elseif ($do == "Add") { //Add members page 
                    ?>
            <h1 class="text-center">Add Member</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=Insert" method="POST">
                    <!-- Start Username Field -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Please enter a username" required="required" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Email Field -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" autocomplete="off" class="form-control" placeholder="Please enter a valid email address." required="required" />
                        </div>
                    </div>
                    <!-- End Email Field -->
                    <!-- Start Password Field -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class=" password form-control" autocomplete="off" placeholder="Please enter a strong password." required="required" />
                            <i class="show-pass fa fa-eye  "></i>
                        </div>
                    </div>
                    <!-- End Password Field -->
                    <!-- Start full Name Field -->
                    <div class=" form-group">
                        <label class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" class="form-control" autocomplete="off" placeholder="Please enter your full name" required="required" />
                        </div>
                    </div>
                    <!-- End full Name Field -->
                    <!-- Start Submit/Cancel/reset Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <!-- Start Submit Button -->
                            <input type="submit" name="save" class="btn btn-primary" value="Add Member" />
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
            </div><?php
                } elseif ($do == "Insert") {
                    //Insert page
                    echo "<h1 class='text-center'>Insert Member</h1>";
                    echo "<div class='container'>";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        $pass = $_POST['password'];
                        $hass_pass = sha1($pass);
                        //validate the form
                        $formErrors = array();
                        if (empty($username)) {
                            $formErrors[] = 'UserName  cannot be <strong>empty</strong>';
                        } elseif (strlen($username) < 4) {
                            $formErrors[] = 'UserName must be at least<strong> 4 characters</strong>';
                        } elseif (strlen($username) > 20) {
                            $formErrors[] = 'UserName must be at more <strong>20 characters</strong>';
                        }
                        if (empty($email)) {
                            $formErrors[] = 'Email  cannot be <strong>empty</strong>';
                        }
                        if (empty($fullname)) {
                            $formErrors[] = 'FullName  cannot be <strong>empty</strong>';
                        }
                        if (empty($pass)) {
                            $formErrors[] = 'password  cannot be <strong>empty</strong>';
                        } elseif (strlen($pass) < 4) {
                            $formErrors[] = 'password must be at least <strong> 4 characters</strong>';
                        }
                        //loop over errors and echo them
                        foreach ($formErrors as $error) {
                            echo '<div class ="alert alert-danger">' . $error . '</div>';
                        }
                        //check if there is no error in the form then update the user data in database
                        if (empty($formErrors)) {
                            //Insert the user data in database
                            $stmt = $con->prepare("INSERT INTO users (UserName,Email,FullName,Password) VALUES(?,?,?,?)");
                            $stmt->execute(array($username, $email, $fullname, $hass_pass));
                            //echo success message
                            echo '<div class="alert alert-success">' . $stmt->rowCount() . '   record Inserted Successfully </div>';
                        }
                    } else {
                        redirectHome('you can not access this page directly', 6);
                    }
                    echo "</div>";
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
                <div class="container">
                    <form class="form-horizontal" action="?do=Update" method="POST">
                        <!-- Start hidden field to store the user id -->
                        <input type="hidden" name="userid" value="<?php echo $userid ?>" />
                        <!-- Start Username Field -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" value="<?php echo $row['UserName'] ?>" class="form-control" autocomplete="off" placeholder="Username" required="required" />
                            </div>
                        </div>
                        <!-- End Username Field -->
                        <!-- Start Email Field -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="<?php echo $row['Email'] ?>" autocomplete="off" class="form-control" placeholder="Email" required="required" />
                            </div>
                        </div>
                        <!-- End Email Field -->
                        <!-- Start Password Field -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>" />
                                <input type="password" name="newpassword" class=" password form-control" autocomplete="off" placeholder="Please enter a strong password." />
                                <i class="show-pass fa fa-eye  "></i>
                            </div>
                        </div>
                        <!-- End Password Field -->
                        <!-- Start Email Field -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="fullname" class="form-control" value="<?php echo $row['FullName'] ?>" autocomplete="off" placeholder="Full Name" required="required" />
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
                        redirectHome('theres no such id', 6);
                    }
                } elseif ($do == "Update") {
                    echo "<h1 class='text-center'>Update Member</h1>";
                    echo "<div class='container'>";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $id = $_POST['userid'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        //password hashing
                        $pass = (empty($_POST['newpassword'])) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);
                        //validate the form
                        $formErrors = array();
                        if (empty($username)) {
                            $formErrors[] = 'UserName  cannot be <strong>empty</strong>';
                        } elseif (strlen($username) < 4) {
                            $formErrors[] = 'UserName must be at least<strong> 4 characters</strong>';
                        } elseif (strlen($username) > 20) {
                            $formErrors[] = 'UserName must be at more <strong>20 characters</strong>';
                        }
                        if (empty($email)) {
                            $formErrors[] = 'Email  cannot be <strong>empty</strong>';
                        }
                        if (empty($fullname)) {
                            $formErrors[] = 'FullName  cannot be <strong>empty</strong>';
                        }
                        //loop over errors and echo them
                        foreach ($formErrors as $error) {
                            echo '<div class ="alert alert-danger">' . $error . '</div>';
                        }
                        //check if there is no error in the form then update the user data in database
                        if (empty($formErrors)) {
                            //uPdate the user data in database
                            $stmt = $con->prepare("UPDATE users SET UserName=?,Email=?,FullName=? ,Password=? WHERE UserID=?");
                            $stmt->execute(array($username, $email, $fullname, $pass, $id));
                            //echo success message
                            echo '<div class="alert alert-success">' . $stmt->rowCount() . '   record updated</div>';
                        }
                    } else {
                        redirectHome('you can not access this page directly', 6);
                    }
                    echo "</div>";
                } elseif ($do == "Delete") {
                    //delete page
                    echo "<h1 class='text-center'>Delete Member</h1>";
                    echo "<div class='container'>";
                    //ceck if the user id is numeric and get its integer value
                    $userid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
                    //check if the user id exist in database
                    $stmt = $con->prepare("SELECT * FROM users WHERE UserID=? LIMIT 1");
                    $stmt->execute(array($userid));
                    $row = $stmt->fetch();
                    if ($row > 0) {
                        //delete the user data in database
                        $stmt = $con->prepare("DELETE FROM users WHERE UserID=?");
                        $stmt->execute(array($userid));
                        //echo success message
                        echo '<div class="alert alert-success">' . $stmt->rowCount() . '   record deleted</div>';
                    } else {
                        redirectHome('theres no such id', 6);
                    }
                }
                include $tpl . 'footer.php';
            } else {
                header('Location: index.php'); //redirect to login page
                exit();
            }
