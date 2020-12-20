<?php
// $to = "dental.clinic.online@gmail.com";
// $subject = "Change your website password";
// $txt = "Change Dental Clinic Admin password";
// $headers = "From: webmaster@example.com" . "\r\n";
// mail($to,$subject,$txt,$headers);

// ini_set("SMTP", "aspmx.l.google.com");
// ini_set("sendmail_from", "iitodoii10@gmail.com");
// $message = "The mail message was sent with the following mail setting:\r\nSMTP = aspmx.l.google.com\r\nsmtp_port = 25\r\nsendmail_from = YourMail@address.com";
// $headers = "From: iitodoii10@gmail.com";
// mail("dental.clinic.online@gmail.com", "Testing", $message, $headers);

// Settings


// $mail->Host       = "mail.example.com"; // SMTP server example
// $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
// $mail->SMTPAuth   = true;                  // enable SMTP authentication
// $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
// $mail->Username   = "username"; // SMTP account username example
// $mail->Password   = "password";        // SMTP account password example

// Content
// $mail->isHTML(true);                                  // Set email format to HTML
// $mail->Subject = 'Here is the subject';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src_email/Exception.php';
require 'src_email/PHPMailer.php';
require 'src_email/SMTP.php';

$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
// $mail->CharSet = 'UTF-8';
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)

$mail->SMTPAuth   = true;     
// $mail->SMTPSecure = "tls";             // enable SMTP authentication
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server // 25
$mail->Username   = "iitodoii10@gmail.com";  // GMAIL username
$mail->Password   = "BPP0623870310!";            // GMAIL password

$mail->SetFrom('iitodoii10@gmail.com', 'First Last');

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

// $mail->MsgHTML($body);
$address = "dental.clinic.online@gmail.com";
$mail->AddAddress($address, "John Doe");

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Complete Email!";
    echo "<a href='index.php'>Go to home page</a>";
}
?>