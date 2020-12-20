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
<?php include 'connector.php';
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] != null) {
        header("location: _welcome.php");
    }
}

?>
<style>
    html * {
        font-family: 'Prompt', sans-serif !important;
    }
</style>

<body>
    <form method="post" action="do_login.php" onsubmit="return do_login();">
        <div class="text-center">
            <img style="width: 60%;height:60%" src="img/1.png">
        </div>
        <h2>
            <center>เข้าสู่ระบบ</center>
        </h2>

        <div class="text-center">
            <!-- <div class="row"> -->
            <p style="color:white;float:left" class="mb-1 pb-1">ชื่อผู้ใช้งาน</p><br>
            <!-- </div> -->
            <!-- <div class="row"> -->
            <input class="textbox" id="username" type="usernsme" placeholder="ชื่อผู้ใช้งาน"><br>
            <!-- </div> -->
            <!-- <div class="row"> -->
            <p style="color:white;float:left" class="text-center mb-1 pb-1">รหัสผ่าน</p><br>
            <!-- </div> -->
            <!-- <div class="row"> -->
            <input class="textbox" id="password" type="password" placeholder="รหัสผ่าน"><br>
            <!-- </div> -->
            <!-- <div class="row"> -->
            <a id="link" onclick="forgetpassword()">ลืมรหัสผ่าน</a><br>
            <!-- </div> -->
            <!-- <div class="row"> -->
            <input class="btn-submit" type="submit" value="ลงชื่อเข้าใช้">
            <!-- </div> -->
        </div>
    </form>
</body>

<script>
    function forgetpassword() {
        // $.sweetModal('This is an alert.');
        // $.sweetModal.confirm('Your username for reset password?', function() {

        $.sweetModal.prompt('กรุณากรอกชื่อผู้ใช้งานที่ลืมรหัสผ่าน!', 'ชื่อผู้ใช้งาน', null, function(val) {
            // $.sweetModal('You typed: ' + val);
            $.ajax({
                type: 'post',
                url: '_checkuser.php',
                data: {
                    username: val
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        $.sweetModal({
                            content: ('ขอบคุณสำหรับการยืนยัน!', 'ชื่อผู้ใช้งานถูกต้อง : ' + val),
                            icon: $.sweetModal.ICON_SUCCESS,
                            onClose: function() {
                                post('resetpass.php', {
                                    username: val
                                });
                            }
                        });

                    } else {
                        $.sweetModal({
                            content: 'ชื่อผู้ใช้งานผิดพลาด.',
                            icon: $.sweetModal.ICON_ERROR,
                        });
                    }
                }
            });
        });
        // document.getElementById('myForm').submit();
        // window.location.href = "_sentemail.php";
        // });
    }
    // <form id="myForm" action="Page_C.php" method="post">
    //     echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
    // </form>

    function post(path, params, method = 'post') {

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        const form = document.createElement('form');
        form.method = method;
        form.action = path;

        for (const key in params) {
            if (params.hasOwnProperty(key)) {
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = key;
                hiddenField.value = params[key];

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }


    function do_login() {
        var username = $("#username").val();
        var password = $("#password").val();
        if (username != "" && password != "") {
            $.ajax({
                type: 'post',
                url: '_login.php',
                data: {
                    do_login: "do_login",
                    username: username,
                    password: password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {

                        $.sweetModal({
                            content: ('ยินดีต้อนรับ!'),
                            icon: $.sweetModal.ICON_SUCCESS
                        });
                        setTimeout(() => {
                            window.location.href = "_welcome.php"
                        }, 800)


                    } else {
                        $.sweetModal({
                            content: 'รหัสผ่านหรือชื่อผู้ใช้งานผิดพลาด',
                            icon: $.sweetModal.ICON_ERROR,
                        });
                    }
                }
            });
        } else {
            $.sweetModal({
                content: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                icon: $.sweetModal.ICON_ERROR,
            });
        }

        return false;
    }
</script>