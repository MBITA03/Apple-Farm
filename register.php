<?php 
session_start();
$page_title = "Registration Page";
include("includes/header.php"); 
include("includes/navbar.php"); 

if(isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = 'You are already Registered.';
    header('Location: dashboard.php');
    exit(0);
}


 ?>

<div class="py-5">
    <div class="conatiner">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert">
                    <?php 
                        if(isset($_SESSION['status'])) {

                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION["status"]);

                        }                   
            
                    ?>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">


                        <form action="code.PHP" method="POST">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Phone No.</label>
                                <input type="text mb-3" name="phone" class="form-control" placeholder="Enter your phone number...">
                            </div> 

                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text mb-3" name="email" class="form-control" placeholder="Enter your email...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password...">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                            </div>

                            <input type="hidden" name="usertype" value="admin">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("includes/footer.php"); ?>