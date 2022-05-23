<?php

////add header
require_once '../Includes/header.php';
require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$function= new Functions();

//get current user data
$studentDetais=$function ->getStudentDetails($conn);
$studentName=$studentDetais[0];
$studentEmail=$studentDetais[1];
$studentPw="************";


?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> My Account | Student </title>
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

        <div class="card my-2 mt-2  border-info bg-light">

            <div class="card-header  text-dark">


                <div class="col-lg-12">
                    <h4>My Account

                    </h4>
                </div>
            </div>


            <div class="card-body bg-light">
                <div class="text-center">

                    <?php
                    if (isset($errors) && !empty($errors)) {
                        foreach ($errors as $error){
                            echo "<pre class='text-capitalize bg-danger text-light'>".$error."</pre>";
                        }
                        $errors=[];
                    }
                    ?>

                </div>

                <div class="table-responsive" id="showAllUsers">
                    <form action="accountProcess.php" method="post" class="was-validated">
                    <table class="table table-striped bg-light text-dark text-center" id="">
                    <tr>


                                <td class="col-5">First Name</td>
                                <td class="col-5">
                                    <label>
                                        <input type="text" name="name" value=" <?php if(isset($studentName)){echo $studentName;} ?>">
                                    </label>

                                </td>


                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><label>
                                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Enter valid email">
                                            <input type="email" name="email" value=" <?php if(isset($studentEmail)){echo $studentEmail;} ?>">
                                        </button>
                                    </label></td>

                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <label>
                                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Password must be greater than or equal,must Contain At Least 1 Number,Capital Letter and Lowercase Letter">
                                            <input type="password" name="pw" value=" <?php if(isset($studentPw)){echo $studentPw;} ?>">
                                        </button>
                                    </label>
                                </td>

                            </tr>

                            <tr>
                                <td>Retype-Password</td>
                                <td>
                                    <label>
                                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Enter passsword again">
                                            <input type="password" name="Rpw" value=" <?php if(isset($studentPw)){echo $studentPw;} ?>">
                                        </button>
                                    </label></td>

                            </tr>




                    </thead>

                    </table>


                    <div class=" d-flex justify-content-center" >

                        <button
                                class='btn btn-danger mb-2 text-light'
                                type='submit'
                                name="accountsetting"
                        >
                            Change
                        </button>
                        <button class="btn bg-info text-light mb-2 ml-2" type="reset" id="resetUserName" name="resetUserName">Reset</button>
                    </div>

                    </form>

                </div>
            </div>

            <div class="card-footer">
                <!-- Center-aligned -->
                <ul class="pagination justify-content-center">
                    <li class="page-item"  >
                        <a class="page-link" href="dashboard.php">
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
