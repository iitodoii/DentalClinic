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
                    <h1 class="m-0 text-dark">พิมพ์บัตรผู้ป่วย</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">ประวัติผู้ป่วย</li>
                        <li class="breadcrumb-item active">บัตรผู้ป่วย</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content" style="background-color: white">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <!-- /.card-header -->
        <?php $sql = "SELECT * FROM `master_patient` WHERE patient_id=" . $_GET['id'] . ";";
        $result = $conn->query($sql);
        $myJson2 = json_encode($result);

        ?>

        <?php
        $myArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
        ?>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-xl-6 mt-4" style="margin-bottom:10vh">
                    <div class="content-profile ml-4" id="printCard">
                        <div class="card-profile">
                            <div class="firstinfo"><img src="img/1.png" />
                                <div class="profileinfo">
                                    <h1>Dental Clinic </h1>
                                    <p>รหัสผู้ป่วย : <?php echo $row['patient_id'] ?></p>
                                    <p>ชื่อ <?php echo $row['firstname'] . " " . $row['lastname'] ?></h6>
                                    <p>เบอร์โทร <?php echo $row['phone'] ?></p>
                                    <p>ประวัติการแพ้ยา <?php echo $row['drug_allergy'] ?></p>
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
<?php include '_footer.php'; ?>