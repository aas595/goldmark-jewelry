<?php
session_start();
include('db.php'); // Database connection

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the admin username exists
    $query = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch the result
        $row = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            // Password matches, login success
            $_SESSION['admin_username'] = $username;
            header('Location: admin-dashboard.php'); // Redirect to admin dashboard
        } else {
            echo "<p style='color:red;'>Incorrect password.</p>";
        }
    } else {
        echo "<p style='color:red;'>User account does not exist.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="brp/logo.jpeg" alt="GoldMark Jewelry " width="300px" height="200px">
        </div>
        <h1>GoldMark Jewelry</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin-dashboard.php">Dashboard</a></li>
                <li><a href="adminproduct.php">Add Product</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>

   <main class="login-container">
        <h2>Admin Login to GoldMark Jewelry</h2>
        <form action="admin-login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Login</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>
