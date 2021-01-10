<?php
    include 'connector.php';
    session_start();
    $cureid = $_POST['u_id'];
    $curename = $_POST['u_curename'];
    $curepiece = $_POST['u_curepiece'];
    $curehour = $_POST['u_curehour'];
    $curemin = $_POST['u_curemin'];

    $result = $conn->query("UPDATE `master_cure` SET `cure_name`='$curename',
    `cure_piece`='$curepiece',`cure_time_hour`='$curehour',
    `cure_time_minute`='$curemin' WHERE `id`='$cureid'");

    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows,
            'curename'=>$curename,
            'curepiece'=>$curepiece,
            'curehour'=>$curehour,
            'cureminute'=>$curemin,
            'result'=>$result
        );
        $myJson = json_encode($list);
        echo $myJson;
        
    }
    else
    {
        $list = array(
            'status'=>false,
            'curename'=>$curename,
            'curepiece'=>$curepiece,
            'curehour'=>$curehour,
            'cureminute'=>$curemin
        );
        $myJson = json_encode($list);
    }
    exit();
?>
