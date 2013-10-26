<?php

$name = $_POST['name'];
$from = $_POST['email'];
$subject = "Feedback from: $name ($from)";
$message = $_POST['message'];

// TODO replace donal's email with Matt's once testing is finished
$recipient = "domurtag@yahoo.co.uk";
$header = "From: {$from}";

$headers = "" .
           "Reply-To:" . $from . "\r\n" .
           "From:" . $name . "\r\n" .
           "X-Mailer: PHP/" . phpversion();;

if (!mail($recipient, $subject, $body, $header)) {
    // TODO error handling
}

/* Redirect visitor to the thank you page */
header('Location: success.html');
exit();

?>