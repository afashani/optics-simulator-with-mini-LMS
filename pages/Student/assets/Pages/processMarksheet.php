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
if(isset($_GET['marksheet_id'])){

    $marksheetId=$_GET['marksheet_id'];
    $marksheetPath=getMarksheetFilePath($conn, $marksheetId);
    header("location:{$marksheetPath}");
}