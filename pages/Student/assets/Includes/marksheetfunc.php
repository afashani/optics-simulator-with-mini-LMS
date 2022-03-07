<?php

function viewMarksheets($connection): String
{

    $data="";
    $query= "select *  from marksheetviews ";

    $result = mysqli_query($connection, $query);
    // $resultSet = $connection->query( $query );

    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {

            //title, , marksheetlId
            $title = $row['activity_name'];
            $markshet_id = $row['marksheet_id'];

            $data=$data."  <tr>
                                  
                                    <td>{$title}</td>
                                          
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light align-content-left'
                                                href='../Includes/tuteProcess.php?tutorialId={$markshet_id}'
                                          
                                                >
                                           View
                                           </a>

                                    </td>
                                       
                              
                                
                                
                            </tr>";
        }

    }
    return $data;
}


function viewSingleMarksheet($connection, $tutorialId){
    $file="";
    $query= "select *  from marksheet WHERE marksheet_id={$tutorialId}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $file=$row['tute_file'];


    }
    return $file;
}