<?php
try{
    include 'connector.php';
    session_start();
    $id = $_POST['e_id'];
    $tempdate = str_replace('/', '-', $_POST['e_date']);
    $createdate = date('Y/m/d', strtotime($tempdate));
    $datetime_start = date_create($createdate);
    $date =  date_format($datetime_start,"Y/m/d");
    $dentist_id = $_POST['e_dentist_name'];
    $patient_id = $_POST['e_patient_name'];
    $cure_id = $_POST['e_cure'];
    $teeth = $_POST['e_teeth'];
    $cure_count = $_POST['e_cure_count'];
    $medicine = $_POST['e_medicine'];
    $net_total = $_POST['e_net_total'];

    $result = $conn->query("UPDATE `master_medical_history` 
    SET `patient_id`='$patient_id',
    `user_id`='$dentist_id',`cure_id`='$cure_id',
    `date`='$date',`medicine`='$medicine',
    `cure_count`='$cure_count',`net_total`='$net_total',
    `teeth`='$teeth' WHERE id = '$id'");

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
?>
