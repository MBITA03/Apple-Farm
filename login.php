<?php 
session_start();
if(isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = 'You are already logged in';
    header('Location: dashboard.php');
    exit(0);
}

$page_title = "Login Page";
include("includes/header.php"); 
include("includes/navbar.php"); 
?>

<div class="content-wrapper" style="min-height: calc(100vh - 174px);"> <!-- Adjusted min-height value based on the header and navbar height -->
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6"> <!-- Increased the width of the login form -->
                    <?php
                        if(isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                    <?php
                        unset($_SESSION['status']);
                        }                                           
                    ?>
                    <div class="card shadow">
                        <div class="card-header">                        
                            <h5 class="mb-0">Login Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="logincode.php" method="POST">
                                <div class="form-group mb-4"> <!-- Increased the margin at the bottom -->
                                    <input type="text mb-3" name="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-group  mb-4"> <!-- Increased the margin at the bottom -->
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group text-center"> <!-- Centered the login button -->
                                    <button type="submit" name="login_now_btn" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
