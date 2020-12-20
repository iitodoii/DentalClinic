<?php
    include 'connector.php';
    session_start();
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $answer = $_POST['answer'];
        $password = $_POST['password'];
        $result = $conn->query("update master_user SET `password`='$password' WHERE username='$username' AND answer ='$answer'");
        if($conn->affected_rows!=null)
        {
            $list = array(
                'status'=>$conn->affected_rows
                // 'status'=>'hello'
            );
            $myJson = json_encode($list);
            echo $myJson;
        }
        else
        {
            echo 'false';
        }
    
        exit();
    }
    else{
        echo "<script>alert 'no';</script>";
        echo "<h1>No!</h1>";
    }
    ?>
