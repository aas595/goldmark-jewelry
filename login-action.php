<?php
// Include database configuration
require 'db.php';

// Sanitize function to clean inputs
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    // Validate the form data
    if (!empty($username) && !empty($password)) {
        // Check if the username exists in the database
        $sql = "SELECT * FROM customers WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the user data
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Start a new session and store the user information
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                // Redirect to the homepage
                header("Location: index.php");
                exit();
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "Username does not exist.";
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}

$conn->close();
?>
