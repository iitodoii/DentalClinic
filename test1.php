<?php  
include 'connector.php';
    session_start();
        
        $result = $conn->query("select * from master_user");

        // $result->status = true;

        $list = array(
            'status'=>true,
        );
        $myJson = json_encode($list);
        $x = array();


        $_SESSION['name_topic'] = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($_SESSION['name_topic'],$row['username']);
            $count++;
        }
        
        echo $_SESSION ['name_topic'][0];
?>