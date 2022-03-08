<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


$mail = new PHPMailer(true);

$OTP = rand(100000,999999);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'mailwisdominstitution@gmail.com';				
	$mail->Password = 'Wisdom123456';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('mailwisdominstitution@gmail.com', 'Wisdom Institution');		
	$mail->addAddress('amalvishwajith@gmail.com', "verification");
	
	$mail->isHTML(true);								
	$mail->Subject = 'Subject';
	$mail->Body = "OTP $OTP";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
