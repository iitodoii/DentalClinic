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
                    <h1 class="m-0 text-dark">จัดการรายการรักษา</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">ผู้ป่วย</li>
                        <li class="breadcrumb-item active">จัดการรายการรักษา</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายการรักษา</h3>
            </div>
            <!-- /.card-header -->
            <?php $sql = "SELECT * FROM `master_cure`";
            $result = $conn->query($sql);
            $myJson2 = json_encode($result);

            ?>
            <div class="card-body">
                <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-lg">
                    เพิ่มรายการรักษา
                </button>
                <table id="tbl_user" class="table table-bordered table-striped table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-nowrap">รหัสการรักษา</th>
                            <th class="text-nowrap">ชื่อ</th>
                            <th class="text-nowrap">ราคา</th>
                            <th class="text-nowrap">เวลาที่ใช้</th>
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
                                echo "<tr>" .
                                    "<td>" . $row["id"] . "</td>" .
                                    "<td>" . $row["cure_name"] . "</td>" .
                                    "<td>" . $row["cure_piece"] . ' บาท' . "</td>";
                                if ($row["cure_time_hour"] <= 0) {
                                    echo "<td>" . $row['cure_time_minute'] . ' นาที' . "</td>";
                                } else if ($row["cure_time_minute"] <= 0) {
                                    echo "<td>" . $row['cure_time_hour'] . ' ชั่วโมง' . "</td>";
                                } else {
                                    echo "<td>" . $row["cure_time_hour"] . ' ชั่วโมง ' . $row['cure_time_minute'] . ' นาที' . "</td>";
                                }
                                echo "<td>" . "<a href=\"javascript:bindData('" . $row["id"] . "')\" > <i class='fas fa-user-edit'></i> </a> " . "</td>" .
                                    "<td>" . "<a href=\"javascript:deletecure('" . $row["id"] . "')\" class='text-danger' > <i class='fas fa-user-minus'></i> </a> " . "</td>" .
                                    "</tr>";
                            }
                        } else {
                            echo "0 result";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-nowrap">รหัสการรักษา</th>
                            <th class="text-nowrap">ชื่อ</th>
                            <th class="text-nowrap">ราคา</th>
                            <th class="text-nowrap">เวลาที่ใช้</th>
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
                <h4 class="modal-title">เพิ่มรายการรักษา</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='addcureform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="inputCureName">ชื่อการรักษา <span class="text-danger">*</span></label>
                            <input type="text" name="curename" class="form-control" id="inputCureName" placeholder="ชื่อการรักษา">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputCurePiece">ราคา <span class="text-danger">*</span></label>
                            <input type="number" name="curepiece" class="form-control" id="inputCurePiece" placeholder="ราคา">
                        </div>
                    </div>
                    <div class="form-row">
                        <h6>เวลาที่ใช้ในการรักษา</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="inputCureTimeHour">ชั่วโมง<span class="text-danger">*</span></label>
                            <input type="text" name="curehour" class="form-control" id="inputCureTimeHour" step="1" max="24" placeholder="ชั่วโมง">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputCureTimeMinute">นาที <span class="text-danger">*</span></label>
                            <input type="number" name="curemin" class="form-control" id="inputCureTimeMinute" step="30" max="30" placeholder="นาที">
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
                <h4 class="modal-title">แก้ไขรายการรักษา</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='editcureform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-group d-none">
                        <label for="u_id"></label>
                        <input type="text" name="u_id" class="form-control" id="u_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="u_inputCureName">ชื่อการรักษา <span class="text-danger">*</span></label>
                            <input type="text" name="u_curename" class="form-control" id="u_inputCureName" placeholder="ชื่อการรักษา">
                        </div>
                        <div class="form-group col-6">
                            <label for="u_inputCurePiece">ราคา <span class="text-danger">*</span></label>
                            <input type="number" name="u_curepiece" class="form-control" id="u_inputCurePiece" placeholder="ราคา">
                        </div>
                    </div>
                    <div class="form-row">
                        <h6>เวลาที่ใช้ในการรักษา</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="u_inputCureTimeHour">ชั่วโมง<span class="text-danger">*</span></label>
                            <input type="text" name="u_curehour" class="form-control" id="u_inputCureTimeHour" step="1" placeholder="ชั่วโมง">
                        </div>
                        <div class="form-group col-6">
                            <label for="u_inputCureTimeMinute">นาที <span class="text-danger">*</span></label>
                            <input type="number" name="u_curemin" class="form-control" id="u_inputCureTimeMinute" step="30" placeholder="นาที">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-warning">แก้ไข</button>
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

        $.validator.setDefaults({
            submitHandler: function(form) {
                if (form.id == "addcureform") {
                    addcure();
                } else if (form.id == "editcureform") {
                    editcure();
                }
            }
        });
        $('#addcureform').validate({
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

        $('#editcureform').validate({
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

    function addcure() {
        var form_data = new FormData($('#addcureform')[0]);
        if (!($('#inputCureTimeHour').val() == 0 && $('#inputCureTimeMinute').val() == 0)) {
            $.ajax({
                type: 'POST',
                url: '_addcure.php',
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
                            window.location.href = "managecure.php"
                        });
                    } else {
                        swal("เกิดข้อผิดพลาด ที่ฟังค์ชั่น!", {
                            icon: "error",
                        });
                    }
                },
                error: function(e) {}
            });
        } else {
            swal("เกิดข้อผิดพลาด โปรดใส่เวลา!", {
                icon: "error",
            });
        }
    }

    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i) {
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

    function editcure() {

        // var data = getFormData($('#edituserform'));
        // var date = moment(data.u_birthdate, 'DD/MMM/YYYY').format('YYYY/MM/DD');
        // data.u_birthdate = date;
        var form_data = new FormData($('#editcureform')[0]);
        if (!($('#u_inputCureTimeHour').val() == 0 && $('#u_inputCureTimeMinute').val() == 0)) {
            $.ajax({
                type: 'POST',
                url: '_editcure.php',
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
                            window.location.href = "managecure.php"
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
        } else {
            swal("เกิดข้อผิดพลาด โปรดใส่เวลา!", {
                icon: "error",
            });
        }
    }

    function deletecure(id) {
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
                        url: '_deletecure.php', //หน้าที่จะไป
                        data: {
                            id: id
                        }, //parameter ที่ส่งไป
                        dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                        success: function(response) {
                            if (response.status) {
                                swal("เรียบร้อย ลบข้อมูลเสร็จสิ้น!", {
                                    icon: "success"
                                }).then((e) => {
                                    window.location.href = "managecure.php"
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
            if (val.id == id) {
                $('#u_id').val(val.id);
                $('#u_inputCureName').val(val.cure_name);
                $('#u_inputCurePiece').val(val.cure_piece);
                $('#u_inputCureTimeHour').val(val.cure_time_hour);
                $('#u_inputCureTimeMinute').val(val.cure_time_minute);

            }
        });
        //edituserform

        // console.log(id);
    }
</script>
<?php include '_footer.php'; ?>