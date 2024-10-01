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

         <main class="contact-container">
        <h2>Contact Us</h2>
        <p>We would love to hear from you! Feel free to reach out using the information below.</p>

        <div class="contact-details">
            <div class="contact-info">
                <h3>Our Store Location</h3>
                <p><strong>Address:</strong> 7/5 Gulliver Street, Brookvale, NSW, Sydney, Australia</p>
                <p><strong>Phone:</strong> <a href="tel:+61424139700">0424 139 700</a></p>
            </div>

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.3063087316573!2d151.26808417578803!3d-33.76513778068338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12aee09ad75653%3A0x93f50cfe1c60e36d!2s7%2F5%20Gulliver%20St%2C%20Brookvale%20NSW%202100%2C%20Australia!5e0!3m2!1sen!2sus!4v1692613135662!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="contact-form">
            <h3>Send Us a Message</h3>
           <form action="contact-form-action.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit">Send Message</button>
</form>

        </div>
        
    </main>

    <footer>
        <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
    </footer>
</body>
</html>