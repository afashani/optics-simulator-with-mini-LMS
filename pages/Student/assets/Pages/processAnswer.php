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

    $allowed = array('pdf');
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $errors[]= "Invalid type.You must have to upload pdf file";
    }


    $activityPathToDB = $newFileName;




//check data already have or not

    if(empty($errors)){


        $fileUploadStatus=move_uploaded_file($fileTPName, $uploadDir);

        $statusActivity=addAnswerScript($conn,$newFileName);


        $_SESSION['status_answer_add']="Answer added successfully";
        $_SESSION['status_answer_add_code']='success';

        sleep(3);

        header("location:Activities.php");



    }else {

        $_SESSION['status_answer_add_err']=$errors[0];
        $_SESSION['status_answer_add_code_err']='error';

        sleep(3);

        header("location:Activities.php");


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


        $_SESSION['status_answer_update']="Answer updated successfully";
        $_SESSION['status_answer_update_code']='success';

        sleep(3);

        header("location:Activities.php");



    }else {

        $_SESSION['status_answer_update_err']=$errors[0];
        $_SESSION['status_answer_update_code_err']='error';

        sleep(3);

        header("location:Activities.php");



    }


}



