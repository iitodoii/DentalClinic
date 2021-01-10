<?php
    include 'connector.php';
    session_start();
    $curename = $_POST['curename'];
    $curepiece = $_POST['curepiece'];
    $curehour = $_POST['curehour'];
    $curemin = $_POST['curemin'];

    $result = $conn->query("INSERT INTO `master_cure`(`cure_name`, `cure_piece`, `cure_time_hour`, `cure_time_minute`) 
    VALUES ('$curename','$curepiece','$curehour','$curemin') ");
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
