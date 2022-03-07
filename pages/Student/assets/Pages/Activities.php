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

    <title> Activities | Student </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--   alert js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">

    <script src="../../Inc/JS/search.js" type="application/javascript"></script>

    <!--  Sweet alert js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
<!-- Order body-->
<div class="row">
    <div class="col-lg-12">

        <div class="card my-2 border-info bg-light">

            <div class="card-header  text-dark">


                <div class="col-lg-12">
                    <h4>Activities

                    </h4>
                </div>
            </div>


            <div class="card-body">
                <div class="search-container mb-2">
                    <form action="G12.php"  method="get">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded searchBar" placeholder="Enter Activity Title" aria-label="Search"
                                   aria-describedby="search-addon" <?php  if(empty($tableData)){echo "readonly";}?> />
                            <button class="input-group-text border-0" id="search-addon" name="searchOrderButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <div class="table-responsive " id="showAllUsers">


                    <?php

                    if(empty($tableData)){
                        $content= "No Activitites Available";
                    }else{

                        $content=" <table class='table table-striped text-dark text-center' id='dataTable'>
                    <thead>
                    <tr>
                        <th class='d-none d-lg-table-cell'>Date</th>
                        <th>Title</th>
                        <th class='d-none d-lg-table-cell'>Deadline</th>
                        <th>View Activity</th>
                        <th>View Marksheet</th>


                    </tr>
                    </thead>
                    <tbody>".$tableData;

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


</body>
</html>

<!---->

<?php
//added answer file  success Message
if(isset($_SESSION['status_answer_add'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_answer_add_code']?>",
            text: "<?php echo $_SESSION['status_answer_add']?>",
            icon: "<?php echo $_SESSION['status_answer_add_code']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_answer_add']);
unset($_SESSION['status_answer_add_code']);
?>

<?php
//added answer file  error Message
if(isset($_SESSION['status_answer_add_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_answer_add_code_err']?>",
            text: "<?php echo $_SESSION['status_answer_add_err']?>",
            icon: "<?php echo $_SESSION['status_answer_add_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_answer_add_err']);
unset($_SESSION['status_answer_add_code_err']);
?>


<?php
//update answer file  success Message
if(isset($_SESSION['status_answer_update'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_answer_update_code']?>",
            text: "<?php echo $_SESSION['status_answer_update']?>",
            icon: "<?php echo $_SESSION['status_answer_update_code']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_answer_update']);
unset($_SESSION['status_answer_update_code']);
?>

<?php
//added answer file  error Message
if(isset($_SESSION['status_answer_update_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_answer_update_code_err']?>",
            text: "<?php echo $_SESSION['status_answer_update_err']?>",
            icon: "<?php echo $_SESSION['status_answer_update_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_answer_update_err']);
unset($_SESSION['status_answer_update_code_err']);
?>

