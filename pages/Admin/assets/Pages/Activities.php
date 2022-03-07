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

$tableData= viewActivities($conn);
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
                        <h4>Activities</h4>
                    </div>

                    <div class="col-lg-4">
                        <h4 class="mt-2">
                        <a class="btn btn-secondary p-2  text-center text-light font-weight-bolder border border-secondary border-2"
                            href="addActivity.php"
                        >Add Activity

                        </a>
                        </h4>
                    </div>
                </div>
            </div>


            <div class="card-body bg-light">
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
                    <table class="table table-striped text-dark " id="dataTable">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Deadline</th>
                        <th>View Activity</th>
                        <th>View Marksheet</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody class="">

                    <?php echo $tableData; ?>


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

<?php
//add activity Success Message
if(isset($_SESSION['status_activity'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_activity_code']?>",
            text: "<?php echo $_SESSION['status_activity']?>",
            icon: "<?php echo $_SESSION['status_activity_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_activity']);
unset($_SESSION['status_activity_code']);
?>

<?php
//add activity error Message
if(isset($_SESSION['status_activity_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_activity_code_err']?>",
            text: "<?php echo $_SESSION['status_activity_err']?>",
            icon: "<?php echo $_SESSION['status_activity_code_err']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_activity_err']);
unset($_SESSION['status_activity_code_err']);
?>

<?php
//add activity due date Success Message
if(isset($_SESSION['status_activity_duedate'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_activity_duedate_code']?>",
            text: "<?php echo $_SESSION['status_activity_duedate']?>",
            icon: "<?php echo $_SESSION['status_activity_duedate_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_activity_duedate_code']);
unset($_SESSION['status_activity_duedate']);
?>

<?php
//add activity due date error Message
if(isset($_SESSION['status_activity_duedate_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_activity_duedate_code_err']?>",
            text: "<?php echo $_SESSION['status_activity_duedate_err']?>",
            icon: "<?php echo $_SESSION['status_activity_duedate_code_err']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_activity_duedate_code_err']);
unset($_SESSION['status_activity_duedate_err']);
?>


<?php
//add activity file update  Success Message
if(isset($_SESSION['status_activity_update'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_activity_update_code']?>",
            text: "<?php echo $_SESSION['status_activity_update']?>",
            icon: "<?php echo $_SESSION['status_activity_update_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_activity_update_code']);
unset($_SESSION['status_activity_update']);
?>

<?php
//add activity file update error Message
if(isset($_SESSION['status_activity_update_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_activity_update_code_err']?>",
            text: "<?php echo $_SESSION['status_activity_update_err']?>",
            icon: "<?php echo $_SESSION['status_activity_update_code_err']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_activity_update_err']);
unset($_SESSION['status_activity_update_code_err']);
?>


<?php
//delete marksheet file   Success Message
if(isset($_SESSION['status_marksheet_delete'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_marksheet_delete_code']?>",
            text: "<?php echo $_SESSION['status_marksheet_delete']?>",
            icon: "<?php echo $_SESSION['status_marksheet_delete_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_marksheet_delete_code']);
unset($_SESSION['status_marksheet_delete']);
?>

<?php
//delete marksheet file  error Message
if(isset($_SESSION['status_marksheet_delete_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_marksheet_delete_code_err']?>",
            text: "<?php echo $_SESSION['status_marksheet_delete_err']?>",
            icon: "<?php echo $_SESSION['status_marksheet_delete_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_marksheet_delete_err']);
unset($_SESSION['status_marksheet_delete_code_err']);
?>


<?php
//add marksheet file   Success Message
if(isset($_SESSION['status_marksheet_add'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_marksheet_add_code']?>",
            text: "<?php echo $_SESSION['status_marksheet_add']?>",
            icon: "<?php echo $_SESSION['status_marksheet_add_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_marksheet_add']);
unset($_SESSION['status_marksheet_add_code']);
?>

<?php
//delete marksheet file  error Message
if(isset($_SESSION['status_marksheet_add_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_marksheet_add_code_err']?>",
            text: "<?php echo $_SESSION['status_marksheet_add_err']?>",
            icon: "<?php echo $_SESSION['status_marksheet_add_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_marksheet_add_err']);
unset($_SESSION['status_marksheet_add_code_err']);
?>


<?php
//delete activity file   Success Message
if(isset($_SESSION['status_ac_delete'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_ac_delete_code']?>",
            text: "<?php echo $_SESSION['status_ac_delete']?>",
            icon: "<?php echo $_SESSION['status_ac_delete_code']?>",
            button: "Ok",
        });
    </script>



    <?php
}

unset($_SESSION['status_ac_delete_code']);
unset($_SESSION['status_ac_delete']);
?>

<?php
//delete activity file  error Message
if(isset($_SESSION['status_ac_delete_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_ac_delete_code_err']?>",
            text: "<?php echo $_SESSION['status_ac_delete_err']?>",
            icon: "<?php echo $_SESSION['status_ac_delete_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_ac_delete_err']);
unset($_SESSION['status_ac_delete_code_err']);
?>
