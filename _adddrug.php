<?php
    include 'connector.php';
    session_start();
    $drugname = $_POST['a_drugname'];
    $drugprice = $_POST['a_drugprice'];

    $result = $conn->query("INSERT INTO `master_drug`(`drug_name`, `drug_price`) 
    VALUES ('$drugname','$drugprice')");


    if($conn->affected_rows>=0)
    {
        $list = array(
            'status'=>$conn->affected_rows,
        );
        $myJson = json_encode($list);
        echo $myJson;
        
    }
    else
    {
        $list = array(
            'status'=>false,
        );
        $myJson = json_encode($list);
    }
    exit();
?>
