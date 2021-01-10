<?php
    include 'connector.php';
    session_start();
    $dentist_id = $_POST['a_dentist_name'];
    $shift = $_POST['a_shift'];
    $day_id = $_POST['a_day'];
    $day_name = null;
    if($day_id == 1){
        $day_name = 'วันจันทร์';
    }else if($day_id == 2){
        $day_name = 'วันอังคาร';
    }else if($day_id == 3){
        $day_name = 'วันพุธ';
    }else if($day_id == 4){
        $day_name = 'วันพฤหัส';
    }else if($day_id == 5){
        $day_name = 'วันศุกร์';
    }else if($day_id == 6){
        $day_name = 'วันเสาร์';
    }else if($day_id == 7){
        $day_name = 'วันอาทิตย์';
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
