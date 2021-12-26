<?php

//log out page

//session_start();
require_once "../../index.php";
////remove session and redirect to log In
//unset($_SESSION['admintype']);
//unset($_SESSION['adminId']);
header('location:../../index.php');
