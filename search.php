<?php
// Include database connection file
include('db.php');

$search_query = '';
$search_results = [];

if (isset($_GET['search-query'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search-query']);

    // Query to search the products table based on the search query
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$search_query%' 
            OR product_description LIKE '%$search_query%' 
            OR product_color LIKE '%$search_query%'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Store search results in an array
        while ($row = mysqli_fetch_assoc($result)) {
            $search_results[] = $row;
        }
    } else {
        echo '<p>No products found for your search query.</p>';
    }
}

// Close the database connection
mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldMark Jewelry</title>
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
                <li><a href="login.php">Login</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="addproduct.php">Add Product</a></li>
                <li><a href="team.php">Our team</a></li>
                <li><a href="signup.php">Signup</a></li>


            </ul>
        </nav>
        
    </header>

    <main>
        <main class="search-container">
             <h2>Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h2>
    <form class="search-form" action="search.php" method="GET">
    <input type="text" id="search-query" name="search-query" placeholder="Search by product name, category, or keyword" required>
    <button type="submit">Search</button>
</form>

<div class="product-grid">
            <?php
            // Display search results dynamically
            if (!empty($search_results)) {
                foreach ($search_results as $product) {
                    echo '<div class="product-card">';
                    echo '<img src="' . htmlspecialchars($product['product_image']) . '" alt="' . htmlspecialchars($product['product_name']) . '" width="300px" height="200px">';
                    echo '<h4>' . htmlspecialchars($product['product_name']) . '</h4>';
                    echo '<p>Price: $' . htmlspecialchars($product['product_price']) . '</p>';
                    echo '<p>Size: ' . htmlspecialchars($product['product_size']) . '</p>';
                    echo '<p>Weight: ' . htmlspecialchars($product['product_weight']) . ' grams</p>';
                    echo '<p>Color: ' . htmlspecialchars($product['product_color']) . '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>



        <section class="search-results">
            <h3>Search Results</h3>
            <div class="product-grid">
                <!-- Example Search Results (Replace with dynamic content) -->
                <div class="product-card">
                    <img src="brp/product1.jpeg" alt="Gold Necklace">
                    <h4>Gold Necklace</h4>
                    <p>Price: $1500</p>
                    <p>Size: 18 inches</p>
                </div>

                <div class="product-card">
                    <img src="brp/product2.jpeg" alt="Diamond Ring">
                    <h4>Diamond Ring</h4>
                    <p>Price: $2500</p>
                    <p>Size: 7</p>
                </div>

                <div class="product-card">
                <img src="brp/product4.jpeg" alt="Pearl Earrings">
                <h3>Pearl Earrings</h3>
                <p>Price: $300</p>
               
            </div>

                <div class="product-card">
                    <img src="brp/product3.jpeg" alt="Silver Bracelet">
                    <h4>Silver Bracelet</h4>
                    <p>Price: $750</p>
                    <p>Size: Adjustable</p>
                </div>

                <!-- More product cards can be added here -->
            </div>
        </section>
    </main>
        
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>