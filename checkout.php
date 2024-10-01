<?php
// checkout.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $payment_method = $_POST['payment_method'];
    // Process the payment (you would usually do API calls here)

    // Assuming payment was successful, show confirmation
    echo "<h2>Payment Successful!</h2>";
    echo "<p>Thank you for your purchase of product ID: " . htmlspecialchars($product_id) . "</p>";
    echo "<p>Payment method: " . htmlspecialchars($payment_method) . "</p>";
} else {
    // If not a POST request, redirect to the product page or show an error
    header("Location: product.php");
    exit();
}
?>
