<!-- <!DOCTYPE html> -->
<html>
<?php include '_header.php'; ?>
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
    <div class="row">
        <div class="col-6">
            <p >ใส่ชื่อของท่าน</p>
            <input type="text" class="form-control" id="inputname" placeholder="ชื่อ">
            <button type="button" class="btn btn-default" onclick="displayname()">กด</button>
            <p class='d_name' id="name">Name display here!</p>
        </div>
    </div>


    <section class="content">

        <div class="row">
        <?php $sql = "SELECT * FROM `master_user` WHERE role='user'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-6'>" . 
                        "<div class='card'>".
                                "<div class='card-body'>".
                                    "<div class='row'>".
                                        "<div class='col-3'>".
                                            "<img src='$row[img_name]' width='100' height='100'>".
                                        "</div>".
                                        "<div class='col-9'>".
                                            "<h2 class='text-danger'>Hello " . $row['firstname'] . " " . $row['lastname'] ."</h2>" .
                                        "</div>".
                                    "</div>".
                                "</div>".
                        "</div>".
                    "</div>";
                }
            }
        ?>
        </div>
    </section>
</div>

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

        $('#text1').text('hello JS');
    });

    function displayname()
    {
        $('#name').text($('#inputname').val());
    }

</script>
<?php include '_footer.php'; ?>