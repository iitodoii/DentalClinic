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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">จัดการตารางงาน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">ทันตแพทย์</li>
                        <li class="breadcrumb-item active">จัดการตารางงาน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ตารางงาน</h3>
            </div>
            <!-- /.card-header -->
            <?php $sql = "SELECT DISTINCT day_id id ,day_name dayname
            ,COALESCE((SELECT GROUP_CONCAT(DISTINCT CONCAT(b.firstname,' ',b.lastname) SEPARATOR ', ') dentist_name from master_worktime a join master_user b on a.dentist_id = b.id WHERE day_id = w.day_id and shift = 'เช้า'),'') as 'morning'
            ,COALESCE((SELECT GROUP_CONCAT(DISTINCT CONCAT(b.firstname,' ',b.lastname) SEPARATOR ', ') dentist_name from master_worktime a join master_user b on a.dentist_id = b.id WHERE day_id = w.day_id and shift = 'บ่าย'),'') as 'afternoon' 
            -- ,COALESCE((SELECT GROUP_CONCAT(DISTINCT CONCAT(b.firstname,' ',b.lastname) SEPARATOR ', ') dentist_name from master_worktime a join master_user b on a.dentist_id = b.id WHERE day_id = w.day_id and shift = 'เย็น'),'') as 'evening' 
            FROM master_worktime w order by day_id";
            $result = $conn->query($sql);
            $myJson2 = json_encode($result);

            ?>
            <div class="card-body">
                <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-lg">
                    เพิ่มตารางงาน
                </button>
                <button type="button" onclick="clearWorktime()" class="btn btn-warning mb-4">
                    ลบตารางงาน
                </button>
                <table id="tbl_user" class="table table-bordered table-striped table-hover display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-nowrap">วัน</th>
                            <th class="text-nowrap">กะเช้า (9:00-16:00)</th>
                            <th class="text-nowrap">กะบ่าย ​(13:00-20:00)</th>
                            <!-- <th class="text-nowrap">กะเย็น ​(16:00-20:00)</th> -->
                            <!-- <th class="text-nowrap">แก้ไข</th>
                            <th class="text-nowrap">ลบ</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // if ($row['id'] == 1) {
                                //     echo "<tr style='background-color:rgba(255, 255, 128,0.5)'>";
                                // } else if ($row['id'] == 2) {
                                //     echo "<tr style='background-color:rgba(255, 204, 255,0.5)'>";
                                // } else if ($row['id'] == 3) {
                                //     echo "<tr style='background-color:rgba(100, 214, 100,0.5)'>";
                                // } else if ($row['id'] == 4) {
                                //     echo "<tr style='background-color:rgba(255, 206, 153,0.5)'>";
                                // } else if ($row['id'] == 5) {
                                //     echo "<tr style='background-color:rgba(179, 230, 255,0.5)'>";
                                // } else if ($row['id'] == 6) {
                                //     echo "<tr style='background-color:rgba(204, 153, 255,0.5)'>";
                                // } else if ($row['id'] == 7) {
                                //     echo "<tr style='background-color:rgba(255, 173, 153,0.5)'>";
                                // }
                                echo
                                    "<tr>" .
                                        "<td>" . $row["dayname"] . "</td>" .
                                        "<td>" . $row["morning"] . "</td>" .
                                        "<td>" . $row["afternoon"] . "</td>" .
                                        // "<td>" . $row["evening"] . "</td>";
                                        // "<td>" . "<a href=\"javascript:bindData('" . $row["id"] . "')\" > <i class='fas fa-user-edit'></i> </a> " . "</td>" .
                                        // "<td>" . "<a href=\"javascript:deletecure('" . $row["id"] . "')\" class='text-danger' > <i class='fas fa-user-minus'></i> </a> " . "</td>" .
                                        "</tr>";
                            }
                        } else {
                            echo "";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-nowrap">วัน</th>
                            <th class="text-nowrap">กะเช้า (9:00-16:00)</th>
                            <th class="text-nowrap">กะบ่าย ​(13:00-20:00)</th>
                            <!-- <th class="text-nowrap">กะเย็น ​(16:00-20:00)</th> -->
                            <!-- <th class="text-nowrap">แก้ไข</th>
                            <th class="text-nowrap">ลบ</th> -->
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">จัดการการเข้างาน</h3>
            </div>
            <!-- /.card-header -->
            <?php $sql = "SELECT w.*,concat(u.firstname,' ',u.lastname) dentist_name FROM master_worktime w join master_user u on w.dentist_id = u.id order by day_id";
            $result = $conn->query($sql);
            $myJson2 = json_encode($result);

            ?>
            <div class="card-body">
                <table id="tbl_work" class="table table-bordered table-striped table-hover display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-nowrap">วัน</th>
                            <th class="text-nowrap">กะเข้างาน</th>
                            <th class="text-nowrap">แพทย์</th>
                            <th class="text-nowrap">แก้ไข</th>
                            <th class="text-nowrap">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $myArray = array();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $myArray[] = $row;
                                echo "<td>" . $row["day_name"] . "</td>" .
                                    "<td>" . $row["shift"] . "</td>" .
                                    "<td>" . $row["dentist_name"] . "</td>" .
                                    "<td>" . "<a href=\"javascript:bindData('" . $row["worktime_id"] . "')\" > <i class='fas fa-user-edit'></i> </a> " . "</td>" .
                                    "<td>" . "<a href=\"javascript:deleteworktime('" . $row["worktime_id"] . "')\" class='text-danger' > <i class='fas fa-user-minus'></i> </a> " . "</td>" .
                                    "</tr>";
                            }
                        } else {
                            echo "";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-nowrap">วัน</th>
                            <th class="text-nowrap">กะ</th>
                            <th class="text-nowrap">แพทย์</th>
                            <th class="text-nowrap">แก้ไข</th>
                            <th class="text-nowrap">ลบ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
</div>
<style>
    .modal {
        overflow-y: auto;
    }
</style>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มตารางงาน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='addworkform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <label for="inputCureName">วันที่เข้างาน <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <label>กะงาน <span class="text-danger">*</span></label>
                                </div>
                            </div>

                            <!-- <select class="form-control a_day" name="a_day" style="width: 100%;">
                                <option value="1">วันจันทร์</option>
                                <option value="2">วันอังคาร</option>
                                <option value="3">วันพุธ</option>
                                <option value="4">วันพฤหัสบดี</option>
                                <option value="5">วันศุกร์</option>
                                <option value="6">วันเสาร์</option>
                                <option value="7">วันอาทิตย์</option>
                            </select> -->
                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="a_monday" name="a_monday" value="วันจันทร์">
                                        <label for="a_monday" class="custom-control-label">วันจันทร์</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <select class="form-control a_monday_shift" name="a_monday_shift" style="width: 50%;height:90%;padding:3px" disabled>
                                        <option value="เช้า">เช้า (9:00-16:00)</option>
                                        <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                        <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="a_tuesday" name="a_tuesday" value="วันอังคาร">
                                        <label for="a_tuesday" class="custom-control-label">วันอังคาร</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <select class="form-control a_tuesday_shift" name="a_tuesday_shift" style="width: 50%;height:90%;padding:3px" disabled>
                                        <option value="เช้า">เช้า (9:00-16:00)</option>
                                        <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                        <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="a_wednesday" name="a_wednesday" value="วันพุธ">
                                        <label for="a_wednesday" class="custom-control-label">วันพุธ</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <select class="form-control a_wednesday_shift" name="a_wednesday_shift" style="width: 50%;height:90%;padding:3px" disabled>
                                        <option value="เช้า">เช้า (9:00-16:00)</option>
                                        <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                        <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="a_thursday" name="a_thursday" value="วันพฤหัสบดี">
                                        <label for="a_thursday" class="custom-control-label">วันพฤหัสบดี</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <select class="form-control a_thursday_shift" name="a_thursday_shift" style="width: 50%;height:90%;padding:3px" disabled>
                                        <option value="เช้า">เช้า (9:00-16:00)</option>
                                        <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                        <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="a_friday" name="a_friday" value="วันศุกร์">
                                        <label for="a_friday" class="custom-control-label">วันศุกร์</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <select class="form-control a_friday_shift" name="a_friday_shift" style="width: 50%;height:90%;padding:3px" disabled>
                                        <option value="เช้า">เช้า (9:00-16:00)</option>
                                        <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                        <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="a_saturday" name="a_saturday" value="วันเสาร์">
                                        <label for="a_saturday" class="custom-control-label">วันเสาร์</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <select class="form-control a_saturday_shift" name="a_saturday_shift" style="width: 50%;height:90%;padding:3px" disabled>
                                        <option value="เช้า">เช้า (9:00-16:00)</option>
                                        <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                        <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="a_sunday" name="a_sunday" value="วันอาทิตย์">
                                        <label for="a_sunday" class="custom-control-label">วันอาทิตย์</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 mb-0">
                                    <select class="form-control a_sunday_shift" name="a_sunday_shift" style="width: 50%;height:90%;padding:3px" disabled>
                                        <option value="เช้า">เช้า (9:00-16:00)</option>
                                        <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                        <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group col-6">
                            <label>กะงาน <span class="text-danger">*</span></label> -->
                        <!-- <select class="form-control a_shift" name="a_shift" style="width: 100%;">
                                <option value="เช้า">เช้า</option>
                                <option value="บ่าย">บ่าย</option>
                                <option value="เย็น">เย็น</option>
                            </select> -->
                        <!-- <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="a_morning" name="a_morning" value="เช้า">
                                <label for="a_morning" class="custom-control-label">เช้า</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="a_afternoon" name="a_afternoon" value="บ่าย">
                                <label for="a_afternoon" class="custom-control-label">บ่าย</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="a_evening" name="a_evening" value="เย็น">
                                <label for="a_evening" class="custom-control-label">เย็น</label>
                            </div> -->
                        <!-- <select class="form-control a_monday_shift" name="a_monday_shift" style="width: 30%;height:10%;padding:3px" disabled>
                                <option value="เช้า">เช้า</option>
                                <option value="บ่าย">บ่าย</option>
                                <option value="ทั้งวัน">ทั้งวัน</option>
                            </select> -->
                        <!-- <select class="form-control a_tuesday_shift" name="a_tuesday_shift" style="width: 30%;height:10%;padding:3px" disabled>
                            <option value="เช้า">เช้า</option>
                            <option value="บ่าย">บ่าย</option>
                            <option value="ทั้งวัน">ทั้งวัน</option>
                        </select>
                        <select class="form-control a_wednesday_shift" name="a_wednesday_shift" style="width: 30%;height:10%;padding:3px" disabled>
                            <option value="เช้า">เช้า</option>
                            <option value="บ่าย">บ่าย</option>
                            <option value="ทั้งวัน">ทั้งวัน</option>
                        </select>
                        <select class="form-control a_thursday_shift" name="a_thursday_shift" style="width: 30%;height:10%;padding:3px" disabled>
                            <option value="เช้า">เช้า</option>
                            <option value="บ่าย">บ่าย</option>
                            <option value="ทั้งวัน">ทั้งวัน</option>
                        </select>
                        <select class="form-control a_friday_shift" name="a_friday_shift" style="width: 30%;height:10%;padding:3px" disabled>
                            <option value="เช้า">เช้า</option>
                            <option value="บ่าย">บ่าย</option>
                            <option value="ทั้งวัน">ทั้งวัน</option>
                        </select>
                        <select class="form-control a_saturday_shift" name="a_saturday_shift" style="width: 30%;height:10%;padding:3px" disabled>
                            <option value="เช้า">เช้า</option>
                            <option value="บ่าย">บ่าย</option>
                            <option value="ทั้งวัน">ทั้งวัน</option>
                        </select>
                        <select class="form-control a_sunday_shift" name="a_sunday_shift" style="width: 30%;height:10%;padding:3px" disabled>
                            <option value="เช้า">เช้า</option>
                            <option value="บ่าย">บ่าย</option>
                            <option value="ทั้งวัน">ทั้งวัน</option>
                        </select> -->
                        <!-- </div>
                    </div> -->
                        <div class="form-group col-12">
                            <label>ชื่อแพทย์ผู้รับผิดชอบ</label>
                            <select class="form-control a_dentist_name" name="a_dentist_name" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">เพิ่ม</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal-dialog -->

<div class="modal fade" id="modal-update">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขตารางงาน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='editworkform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-group d-none">
                        <label for="e_id"></label>
                        <input type="text" name="e_id" class="form-control e_id" id="e_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="inputCureName">วันที่เข้างาน <span class="text-danger">*</span></label>
                            <select class="form-control e_day" name="e_day" style="width: 100%;">
                                <option value="1">วันจันทร์</option>
                                <option value="2">วันอังคาร</option>
                                <option value="3">วันพุธ</option>
                                <option value="4">วันพฤหัสบดี</option>
                                <option value="5">วันศุกร์</option>
                                <option value="6">วันเสาร์</option>
                                <option value="7">วันอาทิตย์</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="inputCurePiece">กะงาน <span class="text-danger">*</span></label>
                            <select class="form-control e_shift" name="e_shift" style="width: 100%;">
                                <option value="เช้า">เช้า (9:00-16:00)</option>
                                <option value="บ่าย">บ่าย (13:00-20:00)</option>
                                <option value="ทั้งวัน">ทั้งวัน (9:00-20:00)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>ชื่อแพทย์ผู้รับผิดชอบ</label>
                        <select class="form-control e_dentist_name" name="e_dentist_name" style="width: 100%;">
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->

<script type="text/javascript">
    // $(function() {
    // bsCustomFileInput.init();
    // Initial File Input
    var table = null;
    var table_work = null;
    $(document).ready(function() {
        getDentist();
        $('[data-mask]').inputmask();
        table = $("#tbl_user").DataTable({
            "ordering": false,
            "scrollX": true,
            "responsive": false,
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": true,
        });
        table_work = $("#tbl_work").DataTable({
            "ordering": false,
            "scrollX": true,
            "responsive": false,
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": true,
        });

        $('#a_monday').change(function() {
            if (this.checked) {
                $(".a_monday_shift").removeAttr("disabled");
            } else {
                $(".a_monday_shift").attr("disabled", "disabled");
            }
        });
        $('#a_tuesday').change(function() {
            if (this.checked) {
                $(".a_tuesday_shift").removeAttr("disabled");
            } else {
                $(".a_tuesday_shift").attr("disabled", "disabled");
            }
        });
        $('#a_wednesday').change(function() {
            if (this.checked) {
                $(".a_wednesday_shift").removeAttr("disabled");
            } else {
                $(".a_wednesday_shift").attr("disabled", "disabled");
            }
        });
        $('#a_thursday').change(function() {
            if (this.checked) {
                $(".a_thursday_shift").removeAttr("disabled");
            } else {
                $(".a_thursday_shift").attr("disabled", "disabled");
            }
        });
        $('#a_friday').change(function() {
            if (this.checked) {
                $(".a_friday_shift").removeAttr("disabled");
            } else {
                $(".a_friday_shift").attr("disabled", "disabled");
            }
        });
        $('#a_saturday').change(function() {
            if (this.checked) {
                $(".a_saturday_shift").removeAttr("disabled");
            } else {
                $(".a_saturday_shift").attr("disabled", "disabled");
            }
        });
        $('#a_sunday').change(function() {
            if (this.checked) {
                $(".a_sunday_shift").removeAttr("disabled");
            } else {
                $(".a_sunday_shift").attr("disabled", "disabled");
            }
        });
        table.columns.adjust();

        $.validator.setDefaults({
            submitHandler: function(form) {
                if (form.id == "addworkform") {
                    addworktime();
                } else if (form.id == "editworkform") {
                    editworktime();
                }
            }
        });
        $('#addworkform').validate({
            rules: {
                curename: {
                    required: true
                },
                curepiece: {
                    required: true
                },
                curehour: {
                    required: true
                },
                curemin: {
                    required: true
                }
            },
            messages: {
                curename: {
                    required: "Please enter a curename",
                },
                curepiece: {
                    required: "Please enter a curepiece",
                },
                curehour: {
                    required: "Please enter a hour",
                },
                curemin: {
                    required: "Please endter a minute",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#editworkform').validate({
            rules: {
                u_curename: {
                    required: true
                },
                u_curepiece: {
                    required: true
                },
                u_curehour: {
                    required: true
                },
                u_curemin: {
                    required: true
                }
            },
            messages: {
                u_curename: {
                    required: "Please enter a curename",
                },
                u_curepiece: {
                    required: "Please enter a curepiece",
                },
                u_curehour: {
                    required: "Please endter a hour",
                },
                u_curemin: {
                    required: "Please endter a minute",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });


    });

    function addworktime() {
        var form_data = new FormData($('#addworkform')[0]);
        $.ajax({
            type: 'POST',
            url: '_addwork.php',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status >= 0) {
                    swal("เรียบร้อย เพิ่มข้อมูลเสร็จสิ้น!", {
                        icon: "success"
                    }).then((e) => {
                        $('#modal-lg').modal('hide');
                        window.location.href = "worktime.php"
                    });
                } else {
                    swal("เกิดข้อผิดพลาด ที่ฟังค์ชั่น!", {
                        icon: "error",
                    });
                }
            },
            error: function(e) {}
        });
    }

    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i) {
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

    function editworktime() {

        // var data = getFormData($('#edituserform'));
        // var date = moment(data.u_birthdate, 'DD/MMM/YYYY').format('YYYY/MM/DD');
        // data.u_birthdate = date;
        var form_data = new FormData($('#editworkform')[0]);
        $.ajax({
            type: 'POST',
            url: '_editwork.php',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status >= 0) {
                    swal("เรียบร้อย แก้ไขข้อมูลเสร็จสิ้น!", {
                        icon: "success"
                    }).then((e) => {
                        $('#modal-update').modal('hide');
                        window.location.href = "worktime.php"
                    });
                } else {
                    swal("เกิดข้อผิดพลาด ในการอัพเดท!", {
                        icon: "error",
                    });
                }
            },
            error: function(e) {
                swal("เกิดข้อผิดพลาด ยังไม่ได้แก้ไขข้อมูล!", {
                    icon: "error",
                });
            }
        });
    }

    function deleteworktime(id) {
        swal({
                title: "แน่ใจหรือไม่ ?",
                text: "คุณต้องการลบข้อมูลของการรักษานี้ใช่หรือไม่ การลบไม่สามารถกู้กลับมาได้!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post', //วิธีการส่ง
                        url: '_deletework.php', //หน้าที่จะไป
                        data: {
                            id: id
                        }, //parameter ที่ส่งไป
                        dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                        success: function(response) {
                            if (response.status >= 0) {
                                swal("เรียบร้อย ลบข้อมูลเสร็จสิ้น!", {
                                    icon: "success"
                                }).then((e) => {
                                    window.location.href = "worktime.php"
                                });
                            } else {
                                swal("เกิดข้อผิดพลาด!", {
                                    icon: "error",
                                });
                            }
                        },
                        error: function(e) {}
                    });
                } else {
                    swal("ปฏิเสธ ข้อมูลของท่านยังไม่ถูกลบ!");
                }
            });
    }

    function bindData(id) {
        var all = <?php echo json_encode($myArray); ?>;
        $('#modal-update').modal('show');
        $.each(all, function(i, val) {
            if (val.worktime_id == id) {
                // $('#u_id').val(val.shift);
                $('.e_id').val(val.worktime_id);
                $('.e_day').val(val.day_id);
                $('.e_shift').val(val.shift);
                $('.e_dentist_name').val(val.dentist_id);
            }
        });
        //edituserform

        // console.log(id);
    }


    function getDentist() {
        $.ajax({
            type: 'post',
            url: '_getDentist.php',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $.each(response.data, function(i, val) {
                        $('.a_dentist_name').append('<option value="' + val.id + '">' + val.text + '</option>')
                        $('.e_dentist_name').append('<option value="' + val.id + '">' + val.text + '</option>')
                    });
                } else {
                    swal("เกิดข้อผิดพลาด!", {
                        icon: "error",
                    });
                }
            },
            error: function(e) {
                swal("เกิดข้อผิดพลาด!", {
                    icon: "error",
                });
            }
        });
    }

    function clearWorktime() {
        swal({
                title: "แน่ใจหรือไม่ ?",
                text: "คุณต้องการลบข้อมูลของเวลาทำงานทั้งหมดใช่หรือไม่ การลบไม่สามารถกู้กลับมาได้!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post', //วิธีการส่ง
                        url: '_clearworktime.php', //หน้าที่จะไป
                        dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                        success: function(response) {
                            if (response.status >= 0) {
                                swal("เรียบร้อย ลบข้อมูลเสร็จสิ้น!", {
                                    icon: "success"
                                }).then((e) => {
                                    window.location.href = "worktime.php"
                                });
                            } else {
                                swal("เกิดข้อผิดพลาด!", {
                                    icon: "error",
                                });
                            }
                        },
                        error: function(e) {}
                    });
                } else {
                    swal("ปฏิเสธ ข้อมูลของท่านยังไม่ถูกลบ!");
                }
            });
    }
</script>
<?php include '_footer.php'; ?>