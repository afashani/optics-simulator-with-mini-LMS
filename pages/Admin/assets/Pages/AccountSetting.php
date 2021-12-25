<?php

////add header
require_once '../Includes/Admin-header.php';



print_r($_POST);

if(isset($_POST['accountsetting'])){

    echo "data got";



}else{
    echo "data not fopund";
}
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
<div class="row mt-2">
    <div class="col-lg-12">

        <div class="card my-2 mt-2  border-primary">

            <div class="card-header  text-dark">


                <div class="col-lg-12">
                    <h4>Account Setting

                    </h4>
                </div>
            </div>


            <div class="card-body">
<!--                <div class="search-container mb-2">-->
<!--                    <form action="G12.php"  method="get">-->
<!--                        <div class="input-group rounded">-->
<!--                            <input type="search" class="form-control rounded searchBar" placeholder="Enter Student Id or Name" aria-label="Search"-->
<!--                                   aria-describedby="search-addon" id="searchOrder" name="searchOrder"/>-->
<!--                            <button class="input-group-text border-0" id="search-addon" name="searchOrderButton">-->
<!--                                <i class="fas fa-search"></i>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->


                <div class="table-responsive" id="showAllUsers">
                    <form action="AccountSetting.php" class="was-validated" method="post">

                    <table class="table table-striped text-dark text-center" id="dataTable">
                    <tbody>

                    <tr>
                        <td class="col-4">First Name</td>
                        <td class="col-5 text-center">
                         <input type="text" name="fname" value="Admin"/>
                        </td>


                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>Admin</td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>admin@example.com</td>

                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>************</td>


                    </tr>


                    </tbody>


                    </table>

                        <div class=" d-flex justify-content-center" >

                            <button
                                class='btn btn-danger mb-2 text-light'
                                type='submit'
                                name="accountsetting"
                            >
                                Change
                            </button>
                            <button class="btn bg-primary mb-2 ml-2" type="reset" id="resetUserName" name="resetUserName">Reset</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card-footer">
                <!-- Center-aligned -->
                <ul class="pagination justify-content-center">
                    <li class="page-item"  >
                        <a class="page-link" href="admin-dashboard.php">
                            Back
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</div>


</body>
</html>

<!---->
