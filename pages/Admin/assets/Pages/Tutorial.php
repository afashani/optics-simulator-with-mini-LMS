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

$tableData= viewTutorials($conn);

?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Tutorials | Admin </title>
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
                        <h4>Tutorials</h4>
                    </div>

                    <div class="col-lg-4">
                        <h4 class="mt-2">
                            <a class="btn-dark p-2  text-center text-light font-weight-bolder border border-secondary border-2"
                               href="addTute.php"
                            >Add Tutorial

                            </a>
                        </h4>
                    </div>
                </div>
            </div>


            <div class="card-body bg-light">
                <div class="search-container mb-2">
                    <form action="G12.php"  method="get">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded searchBar" placeholder="Enter Tutorial Title" aria-label="Search"
                                   aria-describedby="search-addon" />
                            <button class="input-group-text border-0" id="search-addon" name="searchOrderButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <div class="table-responsive" id="showAllUsers">
                    <table class="table table-striped text-dark text-center" id="dataTable">
                    <thead>
                    <tr>

                        <th>Title</th>
                        <th>View</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php echo $tableData; ?>
                    </tbody>
                    </table>


                </div>
            </div>

            <div class="card-footer">
                <a class="page-link btn btn-primary border border-primary text-primary font-weight-bolder" href="Tutorialphp">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>


</body>
</html>

<!---->
