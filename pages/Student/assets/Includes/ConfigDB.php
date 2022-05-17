<?php


class ConfigDB
{
    public ?mysqli $conn=null;

    public function createConnection(): mysqli
    {
        $db_servername='localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name='mini_lms';
        $conn=new mysqli($db_servername,$db_username,$db_password,$db_name);

        if($conn -> connect_error) {
            header("Location:../../../../connectionError.php");
            exit();
        }
        return $conn;
    }
}