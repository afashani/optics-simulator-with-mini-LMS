<?php

////add header
require_once '../Includes/header.php';
require_once '../Includes/ConfigDB.php';
require_once '../Includes/activityfunc.php';
require_once '../Includes/Functions.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$activityFilePath="";
$deadline="";
$added_time="";
$activityName="";
$activitySubmitStatus=false;
$activity_id=1;
$submissonStatus="No Submission Found.";
$currentDate=date_create();
$current= date_format($currentDate,"Y-m-d H:i:s");
$isOverDueStaus="font-weight-bold";
$uploadButtonName="Upload File";

if(isset($_GET['activityId'])){
    $activity_id=$_GET['activityId'];
    $tableData=viewSingleActivity($conn,$activity_id);

    $activityFilePath=$tableData[0];
    $deadline=$tableData[1];
    $Activityadded_time=$tableData[2];
    $activityName=$tableData[3];

    $timeRemain=differnceOfDays($current, $deadline);

    //check if answer already added
    $activitySubmitStatus=checkAnswerAvaliblabe($conn);

    if($activitySubmitStatus){
        $submissonStatus= "Submmited for Grading";
        $uploadButtonName="Update File";
        //over due or not
        $isOverDue=isOverDue($conn,$activity_id);

        if($isOverDue){
            $timeRemaining="Answer was submitted ".$timeRemain." late";
        }else{
            $timeRemaining="Answer was submitted ".$timeRemain." early";
            $isOverDueStaus="";
        }

        //get marksheet sumbit time
        $answerSubmmionTime= getAnswerAddedTIme($conn,$activity_id );
//        $answerSubmmionTime=empty($answerSubmmionTime) ? "Now":'';


    }else{
        $timeRemaining=$timeRemain;
    }



}





?>

<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Activity Submission | Student </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">

    <script src="../../Inc/JS/search.js" type="application/javascript"></script>

</head>
<body>
<!-- Order body-->



<div class="row  ">
    <div class="col-12 ">

            <div class="card my-2 border-info bg-light d-flex justify-content-center">

                <div class="card-header bg-info text-light">

                    <h3 class="text-light">Submission Status</h3>

                </div>


                <div class="card-body border border-info border-2">


                    <table class="table  text-capitalize ">
                        <tbody>
                            <tr class="border border-0 border-5">
                                <td class="bg-info text-light ">Submission Status</td>
                                <td class="bg-light text-dark"><?php  if($activityFilePath) {echo $submissonStatus ;} ?> </td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-info text-light">Due date</td>
                                <td class="bg-light text-dark"> <?php  echo $deadline?> </td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-info text-light">Time Remaning</td>
                                <td class="bg-light text-dark <?php echo  $isOverDueStaus; ?> "><?php  echo $timeRemaining?></td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-info text-light">last Modified</td>
                                <td class="bg-light text-dark"><?php  if(!$activitySubmitStatus) {echo "Activity added by ".$Activityadded_time ; } else {echo $answerSubmmionTime ;}?></td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-info text-light">File Name</td>
                                <td class="bg-light text-dark"> <a href="<?php  echo $activityFilePath?>" target="_blank"> <?php echo $activityName; ?></td>
                            </tr>

                            <tr class="border border-info border-5">
                                <td class="bg-info text-light col-4 col-md-4  col-sm-4 col-xs-3">Upload</td>
                                <td class="bg-light text-dark col-8 col-md-8  col-sm-8 col-xs-8">
                                    <form action="processAnswer.php" enctype="multipart/form-data" method="post"  class="was-validated">



                                        <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="You must have to upload pdf file">
                                            <i class="fas fa-solid fa-upload"><input type="file" class="upload-input w-75 p-2" name="answerfile" /></i>
                                        </button>



                                                            <input class="w-75" type="hidden" name="activityName" value="<?php echo $activityName; ?>">
                                                            <input class="w-75" type="hidden" name="activityID" value="<?php echo $activity_id; ?>">
                                                            <button  class="btn btn-info justify-content-end rounded-pill mt-2"  name="<?php if($activitySubmitStatus){echo "updateAnswer";}else{echo "addAnswer";} ?>"> <?php echo $uploadButtonName; ?></button>








                                    </form>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>




        </div>
    </div>




</body>
</html>


