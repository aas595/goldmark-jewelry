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

     <main class="login-container">
        <h2>Login to GoldMark Jewelry</h2>
        <form action="login-action.php" method="post" class="login-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
          
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>