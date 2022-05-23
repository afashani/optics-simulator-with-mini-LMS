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
$lastActivities="No Activities";


$pageName="Activity";

if(isset($_GET['res_type']) & isset($_GET['res_id']) ){

    //view answer scripts
    if($_GET['res_type']=="ac"){
        $activityId=$_GET['res_id'];
        $tableData=viewAnswerScripts($conn,$activityId);

        $activityData=getViewActivityDetails($conn,$_GET['res_id']);

        $dueDate=$activityData[0];
        $lastMod=$activityData[1];
        $filePath=$activityData[2];
        $fileName=$activityData[3];


        $currentDate=date_create();
        $current= date_format($currentDate,"Y-m-d H:i:s");

        $time_remaining=$func ->differnceOfDays($current,$dueDate);
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
    <div class="col-lg-12 form-control-sm">

        <div class="card-deck">
        <div class="card my-2 border-primary bg-light d-flex justify-content-center">

            <div class="card-header bg-light text-dark">

                <h3 class="">View <?php echo $pageName;?></h3>

            </div>


            <div class="card-body bg-light border border-light border-2">

                <table class="table  text-capitalize ">
                    <tbody class="font-weight-bold">





                    <tr class='border border-0 '>
                        <td class='bg-primary text-light '>Submission Status</td>
                        <td class='bg-light text-dark'>Activity Added</td>
                    </tr>

                    <tr class="border border-success border-2">
                        <td class="bg-primary text-light">Due date</td>
                        <td class="bg-light text-dark w-75">
                            <form method="post" class="w-75" action="activityProcess.php" >
                                <input type="datetime-local" name="date" class="w-100" value="<?php echo $dueDate; ?>">
                                <input type="hidden" name="activityID" class="w-75" value="<?php echo $activityId; ?>">
                                <button type="submit" class="btn btn-primary mt-2" name="updateDueDate">Change Deadline</button>
                            </form>

                        </td>
                    </tr>


                    <tr class="border border-success border-2">
                        <td class="bg-primary text-light">Time Remaning</td>
                        <td class="bg-light text-dark"> <?php echo $time_remaining; ?></td>
                    </tr>

                    <tr class="border border-success border-2">
                        <td class="bg-primary text-light">last Modified</td>
                        <td class="bg-light text-dark"> <?php echo $lastMod; ?></td>
                    </tr>

                    <tr class="border border-success border-2">
                        <td class="bg-primary text-light">Activity File</td>
                        <td class="bg-light text-dark"> <a href="<?php echo $filePath; ?>" target="_blank"><?php echo  $fileName; ?></a></td>
                    </tr>

                    <tr class="border border-success border-2">
                        <td class="bg-primary text-light col-4 col-md-4  col-sm-4 col-xs-3">Upload</td>
                        <td class="bg-light text-dark col-8 col-md-8  col-sm-8 col-xs-8 ">
                            <form action="activityProcess.php" class="w-75" enctype="multipart/form-data" method="post" >


                                        <div class=" border border-success border-2">

                                                    <span>
                                                        <input type="file" class="w-75" name="updateActivityFile" >
                                                    <i class="fas fa-solid fa-upload"></i>
                                                    </span>

                                            <input type="hidden" name="activityId" class="w-75" value="<?php echo  $_GET['res_id'];?>" >

                                        </div>

                                        <button name="updateActivity" type="submit" class="btn btn-primary  rounded-pill mt-2">Update file</button>

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
                            <th class='d-none d-lg-table-cell'>Overdue</th>
                            <th>View Answer</th>

                        </tr>
                        </thead>
                        <tbody class='font-weight-light '>".

                             $tableData;
                        }else{
                            $content= "<h2 class='text-dark'>No submissions yet</h2>";

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
