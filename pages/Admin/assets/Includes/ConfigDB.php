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

        try { $conn=new mysqli($db_servername,$db_username,$db_password,$db_name);}
        catch (PDOException){
            header('Location: http://site2');
        } finally {
            return $conn;
        }


//        $db_selected =$conn->select_db($db_name);;

//        if (!$db_selected) {
//            header("Location:../../../../connectionError.php");
//            echo "here";
//        }

//        if($conn -> connect_error) {
//
//            ob_end_flush();
//            exit;
//
//        }

    }
}