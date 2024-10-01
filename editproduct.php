<?php
// Start session and include database connection
session_start();
include 'db.php'; // Ensure your database connection is included

// Check if the user is an admin, if not redirect to login
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin-login.php');
    exit();
}

// Check if the 'id' is provided in the URL
if (!isset($_GET['id'])) {
    die('Error: Product ID not provided.');
}

$product_id = $_GET['id'];

// Fetch product details from the database based on the provided ID
$query = "SELECT * FROM Adminproduct WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die('Error: Product not found.');
}

$product = $result->fetch_assoc();

// Handle form submission for updating the product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product-name'];
    $price = $_POST['product-price'];
    $size = $_POST['product-size'];
    $weight = $_POST['product-weight'];
    $color = $_POST['product-color'];

    // Update product in the database
    $query = "UPDATE Adminproduct SET name = ?, price = ?, size = ?, weight = ?, color = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $name, $price, $size, $weight, $color, $product_id);

    if ($stmt->execute()) {
        echo "Product updated successfully.";
        header('Location: admin-dashboard.php'); // Redirect to dashboard after update
        exit();
    } else {
        echo "Error updating product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Edit Product</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin-dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form action="editproduct.php?id=<?php echo $product_id; ?>" method="POST">
            <div>
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product-name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
            <div>
                <label for="product-price">Product Price:</label>
                <input type="text" id="product-price" name="product-price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
            <div>
                <label for="product-size">Product Size:</label>
                <input type="text" id="product-size" name="product-size" value="<?php echo htmlspecialchars($product['size']); ?>" required>
            </div>
            <div>
                <label for="product-weight">Product Weight:</label>
                <input type="text" id="product-weight" name="product-weight" value="<?php echo htmlspecialchars($product['weight']); ?>" required>
            </div>
            <div>
                <label for="product-color">Product Color:</label>
                <input type="text" id="product-color" name="product-color" value="<?php echo htmlspecialchars($product['color']); ?>" required>
            </div>
            <button type="submit">Update Product</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>

</body>
</html>
