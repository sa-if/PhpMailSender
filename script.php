<?php

// Replace with your own email address and password
$email = 'your-email@gmail.com';
$password = 'your-password';

// Replace with the recipient's email address
$to = 'recipient-email@gmail.com';

// Replace with a custom subject
$subject = 'Test email from PHP';

// Replace with a custom message
$message = 'This is a test email sent from PHP';

// Set up the mail headers
$headers = "From: $email\r\n" .
           "Reply-To: $email\r\n" .
           "MIME-Version: 1.0\r\n" .
           "Content-Type: text/html; charset=iso-8859-1\r\n";

// Send the email
mail($to, $subject, $message, $headers);

