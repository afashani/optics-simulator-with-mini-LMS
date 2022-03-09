<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
       <!-- Latest compiled and minified CSS -->
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/main.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>About Us</title>

        <style>

            .about-us {
                padding: 60px 0;
                width: 100%;
                /* background-color: #f1f1f1; */
            }
            .about-img img {
                border: 1px solid #000;
                padding: 5px;
                border-radius: 50%;
                box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.3);
            }
            .about-sub-heading h5 {
                color: #15154B;
            }
            .about-content h2 {
                font-weight: bold;
                margin-bottom: 20px;
            }
            .about-content p {
                margin-bottom: 30px;
                color: #6e6e6e;
            }
            .about-sub i {
                width: 40px;
                height: 40px;
                background-color: #15154B;
                color: #fff;
                border-radius: 50%;
                text-align: center;
                line-height: 40px;

                margin-right: 10px;
            }
            .about-sub i h6 {
                font-size: 18px;
            }
      
        </style>
    </head>
    <body>
    <?php include '../include/header2.php' ?>
        <div class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-img">
                            <img src="../assets/images/about.jpg" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-content">
                            <div class="about-sub-heading">
                                <h1>About Us</h1>
                                <br>
                            </div>
                            <h2 class="text-center">
                              Optics Simulator and Mini LMS
                            </h2>
                            <p class="text-justify">
                            Welcome to Wisdom Institution. This web site is accessed for students who are learning in wisdom institution. In this web site you are supported to doing physics optics lesson easily. We're dedicated to giving you the very 
                            best of this optics simulator with mini LMS system, with a focus on simulator functionalities for concave and convex lenses, Learning Management System.  
                            We hope you enjoy this products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
                            You can do following activities in this web site
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-sub">
                                    <h6><i class="fa fa-check"></i> Drawing ray notes for concave lenses</h6>
                                    <h6><i class="fa fa-check"></i> Drawing ray notes for convex lenses</h6>
                                    <h6><i class="fa fa-check"></i> Showing properties of the image</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-sub">
                                    <h6><i class="fa fa-check"></i> Finding the location where the image is </br>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;formed</h6>
                                    <h6><i class="fa fa-check"></i> Upload answers to the activities we provide</h6>
                                    
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <footer>
		<?php include '../include/footer.html' ?> 
		
	    </footer>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
    </body>
</html>