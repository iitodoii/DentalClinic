<?php
try {
    include 'connector.php';
    session_start();
    $id = 'no';
    if(isset($_POST['id']) && $_POST['id'] != "")
    {
        $id = $_POST['id'];
    }
    $result = $conn->query("SELECT id ,drug_name as 'text',drug_price FROM master_drug WHERE id = '$id' or '$id' = 'no' ");

    $resultArray = array();
    while($row = $result->fetch_assoc()) {
        array_push($resultArray,$row);
    }
    $list = array(
        'status'=>true,
        'id'=>$id,
        'data'=>$resultArray
    );

    $myJson = json_encode($list);
    echo $myJson;
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