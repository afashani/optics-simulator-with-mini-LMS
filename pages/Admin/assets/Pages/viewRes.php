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

$tableData=viewAnswerScripts($conn,0);
if(isset($_GET['res_type']) & isset($_GET['res_id']) ){

    if($_GET['res_type']=="ac"){
        $activityId=$_GET['res_id'];
        $tableData=viewAnswerScripts($conn,$activityId);
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

        <div class="card my-2 border-primary">

            <div class="card-header  text-dark">

                <div class="row">

                    <div class="col-lg-8">
                        <h4>Add Activity </h4>
                    </div>


                </div>
            </div>


            <div class="card-body">
                <div class="search-container mb-2">
                    <form action="G12.php"  method="get">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded searchBar" placeholder="Enter Activity Title" aria-label="Search"
                                   aria-describedby="search-addon"/>
                            <button class="input-group-text border-0" id="search-addon" name="searchOrderButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <div class="table-responsive" id="showAllUsers">
                    <?php if(!empty($tableData)){
                        echo "
                    <table class='table table-striped text-dark ' id='dataTable'>
                        <thead>
                        <tr>
                            <th>Student</th>
                            <th>Upload Time</th>
                            <th>Overdue</th>
                            <th>View Answer</th>

                        </tr>
                        </thead>
                        <tbody>".

                             $tableData;
                        }else{
                            echo "<h2>No submission yet</h2>";
                        }
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


</body>
</html>

<!---->
