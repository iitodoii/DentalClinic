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
    $cure_count = $_POST['e_cure_count'];
    $cure_total = $_POST['e_cure_total'];

    $drug_id = $_POST['e_drug'];
    $drug_count = $_POST['e_drug_count'];
    $drug_total = $_POST['e_drug_total'];

    // $medicine = $_POST['e_medicine'];
    $net_total = $_POST['e_net_total'];

    $teeth = $_POST['e_teeth'];
    $note = $_POST['e_note'];

    $result = $conn->query("UPDATE `master_medical_history` 
    SET `patient_id`='$patient_id',
    `user_id`='$dentist_id',`cure_id`='$cure_id',
    `date`='$date',`cure_count`='$cure_count',`cure_total`='$cure_total',
    `drug_id`='$drug_id',`drug_count`='$drug_count',
    `drug_total`='$drug_total',`net_total`='$net_total',
    `teeth`='$teeth',`note`='$note' WHERE id = '$id'");

    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows
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
