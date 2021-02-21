<!-- <!DOCTYPE html> -->
<html>
<?php include '_header.php'; ?>

<?php
// if ($_SESSION['role'] != 'admin') {
//     echo "<script>
//     swal('User can not access!', {
//         icon: 'error',
//     }).then((e) => {
//         window.location.href = '_welcome.php';
//     });
//     </script>";
// }
$_GET["id"];
?>
<link rel="stylesheet" href="dist/css/printCard.css">

<div class="content-wrapper" style="background-color: white !important">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">พิมพ์ใบนัดหมาย</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">การนัดหมายผู้ป่วย</li>
                        <li class="breadcrumb-item active">ใบนัดหมาย</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content" style="background-color: white">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <!-- /.card-header -->
        <?php $sql = "SELECT s.*,
        CONCAT(p.firstname,' ',p.lastname) as patient_name,
        p.phone as patient_phone,
        CONCAT(u.firstname,' ',u.lastname) as dentist_name,
        c.cure_name as title_name
        FROM master_schedule s join master_patient p on s.patient_id = p.patient_id JOIN master_user u on s.user_id = u.id join master_cure c on c.id = s.event_name  WHERE s.id='" . $_GET['id'] . "';";
        $result = $conn->query($sql);
        $myJson2 = json_encode($result);

        ?>

        <?php
        $myArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
        ?>
                <div class="row">
                    <div class="col-6">
                        <div class="card" id="printevent">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="text-center">ใบนัดหมาย</h3>
                                        <h4 class="text-center">Dental Clinic</h4>
                                        <p style="font-weight: lighter" class="text-center">(tel. 024-484-234)</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-left"><span class="pc" >ชื่อผู้ป่วย</span> <?php echo $row['patient_name'] ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-right"><span class="pc" >เบอร์โทรศัพท์ </span><?php echo $row['patient_phone'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <p class="text-left"><span class="pc" >การนัดรักษา </span><?php echo $row['title_name'] ?></p>
                                    </div>
                                    <div class="col-8">
                                        <p class="text-right"><span class="pc" >วัน/เวลานัด </span><?php echo $row['event_start'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <p class="text-left"><span class="pc" >แพทย์ที่รับผิดชอบ </span><?php echo $row['dentist_name'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="ml-4 disprint" href="javascript:printCard()"> <i class='fas fa-print'></i> Print</a>

        <?php
            }
        }
        ?>
    </section>
</div>
<style>

</style>

<script type="text/javascript">
    // $(function() {
    // bsCustomFileInput.init();
    // Initial File Input
    var table = null;
    $(document).ready(function() {
        $('#Inputbirthdate').datetimepicker({
            format: 'DD/MMM/YYYY',
            maxDate: new Date()
        });
        $('#u_Inputbirthdate').datetimepicker({
            format: 'DD/MMM/YYYY',
            maxDate: new Date()
        });

        $('[data-mask]').inputmask();
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

    function printCard() {
        // var prtContent = document.getElementById("printCard");
        // var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        // WinPrint.document.write('<link rel="stylesheet" href="dist/css/printCard.css">');
        // WinPrint.document.write(prtContent.innerHTML);
        // WinPrint.document.close();
        // WinPrint.focus();
        // WinPrint.open();
        window.print();
        // window.print();
        // $("#printCard").print();
        // WinPrint.close();
    }
</script>

<style>
    @page {
        size: a5;
        margin: 0mm;
        /* margin: 1in; */
    }

    /* @media print{
    body * {
        visibility: hidden;
    }
    .print{
        visibility: visible;
        position: absolute;
        left: 0;
        top:0;
    }
} */

    @media print {
        .disprint {
            display: none
        }

        #printevent {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: 800;
            min-height: 600px;
            box-shadow: initial;
            background: initial;
            /* page-break-after: always; */
        }
    }

    .pc{
        color:#000099 !important;
        font-weight: bold;
    }
</style>
<?php include '_footer.php'; ?>