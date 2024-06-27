<?php
include("dbcon.php"); // Include your database connection script
include("includes/header.php");
include("includes/navbar.php");

// Check if the search query is provided
if (isset($_GET['query'])) {
    $search_query = mysqli_real_escape_string($con, $_GET['query']);

    // Fetch records from the database based on the search query
    $search_result = mysqli_query($con, "SELECT * FROM apple_varieties WHERE variety LIKE '%$search_query%'");

    if (mysqli_num_rows($search_result) > 0) {
        ?>
        <div class="container mt-5">
            <h2 class="mb-4" style="text-align:center">Search Results for <?php echo $search_query?></h2>
            <div class="col-md-4 mx-auto mt-3">
                    <form class="form-inline" action="search.php" method="GET">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search Apple variety" aria-label="Search" name="query">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            <div class="row">
                <?php
                while ($row = mysqli_fetch_array($search_result)) {
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="Apple Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['variety']; ?></h5>
                                <p class="card-text"><?php echo $row['description']; ?></p>
                                <p class="card-text"><strong>Price: K<?php echo $row['price']; ?></strong></p>                                
                            </div>
                            <a href='express_interest.php?id=<?php echo $row['id']; ?>' class="btn btn-primary">Express Interest</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='container mt-5'><p class='text-muted'>No results found for '$search_query'.</p></div>";
    }
} else {
    // If no search query is provided, display a message
    echo "<div class='container mt-5'><p class='text-muted'>Please enter a search query.</p></div>";
}

include("includes/footer.php");
?>
