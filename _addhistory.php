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
    $cure_count = $_POST['a_cure_count'];
    $cure_total = $_POST['a_cure_total'];

    $drug_id = $_POST['a_drug'];
    $drug_count = $_POST['a_drug_count'];
    $drug_total = $_POST['a_drug_total'];

    $net_total = $_POST['a_net_total'];

    $teeth = $_POST['a_teeth'];
    $note = $_POST['a_note'];

    $result = $conn->query("INSERT INTO `master_medical_history`( `patient_id`, `user_id`, `cure_id`,
    `date`, `cure_count`, `net_total`, `teeth`, 
    `cure_total`, `drug_id`, `drug_count`, `drug_total`, `note`) 
    VALUES ('$patient_id','$dentist_id','$cure_id',
    '$date','$cure_count','$net_total','$teeth',
    '$cure_total','$drug_id','$drug_count','$drug_total','$note')");

    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows,
            'date'=>$date,
            'dentist_id'=>$dentist_id,
            'patient_id'=>$patient_id,
            'cure_id'=>$cure_id,
            'cure_count'=>$cure_count,
            'cure_total'=>$cure_total,
            'drug_id'=>$drug_id,
            'drug_count'=>$drug_count,
            'drug_total'=>$drug_total,
            'net_total'=>$net_total,
            'teeth'=>$teeth,
            'note'=>$note
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
