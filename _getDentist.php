<?php
try {
    include 'connector.php';
    session_start();
    $start_time = null;
    $end_time = null;
    $use_date = null;
    if(isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['assign_date']))
    {
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $assign_date = $_POST['assign_date'];
        $tempdate = str_replace('/', '-', $assign_date);
        $createdate = date('Y/m/d', strtotime($tempdate));
        $datetime = date_create($createdate);
        $use_date =  date_format($datetime,"Y/m/d");
        $result = $conn->query("SELECT distinct id, CONCAT(firstname,' ',lastname) as 'text' FROM master_user u JOIN master_worktime w on u.id = w.dentist_id where role = 'user' and
        (
            (w.shift = 'เช้า' and (STR_TO_DATE('$start_time','%H:%i') >= STR_TO_DATE('09:00','%H:%i') and STR_TO_DATE('$end_time','%H:%i') <= STR_TO_DATE('16:00','%H:%i') )) or
            (w.shift = 'บ่าย' and (STR_TO_DATE('$start_time','%H:%i') >= STR_TO_DATE('13:00','%H:%i') and STR_TO_DATE('$end_time','%H:%i') <= STR_TO_DATE('20:00','%H:%i') )) 
        ) and w.day_id = DAYOFWEEK('$use_date')-1 group by id");
    }
    else
    {
        $result = $conn->query("SELECT id,CONCAT(firstname,' ',lastname) as 'text' FROM master_user where role = 'user' ");
    }

    // $result->status = true;

    $resultArray = array();
    while($row = $result->fetch_assoc()) {
        array_push($resultArray,$row);
    }
    $list = array(
        'status'=>true,
        'start_time'=>$start_time,
        'end_time'=>$end_time,
        'usedate'=>$use_date,
        'data'=>$resultArray
    );

    $myJson = json_encode($list);
    echo $myJson;
}
catch (mysqli_sql_exception $e) { // Failed to connect? Lets see the exception details..
    $list = array(
        'status'=>false,
        'errmsg'=>$e->getMessage()
    );
    $myJson = json_encode($list);
    echo $myJson;
}
exit();
$mysqli->close();


    // }
    // else {
    //     $list = array(
    //         'status'=>false,
    //     );
    //     $myJson = json_encode($list);
    //     echo $myJson;
    // }

    // $stmt = $conn->prepare("select * from master_user where username='$username' and password='$password'");
    //one single value with json
    //=====
    // $stmt->execute();
    // $result = $stmt->get_result();
    //=====

        // if($value){
        // $myJson2 = json_encode($value);
        //

    // echo "<script>alert 'no';</script>";
    // echo "<h1>No!</h1>";
?>