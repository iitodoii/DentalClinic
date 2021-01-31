<?php
    include 'connector.php';
    session_start();
    $worktime = $_POST['e_id'];
    $day_id = $_POST['e_day'];
    $shift = $_POST['e_shift'];
    $dentist_id = $_POST['e_dentist_name'];
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

    $sql_query = "INSERT INTO `master_worktime`(`day_id`, `day_name`, `shift`, `dentist_id`) VALUES ";
    if($shift == 'ทั้งวัน')
    {
        $result = $conn->query("DELETE FROM master_worktime WHERE work_id = '$worktime'");
        $sql_query.="('$day_id','$day_name','เช้า','$dentist_id'),";
        $sql_query.="('$day_id','$day_name','บ่าย','$dentist_id'),";
        $sql_query = substr($sql_query, 0, -1);
        $result = $conn->query($sql_query);
    }

    $result = $conn->query("UPDATE `master_worktime` SET 
    `day_id`='$day_id',`day_name`='$day_name',
    `shift`='$shift',`dentist_id`='$dentist_id'
    WHERE work_id = '$worktime'");

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
        echo $myJson;
    }
    exit();
?>
