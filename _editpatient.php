<?php
    include 'connector.php';
    session_start();
    $id = $_POST['u_id'];
    $firstname = $_POST['u_firstname'];
    $lastname = $_POST['u_lastname'];
    $phone = $_POST['u_phone'];
    $address = $_POST['u_address'];
    $drug_allergy = $_POST['u_drug_allergy'];
    $radioSex = $_POST['u_radioSex'];

    $result = $conn->query("UPDATE `master_patient` SET `firstname`='$firstname',`lastname`='$lastname',`address`='$address',
    `phone`='$phone',`drug_allergy`='$drug_allergy',`sex`='$radioSex' WHERE patient_id = '$id'");

    if($conn->affected_rows>=0) //Row Updated  1 or 0
    {
        $list = array(
            'status'=>$conn->affected_rows,
            'uid'=>$id
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