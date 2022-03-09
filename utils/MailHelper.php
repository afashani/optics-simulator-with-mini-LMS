<?php

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use \PHPMailer\PHPMailer\PHPMailer;

function initMail()
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "maheshikaj97@gmail.com";
    $mail->Password = "Sanoja1969";

    $mail->SetFrom("maheshikaj97@gmail.com", "UWU");

    return $mail;
}

function sendSimpleMail($name ,$to, $subject, $message)
{
    $mail = initMail();
    $mail->IsHTML(false);
    $mail->AddAddress($to, $name);
    $mail->Subject = $subject;

    $mail->MsgHTML($message);
    if (!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }
}

function sendHtmlMail($name, $to, $subject, $messageWithHtml)
{
    $mail = initMail();
    $mail->IsHTML(true);
    $mail->AddAddress($to, $name);
    $mail->Subject = $subject;

    $mail->MsgHTML($messageWithHtml);
    if (!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }
}