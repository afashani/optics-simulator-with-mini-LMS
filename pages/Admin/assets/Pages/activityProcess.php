<?php
require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();


$dueDate="";
$time_remaining="";
$lastMod="";
$fileName="Only pdf/ doc allowed here ";


//last activities
$lastActivities=getlastActivities($conn);

//add activity button pressed
if(isset($_POST['addActivity'])){

    $errors=[];

    //get images
    $fileName = $_FILES['activityFile']['name'];
    $fileType=$_FILES['activityFile']['type'];

    $fileSize=$_FILES['activityFile']['size'];
    $fileTPName=$_FILES['activityFile']['tmp_name'];

    // echo "    filename   ".$fileName;
    // echo "    filetype   ".$fileType;
    // echo "    filesiez   ".$fileSize;
    // echo "    filetpname   ".$fileTPName;

    $aFileName=$_POST['fileName'];

    //  echo "filename".$aFileName;
    $newFileName="ad".$aFileName;
    //   echo " newFileName".$newFileName;

    //get upload directory
    $uploadDir="../../../../resources/activities/".$newFileName.$fileType;

    echo $uploadDir;

    if(isset($uploadDir)) {
        $twoPart = explode("/", $uploadDir);
        $newData = "." . $twoPart[1];


        $uploadDir = $newData;

    }

  if($fileSize >= 5000000){
        //5mb
        $errors[]="File must be less than 5MB . Please try again ";

    }

    $allowed = array('pdf', 'doc', 'docx');
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $errors[]= "Invalid type.You must have to upload doc/pdf file";
    }

    //get last activity id

    $newActivityId=0;
    $newActivityId= (getlastActivityId($conn));
    //echo "| activity id |".$newActivityId;
    $actvityTitle=$_POST['fileName'];
    //  echo "| actvityTitle |".$actvityTitle;
    $activityPathToDB = $newFileName;
    // echo " |activityPathToDB |".$activityPathToDB;
    $deadline=$_POST['deadline'];
    //  echo "   date  ".$deadline;

    //2022-03-31T00:12
    //2022-03-23 23:54:24

    //print_r(explode("T",$deadline));

    if(isset($deadline)){
        $twoPart=explode("T",$deadline);
        $newData=$twoPart[0]." ". $twoPart[1].":00";


        $deadline=$newData;

        echo " | Deadkine |".$deadline;
    }



//check data already have or not
    $checkDataExtist=isActivityAvailbale($conn,$actvityTitle);

    echo $checkDataExtist;
    //yes alread have
    if($checkDataExtist){
        $errors[]= "Activity already have";
    }

    if(empty($errors)){


        $fileUploadStatus=move_uploaded_file($fileTPName, $uploadDir);
        echo "I am in empty errors";
        $statusActivity=addActivity($conn, $newActivityId,$actvityTitle,$activityPathToDB,$deadline);

        echo $statusActivity;
        addActivityAdminId($conn,$newActivityId);
        //a
        //update admin activity table

        sleep(3);
        //sesssion
        $_SESSION['status_activity']="Activity Added successfully'";
        $_SESSION['status_activity_code']='success';

//        unset( $_SESSION['status_product']);
//        unset($_SESSION['status_product_code']);
        header("location:Activities.php");



    }else {

        $_SESSION['status_activity_err']=$errors;
        $_SESSION['status_activity_code_err']='error';

        $_SESSION['status_product-err']=$errors;
       $_SESSION['status_product_err_code']='error';

        header("location:Activities.php");


    }


}

//update activity button pressed
if(isset($_POST['updateActivity'])){

    $errors=[];

    $activityId=$_POST['activityId'];
    //get images

    $fileName = $_FILES['updateActivityFile']['name'];
    $fileType=$_FILES['updateActivityFile']['type'];
    $fileSize=$_FILES['updateActivityFile']['size'];
    $fileTPName=$_FILES['updateActivityFile']['tmp_name'];




    //delet last file (resource file)
    deleteLastFile($conn, $activityId);

    //get file name
    $newFileName=getActivityFpath($conn,$activityId);
    $nNewFileName=explode(".",$newFileName);
    $newFileName=$nNewFileName[0];




    $allowed = array('pdf', 'doc', 'docx');
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $errors[]= "Invalid type.You must have to upload doc/pdf file";
    }

        if($fileSize >= 5000000){
        //5mb
        $errors[]="File must be less than 5MB . Please try again ";

        }



    if(empty($errors)){

        $realFileType=explode("/",$fileType);
        $fileType=$realFileType[1];
        echo $fileType;

        //get upload directory
        $uploadDir="../../../../resources/activities/".$newFileName.".".$fileType;
        $fileUploadStatus=move_uploaded_file($fileTPName, $uploadDir);
        $statusActivity=updateActivity($conn, $activityId);


        sleep(3);
        //sesssion
//        $_SESSION['status_product']="Product Added successfully'";
//        $_SESSION['status_product_code']='success';

//        unset( $_SESSION['status_product']);
//        unset($_SESSION['status_product_code']);
        header("location:Activities.php");



    }else {

//        $_SESSION['status_product-err']=$errors;
//        $_SESSION['status_product_err_code']='error';

//        unset( $_SESSION['status_product-err']);
//        unset($_SESSION['status_product_err_code']);
        //  print_r($errors);
//        $errors=null;
        print_r($errors);
       // header("location:adtivityA.php");


        print_r($errors);
    }


}

if(isset($_POST['updateDueDate'])){
    $activityId=$_POST['activityID'];
    $date=$_POST['date'];

    if(isset($date)){
        $twoPart=explode("T",$date);
        $newData=$twoPart[0]." ". $twoPart[1].":00";
        $date=$newData;

    }

    //update due date
    $updateStatus=updateDueDate($conn,$activityId,$date);

    if($updateStatus){
        header("location:Activities.php");
    }

}