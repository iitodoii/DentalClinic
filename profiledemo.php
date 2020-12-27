<!-- <!DOCTYPE html> -->
<html>
<?php include '_header.php'; ?>
<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
<?php
if ($_SESSION['role'] != 'admin') {
    echo "<script>
    swal('User can not access!', {
        icon: 'error',
    }).then((e) => {
        window.location.href = '_welcome.php';
    });
    </script>";
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ข้อมูลทันตแพทย์</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">หน้าหลัก</li>
                        <li class="breadcrumb-item active">ข้อมูลทันตแพทย์</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card">
            <div class="firstinfo"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" />
                <div class="profileinfo">
                    <h1>John Doe</h1>
                    <h3>Swift developer</h3>
                    <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                </div>
            </div>
        </div>
        <div class="badgescard">
            <span class="fab fa-facebook"></span>
            <span class="fab fa-twitter"> </span>
            <span class="fab fa-google-plus"></span>
            <span class="fab fa-youtube"></span>
            <span class="fab fa-dribble"></span>
            <span class="fab fa-google"></span>
            <span class="fab fa-android"> </span>
        </div>
    </div>
</div>
<style>
    .modal {
        overflow-y: auto;
    }

    @import "https://fonts.googleapis.com/css?family=Open+Sans:300,400";
    .badgescard,
    .firstinfo {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* *,
    *:before,
    *:after {
        box-sizing: border-box;
    } */

    .content {
        position: relative;
        animation: animatop 0.9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
    }

    .card {
        width: 500px;
        min-height: 100px;
        padding: 20px;
        border-radius: 3px;
        background-color: white;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .card:after {
        content: '';
        display: block;
        width: 190px;
        height: 300px;
        background: cadetblue;
        position: absolute;
        animation: rotatemagic 0.75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both;
    }

    .badgescard {
        padding: 10px 20px;
        border-radius: 3px;
        background-color: #00bcd4;
        color: #fff;
        width: 480px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        position: absolute;
        z-index: -1;
        left: 10px;
        bottom: 10px;
        animation: animainfos 0.5s cubic-bezier(0.425, 1.04, 0.47, 1.105) 0.75s forwards;
    }

    .badgescard span {
        font-size: 1.6em;
        margin: 0px 6px;
        opacity: 0.6;
    }

    .firstinfo {
        flex-direction: row;
        z-index: 2;
        position: relative;
    }

    .firstinfo img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
    }

    .firstinfo .profileinfo {
        padding: 0px 20px;
    }

    .firstinfo .profileinfo h1 {
        font-size: 1.8em;
    }

    .firstinfo .profileinfo h3 {
        font-size: 1.2em;
        color: #00bcd4;
        font-style: italic;
    }

    .firstinfo .profileinfo p.bio {
        padding: 10px 0px;
        color: #5A5A5A;
        line-height: 1.2;
        font-style: initial;
    }

    @keyframes animatop {
        0% {
            opacity: 0;
            bottom: -500px;
        }

        100% {
            opacity: 1;
            bottom: 0px;
        }
    }

    @keyframes animainfos {
        0% {
            bottom: 10px;
        }

        100% {
            bottom: -42px;
        }
    }

    @keyframes rotatemagic {
        0% {
            opacity: 0;
            transform: rotate(0deg);
            top: -24px;
            left: -253px;
        }

        100% {
            transform: rotate(-30deg);
            top: -24px;
            left: -78px;
        }
    }
</style>

<?php include '_footer.php'; ?>