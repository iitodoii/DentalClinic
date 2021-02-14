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
                    <h1 class="m-0 text-dark">จัดการรายการยา</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">ผู้ดูแลระบบ</li>
                        <li class="breadcrumb-item active">จัดการรายการยา</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายการยา</h3>
            </div>
            <!-- /.card-header -->
            <?php $sql = "SELECT * FROM `master_drug`";
            $result = $conn->query($sql);
            $myJson2 = json_encode($result);

            ?>
            <div class="card-body">
                <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-lg">
                    เพิ่มรายการยา
                </button>
                <table id="tbl_user" class="table table-bordered table-striped table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-nowrap">รหัสยา</th>
                            <th class="text-nowrap">ชื่อยา</th>
                            <th class="text-nowrap">ราคา</th>
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
                                    "<td>" . $row["drug_name"] . "</td>" .
                                    "<td>" . $row["drug_price"] . ' บาท' . "</td>";
                                echo "<td>" . "<a href=\"javascript:bindData('" . $row["id"] . "')\" > <i class='fas fa-user-edit'></i> </a> " . "</td>" .
                                    "<td>" . "<a href=\"javascript:deletedrug('" . $row["id"] . "')\" class='text-danger' > <i class='fas fa-user-minus'></i> </a> " . "</td>" .
                                    "</tr>";
                            }
                        } else {
                            echo "0 result";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-nowrap">รหัสยา</th>
                            <th class="text-nowrap">ชื่อยา</th>
                            <th class="text-nowrap">ราคา</th>
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
                <h4 class="modal-title">เพิ่มรายการยา</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='adddrugform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="a_drugname">ชื่อยา <span class="text-danger">*</span></label>
                            <input type="text" name="a_drugname" class="form-control" id="a_drugname" placeholder="ชื่อการรักษา">
                        </div>
                        <div class="form-group col-6">
                            <label for="a_drugprice">ราคา <span class="text-danger">*</span></label>
                            <input type="number" name="a_drugprice" class="form-control" id="a_drugprice" placeholder="ราคา">
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
            <form id='editdrugform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-group d-none">
                        <label for="e_id"></label>
                        <input type="text" name="e_id" class="form-control" id="e_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="e_drugname">ชื่อยา <span class="text-danger">*</span></label>
                            <input type="text" name="e_drugname" class="form-control" id="e_drugname" placeholder="ชื่อการรักษา">
                        </div>
                        <div class="form-group col-6">
                            <label for="e_drugprice">ราคา <span class="text-danger">*</span></label>
                            <input type="number" name="e_drugprice" class="form-control" id="e_drugprice" placeholder="ราคา">
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
                if (form.id == "adddrugform") {
                    adddrug();
                } else if (form.id == "editdrugform") {
                    editdrug();
                }
            }
        });
        $('#adddrugform').validate({
            rules: {
                a_drugname: {
                    required: true
                },
                a_drugprice: {
                    required: true
                }
            },
            messages: {
                a_drugname: {
                    required: "Please enter a drug name",
                },
                a_drugprice: {
                    required: "Please enter a drug price",
                }
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

        $('#editdrugform').validate({
            rules: {
                e_drugname: {
                    required: true
                },
                e_drugprice: {
                    required: true
                }
            },
            messages: {
                e_drugname: {
                    required: "Please enter a drug name",
                },
                e_drugprice: {
                    required: "Please enter a drug price",
                }
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

    function adddrug() {
        var form_data = new FormData($('#adddrugform')[0]);
        $.ajax({
            type: 'POST',
            url: '_adddrug.php',
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
                        window.location.href = "managedrug.php"
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

    function editdrug() {

        // var data = getFormData($('#edituserform'));
        // var date = moment(data.u_birthdate, 'DD/MMM/YYYY').format('YYYY/MM/DD');
        // data.u_birthdate = date;
        var form_data = new FormData($('#editdrugform')[0]);
        $.ajax({
            type: 'POST',
            url: '_editdrug.php',
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
                        window.location.href = "managedrug.php"
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

    function deletedrug(id) {
        swal({
                title: "แน่ใจหรือไม่ ?",
                text: "คุณต้องการลบข้อมูลของรายการยานี้ใช่หรือไม่ การลบไม่สามารถกู้กลับมาได้!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post', //วิธีการส่ง
                        url: '_deletedrug.php', //หน้าที่จะไป
                        data: {
                            id: id
                        }, //parameter ที่ส่งไป
                        dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                        success: function(response) {
                            if (response.status) {
                                swal("เรียบร้อย ลบข้อมูลเสร็จสิ้น!", {
                                    icon: "success"
                                }).then((e) => {
                                    window.location.href = "managedrug.php"
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
                $('#e_id').val(val.id);
                $('#e_drugname').val(val.drug_name);
                $('#e_drugprice').val(val.drug_price);

            }
        });
        //edituserform

        // console.log(id);
    }
</script>
<?php include '_footer.php'; ?>