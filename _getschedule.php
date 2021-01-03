<?php
try {
    include 'connector.php';
    session_start();

    $result = $conn->query("SELECT s.*,
    CONCAT(p.firstname,' ',p.lastname) as patient_name,
    p.phone as patient_phone,
    CONCAT(u.firstname,' ',u.lastname) as dentist_name
    FROM master_schedule s join master_patient p on s.patient_id = p.patient_id JOIN master_user u on s.user_id = u.id");

    // $result->status = true;

    $resultArray = array();
    while($row = $result->fetch_assoc()) {
        array_push($resultArray,$row);
    }
    $list = array(
        'status'=>true,
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


    // }
    // else {
    //     $list = array(
    //         'status'=>false,
    //     );
    //     $myJson = json_encode($list);
    //     echo $myJson;
    // }

    // $stmt = $conn->prepare("select * from master_user where username='$username' and password='$password'");
    //one single value with json
    //=====
    // $stmt->execute();
    // $result = $stmt->get_result();
    //=====

        // if($value){
        // $myJson2 = json_encode($value);
        //

    // echo "<script>alert 'no';</script>";
    // echo "<h1>No!</h1>";
?>