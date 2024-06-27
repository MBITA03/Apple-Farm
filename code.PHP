<?php
session_start(); // Start the session to use session variables
include("dbcon.php"); // Include the database connection file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Function to send email verification
function sendemail_verify($name, $email, $verify_token) {
    
    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    // SMTP Configuration
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = ""; // email address
    $mail->Password = ""; // app password from Gmail account
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    // Email details
    $mail->setFrom("thejuvenile3@gmail.com", $name);
    $mail->addAddress($email);
    
    // HTML email content
    $mail->isHTML(true);
    $mail->Subject = "Email verification from Apple farm.";
    $email_template = "
        <h2>You have registered with Mulungushi Apple Farm</h2>
        <h5>Verify your email address by clicking the link below</h5>
        <br><br/>
        <a href='http://localhost/courseworkv1/verify-email.php?token=$verify_token'>Verify Here</a>
    ";
    $mail->Body = $email_template;

    // Send the email
    $mail->send();
    // echo 'Message has been sent';
}



// Registration form submission handling
if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $raw_password = $_POST['password']; // Password as entered by the user
    $verify_token = md5(rand()); // Generate a verification token
    $usertype = $_POST['usertype'];

    // Check if the email already exists
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_run) > 0) {
        $_SESSION['status'] = 'Email Already exists';
        header('Location: register.php'); // Redirect to registration page with a message
    } else {
        // Hash the password
        $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

        // Add user data with the hashed password
        $query = "INSERT INTO users (name, phone, email, password, verify_token, usertype) VALUES ('$name', '$phone', '$email', '$hashed_password', '$verify_token', '$usertype')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            sendemail_verify($name, $email, $verify_token); // Send verification email
            $_SESSION['status'] = 'Registration Successful, Check your Email for verification.';
            header('Location: register.php'); // Redirect to registration page with a message
        } else {
            $error_message = mysqli_error($con);
            $_SESSION['status'] = "Registration Failed. Error: $error_message";
            header('Location: register.php'); // Redirect to registration page with an error message
        }
    }
}
// User details update form submission handling
if (isset($_POST['update_details'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
 
    $query = "UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id='$user_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Successfully Updated";
        header('Location: user-profile.php'); // Redirect to user profile page with a success message
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $variety = mysqli_real_escape_string($con, $_POST['variety']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // Assuming $user_id is the ID of the logged-in user
            $query = "INSERT INTO apple_varieties (user_id, variety, description, price, image_path) VALUES ('$user_id', '$variety', '$description', '$price', '$target_file')";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                // Set a session variable to indicate successful submission
                $_SESSION['advert_success'] = true;
                // Use JavaScript to show a pop-up notification and redirect
                echo '<script>';
                echo 'alert("Advertisement posted successfully.");';
                echo 'window.location.href = "dashboard.php";';
                echo '</script>';
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



?>
