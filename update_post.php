<?php
session_start();
include("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = mysqli_real_escape_string($con, $_POST['post_id']);
    $variety = mysqli_real_escape_string($con, $_POST['variety']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Check if the post belongs to the logged-in user
    // Assuming $user_id is the ID of the logged-in user
    $check_query = "SELECT user_id FROM apple_varieties WHERE id = '$post_id'";
    $check_result = mysqli_query($con, $check_query);
    $check_row = mysqli_fetch_array($check_result);

    if ($check_row['user_id'] == $user_id) {
        // Update the post
        $update_query = "UPDATE apple_varieties SET variety = '$variety', description = '$description', price = '$price' WHERE id = '$post_id'";
        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            $_SESSION['post_update_success'] = true;
           } else {
            echo "Error updating post: " . mysqli_error($con);
        }
    } else {
        // The post does not belong to the user
        echo "You do not have permission to update this post.";
    }
} else {
    // Invalid request
    echo "Invalid request.";
}

// Redirect to dashboard.php
header('Location: index.php');
exit();
?>
