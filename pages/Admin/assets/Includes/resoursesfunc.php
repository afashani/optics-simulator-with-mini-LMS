<?php

if(!isset($_SESSION)){
    session_start();
}
function viewActivities($connection): String
{

    $data="";
    $query= "select *  from activityviews ";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {

            //added date, title, deadline, activityid
            $id=$row['activity_id'];
            $name = $row['activity_name'];
            $deadline = $row['deadline'];
            $marksheetId = $row['marksheet_id'];


            $data=$data."  <tr >
                                    <td>{$name}</td>
                                    <td class='d-none d-lg-table-cell'>{$deadline}</td>
                                      
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewRes.php?res_type=ac&res_id={$id}'
                                          
                                                >
                                            Acitivity
                                           </a>

                                    </td>
                                    
                                     <td class='d-none d-lg-table-cell'>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewMarksheet.php?res_type=ms&res_id={$id}&mid={$marksheetId}'
                                          
                                                >
                                            Marksheet
                                           </a>

                                    </td>
                                     
                                     <td>
                                        <a
                                                type='submit'
                                                 data-title='Delete'
                                                class='btn btn-danger mb-2 text-light deleteActivity'
                                                href='deleteRes.php?res_type=acdelete&res_id={$id}'
                                    
                                                >
                                            Delete
                                           </a>

                                    </td>
                                    
                                    
                                
                            </tr>";
        }

    }
    return $data;
}

function viewTutorials($connection): String
{

    $data = "";
    $query = "select *  from tutorial ";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            //added date, title, deadline, activityid
            $id = $row['tutorial_id'];
            $name = $row['tutorial_name'];
            $link=$row['tute_fpath'];



            $data = $data . "  <tr >
                                    <td>{$name}</td>
                               
                                      
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='{$link}'
                                                target='_blank'
                                          
                                                >
                                            View
                                           </a>

                                    </td>
                                    
                                  
                                     
                                     <td>
                                        <a
                                                type='submit'
                                                class='btn btn-danger mb-2  text-light deleteTutorials'
                                                href='deleteRes.php?res_type=tutedelete&res_id={$id}'
                                          
                                                >
                                            Delete
                                           </a>

                                    </td>
                                    
                                    
                                
                            </tr>";
        }

    }
    return $data;
}



function viewAnswerScripts($connection,$activityId):String{

    $data = "";
    $query = "SELECT * FROM `activityscriptsviews` WHERE activity_id={$activityId}" ;

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            //added date, title, deadline, activityid
            $id = $row['activity_id'];
            $name = $row['student_name'];
            $upload_time=$row['submission_time'];
            $deadline=$row['deadline'];
            $overdue=$upload_time <= $deadline ? "Not Overdue":"Overdue";
            $student_name=$row['student_name'];



            $data = $data . "  <tr >
                                    <td>{$name}</td>
                                    <td>{$upload_time}</td>
                                     <td class='d-none d-lg-table-cell'>{$overdue}</td>
                                      
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewAnswer.php?res_type=ans&ac_id={$id}&std_name={$student_name}'
                                          
                                                >
                                            View
                                           </a>

                                    </td>
                                    
                                  
                                     
                                    
                                    
                                    
                                
                            </tr>";
        }

    }
    return $data;
}

/**
 * @throws Exception
 */
function getViewActivityDetails($connection, $activity_id):array
{


    $data = [];
    $filepath= "../../../../resources/activities/";
    $query = "SELECT * FROM `activityviews` WHERE activity_id={$activity_id}";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {



            $deadline=$row['deadline'];
            $added_date= $row['added_time'];
            //added_time, deadline, name
            $filepath .=$row['activity_fpath'];
            $fileName=$row['activity_name'];

            array_push($data,$deadline);
            array_push($data,$added_date);;
            array_push($data,$filepath);
            array_push($data,$fileName);
        }

    }

//print_r($data);

    return  $data;
}
function getlastActivities($connection):array
{


    $data = [];
    $query = "SELECT activity_name FROM `activity` ORDER BY activity_id DESC LIMIT 5 ";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            array_push($data,$row['activity_name']);

        }

    }

//print_r($data);

    return  $data;
}

