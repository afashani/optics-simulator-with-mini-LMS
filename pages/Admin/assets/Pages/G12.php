<?php

////add header
require_once '../Includes/Admin-header.php';

require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';
require_once '../Includes/studentfunc.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();

$tableData= viewStudent($conn,12);
?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Grade 12 | Admin </title>
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card my-2 border-primary">

            <div class="card-header  text-dark">


                <div class="col-lg-12">
                    <h4>Grade 12 Students

                    </h4>
                </div>
            </div>


            <div class="card-body bg-light">
                <div class="search-container mb-2">
                    <form action="G12.php"  method="get">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded searchBar" placeholder="Enter Student Name" aria-label="Search"
                                   aria-describedby="search-addon" />
                            <button class="input-group-text border-0" id="search-addon" name="searchOrderButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>


            <div class="table-responsive" id="showAllUsers">
                 <table class=" table table-striped text-dark text-center col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="dataTable">
                        <thead>
                        <tr>
                            <th class="" >Name</th>
                            <th class=" d-none d-lg-table-cell ">Mobile</th>
                            <th class=" d-none d-lg-table-cell ">Email</th>
                            <th class="">View</th>
                        </tr>
                        </thead>
                     <tbody class="text-center ">

                     <?php echo $tableData; ?>


                     </tbody>
                    </table>


                </div>
            </div>

            <div class="card-footer">
                <!-- Center-aligned -->
            </div>
    </div>
</div>


</body>
</html>

<!---->
