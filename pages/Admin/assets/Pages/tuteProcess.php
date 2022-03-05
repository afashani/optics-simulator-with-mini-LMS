<?php

require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();

//print_r($_POST);

if(isset($_POST['addTute'])){

    $name=$_POST['name'];
    $link=$_POST['link'];

    //get latedt id and assign new id
    $newTuteId=getlastTuteId($conn);
    $status=addTute($conn,$newTuteId,$name,$link);

    header("location:Tutorial.php");

}