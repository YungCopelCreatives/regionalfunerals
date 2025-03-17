<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['number']));
    $enquiry = htmlspecialchars(trim($_POST['enquiry']));

    // Email details
    $to = "regionalfunerlsoffice@gmail.com"; // Change to your email address
    $subject = "New Contact Form Submission";
    $message = "You have received a new submission:\n\n" .
               "Name: $name\n" .
               "Email: $email\n" .
               "Phone: $phone\n" .
               "Enquiry: $enquiry\n";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        $confirmationMessage = "Message sent successfully!";
    } else {
        $confirmationMessage = "Failed to send message.";
    }
} else {
    $confirmationMessage = "Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Contact Form Submission</h1>
    <p><?php echo $confirmationMessage; ?></p>
    <a href="contacts.html">Go back to the form</a>
</body>
</html>
