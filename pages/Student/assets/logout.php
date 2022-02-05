<?php

session_start();
unset($_SESSION['stdId']);
header('location:../../login.php');
