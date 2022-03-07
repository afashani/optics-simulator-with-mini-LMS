<?php

////add header
require_once '../Includes/header.php';

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
    <div class="col-lg-12">

        <div class="card my-2 border-primary">

            <div class="card-header  text-dark">


                <div class="col-lg-12">
                    <h4>Grade 12 Students

                    </h4>
                </div>
            </div>


            <div class="card-body">
                <div class="search-container mb-2">
                    <form action="G12.php"  method="get">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded searchBar" placeholder="Enter Student Id or Name" aria-label="Search"
                                   aria-describedby="search-addon" id="searchOrder" name="searchOrder"/>
                            <button class="input-group-text border-0" id="search-addon" name="searchOrderButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>


            <div class="table-responsive" id="showAllUsers">
                 <table class="table table-striped text-dark" id="dataTable">
                        <thead>
                        <tr>
                            <th>Student Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>S001</td>
                            <td>Amal</td>
                            <td>Perera</td>
                            <td>Button</td>

                        </tr>

                        <tr>
                            <td>S001</td>
                            <td>Amal</td>
                            <td>Perera</td>
                            <td>Button</td>

                        </tr>

                        <tr>
                            <td>S001</td>
                            <td>Amal</td>
                            <td>Perera</td>
                            <td>Button</td>

                        </tr>

                        </tbody>
                    </table>


                </div>
            </div>

            <div class="card-footer">
                <!-- Center-aligned -->
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo ($page==1) ? 'disabled':''?>" >
                        <a class="page-link"
                           href="G12.php?page=<?php echo $prev?>">
                            Previous
                        </a>
                    </li>
<!---->
<!--                    --><?php
//
//                    for($i=$start+1 ; $i <= $end ;$i++){
//                        echo  "
//                          <li class='page-item'>
//                            <a class='page-link' href='orders.php?page={$i}'>
//                            {$i}
//                            </a>
//                          </li>
//                        ";
//                    }
//
//                    if($page ==$noOfPages){
//
//                        echo  "
//                          <li class='page-item'>
//                            <a class='page-link' href='orders.php?page={$prev}'>
//                            {$prev}
//                            </a>
//                          </li>
//                        ";
//
//                    }
//                    ?>
<!---->
<!---->
<!--                    <li class="page-item --><?php //echo ($page==$noOfPages) ? 'disabled':''?><!--">-->
<!--                        <a class="page-link "-->
<!--                           href="orders.php?page=--><?php //echo $next?><!--">-->
<!--                            Next</a>-->
<!--                    </li>-->
<!--                </ul>-->
            </div>
        </div>
    </div>
</div>


</body>
</html>

<!---->
