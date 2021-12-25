<?php

require_once 'assets/Includes/Functions.php';

//create function object

$func1=new Functions();

if(isset($_POST['submit'])) {

    $errors=[];

    //check set username and password
    if((!isset($_POST['username'])) || strlen(trim($_POST['username'])) <1  ) {

        $errors[] = "Username is Missing /Invalid";
    }

    if((!isset($_POST['password'])) || strlen(trim($_POST['password'])) <1 ){

        $errors[] = "Password is Missing /Invalid";
    }

 //   print_r($errors);

    if(empty($errors)){

        //sanitize inputs

        $username=$func1-> inputSanitizer($_POST['username']);
        $password=$func1 ->inputSanitizer($_POST['password']);

        //create object from Adminintarator class
//        $Admin= new Administrator();
//        $user=new User();

     //   $hpassword= $func1 -> encryptInput($password);

//        $adminId=$Admin-> vertifyLogin($username, $hpassword,$conn);

//        if($adminId ==0 ){
//
//            $errors[] ="username or password incorrect";
//
//        }else{
//
//            $message= "details are correct";
//
//            $setLastActiveStaus=$user ->setLastActive($conn,$adminId);
//
//            //redirect
//            sleep(3);
//            header('location:assets/Pages/admin-dashboard.php');
//            exit();
//        }

        if($username=="admin" & $password=="pw"){

                header('location:assets/Pages/admin-dashboard.php');

        }else{
            $errors[] ="username or password incorrect";
        }

    //    print_r($_POST);

        $_POST['username']='';
        $_POST['password']='';
    }
  //  print_r($errors);

}


?>


<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Login | Admin </title>

    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Inc/css/login.css" type="text/css">
    <style>
        html,body{
            height: 100%;
        }
    </style>

</head>

<body >

    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center"  >

            <div class="col-lg-5">
                    <div class="card border-primary shadow-lg ">
                        <div class="card-header text-center" id="loginHeader">

                            <h3 class="m-0 text-light">
                                <i class="fas fa-user-cog"></i>
                                &nbsp; Admin Panel Login
                            </h3>

                        </div>

                        <div class="card-body" id="loginBody">

                            <div id='adminLoginAlert'>

                                <?php
                                if (isset($errors) && !empty($errors)) {
                                    foreach ($errors as $error){
                                        echo "<pre class='text-capitalize'>".$error."</pre>";
                                    }
                                    $error=[];
                                }


                                ?>

                            </div>
                            <form action='index.php' method='post' class='px-3' id='admin-login-form' >
                                
                                <div class='form-group loginInputs'>

                                    <input type='text' name='username' class='form-control form-control-lg rounded-0' id='username' placeholder='Username' required autofocus value=''>

                                </div>

                                <div class='form-group loginInputs'>

                                    <input type='password' name='password' class='form-control form-control-lg rounded-0' id='password' placeholder='Password' required value=''>

                                </div>

                                <div class='form-group text-dark' id='loginButton'>


                                    <input type='submit' name='submit' class='btn btn-block btn-lg rounded-0 text-light'  value='Login' id='adminLoginBtn'  >

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
        </div>

</body>
</html>

<!--  Sweet alert js library cdn -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
    //message for log in after data changes
if(isset($_SESSION['status_account_data']) &&  $_SESSION['status_account_data']="Your Account Updated successfully.Please log in.."){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo  $_SESSION['status_account_data_code']?>",
            text: "<?php echo $_SESSION['status_account_data']?>",
            icon: "warning",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_account_data_code']);
unset($_SESSION['status_account_data']);
?>