<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$mysqli = new mysqli("localhost", "root", "", "login");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate input
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Send email or store the data (example below uses mail())
        $to = "youremail@domain.com"; // Replace with your email
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            // Show success message
            echo "Thank you for contacting us. We will get back to you soon.";
        } else {
            echo "There was an error sending the message. Please try again later.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
