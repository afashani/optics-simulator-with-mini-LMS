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

//get current user data
$adminDetais=$func ->getSAdminDetails($conn);
$adminName="Admin";
$adminEmail=$adminDetais[0];
$adminPw="************";



?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Account | Admin </title>
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


            <div class="card-body bg-light">
                <?php
                if (isset($errors) && !empty($errors)) {
                    foreach ($errors as $error){
                        echo "<pre class='text-capitalize bg-danger text-light'>".$error."</pre>";
                    }
                    $errors=[];
                }
                ?>


                <div class="table-responsive" id="showAllUsers">
                    <form action="accountProcess.php" class="was-validated" method="post">

                    <table class="table table-striped text-dark text-center" id="dataTable">
                    <tbody>

                    <tr>
                        <td class="col-4">Name</td>
                        <td class="col-5 text-center">
                         <input type="text" name="name" value="Admin" readonly/>
                        </td>


                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Enter valid email">
                                <input type="text" name="email" value="<?php if(isset($adminEmail)){echo $adminEmail;} ?>"/>
                            </button>
                        </td>

                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>

                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Password Must be greter than or equal,must Contain At Least 1 Number,Capital Letter and Lowercase Letter">
                                <input type="password" name="pw" value="<?php if(isset($adminPw)){echo $adminPw;} ?>"/>
                            </button>
                        </td>


                    </tr>

                    <tr>
                        <td>Retype-Password</td>
                        <td>
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Type password again">
                            <input type="password" name="Rpw" value="<?php if(isset($adminPw)){echo $adminPw;} ?>"/>
                            </button>
                        </td>


                    </tr>


                    </tbody>


                    </table>

<!--                        <div class="text-capitalize bg-light text-dark text-center" >-->
<!--                            <h4>Instructions</h4>-->
<!--                            <h6 class="">Password Must be greter than or equal,must Contain At Least 1 Number,Capital Letter and Lowercase Letter</h6>-->
<!---->
<!--                        </div>-->

                        <div class=" d-flex justify-content-center" >

                            <button
                                class='btn btn-primary mb-2 text-light'
                                type='submit'
                                name="accountsetting"
                            >
                                Change
                            </button>
                            <button class="btn bg-secondary mb-2 ml-2" type="reset" id="resetUserName" name="resetUserName">Reset</button>
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

<?php

//account update error Message
if(isset($_SESSION['status_acsetting_update_err'])){

    ?>

    <script type="application/javascript">

        swal({
            title: "<?php echo $_SESSION['status_acsetting_update_code_err']?>",
            text: "<?php echo $_SESSION['status_acsetting_update_err']?>",
            icon: "<?php echo $_SESSION['status_acsetting_update_code_err']?>",
            button: "Ok",
        });
    </script>


    <?php
}

unset($_SESSION['status_acsetting_update_code_err']);
unset($_SESSION['status_acsetting_update_err']);
?>
