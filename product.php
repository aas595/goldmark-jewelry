<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldMark Jewelry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Database connection settings
$host = 'localhost'; // Your database host
$db = 'login'; // Your database name
$user = 'root'; // Your database user
$pass = ''; // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch products from the Adminproduct table
try {
    $stmt = $pdo->query("SELECT * FROM Adminproduct");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

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
        </ul>
    </nav>
</header>
        
<main class="product-container">
    <h2>Our Products</h2>
    <div class="product-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <a href="product-details.php?id=<?php echo htmlspecialchars($product['id']); ?>">
                    <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" width="300px" height="200px">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                </a>
                <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                <p>Size: <?php echo htmlspecialchars($product['size']); ?></p>
                <p>Weight: <?php echo htmlspecialchars($product['weight']); ?>g</p>
                <p>Color: <?php echo htmlspecialchars($product['color']); ?></p>
                <!-- Buy Now Button -->
                <form action="payment.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
                    <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
                    <button type="submit">Buy Now</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>

    
<footer>
    <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
</footer>
</body>
</html>
