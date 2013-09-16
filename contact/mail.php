<?php
require 'class.phpmailer.php';

/* Set e-mail recipient, change this to matthewshearer@gmail.com once testing is complete */
$myemail = "domurtag@yahoo.co.uk";

/* Check all form inputs using check_input function */
$name    = check_input($_POST['name'], "Invalid 'name' field");
$email   = check_input($_POST['email']);
$subject = "Green Rooms Design feedback from: $name, $email";
$message = check_input($_POST['message'], "Invalid 'message' field");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
    show_error("E-mail address not valid");
}
/* Let's prepare the message for the e-mail */
$message = "Sender Name: $name
Sender E-mail: $email
----------------------------
Message:
$message";

// Send the message using mail() function
// Consider replacing smtpmailer with the PHP native "mail" function if mail is properly setup on the production server
smtpmailer($myemail, $email, $name, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: index.html');
exit();

function smtpmailer($to, $from, $from_name, $subject, $body) {
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'festivals@festivals.ie';

    // TODO don't commit password
    $mail->Password = 'blackpear1';
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if (!$mail->Send()) {
        show_error($mail->ErrorInfo);
    }
}

function check_input($data, $problem = '')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0) {
        show_error($problem);
    }
    return $data;
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