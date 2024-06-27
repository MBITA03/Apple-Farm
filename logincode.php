<?php
session_start();
include('dbcon.php');

if (isset($_POST['login_now_btn'])) {
    if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password'];

        // Create a query to select user data based on the provided email.
        $login_query = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = mysqli_prepare($con, $login_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $login_query_run = mysqli_stmt_get_result($stmt);

        if ($login_query_run && mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);

            if ($row['verify_status'] == "1") {
                // Verify the provided password against the hashed password from the database.
                if (password_verify($password, $row['password'])) {
                    // Set session variables to indicate successful authentication and store user information.
                    $_SESSION['authenticated'] = TRUE;
                    $_SESSION['auth_user'] = [
                        'username' => $row['name'],
                        'phone' => $row['phone'],
                        'email' => $row['email'],
                    ];

                    // Set a success message and redirect to the dashboard.
                    $_SESSION['status'] = "You are Logged in Successfully";
                    header("Location: dashboard.php");
                    exit(0);
                } else {
                    // Display an error message if the password is incorrect.
                    $_SESSION['status'] = "Invalid Password";
                    header("Location: login.php");
                    exit(0);
                }
            } else {
                // Display a message if the user needs to verify their email address to log in.
                $_SESSION['status'] = "Please verify your email address to Login";
                header("Location: login.php");
                exit(0);
            }
        } else {
            // Display an error message if the email or password is invalid.
            $_SESSION['status'] = "Invalid Email or Password";
            header("Location: login.php");
            exit(0);
        }
    } else {
        // Display a message if either the email or password is empty.
        $_SESSION['status'] = "All fields are Mandatory";
        header("Location: login.php");
        exit(0);
    }
}
?>
