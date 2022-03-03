<?php

class Functions
{

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


//get account details
    function vertifyAdmin($connection, $email, $pw): bool
    {

        $status=false;
        $query= "select admin_id from `admin` where email='{$email}' AND password='{$pw}'";

        $result = mysqli_query($connection, $query);


        if(mysqli_num_rows($result) > 0){
            $status=true;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['admin_id']=$row['admin_id'];
        }
        echo $status;
        return $status;
    }

    //get count of student details
    function countOfStudent($connection, $grade): int
    {

        $data=0;
        $query= "select COUNT(class) AS STDCUNT from `student` where `class`='{$grade}' ";

        $result = mysqli_query($connection, $query);


        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            $data=$row['STDCUNT'];
        }

        return $data;
    }

    //get count of activities
    function countOfActivities($connection): int
    {

        $data=0;
        $query= "select COUNT(activity_id) AS CUNT from `activities` ";

        $result = mysqli_query($connection, $query);


        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            $data=$row['CUNT'];
        }

        return $data;
    }

    //get count of tutorials
    function countOfTutorials($connection): int
    {

        $data=0;
        $query= "select COUNT(tutorial_id) AS CUNT from `tutorial` ";

        $result = mysqli_query($connection, $query);


        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            $data=$row['CUNT'];
        }

        return $data;
    }


    function getStudentDetails($connection): Array{

        $std_id=$_SESSION['stdId'];
        $data=[];
        $query= "select *  from student where student.student_id='{$std_id}'";

        $result = mysqli_query($connection, $query);


        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            array_push($data, $row['student_name']);
            array_push($data, $row['email']);
        }

        return $data;


    }

    //get current admin details

    function getSAdminDetails($connection): Array{

        $admin_id=$_SESSION['admin_id'];
        $data=[];
        $query= "select *  from admin where admin_id='{$admin_id}'";

        $result = mysqli_query($connection, $query);


        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            array_push($data, $row['email']);
        }

        return $data;


    }
    //check admin email available
    function checkEmailExists($connection, $email): bool
    {
        $status=false;
        $query= "SELECT admin_id FROM `admin` WHERE email='{$email}'";

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $status=true;
        }
        ;
        return $status;
    }

    //change admin details
    function changeAdminEmail($connection, $email): bool
    {
        $admin_id=$_SESSION['admin_id'];
        $status=false;
        $query= "UPDATE admin
                    SET email = '{$email}'
                    WHERE admin_id = {$admin_id}";

        $result = $connection->query($query);

//        if ($result->num_rows > 0) {
//            $status=true;
//        }
//
//        echo $status;
        return $status;
    }
    function changeAdminPassword($connection, $password): bool
    {
        $admin_id=$_SESSION['admin_id'];
        $status=false;
        $query= "UPDATE admin
                    SET password = '{$password}'
                    WHERE admin_id = {$admin_id}";

        $result = $connection->query($query);

//        if ($result->num_rows > 0) {
//            $status=true;
//        }
//        echo $status;
        return $status;
    }

    function  differnceOfDays($current, $deadline):string{

        $dateDifference = abs(strtotime($current) - strtotime($deadline));
        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
        $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
        $hours   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24-$days * 60 * 60 * 24) / (60*60));
        $minites   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24-$days * 60 * 60 * 24-$hours * 60*60 ) / (60));
        $seconds=floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24-$days * 60 * 60 * 24-$hours * 60*60- $minites * 60  )) ;

        $time_remaning= $years." years,  ";
        if($months <12){
            if($months==0){
                $time_remaning=$days." days";
            }else{
                $time_remaning=$months." months and ".$days." days";
            }

        }elseif ($months >12){
            $time_remaning= $days." days";
        }
        elseif ($days <1){
            $time_remaning= $hours." hours".$minites." minites".$seconds." seconds";
        }elseif ($minites <1){
            $time_remaning= $seconds." seconds";
        }

        return $time_remaning;
    }
}
