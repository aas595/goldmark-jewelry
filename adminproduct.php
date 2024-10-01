<?php
// Start the session and include database connection
session_start();
include 'db.php'; // Include your database connection

// Check if the user is an admin, if not redirect to login
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin-login.php');
    exit();
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form submission
    $name = $_POST['product-name'];
    $price = $_POST['product-price'];
    $size = $_POST['product-size'];
    $weight = $_POST['product-weight'];
    $color = $_POST['product-color'];

    // Handle image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["product-image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check for upload errors
    if ($_FILES["product-image"]["error"] !== UPLOAD_ERR_OK) {
        echo "Upload failed with error code: " . $_FILES["product-image"]["error"];
        exit(); // Stop processing if there was an error
    }

    // Proceed with further checks and file processing if no errors
    // Check if image file is an actual image
    $check = getimagesize($_FILES["product-image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (example: limit to 5MB)
    if ($_FILES["product-image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully: " . $target_file;

            // Extract only the file name to store in the database
            $image_name = basename($_FILES["product-image"]["name"]);

            // Insert product details into the database, including the image file name
            $query = "INSERT INTO Adminproduct (name, price, size, weight, color, image) VALUES ('$name', '$price', '$size', '$weight', '$color', '$image_name')";
            if ($conn->query($query) === TRUE) {
                echo "Product added successfully.";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="brp/logo.jpeg" alt="GoldMark Jewelry" width="300px" height="200px">
        </div>
        <h1>Add Product</h1>
        <nav>
            <ul>
                <li><a href="admin-dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="add-product-container">
            <h2>Add New Product</h2>
            <form action="adminproduct.php" method="POST" enctype="multipart/form-data"> <!-- Ensure enctype is set for file uploads -->
                <div class="form-group">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="product-name" placeholder="Enter the product name" required>
                </div>
                <div class="form-group">
                    <label for="product-description">Product Description:</label>
                    <textarea id="product-description" name="product-description" rows="4" placeholder="Describe your product" required></textarea>
                </div>
                <div class="form-group">
                    <label for="product-price">Price ($):</label>
                    <input type="number" id="product-price" name="product-price" placeholder="Enter the price" required>
                </div>
                <div class="form-group">
                    <label for="product-size">Size (inches):</label>
                    <input type="text" id="product-size" name="product-size" placeholder="Enter the size" required>
                </div>
                <div class="form-group">
                    <label for="product-weight">Weight (grams):</label>
                    <input type="text" id="product-weight" name="product-weight" placeholder="Enter the weight" required>
                </div>
                <div class="form-group">
                    <label for="product-color">Color:</label>
                    <input type="text" id="product-color" name="product-color" placeholder="Enter the color" required>
                </div>
                <div class="form-group">
                    <label for="product-image">Product Image:</label>
                    <input type="file" id="product-image" name="product-image" accept="image/*" required>
                </div>
                <button type="submit">Add Product</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>
