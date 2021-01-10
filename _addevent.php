<?php
    include 'connector.php';
    session_start();
    $patient_id = $_POST['a_patient_name'];
    $user_id = $_POST['a_dentist_name'];
    $event_name = $_POST['a_title'];
    $tempdate = str_replace('/', '-', $_POST['a_date']);
    $createdate = date('Y/m/d', strtotime($tempdate));
    $datetime_start = date_create($createdate." ".$_POST['a_start']);
    $event_start =  date_format($datetime_start,"Y/m/d H:i");

    $datetime_end = date_create($createdate." ".$_POST['a_end']);
    $event_end =  date_format($datetime_end,"Y/m/d H:i");
    $event_backgroundColor = $_POST['a_backgroundColor'];
    $event_borderColor = $_POST['a_borderColor'];
    $event_isAllDay = $_POST['a_isAllday'];

    // $drug_allergy = $_POST['drug_allergy'];
    // $radioSex = $_POST['radioSex'];

    $result = $conn->query("INSERT INTO `master_schedule`(`patient_id`, `user_id`, `event_name`, 
    `event_start`, `event_end`, `event_backgroundColor`, `event_borderColor`, `event_isAllDay`,`event_url`) 
    VALUES ('$patient_id','$user_id','$event_name',
    '$event_start','$event_end','$event_backgroundColor','$event_borderColor','$event_isAllDay','')");

    if($conn->affected_rows!=null)
    {
        $list = array(
            'status'=>$conn->affected_rows,
            // 'status'=>0,
            // 'start'=>$eventname,
            // 'p_name'=>$patientname
            'dentist'=>$user_id,
            'background'=>$event_backgroundColor,
            'event_start'=>$event_start,
            'event_isAllDay'=>$event_isAllDay,
            'event_end'=>$_POST['a_end']

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
