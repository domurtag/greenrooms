<?php
require 'class.phpmailer.php';

/* Check all form inputs using check_input function */
$name    = $_POST['name'];
$email   = $_POST['email'];
$subject = "Feedback from: $name ($email)";
$message = $_POST['message'];

// Consider replacing smtpmailer with the PHP native "mail" function if mail is properly setup on the production server
// TODO replace donal's email with Matt's once testing is finished
smtpmailer("mattheweshearer@gmail.com", $email, $name, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: success.html');
exit();

function smtpmailer($recipient, $from, $from_name, $subject, $body) {

    // the account that sends the emails is not the same as the recipient
    $sender_email = "greenroomsfeedback@yahoo.ie";
    $sender_name = "Green Rooms Design Feedback";

    // TODO don't accidentally commit the password
    $sender_password = "S0meBigSecret";

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "plus.smtp.mail.yahoo.com";
    $mail->Port = 465;
    $mail->Username = $sender_email;
    $mail->Password = $sender_password;
    $mail->From = $sender_email;
    $mail->FromName = $sender_name;

    // set the "reply to" address, so that if we reply to the email the reply is sent to the name entered in the form
    // rather than the account it was sent from
    $mail->addReplyTo($from, $from_name);

    $mail->AddAddress($recipient);

    $mail->Subject = $subject;
    $mail->Body = $body;

    if (!$mail->Send()) {
        show_error($mail->ErrorInfo);
    }
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php
    echo $myError;
?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
    exit();
}
?>