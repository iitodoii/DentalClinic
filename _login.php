    <?php
    include 'connector.php';
    session_start();
    if (isset($_POST['do_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $conn->query("select * from master_user where username='$username' and password='$password'");

        // $result->status = true;

        $list = array(
            'status'=>true,
        );
        $myJson = json_encode($list);


        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['role'] = $row['role'];
            echo $myJson;
        }
        else {
            $list = array(
                'status'=>false,
            );
            $myJson = json_encode($list);
            echo $myJson;
        }

        // $stmt = $conn->prepare("select * from master_user where username='$username' and password='$password'");
        //one single value with json
        //=====
        // $stmt->execute();
        // $result = $stmt->get_result();
        //=====

            // if($value){
            // $myJson2 = json_encode($value);
            //

        exit();
    }
    else
        // echo "<script>alert 'no';</script>";
        // echo "<h1>No!</h1>";
    ?>
