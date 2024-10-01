<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin-login.php'); // Redirect to login if not logged in
    exit();
}

include('db.php'); // Database connection

// Query to get all products
$query = "SELECT * FROM Adminproduct";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GoldMark Jewelry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="brp/logo.jpeg" alt="GoldMark Jewelry" width="300px" height="200px">
        </div>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin-dashboard.php">Dashboard</a></li>
                <li><a href="adminproduct.php">Add Product</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main style="margin-left: 350px; padding: 20px;"> <!-- Adjust the margin and padding here -->
        <h2 style="margin-left: 20px;">Manage Products</h2> <!-- Adjust the margin for the heading -->
        
        <table style="margin-left: 20px; width: 90%;"> <!-- Add margin for the table -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th> Name</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Weight</th>
                    <th>Color</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>  <!-- Changed from product_name to name -->
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['size']; ?></td>  <!-- Changed from Size to size -->
        <td><?php echo $row['weight']; ?></td>  <!-- Changed from Weight to weight -->
        <td><?php echo $row['color']; ?></td>  <!-- Changed from Color to color -->
        <td>
            <a href="editproduct.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="deleteproduct.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>

            </tbody>
        </table>
        <a href="adminproduct.php">Add New Product</a>
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>

</body>
</html>
