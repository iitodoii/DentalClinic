<?php
    include 'connector.php';
    session_start();
    $schedule_id = $_POST['e_id'];
    $patient_id = $_POST['e_patient_name'];
    $user_id = $_POST['e_dentist_name'];
    $event_name = $_POST['e_title'];

    $tempdate = str_replace('/', '-', $_POST['e_date']);
    $createdate = date('Y/m/d', strtotime($tempdate));
    $datetime_start = date_create($createdate." ".$_POST['e_start']);
    $event_start =  date_format($datetime_start,"Y/m/d H:i");

    $datetime_end = date_create($createdate." ".$_POST['e_end']);
    $event_end =  date_format($datetime_end,"Y/m/d H:i");

    $result = $conn->query("UPDATE `master_schedule` SET 
    `patient_id`='$patient_id',`user_id`='$user_id',`event_name`='$event_name',
    `event_start`='$event_start',`event_end`='$event_end'WHERE `id`='$schedule_id'");

    if($conn->affected_rows!=null)
    {
        $list = array(
            'status'=>$conn->affected_rows,
            'patient_id'=>$patient_id,
            'dentist'=>$user_id,
            'event_name'=>$event_name,
            'event_start'=>$event_start,
            'event_end'=>$event_end,
            'schedul_id'=>$schedule_id
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
