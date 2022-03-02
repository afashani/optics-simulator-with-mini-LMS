<?php
function viewActivities($connection): String
{

    $data="";
    $query= "select *  from activity ";

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