<?php
    include 'connector.php';
    session_start();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $result = $conn->query("DELETE FROM `master_cure` WHERE id='$id'");
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
