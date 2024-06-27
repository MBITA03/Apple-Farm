<?php
$page_title = 'Home Page';
include("includes/header.php");
include("includes/navbar.php");
include("dbcon.php"); // Include your database connection script
?>

<section class="py-5" style="background-image: url('uploads/back.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="display-4 text-light">Welcome To</h2>
                <h2 class="display-4 text-light"><strong>Mulungushi Apple Farm</strong></h2>

                <!-- Centered Search Bar -->
                <div class="col-md-4 mx-auto mt-3">
                    <form class="form-inline" action="search.php" method="GET">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search Apple variety" aria-label="Search" name="query">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5" >
    <h2 class="mb-4" style="text-align:center">Available Apple Varieties</h2>
    <?php
    // Fetch records from the database
    $result = mysqli_query($con, "SELECT * FROM apple_varieties");

    if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="Apple Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['variety']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><strong>Price: K<?php echo $row['price']; ?></strong></p>

                        <!-- Edit and Delete links -->
                        <a href='edit_post.php?id=<?php echo $row['id']; ?>'>Edit</a> | 
                        <a href='delete_post.php?id=<?php echo $row['id']; ?>'>Delete</a>
                    </div>
                    <a href='express_interest.php?id=<?php echo $row['id']; ?>' class="btn btn-primary">Express Interest</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    <?php
    } else {
        echo "<p class='text-muted'>No apple varieties available at the moment.</p>";
    }
    ?>
</section>

<?php include("includes/footer.php"); ?>
