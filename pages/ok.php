<?php

require_once 'Student/assets/Includes/ConfigDB.php';
require_once 'Student/assets/Includes/Functions.php';

//session_start();
//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$sql = "UPDATE student SET confirm=1 WHERE email='{$_GET['email']}'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header("Location: login.php");
    exit();
} else {
  echo "Error updating record: " . $conn->error;
}




?>