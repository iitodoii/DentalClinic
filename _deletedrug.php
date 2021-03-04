<?php
    include 'connector.php';
    session_start();
    if (isset($_POST['id'])) { 
        $id = $_POST['id'];
        $sql = "DELETE FROM `master_drug` WHERE id='$id'";
        $result = $conn->query($sql);
        if($conn->affected_rows!=null)
        {
            $list = array(
                'status'=>$conn->affected_rows
            );

            $myJson = json_encode($list);

            echo $myJson;
        }
        else
        {
            echo 'false';
        }
    
        exit();
    }
    else{
        echo 'delete error!';
    }
    ?>
