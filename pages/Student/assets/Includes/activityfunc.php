<?php

function viewActivity($connection): String
{

    $data="";
    $query= "select *  from activityviews ";

    $result = mysqli_query($connection, $query);
   // $resultSet = $connection->query( $query );

    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {

            //added date, title, deadline, activityid
            $added_date = $row['date'];
            $title = $row['activity_name'];
            $deadline = $row['deadline'];
            $activity_id = $row['activity_id'];
            $marksheet_id=$row['marksheet_id'];

            $data=$data."  <tr>
                                    <td>{$added_date}</td>
                                    <td>{$title}</td>
                                    <td>{$deadline}</td>             
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-success mb-2  text-light '
                                                href='../Pages/activitySubmission.php?activityId={$activity_id}'
                                          
                                                >
                                           Activity
                                           </a>

                                    </td>
                                       <td>
                                        <a
                                                type='submit'
                                                class='btn btn-success mb-2  text-light '
                                                href='../Includes/tuteProcess.php?marksheetId={$marksheet_id}'
                                          
                                                >
                                           Mark Sheet
                                           </a>

                                    </td>"
                .
                "
                                    
                                       
                              
                                
                                
                            </tr>";
        }

    }
    return $data;
}


function viewSingleActivity($connection, $activityId):array{
    $data=[];
    $activityFilePath="../../../../resources/activities/";

    $query= "select *  from activityviews WHERE activity_id={$activityId}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
       $activityFilePath .=$row['activity_fpath'];
        $deadline=$row['deadline'];
        $added_time=$row['added_time'];
        $activityName=$row['activity_name'];

        array_push($data,$activityFilePath);
        array_push($data,$deadline);
        array_push($data,$added_time);
        array_push($data,$activityName);

    }
    return $data;
}

function getAnswerUploadPath($connection, $activityId):string{

    $data="../../../../resources/answerScripts/";


    $query= "select answer_fpath  from activity WHERE activity_id={$activityId}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $data .=$row['answer_fpath'];

    }
    return $data."/";
}

function checkAnswerAvaliblabe($connection ):bool{
    $data=false;
    $std_id= isset($_SESSION['stdId']) ?  $_SESSION['stdId']: 'G120003';

    $query= "select answer_id  from answer WHERE student_id={$std_id}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){

        $data =true;

    }
    return $data;
}

function addAnswerScript($connection,$fileName):bool
{

    $std_id= isset($_SESSION['stdId']) ?  $_SESSION['stdId']: 'G120003';

    //get answer id new
    $answerId='';
    $query1="select answer_id  from answer  ORDER BY `answer_id` DESC LIMIT 1";
    $resul1t=mysqli_query($connection,$query1);

    if(mysqli_num_rows($resul1t) > 0){
        $row = mysqli_fetch_assoc($resul1t);
        $answerId =$row['answer_id'];

    }
    $answerId+=1;

    $data = false;

    //add asnwer script

    $query2 = "INSERT INTO answer (`answer_id`,`file_name`,`student_id`,submission_time) 
    VALUE ({$answerId},'{$fileName}','{$std_id}',now())";



    $result=mysqli_query($connection,$query2);


    if ($result) {

        $data=true;

    }


    return  $data;
}

function getAnswerAddedTIme($connection,$answerID):String{
    $data="";


    $query= "select submission_time  from activityscriptsviews WHERE answer_id={$answerID}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $data =$row['submission_time'];

    }
    return $data;
}
function isOverDue($connection,$activity_id):bool{
    $data=false;


    $query= "select activity_name  from activity WHERE (activity_id={$activity_id} AND deadline < now())";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){

        $data =true;

    }
    return $data;
}
function deleteLastFile($connection, $activity_id):bool{

    $std_id= isset($_SESSION['stdId']) ?  $_SESSION['stdId']: 'G120003';
    $data = false;
    $path= "../../../../resources/answerScripts/";
    $answerPath="";

    $marksheetid='';

    //get marksheet idform activity id
    $query1 = "SELECT `answer_fpath` FROM `activity` WHERE activity_id={$activity_id} LIMIT 1";


    $result1 = mysqli_query($connection, $query1);

    if (mysqli_num_rows($result1) > 0) {


        while ($row = mysqli_fetch_assoc($result1)) {

            $answerPath=$row['answer_fpath'];

        }

    }
    $path.=$answerPath."/";

    //get answer sheet file path
    $query2 = "SELECT `file_name` FROM `answer` WHERE student_id='{$std_id}' LIMIT 1";
    $result2 = mysqli_query($connection, $query2);

    if (mysqli_num_rows($result2) > 0) {


        while ($row = mysqli_fetch_assoc($result2)) {


            $path .=$row['file_name'];

        }

    }

    if(unlink($path)){
        $data=true;
    }


    return  $data;
}

function updateActivity($connection):bool
{
    $data = false;
    $std_id= isset($_SESSION['stdId']) ?  $_SESSION['stdId']: 'G120003';

    //get answer id new
    $answerId='';
    $query = "UPDATE answer SET submission_time=now() WHERE student_id='{$std_id}' ";
    $resul1t=mysqli_query($connection,$query);

    if($resul1t){

        $data = true;
    }


    return $data;


}