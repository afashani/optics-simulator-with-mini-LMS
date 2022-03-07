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
$fileName="Only pdf/ doc allowed here ";

if(isset($_GET['std_id'])){
    $std_id=$_GET['std_id'];
    $studentDetails= getSingleStudentDetail($conn,$std_id);


    $name=$studentDetails[0];
    $address=$studentDetails[1];
    $tele=$studentDetails[2];
    $class=$studentDetails[3];
    $email=$studentDetails[4];
}

//last activities
$lastActivities=getlastActivities($conn)
?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> add Activity | Admin </title>
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
    <div class="col-lg-12 ">

            <div class="card m-2 border-primary bg-light d-flex justify-content-center">

                <div class="card-header bg-primary text-light d-flex ">

                    <h3 class="text-light justify-content-start">Add Activity</h3>


                </div>


                <div class="card-body  table-responsive bg-light border border-light border-2">

                    <form enctype="multipart/form-data" action="activityProcess.php" method="post">
                    <table class="table  text-capitalize ">
                        <tbody class="font-weight-bold">

                        <tr class="border border-success border-2">
                            <td class="bg-primary text-light">Previous Activities</td>
                            <td class="bg-light text-dark">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        View Prevoius Activities
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php
                                            foreach ($lastActivities as $a){
                                                echo " <a class='dropdown-item' >$a</a>";
                                            }
                                        ?>


                                    </div>
                                </div>

                            </td>
                        </tr>



                            <tr class="border border-success border-2">
                                <td class="bg-primary text-light">Due date</td>
                                <td class="bg-light text-dark">
                                    <input type="datetime-local" class="" name="deadline" />

                                </td>
                            </tr>




                            <tr class="border border-success border-2">
                                <td class="bg-primary text-light">File Name </td>
                                <td class="bg-light text-dark">
                                    <input type="text" class="" name="fileName" />
                                </td>
                            </tr>

                            <tr class="border border-success border-2">
                                <td class="bg-primary text-light col-4 col-md-4  col-sm-4 col-xs-4">Upload</td>
                                <td class="bg-light text-dark col-8 col-md-8  col-sm-8 col-xs-8">


                                                <?php echo $fileName; ?>



                                                    <div class=" border border-success border-2">

                                                            <span>
                                                                <input type="file" class="w-75" name="activityFile" >
                                                            <i class="fas fa-solid fa-upload"></i>
                                                            </span>


                                                    </div>



                                </td>
                            </tr>




                        </tbody>

                    </table>

                </div>
                <div class="card-footer d-flex justify-content-center">



                    <button  class=" btn btn-primary rounded-2  border border-dark  " type="submit" name="addActivity">Add Activity</button>

                    <a class=" btn btn-secondary border border-dark text-light  rounded-2  font-weight-bolder ml-2"  href="Activities.php">
                        Back
                    </a>

                </div>
                </form>
            </div>


    </div>
</div>


</body>
</html>

<!---->
