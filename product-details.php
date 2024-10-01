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

// Fetch product details based on the product ID passed via URL
$product_id = $_GET['id'] ?? null;

if ($product_id) {
    $stmt = $pdo->prepare("SELECT * FROM Adminproduct WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$product) {
    echo "Product not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - GoldMark Jewelry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Your header code -->
    </header>

    <main class="product-detail-container">
        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
        <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
        <p>Size: <?php echo htmlspecialchars($product['size']); ?></p>
        <p>Weight: <?php echo htmlspecialchars($product['weight']); ?>g</p>
        <p>Color: <?php echo htmlspecialchars($product['color']); ?></p>

       <form action="payment.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
    <button type="submit">Buy Now</button>
</form>

    </main>

    <footer>
        <!-- Your footer code -->
    </footer>
</body>
</html>
