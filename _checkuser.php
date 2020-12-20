<?php
    include 'connector.php';
    session_start();
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $result = $conn->query("select * from master_user where username='$username'");

        // $result->status = true;

        $list = array(
            'status'=>true
        );
        $myJson = json_encode($list);

        if ($row = mysqli_fetch_array($result)) {
            // $_SESSION['username'] = $row['username'];
            echo $myJson;
        }
        else {
            echo 'false';
        }

        exit();
    }
    else{
        echo "<script>alert 'no';</script>";
        echo "<h1>No!</h1>";
    }
    ?>
