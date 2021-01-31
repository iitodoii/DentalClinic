<?php
    include 'connector.php';
    session_start();

    $tempdate = str_replace('/', '-', $_POST['a_date']);
    $createdate = date('Y/m/d', strtotime($tempdate));
    $datetime_start = date_create($createdate);
    $date =  date_format($datetime_start,"Y/m/d");
    $dentist_id = $_POST['a_dentist_name'];
    $patient_id = $_POST['a_patient_name'];
    $cure_id = $_POST['a_cure'];
    $teeth = $_POST['a_teeth'];
    $cure_count = $_POST['a_cure_count'];
    $medicine = $_POST['a_medicine'];
    $net_total = $_POST['a_net_total'];

    $result = $conn->query("INSERT INTO `master_medical_history` 
    (`patient_id`, `user_id`, `cure_id`, 
    `date`, `medicine`, `cure_count`, 
    `net_total`,`teeth`) 
    VALUES ('$patient_id','$dentist_id','$cure_id',
    '$date','$medicine','$cure_count',
    '$net_total','$teeth')");

    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows,
            'date'=>$date,
            'dentist_id'=>$dentist_id,
            'patient_id'=>$patient_id,
            'cure_id'=>$cure_id,
            'cure_count'=>$cure_count,
            'medicine'=>$medicine,
            'net_total'=>$net_total
        );
        $myJson = json_encode($list);
        echo $myJson;
        
    }
    else
    {
        $list = array(
            'status'=>-1,
        );
        $myJson = json_encode($list);
        echo $myJson;
    }
    exit();
?>
