<?php
include("dbcon.php");
include("authentication.php");
include("includes/header.php");
include("includes/navbar.php");


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $post_id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "SELECT * FROM apple_varieties WHERE id = '$post_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    // Display a form to edit the post
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2 {
            color: #28a745;
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }

        input[type="text"],
        textarea,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <h2>Edit Post</h2>

    <form action="update_post.php" method="post">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

        <label for="variety">Apple Variety:</label>
        <input type="text" id="variety" name="variety" value="<?php echo $row['variety']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $row['description']; ?></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" step="0.01" required>

        <!-- Add other fields as needed -->

        <input type="submit" value="Update Post">
    </form>

</body>

</html>

    <?php
} else {
    // Invalid request
    echo "Invalid request.";
}
?>

<?php include('includes/footer.php'); ?>
