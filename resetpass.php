<?php include 'connector.php';

$username = $_POST['username'];
$result = $conn->query("select * from master_user where username='$username'");
$obj = mysqli_fetch_object($result)
// echo 'Password is : ' . $obj->lastname;
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="dist/js/jquery.sweet-modal.min.css" />
    <script src="dist/js/jquery.sweet-modal.min.js"></script>
</head>


<style>
    html * {
        font-family: 'Prompt', sans-serif !important;
    }
</style>

<body>
    <form method="post" action="resetpass.php" onsubmit="return resetpass();">
        <div class="text-center">
            <img style="width: 30%;height:30%" src="img/resetpass.png">
        </div>
        <h2>
            <center>เปลี่ยนรหัสผ่าน</center>
        </h2>

        <div class="text-center">
            <p style="color:white" class="mb-1 pb-1">คำถามเมื่อลืมรหัสผ่าน <?php echo $obj->question ?></p>
            <p style="color:white" class="mb-1 pb-1">คำตอบเมื่อลืมรหัสผ่าน</p>
            <input class="textbox" id="answer" type="answer" placeholder="คำตอบเมื่อลืมรหัสผ่าน"></br>
            <p style="color:white" class="mb-1 pb-1">รหัสผ่านใหม่</p>
            <input class="textbox" id="password" type="password" placeholder="รหัสผ่านใหม่"></br>
            <p style="color:white" class="text-center mb-1 pb-1">รหัสผ่านอีกครั้ง</p>
            <input class="textbox" id="passwordA" type="password" placeholder="รหัสผ่านอีกครั้ง"></br>
            <input class="btn-submit" type="submit" value="เปลี่ยนรหัสผ่าน">
        </div>
    </form>
</body>

<script>
    function resetpass() {
        var answer = $("#answer").val();
        var username = '<?php echo $username; ?>';
        var password = $("#password").val();
        var passwordA = $("#passwordA").val();

        if (password != "" && passwordA != "" && answer != "") {
            if (password != passwordA) {
                $.sweetModal({
                    content: 'รหัสผ่านไม่ตรงกัน',
                    icon: $.sweetModal.ICON_ERROR,
                });
            } else {
                $.ajax({
                    type: 'post',
                    url: '_resetpass.php',
                    data: {
                        answer:answer,
                        username:username,
                        password: password
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status>=0) {
                            $.sweetModal({
                                content: 'เปลี่ยนรหัสผ่านสำเร็จ',
                                icon: $.sweetModal.ICON_SUCCESS,
                                onClose:function(){
                                    window.location.href = "index.php"
                                }
                            });
                        } else {
                            $.sweetModal({
                                content: 'เปลี่ยนรหัสผ่านไม่สำเร็จ:คำตอบไม่ถูกต้อง',
                                icon: $.sweetModal.ICON_ERROR,
                            });
                        }
                    },
                    error:function(e){
                        $.sweetModal({
                                content: 'เปลี่ยนรหัสผ่านไม่สำเร็จ:ฟังค์ชั่นทำงานไม่ถูกต้อง',
                                icon: $.sweetModal.ICON_ERROR,
                            });
                    }
                });
            }
        } else {
            $.sweetModal('กรุณากรอกรายละเอียดให้ครบถ้วน');
        }

        return false;
    }
</script>