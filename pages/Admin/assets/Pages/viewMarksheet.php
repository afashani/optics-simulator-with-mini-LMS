<?php


//add header
require_once '../Includes/Admin-header.php';
require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection = new ConfigDB();
//create connection
$conn = $newConnection->createConnection();

$func = new Functions();
$dueDate = "";
$time_remaining = "";
$lastMod = "";
$fileName = "";
$lastActivityName = "";
$submissionStatus="Mark sheet Added";
$tableData = viewAnswerScripts($conn, 0);
$activity_id=0;


if (isset($_GET['res_type']) & isset($_GET['res_id'])) {

    //view marksheets
    if ($_GET['res_type'] == "ms") {

        $activity_id=$_GET['res_id'];
        $marksheet_id_id=empty($_GET['mid']) ? 0 :$_GET['mid'];
        //
        if (empty($_GET['mid'])) {
            $markSstatus = false;
            $prevActivities = '';
            $submissionStatus="Please add marksheet";

        } else {
            $markSstatus = true;
            $pathMarksheet = viewMarksheet($conn, $marksheet_id_id);
            //view marksheet
            //last activities



        }
        $lastActivityName = getSingleActivityName($conn,$activity_id);
    }

}

?>



<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Activities | Admin </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">

    <script src="../../Inc/JS/search.js" type="application/javascript"></script>

</head>
<body>
<!-- Order body-->


<div class="row">
    <div class="col-lg-12">

        <div class="card-deck">
            <div class="card my-2 border-primary bg-light d-flex justify-content-center">

                <div class="card-header bg-primary text-light">

                    <h3 class="text-light">View Marksheet</h3>

                </div>


                <div class="card-body bg-light border border-light border-2">

                    <table class="table  text-capitalize ">
                        <tbody class="font-weight-bold">


                        <tr class='border border-0 '>
                            <td class='bg-primary text-light '>Submission Status</td>
                            <td class='bg-light text-dark'><?php echo $submissionStatus; ?></td>
                        </tr>

                        <tr class="border border-success border-5">
                            <td class="bg-primary text-light">Activity Name</td>
                            <td class="bg-light text-dark"><?php echo $lastActivityName; ?></td>
                        </tr>

                        <?php

                        if(!$markSstatus){
                            $contentOfPage="           
                             <tr class='border border-success border-5'>
                                <td class='bg-primary text-light'>Upload</td>
                                <td class='bg-light text-dark'>
                                                <form action='marksheetProcess.php' enctype='multipart/form-data' method='post' >
                
                                                    <div class='frame'>
                                                        <div class='center'>
                
                
                                                            <div class=' border border-success border-2'>
                
                                                                    <span>
                                                                        <input type='file' class='upload-input' name='marksheetfile' >
                                                                    <i class='fas fa-solid fa-upload'></i>
                                                                    </span>
                
                                                                <input type='hidden' name='activityId' value=' {$_GET['res_id']}' >
                                                                 <input type='hidden' name='activityName' value='$lastActivityName' >
                
                                                            </div>
                
                                                        <button name='addMarksheet' type='submit' class='btn btn-primary  rounded-pill mt-2'>Add Marksheet</button>
                
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                         </tr>";
                        }else{
                            $contentOfPage="  <tr class='border border-success border-5'>
                                                <td class='bg-primary text-light'>Marksheet File</td>
                                                <td class='bg-light text-dark'> <a href='{$pathMarksheet}' target='_blank' >Marksheet of $lastActivityName</a></td>
                                               </tr>";
                        }
                        echo $contentOfPage;


                        ?>



                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a class="page-link btn btn-primary border border-primary text-primary font-weight-bolder" href="Activities.php">
                        Back
                    </a>
                </div>


            </div>
        </div>
    </div>


</body>
</html>

<!---->

