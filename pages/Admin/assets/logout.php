<?php

//log out page

session_start();

//remove session and redirect to log In
unset($_SESSION['admintype']);
unset($_SESSION['adminId']);
header('location:../../Admin/dashboard.php');
