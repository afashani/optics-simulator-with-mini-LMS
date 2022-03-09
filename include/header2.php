<?php

if(!isset($_SESSION)){
    session_start();
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


    <style>
        .logorow{
            padding: 5px 0;
        }
        .img-logo{
            margin-left: 40px;
            width: 100%;
            height: 60px;
            object-fit: contain;
            object-position: left;
        }
    </style>

</head>
<body class="headbody">
<header>
    <!-- <div class=""> -->
        <!-- <div class="row logorow"> -->
            <!-- <div class="col-md-12">
                <div class="logoimg">
                 <img class="img-logo" src="../assets/images/light-beam-logo.png" width="100%" height="75px" alt="">
                </div>
                 <a href=""></a>
            </div> -->
<!--            <div class="col-md-6 d-flex justify-content-end">-->
<!---->
<!--                --><?php
//                $name=ucfirst($_SESSION['stdname']);
//                if(isset( $_SESSION['stdname'])){
//                    echo "<a href='../pages/Student/assets/Pages/dashboard.php'>Hi! {$name}</a>";
//                }else{
//                    echo "<a href='../pages/Student/assets/Pages/dashboard.php'>Student Login</a>";
//                }
//                ?>
<!---->
<!---->
<!--            </div>-->
        <!-- </div> -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <img class="img-logo" src="../assets/images/logo-new.png" width="100%" height="75px" alt="">
                   <div class="col-2"></div>
                        <li class="nav-item dropdown"><a class="navbar-brand" href="../pages/index.php" >Home</a></li>
                            <li class="nav-item dropdown">
                                <a class="navbar-brand dropdown-toggle" href="#"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                                    <li><a class="dropdown-item" href="../pages/Student/assets/Pages/AccountSetting.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="../pages/Student/assets/Pages/Activities.php">Activities</a></li>
                                    <li><a class="dropdown-item" href="#">About Us</a></li>
                                    <li><a class="dropdown-item" href="#">FAQ's</a></li>
                                    <li><a class="dropdown-item" href="#">Contact US</a></li>

                                    
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="navbar-brand" href="../pages/Student/assets/Pages/dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Optics Simulator
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">How to Use</a>

                                <?php
                                $isDisplay="";
                                if(!isset( $_SESSION['stdname'])){
                                    $isDisplay="d-none";
                                }

                                ?>
                                <a class="dropdown-item <?php echo $isDisplay;?>" href="../pages/simulator.php">Simulator</a>

                            </div>
                        </li>
                </ul>
<!--                <form class="form-inline my-2 my-lg-0">-->
<!--                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--                </form>-->
<!--                <div class="col-md-2 ">-->
                    <h3 class="text-center text-center text-light d-flex justify-content-center">
                    <?php

                    if(isset( $_SESSION['stdname'])){
                        $name="Hi! ".ucfirst($_SESSION['stdname']);
                    }else{
                        $name="Student Login";
                    }
                    echo "<a  style = 'background-color : #15154B ;' class='sign-in' href='../pages/Student/assets/Pages/dashboard.php'>{$name}</a>";
                    ?>
                    </h3>


<!--              -->
                </div>
        </nav>

    <!-- </div> -->
</header>

</body>
<script>
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass('show');
        });


        return false;
    });
</script>
</html>