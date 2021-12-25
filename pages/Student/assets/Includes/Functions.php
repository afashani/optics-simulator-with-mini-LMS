<?php

class Functions
{
    private mysqli $conn;

    public function createConnection()
    {
        try {
            $servername = 'localhost';
            $username = 'root';
            $password = 'admin123';
            $this->conn = new mysqli($servername, $username, $password);
            echo "databse connected succesfully";
        } catch (Exception $exception) {
            echo 'Error: ' . $exception->getMessage();
            echo "databse not connected succesfully";

        } finally {

            return $this->conn;

        }
    }

    public function inputSanitizer($data){

        $data =trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);

        return $data;

    }

    //text validator
    public function stringChecker($text):bool{
        $name = $this-> inputSanitizer($text);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            return false;
        }else{
            return true;
        }

    }

    //number validator
    public function numberChecker($number):bool
    {
        $num = $this->inputSanitizer($number);
        if (filter_var($num, FILTER_VALIDATE_INT)) {
            //echo("Variable is an integer");
            return true;
        } else {
           // echo("Variable is not an integer");
            return false;
        }
    }

    //email validator
    public function emailValidator($emailId){
        $email =$this-> inputSanitizer($emailId);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            return false;
        }else{
            return true;
        }
    }


    //length check (if valid falase)
    public function inputLengthChecker($min, $max, $text):bool{

        if(strlen($text) >= $min && strlen($text) <=$max){
            return false;
        }else{
            return true;
        }
    }


    //pagination

    public function paginationStart($limit, $page) :int {

        $start = ($page-1)*$limit;

        return $start;

    }
    public function paginationPages($limit,$rowCount ){

        $pages = ceil($rowCount/$limit);

        return $pages;
    }

    //password encrypt
    function encryptInput( $input ) {
        return( md5($input) );
    }

    function decyptInput( $input ) {

        return( md5($input) );
    }


}