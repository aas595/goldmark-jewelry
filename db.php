<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost:3306'; // If MySQL is running on port 3306
$username = "root"; // Default MySQL username
$password = ""; // Default MySQL password is empty
$dbname = "login"; // Ensure this database exists

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>