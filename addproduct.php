

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
        
   <main class="add-product-container">
    <h2>Add Your Jewelry Product</h2>
    <!-- Form sends data to add-product-action.php -->
    <form class="add-product-form" action="add-product-action.php" method="POST" enctype="multipart/form-data">
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
</main>

        
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>