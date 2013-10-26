<?php

$name = $_POST['name'];
$from = $_POST['email'];
$subject = "Feedback from: $name";
$message = $_POST['message'];
$recipient = "mattheweshearer@gmail.com";

$headers = "" .
           "Reply-To:" . $from . "\r\n" .
           "From:" . $from . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

if (!mail($recipient, $subject, $message, $headers)) {
    // TODO error handling
}

/* Redirect visitor to the thank you page */
header('Location: success.html');
exit();

?>