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
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

        </div>
    </div>
    <section class="content">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายการยา</h3>
            </div>
            <table id="tbl_user" class="table table-bordered table-striped table-hover display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-nowrap">รหัสการรักษา</th>
                        <th class="text-nowrap">ชื่อการรักษา</th>
                        <th class="text-nowrap">ราคา</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $sql = "SELECT * FROM `master_cure`";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>" .
                                "<td class='text-center text-success'>" . $row['id'] . "</td>" .
                                "<td class='text-center text-primary'>" . $row['cure_name'] . "</td>" .
                                "<td class='text-center'>" . $row['cure_piece'] . "<span> บาท </span> </td>" .
                                "</tr>";
                        }
                    }

                    ?>
                </tbody>
            </table>

            <!-- /.card-body -->
        </div>
    </section>
</div>

<script type="text/javascript">
    // $(function() {
    // bsCustomFileInput.init();
    // Initial File Input
    var table = null;
    $(document).ready(function() {

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
</script>
<?php include '_footer.php'; ?>