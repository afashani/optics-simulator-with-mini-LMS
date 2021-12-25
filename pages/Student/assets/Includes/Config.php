<?php
session_start();

class Config
{
    public ?mysqli $conn=null;

    public function createConnection(): mysqli
    {
        $db_servername='localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name='hikersl';
        $conn=new mysqli($db_servername,$db_username,$db_password,$db_name);

        if($conn -> connect_error) {
            die();
        }
        return $conn;
    }
}