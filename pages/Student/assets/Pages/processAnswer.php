<?php

require_once '../Includes/ConfigDB.php';
require_once '../Includes/activityfunc.php';
require_once '../Includes/Functions.php';

if(isset($_SESSION)){
    session_start();
}

//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();


$dueDate="";
$time_remaining="";
$lastMod="";




//add activity button pressed
if(isset($_POST['addAnswer'])){

    $errors=[];

    //get images
    $fileName = $_FILES['answerfile']['name'];
    $fileType=$_FILES['answerfile']['type'];

    $fileSize=$_FILES['answerfile']['size'];
    $fileTPName=$_FILES['answerfile']['tmp_name'];




    $aFileName=$_POST['activityName'];
    $activityId=$_POST['activityID'];

    //getStudentId
    $std_id= isset($_SESSION['stdId']) ? $_SESSION['stdId'] :'G120001';
    //  echo "filename".$aFileName;
    $newFileName=$std_id."ans".$aFileName;
    //   echo " newFileName".$newFileName;

    //get upload path
    $uploadDir=getAnswerUploadPath($conn,$activityId);
    $uploadDir.= $aFileName;

    //create directory if not extist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadDir.= "/".$newFileName.".pdf";

    if($fileSize >= 5000000){
        //5mb
        $errors[]="File must be less than 5MB . Please try again ";

    }

    $allowed = array('pdf', 'doc', 'docx');
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $errors[]= "Invalid type.You must have to upload doc/pdf file";
    }


    $activityPathToDB = $newFileName;




//check data already have or not

    if(empty($errors)){


        $fileUploadStatus=move_uploaded_file($fileTPName, $uploadDir);

        $statusActivity=addAnswerScript($conn,$newFileName);



        sleep(3);

//        $_SESSION['status_product']="Product Added successfully'";
//        $_SESSION['status_product_code']='success';

//        unset( $_SESSION['status_product']);
//        unset($_SESSION['status_product_code']);
        header("location:activitySubmission.php?activityId=$activityId");



    }else {

//        $_SESSION['status_product-err']=$errors;
//        $_SESSION['status_product_err_code']='error';

//        unset( $_SESSION['status_product-err']);
//        unset($_SESSION['status_product_err_code']);
        //  print_r($errors);
//        $errors=null;

        header("location:Activity.php");


    }


}

//add activity button pressed
if(isset($_POST['updateAnswer'])){

    $errors=[];

    //get images
    $fileName = $_FILES['answerfile']['name'];
    $fileType=$_FILES['answerfile']['type'];

    $fileSize=$_FILES['answerfile']['size'];
    $fileTPName=$_FILES['answerfile']['tmp_name'];

    $activityId=$_POST['activityID'];
    $aFileName=$_POST['activityName'];
    //remove last file

    //update sub,isson time

//getStudentId
    $std_id= isset($_SESSION['stdId']) ? $_SESSION['stdId'] :'G120001';
    //  echo "filename".$aFileName;
    $newFileName=$std_id."ans".$aFileName;


    $uploadDir=getAnswerUploadPath($conn,$activityId);
    $uploadDir.=$newFileName;
    $uploadDir.=".pdf";



    if($fileSize >= 5000000){
        //5mb
        $errors[]="File must be less than 5MB . Please try again ";

    }

    $allowed = array('pdf', 'doc', 'docx');
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $errors[]= "Invalid type.You must have to upload doc/pdf file";
    }






//check data already have or not

    if(empty($errors)){

        $statusLastFileDelete=deleteLastFile($conn, $activityId);


        if($statusLastFileDelete){
            $fileUploadStatus=move_uploaded_file($fileTPName, $uploadDir);
        }
        //else error

        //change submiison time
        updateActivity($conn);


        sleep(3);

//        $_SESSION['status_product']="Product Added successfully'";
//        $_SESSION['status_product_code']='success';

//        unset( $_SESSION['status_product']);
//        unset($_SESSION['status_product_code']);
//        header("location:activitySubmission.php?activityId=$activityId");



    }else {

//        $_SESSION['status_product-err']=$errors;
//        $_SESSION['status_product_err_code']='error';

//        unset( $_SESSION['status_product-err']);
//        unset($_SESSION['status_product_err_code']);
        //  print_r($errors);
//        $errors=null;

        header("location:Activity.php");


    }


}

