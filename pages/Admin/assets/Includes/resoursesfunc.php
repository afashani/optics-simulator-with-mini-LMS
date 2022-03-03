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
                                    <td>{$deadline}</td>
                                      
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewRes.php?res_type=ac&res_id={$id}'
                                          
                                                >
                                            Acitivity
                                           </a>

                                    </td>
                                    
                                     <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewRes.php?res_type=ms&res_id={$marksheetId}'
                                          
                                                >
                                            Marksheet
                                           </a>

                                    </td>
                                     
                                     <td>
                                        <a
                                                type='submit'
                                                class='btn btn-danger mb-2  text-light '
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



            $data = $data . "  <tr >
                                    <td>{$name}</td>
                               
                                      
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewRes.php?res_type=tute&res_id={$id}'
                                          
                                                >
                                            View
                                           </a>

                                    </td>
                                    
                                  
                                     
                                     <td>
                                        <a
                                                type='submit'
                                                class='btn btn-danger mb-2  text-light '
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

function deleteRes($connection, $type, $id){

    if($type=="AC"){
        $query = "DELETE from activity WHERE activity_id='{$id}' ";
    }else{
        $query = "DELETE from tutorial WHERE tutorial_id='{$id}' ";
    }


    mysqli_query($connection, $query);


}

function viewAnswerScripts($connection,$activityId):String{

    $data = "";
    $query = "SELECT * FROM `activityscriptsviews` WHERE activity_id={$activityId}" ;

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            //added date, title, deadline, activityid
            $id = $row['answer_id'];
            $name = $row['student_name'];
            $upload_time=$row['submission_time'];
            $deadline=$row['deadline'];
            $overdue=$upload_time <= $deadline ? "Not Overdue":"Overdue";




            $data = $data . "  <tr >
                                    <td>{$name}</td>
                                    <td>{$upload_time}</td>
                                     <td>{$overdue}</td>
                                      
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewAnswer.php?res_type=ans&res_id={$id}'
                                          
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
    $query = "SELECT * FROM `activityviews` WHERE activity_id={$activity_id}";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {



            $deadline=$row['deadline'];
            $added_date= $row['added_time'];
            //added_time, deadline, name
            $fileName=$row['activity_fpath'];


            array_push($data,$deadline);
            array_push($data,$added_date);;
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
    return  $data+1;
}

function isActivityAvailbale($connection,$activityName):int
{

    $data = false;
    $query = "SELECT activity_id FROM `activity` WHERE activity_name='{$activityName}'";

    $result = mysqli_query($connection, $query);


    if (mysqli_num_rows($result) > 0) {

     $data=true;

    }


    return  $data;
}

function addActivity($connection,$id,$name,$fpath,$deadline):bool
{

    $d=strtotime($deadline);
    $deadlineN=date("Y-m-d h:i:sa", $d);

    $ansPath="ans".$name;
    $data = false;
    $query = "INSERT INTO activity (`activity_id`,`activity_name`,`activity_fpath`,`deadline`,`answer_fpath`) 
    VALUES ({$id},'{$name}','{$fpath}','{$deadlineN}','{$ansPath}')";

    echo $query;
    $result = mysqli_query($connection, $query);


    if ($result) {

        $data=true;

    }


    return  $data;
}

function addActivityAdminId($connection,$id,):bool
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

