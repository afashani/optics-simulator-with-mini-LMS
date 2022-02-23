<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('location:../../index.php');
    exit();
}

?>



<html lang="en">
<head>
    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">

    <script src="../../Inc/JS/header.js" type="application/javascript"></script>
    <!--  Sweet alert js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<div class=" container-fluid ">
    <div class="row header ">
        <div class="admin-nav p-0 text-white">

            <h4 class="text-white text-center p-2">  Menu </h4>

            <div class="list-group list-group-flush " id="listGroup">

                <!-- have to look on active -->
                <a class="list-group-item text-white admin-main-link" href='../Pages/admin-dashboard.php' id="nav-dashboard" >
                              <i class=" fas fa-clipboard-list"></i> &nbsp; Dashboard
                </a>

                <!-- Student -->
                <a  class="list-group-item list-group-flush admin-main-link" id="nav-student" >
                    <i class="fas fa-user-friends"></i>&nbsp;&nbsp; Student
                </a>

                <!-- Student group -->
                <div class="list-group list-group-flush student-group text-right text-white " id="nav-student-list" >

                    <a href='../Pages/G12.php'  class="list-group-item">

                        Grade
                        <span class="fa fa-circle-o fa-stack-2x"></span>
                        <!-- a strong element with the custom content, in this case a number -->
                        <strong class="fa-stack-1x">
                            12
                        </strong>

                        &nbsp;
                    </a>

                    <a href='../Pages/G13.php'class="list-group-item sub-link">
                        Grade
                        <span class="fa fa-circle-o fa-stack-2x"></span>
                        <!-- a strong element with the custom content, in this case a number -->
                        <strong class="fa-stack-1x">
                            13
                        </strong>
                    </a>

                </div>

                <!-- Resorses -->
                <a  class="list-group-item text-light admin-main-link " id="nav-resources">
                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                    &nbsp; Resourses
                </a>

                <!-- Resorses group -->
                <div class="list-group list-group-flush resources-group text-right text-white " id="nav-resources-list" >

                    <a href=../Pages/Activities.php#'  class="list-group-item  sub-link">
                        <i class="fas fa-book" aria-hidden="true"></i>
                        &nbsp; Activities
                    </a>

                    <a href='../Pages/Tutorial.php'class="list-group-item  sub-link">
                        <i class="fa fa-video" aria-hidden="true"></i>
                        Tutorials
                    </a>

                    <a href='../Pages/Marksheet.php' class="list-group-item  sub-link">
                        <i class="fa fa-poll" aria-hidden="true"></i>
                        MarkSheets
                    </a>

                </div>

                <!-- Setting -->
                <a  class="list-group-item text-light admin-main-link " href="../Pages/AccountSetting.php" >
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    &nbsp; Setting
                </a>



            </div>
        </div>

        <!--  top header -->

        <div class="col bg-light ">
            <div class="row border border-light border-2">
                <div class="col-lg-12  pt-lg-5 justify-content-between d-flex" id="header-top">
                    <a href="#" class="text-dark" id="open-nav">
                        <h3>
                            <i class="fas fa-bars"></i>
                        </h3>
                    </a>

                    <h4 class="text-dark">
                      Admin Panel
                    </h4>

                    <h6 class=" text-white">
                        <!--   check whether current page is dashboard or not   --->

                        <a href="../logout.php" class="mt-1 text-dark flex-lg-wrap text-secondary">
                            <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                        </a>
                    </h6>
                </div>
            </div>






