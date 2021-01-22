<?php
    include 'connector.php';
    session_start();

    $result = $conn->query("TRUNCATE master_worktime");

    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows
        );
        $myJson = json_encode($list);
        echo $myJson;
        
    }
    else
    {
        $list = array(
            'status'=>false
        );
        $myJson = json_encode($list);
    }
    exit();
?>
