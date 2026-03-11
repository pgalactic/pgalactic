<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/dh_h2h72m/PHPMailer/src/Exception.php';
require '/home/dh_h2h72m/PHPMailer/src/PHPMailer.php';
require '/home/dh_h2h72m/PHPMailer/src/SMTP.php';

// Sanitize and read POST values
$name    = isset($_POST['name'])    ? strip_tags(trim($_POST['name']))    : '';
$email   = isset($_POST['email'])   ? trim($_POST['email'])               : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';
$subject = 'Parker Galactic - Contact Form Inquiry';

$to_email = 'music@parkergalactic.com';
$to_name = 'PG Mailer';

$valid_email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;  
$mail->isSMTP();
$mail->Host       = 'smtp.dreamhost.com';
$mail->SMTPAuth   = true;
$mail->Username   = $to_email;
$mail->Password   = 'AG8pdwjf*NAsn3i@ZwxRXs';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;

try {
    if ($valid_email) {
        $mail->setFrom($to_email, 'PG Mailer');
        $mail->addAddress($to_email, $to_name);
        $mail->Subject = $subject;
        $mail->Body    = "Name: {$name}\n\nEmail: " . "{$valid_email}\n\nMessage:\n{$message}";
        $mail->send();
        //Success
        header("Location: /thanks.html");//echo "Message Sent!";            
    } else {
        $mail->setFrom('music@parkergalactic.com', 'Parker Galactic');
        $mail->addAddress('music@parkergalactic.com');
        $mail->Subject = 'Contact form submission with invalid email address';
        $mail->Body    = "An invalid email address was submitted via the contact form.\nAddress entered: " . htmlspecialchars($email);
        $mail->send();
        echo "Invalid email address";
        header("Location: /"); //Send home."
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    header("Location: /"); //Send home.";  
}

