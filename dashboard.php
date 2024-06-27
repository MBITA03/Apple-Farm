<?php
include('authentication.php');
include('dbcon.php');

$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                if (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4>User Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h4>Succesfully, logged in.</h4>
                        <hr>
                        <h5>Welcome <?= $_SESSION['auth_user']['username'] ?></h5>
                    </div>
                </div>
            </div>
        </div>

      

        <div class="mt-5">
            <h2 style="text-align: center;">Advertise Your Apple Varieties</h2>
            <br>

           
                <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="variety" class="form-label">Apple Variety:</label>
                        <input type="text" id="variety" name="variety" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Upload Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Submit Advertisement</button>

                </div>
                </form>
  
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
