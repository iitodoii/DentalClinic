<?php
    include 'connector.php';
    session_start();
    $id = $_POST['u_id'];
    $username = $_POST['u_username'];
    $password = $_POST['u_password'];
    $firstname = $_POST['u_firstname'];
    $lastname = $_POST['u_lastname'];
    $phone = $_POST['u_phone'];
    $address = $_POST['u_address'];
    $education = $_POST['u_eduction'];
    $question = $_POST['u_question'];
    $answer = $_POST['u_answer'];
    $radioRole = $_POST['u_radioRole'];
    $radioSex = $_POST['u_radioSex'];
    $filename = $_POST['u_image_name'];
    if($_FILES['u_image']['name']!=""){
        $tmp_name =  $_FILES['u_image']['tmp_name'];
        move_uploaded_file($tmp_name, $filename);
    }

    $result = $conn->query("UPDATE `master_user` SET `username`='$username',`password`='$password',
    `phone`='$phone',`firstname`='$firstname',`lastname`='$lastname',`address`='$address',`education`='$education',
    `question`='$question',`answer`='$answer',`sex`='$radioSex',`role`='$radioRole' WHERE id = '$id'");

    if($conn->affected_rows>=0) //Row Updated  1 or 0
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