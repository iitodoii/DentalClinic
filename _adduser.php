<?php
    include 'connector.php';
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $date = str_replace('/', '-', $_POST['birthdate']);
    $newDate = date("Y/m/d", strtotime($date));  
    $birthdate = $newDate;
    //$birthdate = '1999/01/10';
    $address = $_POST['address'];
    $eduction = $_POST['eduction'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $radioSex = $_POST['radioSex'];
    $radioRole = $_POST['radioRole'];

    if(isset($_FILES['image'])){
        // $name_file =  $_FILES['image']['name'];
        $tmp_name =  $_FILES['image']['tmp_name'];
        $locate_img ="img/";
        $filename = $_FILES['image']['name'];
        $temp = explode(".", $filename);
        $extention = end($temp);
        $newfilename =  $username . '.' . end($temp);
        move_uploaded_file($tmp_name, $locate_img . $newfilename);
    }

    $result = $conn->query("INSERT INTO `master_user`(`username`, 
    `password`, `phone`, `firstname`, `lastname`, `address`, `education`, `birthdate`,
    `img_name`, `question`, `answer`, `sex`, `role`) 
    VALUES ('$username','$password','$phone','$firstname','$lastname','$address',
    '$eduction','$birthdate','img/$username.$extention','$question','$answer','$radioSex','$radioRole')");

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
