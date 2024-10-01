<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldMark Jewelry - Sign Up</title>
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
                <li><a href="index.html">Home</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="search.html">Search</a></li>
                <li><a href="product.html">Products</a></li>
                <li><a href="addproduct.html">Add Product</a></li>
                <li><a href="team.html">Our team</a></li>
            </ul>
        </nav>
    </header>

    <main class="signup-container">
        <h2>Create Your GoldMark Jewelry Account</h2>
        <form action="/project/signup-action.php" method="post" class="signup-form">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign Up</button>
        </form>
        <div class="login-container">
            <p>Already have an account?</p>
            <a href="login.php" class="login-button">Log In</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>
