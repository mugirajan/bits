<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    
    $to = "mugirajan95@gmail.com";  

    
    $subject = "contact us";

    
    $message_body = "Name: $name\n";
    $message_body .= "Email: $email\n\n";
    $message_body .= "Message:\n$message";

   
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

   
    if (mail($to, $subject, $message_body, $headers)) {
        echo "Thank you for your message! We will get back to you shortly.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    header("Location: contact.html");
    exit();
}
?>
