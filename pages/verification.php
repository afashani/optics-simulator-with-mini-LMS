<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


$mail = new PHPMailer(true);

$OTP = rand(100000,999999);

// echo$OTP;

try {
	$mail->SMTPDebug = 0;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'mailwisdominstitution@gmail.com';				
	$mail->Password = 'Wisdom1234';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('mailwisdominstitution@gmail.com', 'Wisdom Institution');		
	$mail->addAddress($_GET['email'], "verification");
	
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


<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>OTP Verification</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <script type='text/javascript' src=''></script>
<style>body {
    background-color: white
}

.height-100 {
    height: 100vh
}

.card {
    width: 400px;
    border: none;
    height: 300px;
    box-shadow: 0px 5px 20px 0px #d2dae3;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center
}

.card h6 {
    color: rgb(15, 14, 14);
    font-size: 20px
}

.inputs input {
    width: 40px;
    height: 40px
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}

.card-2 {
    background-color: rgb(96, 252, 130);
    padding: 10px;
    width: 350px;
    height: 100px;
    bottom: -50px;
    left: 20px;
    position: absolute;
    border-radius: 5px
}

.card-2 .content {
    margin-top: 50px
}

.card-2 .content a {
    color: rgb(22, 20, 20)
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid rgb(19, 18, 18)
}

.validate {
    border-radius: 20px;
    height: 40px;
    background-color: rgb(34, 27, 27);
    border: 1px solid rgb(12, 11, 11);
    width: 140px
}</style>


</head>
                                <body oncontextmenu='return false' class='snippet-body'>
                                <div class="container height-100 d-flex justify-content-center align-items-center">
    <div class="position-relative">
        <div class="card p-2 text-center">
            <h6>Please enter the one time password <br> to verify your account</h6>
            <div> <span>A code has been sent to</span> <small><?php echo $_GET['email']; ?></small> </div>
    
            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" /> 
            </div>
            <div class="mt-4"> <button class="btn btn-danger px-4 validate" onclick="myFunction()" >Validate</button> </div>

        </div>
        
    </div>
</div>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>


<script type='text/Javascript'>


document.addEventListener("DOMContentLoaded", function(event) {

function OTPInput() {
const inputs = document.querySelectorAll('#otp > *[id]');
for (let i = 0; i < inputs.length; i++) 
    { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput(); });



    function myFunction() {
        var n1 = document.getElementById("first").value.toString() ;
        var n2 = document.getElementById("second").value.toString();
        var n3 = document.getElementById("third").value.toString();
        var n4 = document.getElementById("fourth").value.toString();
        var n5 = document.getElementById("fifth").value.toString();
        var n6 = document.getElementById("sixth").value.toString();

        var num = n1+n2+n3+n4+n5+n6;

        num = parseInt(num);


        if(num == <?php echo$OTP;?>){

            window.location.replace("ok.php?email=<?php echo $_GET['email']; ?>");

        }else{
            alert("Worng Code!");
        }
    }



</script>
                                </body>
                            </html>