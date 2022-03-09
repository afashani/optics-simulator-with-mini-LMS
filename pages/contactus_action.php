<?php

include("../utils/MailHelper.php");

//session_start();

$fullname = $_POST["fullname"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


if(!is_null($email) && $email != ""){
    sendSimpleMail($fullname, ('maheshikaj97@gmail.com'), "From University Marketplace - $email", "<b>$subject</b><br>$message");
}else{


 //echo 'show error with form';
}

$_SESSION["message"] = "Thank you ".$fullname;
