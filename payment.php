<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - GoldMark Jewelry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>GoldMark Jewelry</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="checkout.php">Checkout</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Payment</h2>
    
    <form action="checkout.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($_POST['product_id']); ?>">
        
        <label for="payment_method">Choose a payment method:</label>
        <select name="payment_method" id="payment_method" required>
            <option value="credit_card">Credit Card</option>
            <option value="debit_card">Debit Card</option>
            <option value="paypal">PayPal</option>
        </select>

        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <button type="submit">Submit Payment</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 GoldMark Jewelry. All Rights Reserved.</p>
</footer>
</body>
</html>
