<?php



require_once 'assets/Includes/ConfigDB.php';
require_once 'assets/Includes/Functions.php';
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

//print_r($_SESSION);
//form sumbsiion login
if(isset($_POST['adminLogin'])) {

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

        $adminStd = $func->vertifyAdmin($conn, $email, $password);
        echo $adminStd;

        if (!$adminStd) {

            $errors[] = "username or password incorrect";

        } else {

            $message = "details are correct";


            //redirect
            sleep(3);
            header('location:assets/Pages/admin-dashboard.php');
            exit();
        }

       //  print_r($_POST);

        $_POST['email'] = '';
        $_POST['password'] = '';
    }
    //  print_r( $errors);

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

    <div class="container h-100 border border-dark border-2" style="opacity: 0.8">
        <div class="row h-100 align-items-center justify-content-center border border-dark border-2"  >

            <div class="col-lg-5 mt-2">
                    <div class="card border-primary shadow-lg ">
                        <div class="card-header bg-dark text-center" id="loginHeader">

                            <h3 class="m-0 text-light ">
                                <i class="fas fa-user-cog"></i>
                                &nbsp; Admin Panel Login
                            </h3>

                        </div>

                        <div class="card-body" id="loginBody">

                            <div id='adminLoginAlert'>

                                <?php
                                if (isset($errors) && !empty($errors)) {
                                    foreach ($errors as $error){
                                        echo "<pre class='text-capitalize bg-danger text-light'>".$error."</pre>";
                                    }
                                    $errors=[];
                                }
                                $errors=[];
                                ?>
                            </div>
                            <form action='index.php' method='post' class='px-3' id='admin-login-form' >
                                
                                <div class='form-group loginInputs'>

                                    <input type='text' name='email' class='form-control form-control-lg rounded-0' id='email' placeholder='Email' required autofocus value=''>

                                </div>

                                <div class='form-group loginInputs'>

                                    <input type='password' name='password' class='form-control form-control-lg rounded-0' id='password' placeholder='Password' required value=''>

                                </div>

                                <div class='form-group text-dark' id='loginButton'>


                                    <input type='submit' name='adminLogin' class='btn btn-block btn-lg rounded-0 text-light btn-dark'  value='Admin Login' id='adminLoginBtn'  >

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
if(isset($_SESSION['status_acsetting_update'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo  $_SESSION['status_acsetting_update_code']?>",
            text: "<?php echo $_SESSION['status_acsetting_update']?>",
            icon: "warning",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_acsetting_update']);
unset($_SESSION['status_acsetting_update_code']);
?>



