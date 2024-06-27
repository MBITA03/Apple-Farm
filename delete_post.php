<?php
include("dbcon.php"); // Include your database connection script
include("authentication.php"); // Include your user authentication script

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $post_id = mysqli_real_escape_string($con, $_GET['id']);

    // Delete the post only if it belongs to the logged-in user
    $delete_query = "DELETE FROM apple_varieties WHERE id = '$post_id' AND user_id = '" . $_SESSION['user_id'] . "'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        // Set a session variable to indicate successful deletion
        $_SESSION['delete_success'] = true;
        // Use JavaScript to show a pop-up notification and redirect
        echo '<script>';
        echo 'alert("Post deleted successfully.");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        // Set a session variable to indicate deletion failure
        $_SESSION['delete_fail'] = true;
        // Use JavaScript to show a pop-up notification and redirect
        echo '<script>';
        echo 'alert("Error deleting post: ' . mysqli_error($con) . '");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
} else {
    // Invalid request
    echo "Invalid request.";
}
?>
