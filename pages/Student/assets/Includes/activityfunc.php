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
                                                class='btn btn-primary mb-2  text-light '
                                                href='../Pages/activitySubmission.php?activityId={$activity_id}'
                                          
                                                >
                                           Activity
                                           </a>

                                    </td>
                                       <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='../Includes/process.php?marksheetId={$marksheet_id}'
                                          
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


function viewSingleActivity($connection, $activityId){
    $file="";
    $query= "select activity_file  from activities WHERE activity_id={$activityId}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
       $file=$row['activity_file'];


    }
    return $file;
}