function getlastActivityId($connection):int
{

    $data = 0;
    $query = "SELECT activity_id FROM `activity`  ORDER BY added_time DESC LIMIT 1";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


           $data =(int)$row['activity_id'];

        }

    }

//print_r($data);

echo $data;
    return  $data;
}

function isActivityAvailbale($connection,$activityName):bool
{

    $data = false;
    $query = "SELECT activity_id FROM `activity` WHERE activity_name='{$activityName}'";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

     $data=true;

    }


    return  $data;
}

function addActivity($connection,$name,$fpath,$deadline):bool
{

    $d=strtotime($deadline);
    $deadlineN=date("Y-m-d h:i:sa", $d);

    $ansPath="ans".$name;
    $data = false;
    $query = "INSERT INTO activity (`activity_name`,`activity_fpath`,`deadline`,`answer_fpath`) 
    VALUES ('{$name}','{$fpath}','{$deadlineN}','{$ansPath}')";

    echo $query;
    $result = mysqli_query($connection, $query);


    if ($result) {

        $data=true;

    }


    return  $data;
}

function addActivityAdminId($connection,$id):bool
{
    $adminId= $_SESSION['admin_id'];
    $data = false;
    $query = "INSERT INTO admin_activity (`activity_id`,`admin_id`) 
    VALUE ({$id},{$adminId})";

   // echo $query;
    $result = mysqli_query($connection, $query);


    if ($result) {

    //    echo $result;
        $data=true;

    }


    return  $data;
}

function deleteLastFile($connection, $activityId):bool{

    $data = false;
    $path="";
    $query = "SELECT `activity_fpath` FROM `activity` WHERE activity_id={$activityId} LIMIT 1";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        $path='../../../../resources/activities/';
        while ($row = mysqli_fetch_assoc($result)) {


            $path .=$row['activity_fpath'];

        }

    }

    if(unlink($path)){
        $data=true;
    }


    return  $data;
}

function getActivityFpath($connection,$activityId):string
{

    $data = "";
    $query = "SELECT activity_fpath FROM `activity` WHERE  `activity_id`={$activityId}";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $data =$row['activity_fpath'];

        }

    }


    return  $data;
}

function updateActivity($connection,$id):bool
{

    $data = false;
    $query = "UPDATE activity SET added_time=now() WHERE activity_id={$id}";

    echo $query;
    $result = mysqli_query($connection, $query);


    if ($result) {

        $data=true;

    }


    return  $data;
}
function deleteRes($connection, $type, $id):bool{

    $q1="SELECT `activity_fpath` FROM `activity` WHERE activity_id={$id}";
    $result = mysqli_query($connection, $q1);

    $filePath='../../../../resources/activities/';

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $filePath .=$row['activity_fpath'];

        }

        unlink($filePath);
    }

    if($type=="AC"){
        $query = "DELETE from activity WHERE activity_id={$id} ";
        mysqli_query($connection, $query);
        $query = "DELETE from admin_activity WHERE activity_id={$id} ";
        mysqli_query($connection, $query);
    }else{
        $query = "DELETE from tutorial WHERE tutorial_id='{$id}' ";
        mysqli_query($connection, $query);
    }




    return true;
}

function getlastTuteId($connection):int
{

    $data = 0;
    $query = "SELECT tutorial_id FROM `tutorial`  ORDER BY tutorial_id DESC LIMIT 1";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $data =(int)$row['tutorial_id'];

        }

    }

//print_r($data);

   // echo $data;
    return  $data+1;
}

function addTute($connection,$name,$fpath):bool
{

    $tuteId=0;
    $q="SELECT tutorial_id FROM tutorial ORDER BY `tutorial_id` DESC LIMIT 1";
    $result = mysqli_query($connection, $q);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $tuteId=$row['tutorial_id'];

        }

    }
    $tuteId+=1;

    $data = false;
    $query = "INSERT INTO tutorial (`tutorial_id`,`tutorial_name`,`tute_fpath`) 
    VALUES ({$tuteId},'{$name}','{$fpath}')";

   // echo $query;
    $result = mysqli_query($connection, $query);


    if ($result) {

        $data=true;

    }


    return  $data;
}

function viewMarksheet($connection, $marksheet_id):string
{

    $path = "../../../../resources/marksheets/";
    $query = "SELECT file_name FROM `marksheet`  WHERE marksheet_id={$marksheet_id}";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $path .=$row['file_name'];

        }

    }


    return  $path.".pdf";
}

