<!-- <!DOCTYPE html> -->
<html>
<?php include '_header.php'; ?>

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
    <section class="content">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <div class="row">
            <?php $sql = "SELECT *,year(now())-year(birthdate) as age FROM `master_user` WHERE role='user' ";
            $result = $conn->query($sql);
            $myJson2 = json_encode($result);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-xl-6" style="margin-bottom:10vh">
                        <div class="content-profile ml-4">
                            <div class="card-profile">
                                <div class="firstinfo"><img src=<?php echo "'".$row['img_name']."'"?> />
                                    <div class="profileinfo">
                                        <?php echo "<h1>" . $row['firstname'] . " " . $row['lastname'] ." <span>(".$row['age']. ")</span></h1>".
                                            "<h6 class='truncate-overflow'>" . $row['education'] . "</h6>" .
                                            "<p class=\"bio\"> Address ".$row['address']."</p>".
                                            "<p class=\"bio\"> Tel. ".$row['phone']."</p>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="badgescard">
                                <span class="fas fa-tooth"></span>
                                <span class="fas fa-tooth"></span>
                                <span class="fas fa-tooth"></span>
                                <span class="fas fa-tooth"></span>
                                <span class="fas fa-tooth"></span>
                                <span class="fas fa-tooth"></span>
                                <!-- <span class="fab fa-facebook"></span>
                                <span class="fab fa-twitter"> </span>
                                <span class="fab fa-google-plus"></span>
                                <span class="fab fa-youtube"></span>
                                <span class="fab fa-dribble"></span>
                                <span class="fab fa-google"></span>
                                <span class="fab fa-android"> </span> -->
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>

        </div>
        <?php
        // $myArray = array();

        // $myArray[] = $row;
        // echo "<tr>" .
        //     "<td>" . $row["id"] . "</td>" .
        //     "<td>" . $row["username"] . "</td>" .
        //     "<td class='hidetext'>" . $row["password"] . "</td>" .
        //     "<td>" . $row["firstname"] . "</td>" .
        //     "<td>" . $row["lastname"] . "</td>" .
        //     "<td>" . $row["sex"] . "</td>" .
        //     "<td>" . $row["img_name"] . "</td>" .
        //     "<td>" . $row["question"] . "</td>" .
        //     "<td>" . $row["answer"] . "</td>" .
        //     "<td>" . $row["role"] . "</td>";
        // echo "</tr>";
        // echo "<h1>" . $row["firstname"] . "</h1>";
        // }
        // } else {
        //     echo "0 result";
        // }
        ?>
        <!-- /.card-body -->
    </section>
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

    .content-profile {
        position: relative;
        animation: animatop 0.9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
    }

    .card-profile {
        width: 500px;
        min-height: 100px;
        padding: 20px;
        border-radius: 3px;
        background-color: white;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .card-profile:after {
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
        padding: 5px 0px;
        margin-bottom: 5px;
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

<script type="text/javascript">
    // $(function() {
    // bsCustomFileInput.init();
    // Initial File Input
    var table = null;
    $(document).ready(function() {
        table = $("#tbl_user").DataTable({
            "ordering": true,
            "scrollX": true,
            "responsive": false,
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": true
        });
        table.columns.adjust();
    });
</script>
<?php include '_footer.php'; ?>