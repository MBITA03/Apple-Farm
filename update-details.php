<?php
include('authentication.php');
$page_title = "Update";
include('includes/header.php');
include('dbcon.php');
include('includes/navbar.php');


$result = mysqli_query($con, "SELECT * FROM users");
?>


<div class="container-fluid px-4">
    <h4>Edit Details</h4>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User Profile</li>
        <li class="breadcrumb-item">Edit Details</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">               
                <div class="card-body">



                    <?php
                        if(isset($_GET['id'])) {
                            $user_id = $_GET['id'];
                            $users = "SELECT * FROM users WHERE id='$user_id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0) {
                                
                                foreach($users_run as $user) {

                    ?>
                      
                        <form action="code.PHP" method="POST">
                            <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="<?= $user['name'];?>" class="form-control" >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Phone No.</label>
                                    <input type="text mb-3" name="phone" value="<?= $user['phone'];?>" class="form-control" >
                                </div> 

                                <div class="col-md-6 mb-3">
                                    <label for="">Email Address</label>
                                    <input type="text mb-3" name="email" value="<?= $user['email'];?>" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <button type="submit" name="update_details" class="btn btn-primary">Update Details</button>
                                </div>
                                


                                
                            </div>
                        </form>

                <?php
                        }
                    }
                    else {
                            ?>
                            <h4>No Record Found</h4>

                            <?php

                        }
                    }
                  
                
                ?>


                </div>
            </div>
        </div>
    </div>

</div>


<br><br><br><br>
<?php include('includes/footer.php');?>