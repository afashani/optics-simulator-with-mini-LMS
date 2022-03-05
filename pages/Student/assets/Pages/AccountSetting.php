<?php

////add header
require_once '../Includes/header.php';
require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$function= new Functions();

//get current user data
$studentDetais=$function ->getStudentDetails($conn);
$studentName=$studentDetais[0];
$studentEmail=$studentDetais[1];
$studentPw="************";

//change details
if(isset($_POST['accountsetting'])) {

    $errors = [];



    //check set username and password
    if (!isset($_POST['name']) & strlen(trim($_POST['email'])) < 1) {

        $errors[] = "Email is Missing /Invalid";
    }
    if (!isset($_POST['email']) & strlen(trim($_POST['email'])) < 1) {

        $errors[] = "Email is Missing /Invalid";
    }

    if (!isset($_POST['pw']) & strlen(trim($_POST['pw'])) <1) {

        $errors[] = "Password is Missing /Invalid";
    }

    if (!isset($_POST['Rpw']) & strlen(trim($_POST['Rpw'])) <=8 ) {

        $errors[] = "Retype-Password is Missing /Invalid (Minimum should be 8 characters)";
    }

    if ( ($_POST['pw'] != $_POST['Rpw'])) {

        $errors[] = "Password are missed match. Please check your Password ";
    }
    if (!($function -> emailValidator($_POST['email']))) {

        $errors[] = "This is not valid email. Please check your email ";
    }
    if (empty($errors)) {

        //sanitize inputs

        $name = $function->inputSanitizer($_POST['name']);
        $email = $function->inputSanitizer($_POST['email']);
        $pw = $function->inputSanitizer($_POST['pw']);

    //    print_r($_POST);

        //   $hpassword = $func->encryptInput($password);

        //change name
        if($studentName != $name) {
            $nameStatus = $function->changeStudentName($conn, $name);
        }
        //change email
        if($studentEmail != $email) {
            if($function -> checkEmailExists($conn,$email)){
                $errors[] = "Email exists.Please use another email address ";
            }else{
                $emailStatus = $function->changeStudentEmail($conn, $email);
            }

        }
        //change pw
        if($studentPw != $pw){
            $pwStatus = $function->changeStudentPassword($conn, $pw);
        }


    }
    $_POST['name'] = '';
    $_POST['email'] = '';
    $_POST['pw'] = '';
    $_POST['Rpw'] = '';

   //  print_r( $errors);

}

?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> My Account | Admin </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">

    <script src="../../Inc/JS/search.js" type="application/javascript"></script>

</head>
<body>
<!-- Order body-->
<div class="row mt-2">
    <div class="col-lg-12">

        <div class="card my-2 mt-2  border-info bg-light">

            <div class="card-header  text-dark">


                <div class="col-lg-12">
                    <h4>My Account

                    </h4>
                </div>
            </div>


            <div class="card-body bg-light">
                <div class="text-center">

                    <?php
                    if (isset($errors) && !empty($errors)) {
                        foreach ($errors as $error){
                            echo "<pre class='text-capitalize bg-danger text-light'>".$error."</pre>";
                        }
                        $errors=[];
                    }
                    ?>

                </div>

                <div class="table-responsive" id="showAllUsers">
                    <form action="AccountSetting.php" method="post" class="was-validated">
                    <table class="table table-striped bg-light text-dark text-center" id="">
                    <tr>


                                <td class="col-5">First Name</td>
                                <td class="col-5">
                                    <label>
                                        <input type="text" name="name" value=" <?php if(isset($studentName)){echo $studentName;} ?>">
                                    </label>

                                </td>


                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><label>
                                        <input type="email" name="email" value=" <?php if(isset($studentEmail)){echo $studentEmail;} ?>">
                                    </label></td>

                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <label>
                                        <input type="password" name="pw" value=" <?php if(isset($studentPw)){echo $studentPw;} ?>">
                                    </label></td>

                            </tr>

                            <tr>
                                <td>Retype-Password</td>
                                <td>
                                    <label>
                                        <input type="password" name="Rpw" value=" <?php if(isset($studentPw)){echo $studentPw;} ?>">
                                    </label></td>

                            </tr>




                    </thead>
                    <tbody>

                    </tbody>
                    </table>
                    <div class=" d-flex justify-content-center" >

                        <button
                                class='btn btn-danger mb-2 text-light'
                                type='submit'
                                name="accountsetting"
                        >
                            Change
                        </button>
                        <button class="btn bg-info text-light mb-2 ml-2" type="reset" id="resetUserName" name="resetUserName">Reset</button>
                    </div>

                    </form>

                </div>
            </div>

            <div class="card-footer">
                <!-- Center-aligned -->
                <ul class="pagination justify-content-center">
                    <li class="page-item"  >
                        <a class="page-link" href="dashboard.php">
                            Back
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</div>


</body>
</html>

<!---->
