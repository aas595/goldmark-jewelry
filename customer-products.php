<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldMark Jewelry - Customer Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="brp/logo.jpeg" alt="GoldMark Jewelry" width="300px" height="200px">
        </div>
        <h1>GoldMark Jewelry</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="addproduct.php">Add Product</a></li>
                <li><a href="team.php">Our team</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="customer-products.php">Customer Products</a></li> <!-- New link for customer products -->
            </ul>
        </nav>
    </header>

    <main class="product-container">
    <h2>Customer-Added Products</h2>
    <div class="product-grid">
        <?php
        // Include database connection file
        include('db.php');

        // Fetch products added by customers from the database
        $sql = "SELECT * FROM products WHERE added_by = 'customer'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-card">';
                echo '<img src="' . htmlspecialchars($row['product_image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" width="300px" height="200px">';
                echo '<h3>' . htmlspecialchars($row['product_name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['product_description']) . '</p>';
                echo '<p>Price: $' . htmlspecialchars($row['product_price']) . '</p>';
                echo '<p>Size: ' . htmlspecialchars($row['product_size']) . '</p>';
                echo '<p>Weight: ' . htmlspecialchars($row['product_weight']) . 'g</p>';
                echo '<p>Color: ' . htmlspecialchars($row['product_color']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No customer-added products available.</p>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</main>


    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>
