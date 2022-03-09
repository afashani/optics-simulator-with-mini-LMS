<?php

require_once 'Student/assets/Includes/ConfigDB.php';
require_once 'Student/assets/Includes/Functions.php';

//print_r($_SESSION);
if(!isset($_SESSION))
{
    session_start();
}
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();

////check whether user log in or not
//if(isset($_SESSION['stdId'])) {
//    header('location:assets/Pages/dashboard.php');
//    exit();
//}

//$_SESSION['from_simulator']
//have to set alert

//form sumbsiion login
if(isset($_POST['studentlogin'])) {

    $errors = [];



    //check set username and password
    if (!isset($_POST['email']) & strlen(trim($_POST['email'])) < 1) {

        $errors[] = "Email is Missing /Invalid";
    }

    if (!isset($_POST['password']) & strlen(trim($_POST['password']))) {

        $errors[] = "Password is Missing /Invalid";
    }

    if (empty($errors)) {

        //sanitize inputs

        $email = $func->inputSanitizer($_POST['email']);
        $password = $func->inputSanitizer($_POST['password']);


     //   $hpassword = $func->encryptInput($password);

        $std = $func->vertifyStudent($conn, $email, $password);
        echo $std;

        if (!$std) {

            $errors[] = "Email or Password is incorrect";

        } else {

            $message = "details are correct";


            //redirect
            sleep(1);
            header('location:Student/assets/Pages/dashboard.php');
            exit();
        }

    // print_r($_POST);

        $_POST['email'] = '';
        $_POST['password'] = '';
    }
  //  print_r( $errors);

}


//print_r( $_SESSION);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/main.css">

    <!--   alert js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!--  Sweet alert js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
	    <div class="card card0 border-0">
	        <div >
	            <div class="col-lg-6">
	                <div >
	                    
	                    <div class="row border-line">
	                    	<img src="../assets/images/students.jpg" class="image">
	                    </div>
	                </div>
	            </div>
				<br><br><br><br><br>
	            <div class="col-lg-6">
                        <div class="container">
                                <div class="col-md-12">
                                    <button class=" btn btn-primary home-btn"><i class="fa fa-home"></i> Home</button>
                                </div>
                        </div>
                        <br> 
	                <div class="card card1 border-0 px-4 py-5 form-box">
                     
                   
	                    <div class="row mb-4 px-3">
	                        <h1 >Sign In to Your Account</h1>
	                    </div>
						<div class="row mb-4 px-3">
	                    	<small class="font-weight-bold">Don't have an account ?
	                    		<a href="register.php" style="color: #243D76;">Create one here</a>
	                    	</small>
	                    </div>
	                <form action="login.php" method="post" class="was-validated">
                    
                        <div >

                            <?php
                            if (isset($errors) && !empty($errors)) {
                                foreach ($errors as $error){
                                    echo "<pre class='text-capitalize bg-danger text-light'>".$error."</pre>";
                                }
                                $errors=[];
                            }
                            ?>

                        </div>
	                    <div class="row px-3">
	                    	<label class="mb-1">
	                            <h3 class="mb-0 text-sm"><b>Email Address</b></h3>
	                        </label>
	                        <input class="mb-4" type="text" name="email" placeholder="Enter Your Email Address" required>
	                    </div>
	                    <div class="row px-3">
	                    	<label class="mb-1">
	                            <h3 class="mb-0 text-sm"><b>Password</b></h3> 
	                        </label>
	                        <input type="password" name="password" placeholder="Enter Your password" required>
	                    </div>
	                   
	                    <div class="row mb-3 px-3" style="margin-top: 20px;">
	                    	<button type="submit" name="studentlogin" class="btn btn-blue"><b>Login</b></button>
	                    </div> <br>
	                </form>    
	                    
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</div>
</body>
</html>

<?php

//account update success Message
if(isset($_SESSION['status_acsetting_update'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_acsetting_update_code']?>",
            text: "<?php echo $_SESSION['status_acsetting_update']?>",
            icon: "<?php echo $_SESSION['status_acsetting_update_code']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_acsetting_update_code']);
unset($_SESSION['status_acsetting_update']);
?>
