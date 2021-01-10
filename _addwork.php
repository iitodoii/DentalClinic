<?php
    include 'connector.php';
    session_start();
    $dentist_id = $_POST['a_dentist_name'];
    $shift = $_POST['a_shift'];
    $day_id = $_POST['a_day'];
    $day_name = null;
    if($day_id == 1){
        $day_name = 'Monday';
    }else if($day_id == 2){
        $day_name = 'Tuesday';
    }else if($day_id == 3){
        $day_name = 'Wednesday';
    }else if($day_id == 4){
        $day_name = 'Thursday';
    }else if($day_id == 5){
        $day_name = 'Friday';
    }else if($day_id == 6){
        $day_name = 'Saturday';
    }else if($day_id == 7){
        $day_name = 'Sunday';
    }

            
    $result = $conn->query("INSERT INTO `master_worktime`(`day_id`, `day_name`, `shift`, `dentist_id`) 
    VALUES ('$day_id','$day_name','$shift','$dentist_id')");
    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows,
        );
        $myJson = json_encode($list);
        echo $myJson;   
    }
    else
    {
        $list = array(
            'status'=>false,
        );
        $myJson = json_encode($list);
    }
    exit();
?>
