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
$activity_id=0;
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
        $submissonStatus= "Submmited fot Grading";
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

            <div class="card my-2 border-success bg-light d-flex justify-content-center">

                <div class="card-header bg-success text-light">

                    <h3 class="text-light">Submission Status</h3>

                </div>


                <div class="card-body border border-success border-2">


                    <table class="table  text-capitalize ">
                        <tbody>
                            <tr class="border border-0 border-5">
                                <td class="bg-success text-light ">Submission Status</td>
                                <td class="bg-light text-dark"><?php  if($activityFilePath) {echo $submissonStatus ;} ?> </td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">Due date</td>
                                <td class="bg-light text-dark"> <?php  echo $deadline?> </td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">Time Remaning</td>
                                <td class="bg-light text-dark <?php echo  $isOverDueStaus; ?> "><?php  echo $timeRemaining?></td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">last Modified</td>
                                <td class="bg-light text-dark"><?php  if(!$activitySubmitStatus) {echo $Activityadded_time ; } else {echo $answerSubmmionTime ;}?></td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">File Name</td>
                                <td class="bg-light text-dark"> <a href="<?php  echo $activityFilePath?>" target="_blank"> <?php echo $activityName; ?></td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">Upload</td>
                                <td class="bg-light text-dark">
                                    <form action="processAnswer.php" enctype="multipart/form-data" method="post"  class="was-validated">
                                        <span class="m-2 text-danger">You must have to upload doc/pdf file</span>
                                        <div class="frame">
                                            <div class="center">



                                                <div class=" border border-success border-2">

                                                    <span>
                                                        <input type="file" class="upload-input" name="answerfile">
                                                    <i class="fas fa-solid fa-upload"></i>
                                                    </span>
                                                        <input type="hidden" name="activityName" value="<?php echo $activityName; ?>">
                                                        <input type="hidden" name="activityID" value="<?php echo $activity_id; ?>">

                                                </div>

                                                <button  class="btn btn-success  rounded-pill mt-2" name="<?php if($activitySubmitStatus){echo "updateAnswer";}else{echo "addAnswer";} ?>"> <?php echo $uploadButtonName; ?></button>

                                            </div>
                                        </div>
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


