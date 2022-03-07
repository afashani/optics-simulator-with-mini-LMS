<?php

//log out page

session_start();

//remove session and redirect to log In
unset($_SESSION['admin_id']);
header('location:../index.php');
