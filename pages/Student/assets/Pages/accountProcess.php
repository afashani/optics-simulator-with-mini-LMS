<?php

if(!isset($_SESSION)){
    session_start();
}
//add header
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
                $_SESSION['status_acsetting_update_err']="Email exists.Please use another email address ";
                $_SESSION['status_acsetting_update_code_err']='error';
            }else{
                $emailStatus = $function->changeStudentEmail($conn, $email);
            }

        }
        //change pw
        if($studentPw != $pw){
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
                $pwStatus = $function->changeStudentPassword($conn, $pw);
            }

        }

        $_SESSION['status_acsetting_update']="Account Update Successfully";
        $_SESSION['status_acsetting_update_code']='success';

        unset($_SESSION['stdId']);
        unset($_SESSION['stdname']);

        header("location:../../../login.php");

    }else{
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
