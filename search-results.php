<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "login");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the search query from the form
$search_query = htmlspecialchars($_GET['search_query']);

// Prepare the SQL query to search products based on name, category, or description
$sql = "SELECT * FROM jewelry_items WHERE name LIKE ? OR category LIKE ? OR description LIKE ?";
$stmt = $mysqli->prepare($sql);

// Use wildcards (%) to search for partial matches
$search_term = '%' . $search_query . '%';
$stmt->bind_param('sss', $search_term, $search_term, $search_term);

$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - GoldMark Jewelry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h1>
    </header>

    <main>
        <section class="search-results">
            <?php if ($result->num_rows > 0): ?>
                <div class="product-grid">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="product-card">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" width="300" height="200">
                            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                            <p>Price: $<?php echo number_format($row['price'], 2); ?></p>
                            <p>Size: <?php echo htmlspecialchars($row['size']); ?></p>
                            <p>Weight: <?php echo htmlspecialchars($row['weight']); ?></p>
                            <p>Color: <?php echo htmlspecialchars($row['color']); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>No products found for your search query.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>

</body>
</html>

<?php
// Close connection
$stmt->close();
$mysqli->close();
?>
