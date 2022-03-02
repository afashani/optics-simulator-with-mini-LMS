<?php
function viewStudent($connection,$grade): String
{

    $data="";
    $query= "select *  from student WHERE class='{$grade}'";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {

            //added date, title, deadline, activityid
            $id=$row['student_id'];
            $name = $row['student_name'];
            $mobile = $row['tele'];
            $email = $row['email'];


            $data=$data."  <tr>
                                    <td>{$name}</td>
                                    <td>{$mobile}</td>
                                    <td>{$email}</td>             
                                    <td>
                                        <a
                                                type='submit'
                                                class='btn btn-primary mb-2  text-light '
                                                href='viewStudent.php?std_id={$id}'
                                          
                                                >
                                           View
                                           </a>

                                    </td>
                                
                            </tr>";
        }

    }
    return $data;
}

//get selected student details

function getSingleStudentDetail($connection,$std_id): Array{


    $data=[];
    $query= "select *  from student where student.student_id='{$std_id}'";

    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);
        array_push($data, $row['student_name']);
        array_push($data, $row['address']);
        array_push($data, $row['tele']);
        array_push($data, $row['class']);
        array_push($data, $row['email']);
    }

    return $data;


}
