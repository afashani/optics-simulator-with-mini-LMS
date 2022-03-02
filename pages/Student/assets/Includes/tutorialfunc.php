<?php

function viewTutorials($connection): String
{

    $data="";
    $query= "select *  from tutorial ";

    $result = mysqli_query($connection, $query);
    // $resultSet = $connection->query( $query );

    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {

            //title, , tutorialId
            $title = $row['tutorial_name'];
            $tutorial_id = $row['tutorial_id'];

            $data=$data."  <tr>
                                  
                                    <td>{$title}</td>
                                          
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light align-content-left'
                                                href='../Includes/process.php?tutorialId={$tutorial_id}'
                                          
                                                >
                                           View
                                           </a>

                                    </td>
                                       
                              
                                
                                
                            </tr>";
        }

    }
    return $data;
}


function viewSingleTutorial($connection, $tutorialId){
    $file="";
    $query= "select tute_file  from tutorial WHERE tutorial_id={$tutorialId}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $file=$row['tute_file'];


    }
    return $file;
}