function getSingleActivityName($connection, $activityId):string
{


    $data = "";
    $query = "SELECT activity_name FROM `activity` WHERE `activity_id`={$activityId} ";


    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $data=$row['activity_name'];

        }

    }

//print_r($data);

    return  $data;
}

function addMarksheet($connection,$activity_id,$marksheetFName):bool
{
    $adminId= $_SESSION['admin_id'];
    $data = false;
    $marksheet_id=0;
    //add marksheet (marksheetid, file name)

    $query1 = "INSERT INTO marksheet (`file_name`) 
    VALUE ('{$marksheetFName}')";

    $q="SELECT marksheet_id FROM marksheet ORDER BY marksheet_id DESC LIMIT 1";
    $result1=mysqli_query($connection,$q);
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $marksheet_id=$row['marksheet_id'];

        }
    }

    $marksheet_id+=1;
    //add admin_marksheet (admin id, marksheet_id)

    $query2 = "INSERT INTO admin_marksheet (`marksheet_id`,`admin_id`) 
    VALUE ({$marksheet_id},{$adminId})";

    //update activity (activity_id, marksheet_id)
    $query3="UPDATE activity SET marksheet_id={$marksheet_id} WHERE activity_id={$activity_id}";

    // echo $query;
    mysqli_query($connection, $query1);
    mysqli_query($connection, $query2);
    $result=mysqli_query($connection,$query3);


    if ($result) {

        $data=true;

    }


    return  $data;
}

//get marksheet path and activity id
function deleteMarksheet($connection,$marksheet_id):bool{

    $data = [];
    //update marksheetId to null in activity
    $query1 = "UPDATE `activity` SET marksheet_id=NULL WHERE marksheet_id={$marksheet_id}";
    mysqli_query($connection, $query1);
    //get marksheet file path
    $query2 = "SELECT file_name FROM `marksheet` WHERE `marksheet_id`={$marksheet_id} ";
    $result = mysqli_query($connection, $query2);
    $marksheetFpath="../../../../resources/marksheets/";


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $marksheetFpath .=$row['file_name'];

        }

    }

    $marksheetFpath .=".pdf";
    //unlink marksheet file

    unlink($marksheetFpath);

    // delete from admin marksheet table
    $query4 = "DELETE FROM `admin_marksheet` WHERE marksheet_id={$marksheet_id} ";
    mysqli_query($connection, $query4);
    //deleet marksheet table data
    $query3 = "DELETE FROM `marksheet` WHERE marksheet_id={$marksheet_id} ";
    mysqli_query($connection, $query3);

    return true;
}


function isMarksheetAvaible($connection, $activityId):bool{

    $data=false;
    $query1 = "SELECT marksheet_id FROM `activity` WHERE `activity_id`={$activityId} ";
    $result = mysqli_query($connection, $query1);



    if (mysqli_num_rows($result) > 0) {

        $data=true;
    }
    return $data;
}

//update due date
function updateDueDate($connection,$activityId,$date):bool{

    $d=strtotime($date);
    $dateFor=date("Y-m-d h:i:sa", $d);

    $query = "UPDATE `activity` SET deadline='{$dateFor}' WHERE activity_id={$activityId}";
    mysqli_query($connection, $query);


   return true;
}

//get answer path
function getanswerPath($connection, $ansId,$std_name):string{

    $std_id= 1;
    //get std_id form name
    $query1 = "SELECT student_id FROM `student` WHERE `student_name`='{$std_name}' ";
    $result = mysqli_query($connection, $query1);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $std_id =$row['student_id'];

        }

    }


    //need answer f path form activity
    $path='../../../../resources/answerScripts/';
    $query1 = "SELECT answer_fpath FROM `activity` WHERE `activity_id`={$ansId} ";
    $result = mysqli_query($connection, $query1);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $path .=$row['answer_fpath'];

        }

    }
    $path.="/";
    //get answer filename
    $query1 = "SELECT file_name FROM `answer` WHERE `student_id`='{$std_id}' ";
    $result = mysqli_query($connection, $query1);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


            $path .=$row['file_name'];

        }

    }
    $path.=".pdf";

    return $path;
}