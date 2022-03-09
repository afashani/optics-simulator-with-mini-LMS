
<?php

require_once 'Student/assets/Includes/ConfigDB.php';
require_once 'Student/assets/Includes/Functions.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$errors = array();
// $error_reporting(0);
// index number format (Format - G120001)
if(isset($_POST['submit'])){

    // print_r($_POST);
    if(empty($_POST['index'])){
        $errors['index'] = '<p class = "errors">Index is Required! </p>';
    }
    else if(!isset($_POST['index']) || (!preg_match("/^[G]{1}[1]{1}[2-3]{1}[0-9]{4}$/", $_POST['index']))){
        $errors['index'] = '<p class = "errors">Enter a Valid Index Number!</p>';
    }
    if(empty($_POST['name'])){
        $errors['name'] = '<p class = "errors">Name is Required!</p>';
    }
    else if(!isset($_POST['name']) || (!preg_match("/^[a-zA-Z\s]+$/", $_POST['name'])) ){
        $errors['name'] = '<p class = "errors">Please Enter Strings Only!</p>';
    }
    if(empty($_POST['contact_num'])){
        $errors['contact_num'] = '<p class = "errors">Contact Number is Required!</p>';
    }
    else if(!isset($_POST['contact_num']) || (!preg_match("/(0)\d{9}/", $_POST['contact_num']))){
        $errors['contact_num'] = '<p class = "errors">Enter a Valid Contact Number! </p>';
    }

    $email = $_POST['email'];
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    // || !preg_match($pattern, $email)
    if (!isset($_POST['email']) || !preg_match($pattern, $email)) {
        $errors['email'] = '<p class = "errors">Invalid Email!</p>';
    }
    else if(empty($_POST['email'])){
        $errors['email'] = '<p class = "errors">Email is Required!</p>';
    }
    if(empty($_POST['grade'])){
        $errors['grade'] = '<p class = "errors">Grade is Required! </p>';
    }
    if(!isset($_POST['psw']) || empty($_POST['psw'])){
        $errors['psw'] = '<p class = "errors">Password is Required!</p>';
    }
    else if(!isset($_POST['psw']) || strlen($_POST['psw']) < 8){
        $errors['psw'] = '<p class = "errors">Password Must be >= 8</p>';
    }
    elseif(!preg_match("#[0-9]+#",$_POST['psw'])) {
        $errors['psw'] = '<p class = "errors">Your Password Must Contain At Least 1 Number!</p>';
    }
    elseif(!preg_match("#[A-Z]+#",$_POST['psw'])) {
        $errors['psw'] = '<p class = "errors">Your Password Must Contain At Least 1 Capital Letter!</p>';
    }
    elseif(!preg_match("#[a-z]+#",$_POST['psw'])) {
        $errors['psw'] = '<p class = "errors">Your Password Must Contain At Least 1 Lowercase Letter!</p>';
    }

    if(!isset($_POST['psw_repeat']) || empty($_POST['psw_repeat'])){
        $errors['psw_repeat'] = '<p class = "errors">Re-enter Your Password!</p>';
    }

    else if(!isset($_POST['psw_repeat']) || ($_POST['psw']) != ($_POST['psw_repeat'])){
        $errors['psw_repeat'] = '<p class = "errors">Password Not Match!</p>';
    }

    if(empty($errors)){

        
        $index = $_POST['index'];
        $name = $_POST['name'];
        $contact_num = $_POST['contact_num'];
        $email = $_POST['email'];
        $psw = $_POST['psw'];
        $hashed_password = sha1($psw);
        // $psw_repeat = $_POST['psw_repeat'];

        $grade = $_POST['grade'];

        $queryCheckIndex = "SELECT * FROM student WHERE student_id = '". mysqli_real_escape_string($conn,$index) ."' AND email = '". mysqli_real_escape_string($conn,$email) ."'" ;
        $resultCheckIndex = mysqli_query($conn,$queryCheckIndex);
        if (!mysqli_num_rows($resultCheckIndex) == 1)
        {
            $errors['index'] = '<p class = "errors">Already Registered With This Index Number</p>'; //Fail
            $errors['email'] = '<p class = "errors">Already Registered With This Email Address</p>';
        }


        $query = "INSERT INTO `student`(`student_id`,`student_name`, `tele`,`email`, `password`,`class`) VALUES('{$index}', '{$name}', '{$contact_num}', '{$email}', '{$hashed_password}','{$grade}')";
        $result = mysqli_query($conn, $query);

        $_POST['index']='';
        $_POST['name']='';
        $_POST['contact_num']='';
        $_POST['email']='';
        $_POST['psw']='';
        $_POST['psw_repeat']='';
        $_POST['grade']='';

        header("Location: verification.php?email=$email");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- <link rel="stylesheet" href="../assets/scss/main.css"> -->
</head>
<body>

<div >
    <div class="row " >
        <div class="col-md-6 back-img">
            
            <img src="../assets/images/register2_1.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">


        </div>
        <div class="ml-4"></div>
        <!-- Registration Form -->
        <div class="col-md-5 ml-3 my-3">

            <div style="display:inline-block;  ">
            <h1>Create Student Account</h1>
            </div>
            
            <br>
            <br>



            <form action="" method="POST">
                <div class="row">
                
                <p>Have already an account?  <a href="login.php" style="color:#243D76 ;"><b>Login here</b></a>.</p>
                    <!-- index number -->
                    <break>
                        <label for="index"><b>Index Number</b></label>
                        <input type="text" placeholder="Enter your index number" name="index" id="index" value="<?php if(isset($_POST['index'])) {echo $_POST['index'];}  ?>" >
                        <?php
                        if(isset($errors['index'])){
                            echo $errors['index'];

                        }
                        ?>

                        <label for="name"><b>Name</b></label>
                        <input type="text" placeholder="Enter your Name" name="name" id="name"  value="<?php if(isset($_POST['name'])) {echo $_POST['name'];}  ?>" >
                        <?php
                        if(isset($errors['name'])){
                            echo $errors['name'];

                        }
                        ?>

                        <label for="name"><b>Contact Number</b></label>
                        <input type="tel" placeholder="Enter your contact number" name="contact_num" id="contact-num"  value="<?php if(isset($_POST['contact_num'])) {echo $_POST['contact_num'];} ?>" title="Enter 10 digits contact number ">
                        <?php
                        if(isset($errors['contact_num'])){
                            echo $errors['contact_num'];

                        }
                        ?>

                        <label for="email"><b>Email</b></label>
                        <input type="email" placeholder="Enter your email" name="email" id="email"  value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>">
                        <?php
                        if(isset($errors['email'])){
                            echo $errors['email'];

                        }
                        ?>

                        <label for="grade"><b>Grade</b></label>

                        <select id="grade" name="grade" class="form-control bg-white border-md  pl-03"  value="<?php if(isset($_POST['grade'])) {echo $_POST['grade'];} ?>" >
                            <option>Select Your Grade</option>
                            <option value="12">Grade 12</option>
                            <option value="13">Grade 13</option>
                        </select>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" id="psw" value="<?php if(isset($_POST['psw'])) {echo $_POST['psw'];} ?>">
                        <?php
                        if(isset($errors['psw'])){
                            echo $errors['psw'];
                        }
                        ?>

                        <label for="psw-repeat"><b>Confirm Password</b></label>
                        <input type="password" placeholder="Confirm your Password" name="psw_repeat" id="psw_repeat" value="<?php if(isset($_POST['psw_repeat'])) {echo $_POST['psw_repeat'];} ?>">
                        <?php
                        if(isset($errors['psw_repeat'])){
                            echo $errors['psw_repeat'];
                        }
                        ?>
                        <br>
                        <hr>

                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                        <div class="col-md-12 text-center">
                            <button name="submit" class="register-btn btn btn-blue text-center">Sign Up</button>
                        </div>
                        
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>