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

if(isset($_GET['std_id'])){
    $std_id=$_GET['std_id'];
    $studentDetails= getSingleStudentDetail($conn,$std_id);


    $name=$studentDetails[0];
    $address=$studentDetails[1];
    $tele=$studentDetails[2];
    $class=$studentDetails[3];
    $email=$studentDetails[4];
}

//last activities
$lastActivities=getlastActivities($conn);

//add product button pressed
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
    $uploadDir="../../../../resources/activities/".$newFileName.".pdf";


    $fileUploadStatus=move_uploaded_file($fileTPName, $uploadDir);


    if(!$fileUploadStatus){
        $errors[]="ActivityNot Upload.. Please try again later";


    }elseif($fileSize >= 5000000){
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


    //insert data to admin table

//    //check length and data type
//    if($func -> inputLengthChecker(3,75,$productName)){
//        $errors[]= "Product Length invalid";
//    }
//    if($func -> inputLengthChecker(3,1500,$productDes)){
//        $errors[]= "Product Description Length invalid";
//    }
//    if($func -> inputLengthChecker(1,11,$productQty)){
//        $errors[]= "Product QTYLength invalid";
//    }
//
//
//    //check data type  (if can true)
//    if(!($func -> numberChecker($productQty))){
//        $errors[]= "Product QTY Must be a number";
//    }
//    if(!($func -> numberChecker($productPrice))){
//        $errors[]= "Product Price Must be a number";
//    }
//    if(($func -> numberChecker($productName))){
//        $errors[]= "Product Name must be a Word";
//    }
//    if(($func -> numberChecker($productDes))){
//        $errors[]= "Product Description must be the Words";
//    }


//check data already have or not
    $checkDataExtist=isActivityAvailbale($conn,$actvityTitle);

    echo $checkDataExtist;
    //yes alread have
    if($checkDataExtist){
        $errors[]= "Activity already have";
    }

    if(empty($errors)){



        echo "I am in empty errors";
        $statusActivity=addActivity($conn, $newActivityId,$actvityTitle,$activityPathToDB,$deadline);

        echo $statusActivity;
        addActivityAdminId($conn,$newActivityId);
        //a
        //update admin activity table

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
        header("location:adtivityA.php");


        print_r($errors);
    }


}
