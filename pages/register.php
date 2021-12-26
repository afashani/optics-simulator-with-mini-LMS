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
        <div class="col-md-6 col-lg-6 ml-auto">

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
                    <label for="index"><b>Index Number</b></label>
                    <input type="text" placeholder="Enter your index number" name="index" id="index" required>

                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Enter your Name" name="name" id="name" required>

                    <label for="name"><b>Contact Number</b></label>
                    <input type="text" placeholder="Enter your contact number" name="contact_num" id="contact-num" required>

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter your email" name="email" id="email" required>
                    <label for="email"><b>Grade</b></label>

                    <select id="grade" name="grade" class="form-control bg-white border-md border-left-0 pl-03" required>
                        <option>Select Your Grade</option>
                        <option value="Grade 10">Grade 10</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                        <option value="Grade 13">Grade 13</option>
                    </select>


                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                    <label for="psw-repeat"><b>Confirm Password</b></label>
                    <input type="password" placeholder="Confirm your Password" name="psw-repeat" id="psw-repeat" required>
                    <hr>

                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                    <button type="submit" class="register-btn btn btn-blue text-center">Sign Up</button>
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