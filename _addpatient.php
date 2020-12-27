<?php
    include 'connector.php';
    session_start();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $date = str_replace('/', '-', $_POST['birthdate']);
    $newDate = date("Y/m/d", strtotime($date));  
    $birthdate = $newDate;
    $address = $_POST['address'];
    $drug_allergy = $_POST['drug_allergy'];
    $radioSex = $_POST['radioSex'];

    $result = $conn->query("INSERT INTO `master_patient`(`firstname`, `lastname`, `sex`, `birthdate`, 
    `address`, `phone`, `drug_allergy`) 
    VALUES ('$firstname','$lastname','$radioSex',
    '$birthdate','$address','$phone','$drug_allergy')");

    if($conn->affected_rows!=null)
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
    }
    exit();
?>
