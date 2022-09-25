<?php
    //connection
    include '../php/connection.php';

    echo  $_GET['vtype'];
    echo  $_POST['link'];

    //data
    if(isset($_POST['link']))
    {
        //print_r($_POST);
        $vtype = $_GET['vtype'];
        $link = $_POST['link'];
        $link = substr($link, strpos($link,"=") + 1);

        $query = "INSERT INTO videos (v_id, v_link, v_index, timestmp, v_type) VALUES ('NULL', '$link', '0', 'current_timestamp()', '$vtype');";
        $query_run = mysqli_query($conn, $query);

        //redirect page
        if($query_run)
        {
            echo '<script> alert("Video successfuly uploaded");</script>';
            if ($vtype == 'm'){
                header('Location: musicvideos.php');
            }
            else{
                if ($vtype == 's'){
                    header('Location: socials.php');
                }
                else{
                    header('Location: home.php');
                }
            }
        }
        else{
            echo '<script> alert("Unable to upload");</script>';
        }
    }
?>