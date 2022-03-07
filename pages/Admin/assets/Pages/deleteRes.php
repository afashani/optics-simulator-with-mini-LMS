<?php
require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();


if(isset($_GET['res_type']) & isset($_GET['res_id']) ){

    if($_GET['res_type']=="acdelete"){
        $activitdId=$_GET['res_id'];
        $stutsDeleteAC=deleteRes($conn, "AC", $activitdId);

        if($stutsDeleteAC){
            $_SESSION['status_ac_delete']="Activity Deleted successfully";
            $_SESSION['status_ac_delete_code']='success';
        }else{
            $_SESSION['status_ac_delete_err']="Activity Deleted Failed";
            $_SESSION['status_ac_delete_code_err']='error';
        }

        header("location:Activities.php");

    }elseif ($_GET['res_type']=="tutedelete"){
        $tuteId=$_GET['res_id'];
        $stutsDeleteTute=deleteRes($conn, "TUTE", $tuteId);

        if($stutsDeleteTute){
            $_SESSION['status_tute_delete']="Tutorial Deleted successfully";
            $_SESSION['status_tute_delete_code']='success';
        }else{
            $_SESSION['status_tute_delete_err']="Tutorial Deleted Failed";
            $_SESSION['status_tute_delete_code_err']='error';
        }


        header("location:Tutorial.php");
    }


}

