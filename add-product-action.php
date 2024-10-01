<?php
// Include database connection file
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $product_name = mysqli_real_escape_string($conn, $_POST['product-name']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product-description']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product-price']);
    $product_size = mysqli_real_escape_string($conn, $_POST['product-size']);
    $product_weight = mysqli_real_escape_string($conn, $_POST['product-weight']);
    $product_color = mysqli_real_escape_string($conn, $_POST['product-color']);

    // Handle file upload
    $target_dir = "uploads/";
    $product_image = basename($_FILES["product-image"]["name"]);
    $target_file = $target_dir . $product_image;
    
    // Ensure the uploads directory exists and move the uploaded file
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file)) {
        // Insert product details into the database
        $sql = "INSERT INTO products (product_name, product_description, product_price, product_size, product_weight, product_color, product_image, added_by) 
                VALUES ('$product_name', '$product_description', '$product_price', '$product_size', '$product_weight', '$product_color', '$target_file', 'customer')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Product added successfully! <a href='customer-products.php'>View Products</a></p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading the image.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
