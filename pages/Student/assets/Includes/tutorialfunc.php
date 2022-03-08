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
            $tutorial_url = $row['tute_fpath'];

            $data=$data."  <tr>
                                  
                                    <td>{$title}</td>
                                          
                                    <td>
                                        <a
                                                
                                                class='btn btn-info mb-2  text-light align-content-left'
                                                href='$tutorial_url'
                                                target='_blank'
                                          
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
    $query= "select tute_fpath  from tutorial WHERE tutorial_id={$tutorialId}";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $file=$row['tute_file'];


    }
    return $file;
}