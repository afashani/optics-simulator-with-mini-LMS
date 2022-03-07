<?php
/// href='viewAnswer.php?res_type=ans&res_id={$id}'

require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection = new ConfigDB();
//create connection
$conn = $newConnection->createConnection();

$func = new Functions();



if (isset($_GET['res_type']) & isset($_GET['res_id'])) {

    //view marksheets
    if ($_GET['res_type'] == "ans") {


        //check marksheet file availbale
        $activityId=empty($_GET['res_id']) ? 1 :$_GET['res_id'];
        //

       //get marksheet path
        $fpath=getanswerPath($conn, $activityId);

        sleep(2);
        header("location:$fpath");
    }

}

?>
