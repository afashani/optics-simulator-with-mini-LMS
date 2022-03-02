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


$std_id=0;
$name="";
$address="";
$tele="";
$class="";
$email="";
if(isset($_GET['std_id'])){
    $std_id=$_GET['std_id'];
    $studentDetails= getSingleStudentDetail($conn,$std_id);


    $name=$studentDetails[0];
    $address=$studentDetails[1];
    $tele=$studentDetails[2];
    $class=$studentDetails[3];
    $email=$studentDetails[4];
}


?>

<html>

<head>

    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> add Activity | Admin </title>
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
    <div class="col-lg-12 ">

        <div class=" d-flex card my-2 w-100 justify-content-center align-items-center bg-primary">

            <div class="card-header  text-light">


                <div class="col-lg-12">
                    <h2>Student Details

                    </h2>
                </div>
            </div>


            <div class="card-body">



                <div class="table-responsive bg-light" id="showAllUsers">
                    <table class="table table-bordered text-dark text-center  bg-light" id="dataTable">

                        <tr>
                            <td class="col-4">Student Id</td>
                            <td class="col-5 text-center">
                                <input type="text" name="id" value="<?php if(isset($std_id)){echo $std_id;} ?>" readonly/>
                            </td>

                        </tr>

                        <tr>
                            <td class="col-4">Name</td>
                            <td class="col-5 text-center">
                                <input type="text" name="name" value="<?php if(isset($name)){echo $name;} ?>"  readonly/>
                            </td>

                        </tr>

                        <tr>
                            <td class="col-4">Address</td>
                            <td class="col-5 text-center">
                                <input type="text" name="address" value="<?php if(isset($address)){echo $address;} ?>"  readonly/>
                            </td>

                        </tr>

                        <tr>
                            <td class="col-4"> Contact Number</td>
                            <td class="col-5 text-center">
                                <input type="text" name="number" value="<?php if(isset($tele)){echo $tele;} ?>"  readonly/>
                            </td>

                        </tr>

                        <tr>
                            <td class="col-4"> Class</td>
                            <td class="col-5 text-center">
                                <input type="text" name="class" value="<?php if(isset($class)){echo $class;} ?>"  readonly/>
                            </td>

                        </tr>

                        <tr>
                            <td class="col-4"> Email</td>
                            <td class="col-5 text-center">
                                <input type="email" name="email" value="<?php if(isset($email)){echo $email;} ?>"  readonly/>
                            </td>

                        </tr>

                    </table>


                </div>
            </div>

            <div class="card-footer">
                <ul class="pagination justify-content-center">
                    <li class="page-item"  >
                        <a class="page-link" href="Tutorial.php">
                            Back
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>


</body>
</html>

<!---->
