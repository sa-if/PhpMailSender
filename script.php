<?php
$to = "recipient@example.com";
$subject = "Test Email";
$message = "This is a test email sent from a PHP script.";
$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Add file attachments
$file_attachments = array("file1.txt", "file2.pdf");
foreach ($file_attachments as $file) {
    $file_contents = file_get_contents($file);
    $file_encoded = chunk_split(base64_encode($file_contents));
    $headers .= "Content-Type: application/octet-stream; name=\"" . basename($file) . "\"\r\n";
    $headers .= "Content-Disposition: attachment; filename=\"" . basename($file) . "\"\r\n";
    $headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $headers .= $file_encoded . "\r\n";
}

// Send HTML email
$html_message = "<html><body><h1>This is a test email sent from a PHP script.</h1></body></html>";
$html_headers = "From: sender@example.com\r\n";
$html_headers .= "Reply-To: sender@example.com\r\n";
$html_headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Send email and handle errors
if (mail($to, $subject, $message, $headers) && mail($to, $subject, $html_message, $html_headers)) {
    echo "Email sent successfully!";
} else {
    echo "Email sending failed.";
}
?>
