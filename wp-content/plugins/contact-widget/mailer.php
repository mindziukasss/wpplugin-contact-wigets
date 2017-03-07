<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $name = strip_tags(trim($_POST['name']));
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $message = trim($_POST['message']);
  $recipient = $_POST['recipient'];
  $subject = $_POST['subject'];

  if(empty($name) OR empty($message) OR empty($email)){
    http_response_code(400);
    echo "Please check your form fields";
    exit;
  }
  $message = "Name: $name\n";
  $message .= "Email: $email\n\n";
  $message .= "Message: \n$message\n";

  $headers = "From: $name <$email>";

  if(mail($recipient. $subject, $message, $headers)){
    http_response_code(200);
    echo "Thank You: Your message has been sent";
  }else {
    http_response_code(500);
    echo "Error: There was a problem sending your message";
  }

  }else {
    http_response_code(403);
    echo "There was a problem with submission, please try again.";
  }
