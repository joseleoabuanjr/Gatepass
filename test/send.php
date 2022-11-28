<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


if (isset($_POST['send'])) {

    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();
    $mail->Host         = 'smtp.gmail.com';
    $mail->SMTPAuth     = true;
    $mail->Username     = 'bulsua.qrgatepass@gmail.com';    // this is gmail username
    $mail->Password     = 'amvzarortrcqiorr';               //this is gmail app password;
    $mail->SMTPSecure   = 'ssl';
    $mail->Port         = 465;

    //Recipients
    $mail->setFrom('bulsua.qrgatepass@gmail.com', 'BulSU QR GATEPASS');         //admin gmail account

    $mail->addAddress('zeroone112201@gmail.com');                         //Add a recipient
    $mail->isHTML(true);

    //mail content
    $mail->Subject = 'Bulsu Verify account';
    $mail->Body    = 'hotdog';

    //send mail
    $mail->send();

    echo "<script>alert('Sent Successfully')</script>";
}