<?php
require_once './Core/Mailer.php';
$mail = new Mailer();
$mail -> sendMail($email, $name, $title, $content);
?>