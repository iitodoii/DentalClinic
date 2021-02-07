<?php
    include 'connector.php';
    session_start();
    $dentist_id = $_POST['a_dentist_name'];
    // $shift = $_POST['a_shift'];
    // $day_id = $_POST['a_day'];
    $day = null;
    $shift = null;
    $sql_query = "INSERT INTO `master_worktime`(`day_id`, `day_name`, `shift`, `dentist_id`) VALUES ";
    if(isset($_POST['a_monday'])){
        $day = $_POST['a_monday'];
        if(isset($_POST['a_monday_shift'])){
            $shift = $_POST['a_monday_shift'];
            $sql_query.="('1','$day','$shift','$dentist_id'),";
            
        }
    }
    if(isset($_POST['a_tuesday'])){
        $day = $_POST['a_tuesday'];
        if(isset($_POST['a_tuesday_shift'])){
            $shift = $_POST['a_tuesday_shift'];
            // if($shift == 'ทั้งวัน'){ Example
            //     $sql_query.="('2','$day','เช้า','$dentist_id'),";
            //     $sql_query.="('2','$day','บ่าย','$dentist_id'),";
            // }else{
            //     $sql_query.="('2','$day','$shift','$dentist_id'),";
            // }
            $sql_query.="('2','$day','$shift','$dentist_id'),";
        }
    }
    if(isset($_POST['a_wednesday'])){
        $day = $_POST['a_wednesday'];
        if(isset($_POST['a_wednesday_shift'])){
            $shift = $_POST['a_wednesday_shift'];
            $sql_query.="('3','$day','$shift','$dentist_id'),";
        }
    }
    if(isset($_POST['a_thursday'])){
        $day = $_POST['a_thursday'];
        if(isset($_POST['a_thursday_shift'])){
            $shift = $_POST['a_thursday_shift'];
            $sql_query.="('4','$day','$shift','$dentist_id'),";
        }
    }
    if(isset($_POST['a_friday'])){
        $day = $_POST['a_friday'];
        if(isset($_POST['a_friday_shift'])){
            $shift = $_POST['a_friday_shift'];
            $sql_query.="('5','$day','$shift','$dentist_id'),";
        }
    }
    if(isset($_POST['a_saturday'])){
        $day = $_POST['a_saturday'];
        if(isset($_POST['a_saturday_shift'])){
            $shift = $_POST['a_saturday_shift'];
            $sql_query.="('6','$day','$shift','$dentist_id'),";
        }
    }
    if(isset($_POST['a_sunday'])){
        $day = $_POST['a_sunday'];
        if(isset($_POST['a_sunday_shift'])){
            $shift = $_POST['a_sunday_shift'];
            $sql_query.="('7','$day','$shift','$dentist_id'),";
        }
    }
    // if($day_id == 1){
    //     $day_name = 'วันจันทร์';
    // }else if($day_id == 2){
    //     $day_name = 'วันอังคาร';
    // }else if($day_id == 3){
    //     $day_name = 'วันพุธ';
    // }else if($day_id == 4){
    //     $day_name = 'วันพฤหัส';
    // }else if($day_id == 5){
    //     $day_name = 'วันศุกร์';
    // }else if($day_id == 6){
    //     $day_name = 'วันเสาร์';
    // }else if($day_id == 7){
    //     $day_name = 'วันอาทิตย์';
    // }

            
    // $result = $conn->query("INSERT INTO `master_worktime`(`day_id`, `day_name`, `shift`, `dentist_id`) 
    // VALUES ('$day_id','$day_name','$shift','$dentist_id')");
    $sql_query = substr($sql_query, 0, -1);
    $result = $conn->query($sql_query);
    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows,
            // 'm'=>
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
