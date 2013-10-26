<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = "Feedback from: $name ($email)";
$message = $_POST['message'];

// TODO replace donal's email with Matt's once testing is finished
$recipient = "domurtag@yahoo.co.uk";
$header = "From: {$email}";

if (!mail($recipient, $subject, $body, $header)) {
    // TODO error handling
}

/* Redirect visitor to the thank you page */
header('Location: success.html');
exit();

?>