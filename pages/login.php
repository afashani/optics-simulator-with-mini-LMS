<?php

require_once 'Student/assets/Includes/ConfigDB.php';
require_once 'Student/assets/Includes/Functions.php';

session_start();
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

            $errors[] = "username or password incorrect";

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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
	    <div class="card card0 border-0">
	        <div class="row d-flex">
	            <div class="col-lg-6">
	                <div class="pb-5">
	                    <div class="row">
	                    	<!-- <img src="../assets/images/logo.png" class="logo"> -->
	                    </div>
	                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
	                    	<img src="../assets/images/background/login-background.jpg" class="image">
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-6">
	                <div class="card card1 border-0 px-4 py-5">
	                    <div class="row mb-4 px-3">
	                        <h2 class="mb-0 mr-4 mt-2">Sign In to Your Account</h2>
	                    </div>
						<div class="row mb-4 px-3">
	                    	<small class="font-weight-bold">Don't have an account ?
	                    		<a href="register.php" style="color: green;">Create one here</a>
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
	                            <h6 class="mb-0 text-sm">Email Address</h6>
	                        </label>
	                        <input class="mb-4" type="text" name="email" placeholder="Enter Your Email Address" required>
	                    </div>
	                    <div class="row px-3">
	                    	<label class="mb-1">
	                            <h6 class="mb-0 text-sm">Password</h6> 
	                        </label>
	                        <input type="password" name="password" placeholder="Enter Your password" required>
	                    </div>
	                    <!-- <div class="row px-3 mb-4">
	                        <div class="custom-control custom-checkbox custom-control-inline">
	                        	<input type="checkbox" name="remember_me_checkbox" class="custom-control-input">
	                        	<label for="remember_me_checkbox" class="custom-control-label text-sm">Remember me</label>
	                        </div>
	                        <a href="#" class="ml-auto mb-0 text-sm" style="color: #333;">Forgot Password?</a>
	                    </div> -->
	                    <div class="row mb-3 px-3" style="margin-top: 20px;">
	                    	<button type="submit" name="studentlogin" class="btn btn-blue text-center">Login</button>
	                    </div>
	                </form>    
	                    
	                </div>
	            </div>
	        </div>
	        <div class="bg-blue py-4">
	            <div class="row px-3" >
	            	<small class="ml-4 ml-sm-5 mb-2" style="text-align: center;">Copyright &copy; 2021. All rights reserved.</small>
	        	</div>
	    	</div>
	    </div>
	</div>
</body>
</html>
