
<?php

require_once 'Student/assets/Includes/ConfigDB.php';
require_once 'Student/assets/Includes/Functions.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$errors = array();

// index number format (Format - G120001)
if(isset($_POST['submit'])){

        print_r($_POST);
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
        if (!isset($_POST['email']) || !preg_match($pattern, $email)) {
            $errors['email'] = '<p class = "errors">Invalid Email!</p>';
        }
        else if(empty($_POST['email'])){
            $errors['email'] = '<p class = "errors">Email is Required!</p>';
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


             $query = "INSERT INTO `student`(`student_id`,`student_name`, `tele`,`email`, `password`,`class`) VALUES('{$index}', '{$name}', '{$contact_num}', '{$email}', '{$hashed_password}','{$grade}')";


             $result = mysqli_query($conn, $query);

            $_POST['index']='';
            $_POST['name']='';
            $_POST['contact_num']='';
            $_POST['email']='';
            $_POST['psw']='';
            $_POST['psw_repeat']='';
            $_POST['grade']='';
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
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="#" class="navbar-brand">
                <!-- <img src="../assets/images/logo.png" alt="logo" width="100"> -->
            </a>
        </div>
    </nav>
</header>



<div class="container">
    <div class="row align-items-center" >
        <div class="col-md-5 back-img">
            <h1>Create your Account</h1>
            <img src="../assets/images/background/register-background.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">


        </div>
        <div class="col-md-1 ">
            <div class="vl"></div>
        </div>
        <!-- Registration Form -->
        <div class="col-md-6  ml-auto">

            <div style="display:inline-block;  ">
                <h2 style="font-weight: bold; ">Sign Up</h2>
            </div>
            <div style="display:block; float:right; padding-right:340px; ">
                <h2>Now</h2>

            </div>
            <br>
            <br>



            <form action="" method="POST">
                <div class="row">
                   
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
                    <input type="text" placeholder="Enter your Name" name="name" id="name"  value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>">
                    <?php 
                        if(isset($errors['name'])){
                            echo $errors['name'];
                        
                        }
                    ?>

                    <label for="name"><b>Contact Number</b></label>
                    <input type="text" placeholder="Enter your contact number" name="contact_num" id="contact-num"  value="<?php if(isset($_POST['contact_num'])) {echo $_POST['contact_num'];} ?>" >
                    <?php 
                        if(isset($errors['contact_num'])){
                            echo $errors['contact_num'];
                        
                        }
                    ?>
                   
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter your email" name="email" id="email"  value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>">
                    <?php 
                        if(isset($errors['email'])){
                            echo $errors['email'];
                        
                        }
                    ?>
              
                    <label for="grade"><b>Grade</b></label>

                    <select id="grade" name="grade" class="form-control bg-white border-md border-left-0 pl-03"  value="<?php if(isset($_POST['grade'])) {echo $_POST['grade'];} ?>" >
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

                    <button name="submit" class="register-btn btn btn-blue text-center">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

</div>
<div class="bg-blue py-4">
    <div class="row px-3" >
        <small class="ml-4 ml-sm-5 mb-2" style="text-align: center;">Copyright &copy; 2021. All rights reserved.</small>
    </div>
</div>
</body>
</html>