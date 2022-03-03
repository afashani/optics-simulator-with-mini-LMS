<?php

////add header
require_once '../Includes/Admin-header.php';

require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/resoursesfunc.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();
$dueDate="";
$time_remaining="";
$lastMod="";
$fileName="";

$tableData=viewAnswerScripts($conn,0);
if(isset($_GET['res_type']) & isset($_GET['res_id']) ){

    if($_GET['res_type']=="ac"){
        $activityId=$_GET['res_id'];
        $tableData=viewAnswerScripts($conn,$activityId);

        $activityData=getViewActivityDetails($conn,$_GET['res_id']);

        $dueDate=$activityData[0];
        $lastMod=$activityData[1];
        $fileName=$activityData[2];

        $currentDate=date_create();
        $current= date_format($currentDate,"Y-m-d H:i:s");

        $time_remaining=$func ->differnceOfDays($current,$dueDate);
    }


}

//array_push($data,$deadline);
//array_push($data,$added_date);;
//array_push($data,$fileName);

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

                <h3 class="text-light">View Activity</h3>

            </div>


            <div class="card-body bg-light border border-light border-2">

                <table class="table  text-capitalize ">
                    <tbody class="font-weight-bold">
                    <tr class="border border-0 ">
                        <td class="bg-primary text-light ">Submission Status</td>
                        <td class="bg-light text-dark">Activity Added</td>
                    </tr>

                    <tr class="border border-success border-5">
                        <td class="bg-primary text-light">Due date</td>
                        <td class="bg-light text-dark">
                            <?php echo $dueDate; ?>
                        </td>
                    </tr>

<!--                    <tr class="border border-success border-5">-->
<!--                        <td class="bg-primary text-light">Change Due date</td>-->
<!--                        <td class="bg-light text-dark">-->
<!--                            <input type="datetime-local" name="date">-->
<!---->
<!--                            <a href="updateRes.php?type=acdup&activity_id=--><?php //echo  $_GET['res_id'];?><!--"  class="btn btn-secondary ml-4 text-light rounded-pill"> Change Due Date</a>-->
<!--                        </td>-->
<!--                    </tr>-->


                    <tr class="border border-success border-5">
                        <td class="bg-primary text-light">Time Remaning</td>
                        <td class="bg-light text-dark"> <?php echo $time_remaining; ?></td>
                    </tr>

                    <tr class="border border-success border-5">
                        <td class="bg-primary text-light">last Modified</td>
                        <td class="bg-light text-dark"> <?php echo $lastMod; ?></td>
                    </tr>

                    <tr class="border border-success border-5">
                        <td class="bg-primary text-light">File Name</td>
                        <td class="bg-light text-dark"> <?php echo $fileName; ?></td>
                    </tr>

                    <tr class="border border-success border-5">
                        <td class="bg-primary text-light">Upload</td>
                        <td class="bg-light text-dark">
                            <form action="activitySubmission.php" enctype="multipart/form-data"  >

                                <div class="frame">
                                    <div class="center">


                                        <div class=" border border-success border-2">

                                                    <span>
                                                        <input type="file" class="upload-input" >
                                                    <i class="fas fa-solid fa-upload"></i>
                                                    </span>


                                        </div>

                                        <a  class="btn btn-primary  rounded-pill mt-2" href="updateRes.php?type=acflup&activity_id=<?php echo  $_GET['res_id'];?>">Update file</a>

                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>



                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <a class="page-link btn btn-primary border border-primary text-primary font-weight-bolder" href="Activities.php">
                    Back
                </a>
            </div>

        <div class="card my-2 border-primary">

            <div class="card-header  bg-primary text-light text-center">




                        <h4>View Responses </h4>



            </div>


            <div class="card-body bg-light">
                <div class="search-container mb-2">
                    <form action="G12.php"  method="get">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded searchBar" placeholder="Enter Student Name " aria-label="Search"
                                   aria-describedby="search-addon" <?php  if(empty($tableData)){echo "readonly";}?>/>
                            <button class="input-group-text border-0" id="search-addon" name="searchOrderButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <div class="table-responsive" id="showAllUsers">
                    <?php if(!empty($tableData)){
                        $content= "
                    <table class='table table-striped text-dark text-center text-capitalize font-weight-light' id='dataTable'>
                        <thead>
                        <tr>
                            <th>Student</th>
                            <th>Upload Time</th>
                            <th>Overdue</th>
                            <th>View Answer</th>

                        </tr>
                        </thead>
                        <tbody class='font-weight-light '>".

                             $tableData;
                        }else{
                            $content= "<h2>No submission yet</h2>";

                        }
                        echo $content;
                         ?>


                        </tbody>
                    </table>


                </div>
            </div>

            <div class="card-footer">


            </div>
        </div>
        </div>
    </div>
</div>


</body>
</html>

<!---->
