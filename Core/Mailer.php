<?php
include_once './PHPMailer/class.phpmailer.php';
include_once './PHPMailer/class.smtp.php';
class Mailer {
    public function sendMail($email, $title, $name, $content) 
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
    try {
        //Server settings
        $mail->SMTPDebug = 0;// Enable verbose debug output
        $mail->isSMTP();// gửi mail SMTP
        $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->Username = 'binhtrinh8122002@gmail.com';// SMTP username
        $mail->Password = 'exmsjhcaxcphuznx'; // SMTP password
        $mail->Port = 587; // TCP port to connect to
        //Recipients
        $mail->setFrom('support@.com', ' Support');
        $mail->addAddress($email, $name); // Add a recipient
        //$mail->addAddress('ellen@example.com'); // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
        // Content
        $mail->isHTML(true);   // Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = $content;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
}