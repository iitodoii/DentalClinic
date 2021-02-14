<?php
    include 'connector.php';
    session_start();
    $drugid = $_POST['e_id'];
    $drugname = $_POST['e_drugname'];
    $drugprice = $_POST['e_drugprice'];

    $result = $conn->query("UPDATE `master_drug` SET `drug_name`='$drugname',
    `drug_price`='$drugprice' WHERE `id`='$drugid'");

    if($conn->affected_rows>=0)
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
