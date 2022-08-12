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



if (isset($_GET['res_type']) & isset($_GET['ac_id'])) {

    //view marksheets
    if ($_GET['res_type'] == "ans") {

        $std_name=$_GET['std_name'];


        //check marksheet file availbale
        $ansId=empty($_GET['ac_id']) ? 1 :$_GET['ac_id'];
        //

       //get marksheet path
        $fpath=getanswerPath($conn, $ansId,$std_name);

        sleep(2);
        header("location:$fpath");
    }

}

?>
