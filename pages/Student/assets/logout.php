<?php

session_start();
unset($_SESSION['stdId']);
unset($_SESSION['stdname']);
header('location:../../login.php');
