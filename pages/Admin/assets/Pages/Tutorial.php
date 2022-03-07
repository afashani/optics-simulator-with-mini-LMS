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

                    <div class="col-12 col-md-8  col-sm-8 col-xs-8 justify-content-start">
                        <h4>Tutorials</h4>
                    </div>

                    <div class="col-6 col-md-4 col-sm-4 col-xs-4 justify-content-end">
                        <h4 class="">
                            <a class="btn btn-secondary  text-center text-light font-weight-bolder border border-secondary border-2"
                               href="addTute.php"
                            >Add Tutorials

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

<?php
//add tute    Success Message
if(isset($_SESSION['status_tute_add'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_tute_add_code']?>",
            text: "<?php echo $_SESSION['status_tute_add']?>",
            icon: "<?php echo $_SESSION['status_tute_add_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_tute_add_code']);
unset($_SESSION['status_tute_add']);
?>

<?php
//add tute error Message
if(isset($_SESSION['status_tute_add_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_tute_add_code_err']?>",
            text: "<?php echo $_SESSION['status_marksheet_add_err']?>",
            icon: "<?php echo $_SESSION['status_tute_add_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_tute_add_err']);
unset($_SESSION['status_tute_add_code_err']);
?>


<?php
//add tute    Success Message
if(isset($_SESSION['status_tute_add'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_tute_add_code']?>",
            text: "<?php echo $_SESSION['status_tute_add']?>",
            icon: "<?php echo $_SESSION['status_tute_add_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_tute_add_code']);
unset($_SESSION['status_tute_add']);
?>

<?php
//add tute error Message
if(isset($_SESSION['status_tute_add_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_tute_add_code_err']?>",
            text: "<?php echo $_SESSION['status_marksheet_add_err']?>",
            icon: "<?php echo $_SESSION['status_tute_add_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_tute_add_err']);
unset($_SESSION['status_tute_add_code_err']);
?>

<?php
//delete tute Success Message
if(isset($_SESSION['status_tute_delete'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_tute_delete_code']?>",
            text: "<?php echo $_SESSION['status_tute_delete']?>",
            icon: "<?php echo $_SESSION['status_tute_delete_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_tute_delete']);
unset($_SESSION['status_tute_delete_code']);
?>

<?php
//delete tute error Message
if(isset($_SESSION['status_tute_delete_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_tute_delete_code_err']?>",
            text: "<?php echo $_SESSION['status_marksheet_add_err']?>",
            icon: "<?php echo $_SESSION['status_tute_delete_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_tute_delete_code_err']);
unset($_SESSION['status_tute_delete_err']);
?>
