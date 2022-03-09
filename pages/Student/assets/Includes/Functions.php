<?php

if(!isset($_SESSION)){
    session_start();
}
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
    public function emailValidator($emailId):bool{
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
    function vertifyStudent($connection, $email, $pw): bool
    {

        $pw=sha1($pw);
        $status=false;
<<<<<<< HEAD
        $query= "select student_id,student_name  from student where student.email='{$email}' AND student.password='{$pw}'";
=======
        $query= "select student_id,student_name  from student where (student.email='{$email}' AND student.password='{$hashedPw}' AND student.confirm=1)";
>>>>>>> 38c5ac3485c2f4da32476610a44de5cae49ed558


        $result = mysqli_query($connection, $query);
        $resultSet = $connection->query( $query );

        if(mysqli_num_rows($result) > 0){
            $status=true;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['stdId']=$row['student_id'];
            $_SESSION['stdname']=$row['student_name'];
        }
        echo $status;
        return $status;
    }

    //get current stdent details

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

    //check student email available
    function checkEmailExists($connection, $email): bool
    {
        $status=false;
        $query= "SELECT student_id FROM student WHERE email='{$email}'";

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $status=true;
        }
;
        return $status;
    }
    //change student details
    function changeStudentName($connection, $name): bool
    {
        $std_id=$_SESSION['stdId'];
        $status=false;
        $query= "UPDATE student
                    SET student_name = '{$name}'
                    WHERE student_id = {$std_id}";

        $result = $connection->query($query);

//        if ($result->num_rows > 0) {
//            $status=true;
//        }
//
//        echo $status;
        return $status;
    }
    //change student details
    function changeStudentEmail($connection, $email): bool
    {
        $std_id=$_SESSION['stdId'];
        $status=false;
        $query= "UPDATE student
                    SET email = '{$email}'
                    WHERE student_id = {$std_id}";

        $result = $connection->query($query);

//        if ($result->num_rows > 0) {
//            $status=true;
//        }
//
//        echo $status;
        return $status;
    }
    function changeStudentPassword($connection, $password): bool
    {
        $password=sha1($password);
        $std_id=$_SESSION['stdId'];
        $status=false;
        $query= "UPDATE student
                    SET password = '{$password}'
                    WHERE student_id = {$std_id}";

        $result = $connection->query($query);

//        if ($result->num_rows > 0) {
//            $status=true;
//        }
//        echo $status;
        return $status;
    }


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
