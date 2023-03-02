<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
  http_response_code(400);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email message
$to = 'you@example.com'; // replace with your own email address
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";

// Send the email
$headers = "From: noreply@example.com\n"; // replace with your own email address or a custom name
$headers .= "Reply-To: $email";
mail($to,$email_subject,$email_body,$headers);
return true;            
?>
