<?php
    include 'connector.php';
    session_start();
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $result = $conn->query("DELETE FROM `master_user` WHERE username='$username'");
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
