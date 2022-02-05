<?php
//check whether user log in or not
session_start();
if(!isset($_SESSION['stdId'])) {
    header('location:../../../login.php');
    exit();
}



?>



<html lang="en">
<head>
    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

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
        <div class="admin-nav bg-success p-0 text-dark">

            <h4 class="text-dark bg-light text-center p-2">  Menu </h4>

            <div class="list-group list-group-flush bg-success " id="listGroup">

                <!-- have to look on active -->
                <a class="list-group-item text-white admin-main-link bg-success" href='../Pages/dashboard.php' id="nav-dashboard" >
                              <i class=" fas fa-clipboard-list"></i> &nbsp; Dashboard
                </a>

                <!-- Simulator -->
                <a  class="list-group-item list-group-flush admin-main-link bg-success" href='../../../simulator.html' id="nav-student" >
                    <i class="fas fa-user-friends"></i>&nbsp;&nbsp; Simulator
                </a>


                <!-- Resorses -->
                <a  class="list-group-item text-light admin-main-link bg-success " id="nav-resources">
                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                    &nbsp; Resourses
                </a>

                <!-- Resorses group -->
                <div class="list-group list-group-flush resources-group text-right text-white bg-success" id="nav-resources-list" >

                    <a href=../Pages/Activities.php#'  class="list-group-item bg-success sub-link">
                        <i class="fas fa-book" aria-hidden="true"></i>
                        &nbsp; Activities
                    </a>

                    <a href='../Pages/Tutorial.php'class="list-group-item bg-success sub-link">
                        <i class="fa fa-video" aria-hidden="true"></i>
                        Tutorials
                    </a>

                    <a href='../Pages/Marksheet.php' class="list-group-item bg-success sub-link">
                        <i class="fa fa-poll" aria-hidden="true"></i>
                        MarkSheets
                    </a>

                </div>

                <!-- Setting -->
                <a  class="list-group-item text-light admin-main-link bg-success " href="../Pages/AccountSetting.php" >
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
                      Student Dashboard
                    </h4>

                    <h6 class=" text-white">
                        <!--   check whether current page is dashboard or not   --->

                        <a href="../logout.php" class="mt-1 text-dark flex-lg-wrap text-secondary">
                            <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                        </a>
                    </h6>
                </div>
            </div>






