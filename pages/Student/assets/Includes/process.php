<?php
require_once '../Includes/ConfigDB.php';
require_once '../Includes/activityfunc.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();


if(isset($_GET['activityId'])){
    $file= viewSingleActivity($conn, $_GET['activityId']);
    header("Content-Disposition: attachment; filename=$file");
    ob_clean();
    flush();

}
if(isset($_GET['tutorialId'])){
    $file= viewSingleActivity($conn, $_GET['tutorialId']);
    header("Content-Disposition: attachment; filename=$file");
    ob_clean();
    flush();

}

