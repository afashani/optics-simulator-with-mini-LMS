<?php

////add header
require_once '../Includes/header.php';

?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> View Activity | Student </title>
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

        <div class="card my-2 border-success bg-success">

            <div class="card-header  text-light">


                <div class="col-lg-12">
                    <h4>Activity Submission

                    </h4>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-striped text-dark text-center" >

                        <tbody>

                        <tr>
                            <td>
                                <h3>Introduction to octical Simulator</h3>
                            </td>
                            <td>
                                <a class="btn btn-success">
                                    Download
                                </a>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>


                <div class="table-responsive" id="showAllUsers">
                    <table class="table table-striped text-dark" id="dataTable">

                        <tbody>

                        <tr>
                            <td>Submission Status</td>
                            <td>Not Yet</td>

                        </tr>

                        <tr>
                            <td>Due Date</td>
                            <td>Tuesday, 4 January 2022, 12:00 AM</td>

                        </tr>

                        <tr>
                            <td>Time Remaining</td>
                            <td> 2 hours</td>

                        </tr>

                        <tr>
                            <td>Last Modified</td>
                            <td>Not Yet</td>

                        </tr>

                        <tr>
                            <td>File Submission</td>
                            <td>Not Yet</td>

                        </tr>
                        </tbody>
                    </table>


                </div>
            </div>

            <div class="card-footer align-content-center d-flex justify-content-center ">

                <button class="btn btn-danger "> Remove Submission</button>

            </div>
        </div>
    </div>
</div>


</body>
</html>

<!---->
