<?php
    //connection
    include '../php/connection.php';

    //data
    if(isset($_GET['vtype']) && isset($_GET['vid']))
    {
        $mid = $_GET['mid'];

        //$query = "INSERT INTO videos (v_id, v_link, v_index, timestmp, v_type) VALUES ('NULL', '$link', '0', 'current_timestamp()', '$vtype');";
        $query = "DELETE FROM messages WHERE messages.m_id = '$mid';";
        $query_run = mysqli_query($conn, $query);

        //redirect page
        if($query_run)
        {
            echo '<script> alert("Video successfuly deleted");</script>';
            if ($vtype == 'm'){
                header('Location: viewm.php');
            }
            else{
                header('Location: home.php');
            }
        }
        else{
            echo '<script> alert("Unable to delete");</script>';
        }
    }
?>