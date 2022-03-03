<?php

////add header
require_once '../Includes/header.php';
require_once '../Includes/ConfigDB.php';
require_once '../Includes/activityfunc.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$tableData=viewActivity($conn);

?>

<html>

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
                            <tr class="border border-0 ">
                                <td class="bg-success text-light ">Submission Status</td>
                                <td class="bg-light text-dark">Submission for gradding</td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">Due date</td>
                                <td class="bg-light text-dark">Saturday, 15 January 2022, 12:00 AM</td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">Time Remaning</td>
                                <td class="bg-light text-dark">Assignment was submitted 16 days 9 hours late</td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">last Modified</td>
                                <td class="bg-light text-dark">Monday, 31 January 2022, 9:30 AM</td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">File Name</td>
                                <td class="bg-light text-dark">file name</td>
                            </tr>

                            <tr class="border border-success border-5">
                                <td class="bg-success text-light">Upload</td>
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

                                                <button  class="btn btn-success  rounded-pill mt-2" name="uploadbutton">Upload file</button>

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


