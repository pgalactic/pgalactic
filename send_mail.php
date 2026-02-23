<?php

// Post values
$name = $_POST['name'];
$email = $_POST['email'];
$subject = 'Parker Galactic - Contact Form Inquiry';
$message = $_POST['message'];

// Validate Email
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $valid_email = $email;
}
else {
    $email = null;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/dh_h2h72m/PHPMailer/src/Exception.php';
require '/home/dh_h2h72m/PHPMailer/src/PHPMailer.php';
require '/home/dh_h2h72m/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.dreamhost.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 123;
$mail->Username = 'music@parkergalactic.com';
$mail->Password = 'AG8pdwjf*NAsn3i@ZwxRXs';

if($valid_email) {
$mail->setFrom($email, $name);
$mail->addAddress('music@parkergalactic.com');
$mail->Subject = $subject;
$mail->Body = 'Name:' . $name . '/n  Join List:' . $join . ' ' . '/n  Message:' $message;
$mail->send();
}
else {
    $mail->setFrom('music@parkergalactic.com', 'Bad Email');
    $mail->addAddress('music@parkergalactic.com');
    $mail->Subject = 'Someone sent an email with a bad email address.  Message not sent.'

}
echo "Email sent";