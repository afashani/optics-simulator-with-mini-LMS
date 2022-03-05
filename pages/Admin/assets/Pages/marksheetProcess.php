<?php

require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();


//add product button pressed
if(isset($_POST['addMarksheet'])){

    $errors=[];

    //get images
    $fileName = $_FILES['marksheetfile']['name'];
    $fileType=$_FILES['marksheetfile']['type'];

    $fileSize=$_FILES['marksheetfile']['size'];
    $fileTPName=$_FILES['marksheetfile']['tmp_name'];



    $aFileName=$_POST['activityName'];
    $activityId=$_POST['activityId'];

    //  echo "filename".$aFileName;
    $newFileName="mc".$aFileName;
    //   echo " newFileName".$newFileName;

    //get upload directory
    $uploadDir="../../../../resources/marksheets/".$newFileName.".pdf";

    if($fileSize >= 5000000){
        //5mb
        $errors[]="File must be less than 5MB . Please try again ";

    }

    $allowed = array('pdf');
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $errors[]= "Invalid type.You must have to upload pdf file";
    }

    //create marksheet file name
    $marksheetFileName="Marksheet";
    if(isset($aFileName)){
        $twoPart=explode("-",$aFileName);
        $newData="Marksheet".$twoPart[1];
        $marksheetFileName=$newData;
    }


    //  echo "| actvityTitle |".$actvityTitle;
    $marksheetPathToDB = $newFileName;



    if(empty($errors)){

        $fileUploadStatus=move_uploaded_file($fileTPName, $uploadDir);

        echo "I am in empty errors";
        $statusActivity= addMarksheet($conn,$activityId,$marksheetPathToDB);

        sleep(3);

        header("location:Activities.php");



    }else {

//        $_SESSION['status_product-err']=$errors;
//        $_SESSION['status_product_err_code']='error';

//        unset( $_SESSION['status_product-err']);
//        unset($_SESSION['status_product_err_code']);
        //  print_r($errors);
//        $errors=null;
        print_r($errors);
        header("location:adtivityA.php");


        print_r($errors);
    }


}
