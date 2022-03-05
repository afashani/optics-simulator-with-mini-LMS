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

    <title> add Tutorial | Admin </title>
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
<div class="row d-flex justify-content-center">
    <div class="col-lg-8 ">

        <div class="card my-2 border-primary bg-light d-flex justify-content-center">

            <div class="card-header bg-primary text-light d-flex ">

                <h3 class="text-light justify-content-start">Add Tutorials</h3>


            </div>


            <div class="card-body bg-light border border-light border-2">

                <form  action="tuteProcess.php" method="post">
                    <table class="table  text-capitalize ">
                        <tbody class="font-weight-bold">





                        <tr class="border border-success border-5">
                            <td class="bg-primary text-light">Tutorial Name</td>
                            <td class="bg-light text-dark">
                                <input type="text" class="" name="name" />

                            </td>
                        </tr>




                        <tr class="border border-success border-5">
                            <td class="bg-primary text-light">Tutorial Link </td>
                            <td class="bg-light text-dark">
                                <input type="text" class="" name="link" />
                            </td>
                        </tr>





                        </tbody>

                    </table>

            </div>
            <div class="card-footer d-flex justify-content-center">



                <button  class=" btn btn-primary rounded-2 m-2 border border-dark  " type="submit" name="addTute">Add Tutorial</button>

                <a class=" btn btn-secondary border border-dark text-light  rounded-2  font-weight-bolder m-2"  href="Tutorial.php">
                    Back
                </a>

            </div>
            </form>
        </div>

    </div>
</div>


</body>
</html>

<!---->
