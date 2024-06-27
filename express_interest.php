<?php
session_start();
include("dbcon.php");
include("includes/header.php");
include("includes/navbar.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express Interest</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Express Interest</h2>
    <form action="process_interest.php" method="post">

        <div class="form-group">
            <label for="quantity">Quantity (kilos):</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="form-group">
            <label for="offer">Offered Amount (K):</label>
            <input type="number" class="form-control" id="offer" name="offer" required>
        </div>

        <div class="form-group">
            <label for="message">Additional Message:</label>
            <textarea class="form-control" id="message" name="message" rows="4"></textarea>
        </div>

        <!-- Add hidden input for post_id -->
        <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit Interest</button>
        </div>
    </form>
    <br><br><br>
</div>

</body>
</html>


<?php
include("includes/footer.php");
?>
