<?php

require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();

//get current user data
$adminDetais=$func ->getSAdminDetails($conn);
$adminName="Admin";
$adminEmail=$adminDetais[0];
$adminPw="************";

//change details
if(isset($_POST['accountsetting'])) {

    $errors = [];


    //check set username and password

    if (!isset($_POST['email']) & strlen(trim($_POST['email'])) < 1) {

        $errors[] = "Email is Missing /Invalid";
    }

    if (!isset($_POST['pw']) & strlen(trim($_POST['pw'])) <= 8) {

        $errors[] = "Password is Missing /Invalid (Minimum should be 8 characters)";
    }

    if (!isset($_POST['Rpw']) & strlen(trim($_POST['Rpw'])) < 1) {

        $errors[] = "Retype-Password is Missing /Invalid";
    }

    if (($_POST['pw'] != $_POST['Rpw'])) {

        $errors[] = "Password are missed match. Please check your Password ";
    }



    if (!($func->emailValidator($_POST['email']))) {

        $errors[] = "This is not valid email. Please check your email ";
    }
    if (empty($errors)) {

        //sanitize inputs

        $name = $func->inputSanitizer($_POST['name']);
        $email = $func->inputSanitizer($_POST['email']);
        $pw = $func->inputSanitizer($_POST['pw']);

        //   $hpassword = $func->encryptInput($password);
        //change email
        $isSomethingChanged=false;

        if ($adminEmail != $email) {
            if ($func->checkEmailExists($conn, $email)) {
                $_SESSION['status_acsetting_update_err']="Email exists.Please use another email address ";
                $_SESSION['status_acsetting_update_code_err']='error';
            } else {
                $emailStatus = $func->changeAdminEmail($conn, $email);
                $isSomethingChanged=true;
            }


        }
        //change pw
        else if ($adminPw != $pw) {
            if(!isset($_POST['psw']) || strlen($_POST['psw']) < 8){
                $errors[] = 'Password Must be >= 8';
            }
            elseif(!preg_match("#[0-9]+#",$_POST['psw'])) {
                $errors[] = 'Your Password Must Contain At Least 1 Number!';
            }
            elseif(!preg_match("#[A-Z]+#",$_POST['psw'])) {
                $errors[] = 'Your Password Must Contain At Least 1 Capital Letter!';
            }
            elseif(!preg_match("#[a-z]+#",$_POST['psw'])) {
                $errors[''] = 'Your Password Must Contain At Least 1 Lowercase Letter';
            }

            if(empty($errors)){
                $pwStatus = $func->changeAdminPassword($conn, $pw);
                $isSomethingChanged=true;
            }else{
                $_SESSION['status_acsetting_update_err']="Wrong password pattern";
                $_SESSION['status_acsetting_update_code_err']='error';
            }

        }

        if($isSomethingChanged){
            $_SESSION['status_acsetting_update']="Account Update Successfully";
            $_SESSION['status_acsetting_update_code']='success';

            unset($_SESSION['admin_id']);
            header("location:../../index.php");
        }else{
            header("location:AccountSetting.php");
        }

    }

    else{
        $_SESSION['status_acsetting_update_err']=$errors[0];
        $_SESSION['status_acsetting_update_code_err']='error';

        header("location:AccountSetting.php");
    }
    $_POST['name'] = '';
    $_POST['email'] = '';
    $_POST['pw'] = '';
    $_POST['Rpw'] = '';

    //  print_r( $errors);

}
