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
        deleteRes($conn, "AC", $activitdId);
        header("location:Activities.php");
    }elseif ($_GET['res_type']=="tutedelete"){
        $tuteId=$_GET['res_id'];
        deleteRes($conn, "TUTE", $tuteId);
        header("location:Tutorial.php");
    }


}

