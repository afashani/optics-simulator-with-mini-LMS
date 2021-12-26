<!--  this is admin dashboard  -->
<!doctype html>
<?php

require_once '../Includes/header.php';

?>
<head>
    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DashBoard | Student </title>

    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">
<!--    <link rel="stylesheet" href="Inc/css/dashboard.css" type="text/css">-->

    <!--    <script src="../../Inc/JS/header.js" type="application/javascript"></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">
        html{
            background-image:url('../../Inc/Img/dashboard.jpg');
            max-height: available;
            max-width: available;
            background-color:blue;
        }

        .tales {
            width: 100 % ;
        }
        .carousel - inner {
                        width: 50 % ;
                        max - height: 100 px!important;
                    }

        .image1{
            width: 50 %;
            height: auto;
            margin: auto;

        }

        .carousel-inner .item a img {

            margin: auto;

        }
    </style>

</head>

<body>
<!--  dashboard content goes here  -->


<div class="row mt-5 mb-2">
    <div class="col-12 ">

                    <div id="carouselExampleCaptions" class="carousel slide text-dark " data-ride="carousel">
                        <ol class="carousel-indicators text-dark bg-dark">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner text-dark">
                            <div class="carousel-item active justify-content-center">
                                <img src="../../Inc/Img/simu.jpg" class="d-block  image1 mb-2" alt="...">
                                <div class="carousel-caption d-none d-md-block text-dark mt-2 pt-2 bg-success">
                                    <h2 class="text-light">Simulator</h2>
                                    <p class=text-light>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>

                            <div class="carousel-item  justify-content-center">
                                <img src="../../Inc/Img/activity.png" class="d-block  image1 mb-2" alt="...">
                                <div class="carousel-caption d-none d-md-block bg-success mt-2 pt-2">
                                    <h2 class="text-light">Activity</h2>
                                    <p class="text-light">Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>

                            <div class="carousel-item  justify-content-center">
                                <img src="../../Inc/Img/tutorial.png" class="d-block  image1 mb-2" alt="...">
                                <div class="carousel-caption d-none d-md-block bg-success mt-2 pt-2">
                                    <h2 class="text-light">Tutorials</h2>
                                    <p class="text-light">Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item  justify-content-center">
                                <img src="../../Inc/Img/msheet.png" class="d-block  image1 nb-2" alt="...">
                                <div class="carousel-caption d-none d-md-block text-light mt-2 pt-2 bg-success">
                                    <h2>Mark Sheets</h2>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev text-success bg-success" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next bg-success"" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>

            </div>
        </div>
    </div>
</div>

</body>
