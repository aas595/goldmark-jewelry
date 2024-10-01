<?php
$plain_password = 'admin123'; // Replace with your desired plain text password
$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

echo "Your hashed password is: " . $hashed_password;
?>
