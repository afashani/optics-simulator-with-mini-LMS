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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">

    <script src="../../Inc/JS/search.js" type="application/javascript"></script>
    <script type="text/javascript">

        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            maxFilesize: 1,
            acceptedFiles: ".pdf"
        });

        $('#uploadFile').click(function(){
            myDropzone.processQueue();
        });

    </script>
</head>
<body>
<!-- Order body-->
<div class="row">
    <div class="col-lg-12">

        <div class="card my-2 border-success bg-success">

            <div class="card-header  text-light">


                <div class="col-lg-12">
                    <h4>Activity Submisson

                    </h4>
                </div>
            </div>


            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Drag and Drop File Upload </h2>
                            <form action="activitySubmission.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
                                <div>
                                    <h3 class="text-dark">Upload Multiple Image By Click On Box</h3>
                                </div>
                            </form>
                            <button id="uploadFile">Upload Files</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">

            </div>
        </div>
    </div>
</div>


</body>
</html>


