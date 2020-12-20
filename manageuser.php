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
                    <h1 class="m-0 text-dark">ข้อมูลผู้ใช้ระบบ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item active">จัดการข้อมูลผู้ใช้ระบบ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">จัดการข้อมูลผู้ใช้ระบบ</h3>
            </div>
            <!-- /.card-header -->
            <?php $sql = "SELECT * FROM `master_user`";
            $result = $conn->query($sql);
            $myJson2 = json_encode($result);

            ?>
            <div class="card-body">
                <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-lg">
                    เพิ่มผู้ใช้งาน
                </button>
                <table id="tbl_user" class="table table-bordered table-striped table-hover display nowrap">
                    <thead>
                        <tr>
                            <!-- <th>ชื่อผู้ใช้งาน</th> -->
                            <!-- <th >ชื่อ</th>
                            <th >นามสกุล</th>
                            <th >เพศ</th>
                            <th >ไฟล์รูปภาพ</th>
                            <th >คำถามเมื่อลืมรหัส</th>
                            <th >คำตอบเมื่อลืมรหัส</th>
                            <th >ตำแหน่ง</th>
                            <th >แก้ไข</th>
                            <th >ลบ</th> -->
                            <th class="text-nowrap">รหัสผู้ใช้งาน</th>
                            <th class="text-nowrap">ชื่อผู้ใช้งาน</th>
                            <th class="text-nowrap">รหัสผ่าน</th>
                            <th class="text-nowrap">ชื่อ</th>
                            <th class="text-nowrap">นามสกุล</th>
                            <th class="text-nowrap">เพศ</th>
                            <th class="text-nowrap">ไฟล์รูปภาพ</th>
                            <th class="text-nowrap">คำถามเมื่อลืมรหัส</th>
                            <th class="text-nowrap">คำตอบเมื่อลืมรหัส</th>
                            <th class="text-nowrap">ตำแหน่ง</th>
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
                                    "<td>" . $row["username"] . "</td>" .
                                    "<td class='hidetext'>" . $row["password"] . "</td>" .
                                    "<td>" . $row["firstname"] . "</td>" .
                                    "<td>" . $row["lastname"] . "</td>" .
                                    "<td>" . $row["sex"] . "</td>" .
                                    "<td>" . $row["img_name"] . "</td>" .
                                    "<td>" . $row["question"] . "</td>" .
                                    "<td>" . $row["answer"] . "</td>" .
                                    "<td>" . $row["role"] . "</td>" ;
                                    if($row["username"] == $_SESSION['username'])
                                    {
                                        echo 
                                        "<td>" . "<a href=\"javascript:bindData('" . $row["id"] . "')\" > <i class='fas fa-user-edit'></i> </a> " . "</td>" .
                                        "<td>" . "<p class='text-secondary' > <i class='fas fa-user-minus'></i> </p> " . "</td>" ;
                                    }else
                                    {
                                        echo 
                                        "<td>" . "<a href=\"javascript:bindData('" . $row["id"] . "')\" > <i class='fas fa-user-edit'></i> </a> " . "</td>" .
                                        "<td>" . "<a href=\"javascript:deleteUser('" . $row["username"] . "')\" class='text-danger' > <i class='fas fa-user-minus'></i> </a> " . "</td>";
                                    }
                                    echo "</tr>";
                            }
                        } else {
                            echo "0 result";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-nowrap">รหัสผู้ใช้งาน</th>
                            <th class="text-nowrap">ชื่อผู้ใช้งาน</th>
                            <th class="text-nowrap">รหัสผ่าน</th>
                            <th class="text-nowrap">ชื่อ</th>
                            <th class="text-nowrap">นามสกุล</th>
                            <th class="text-nowrap">เพศ</th>
                            <th class="text-nowrap">ไฟล์รูปภาพ</th>
                            <th class="text-nowrap">คำถามเมื่อลืมรหัส</th>
                            <th class="text-nowrap">คำตอบเมื่อลืมรหัส</th>
                            <th class="text-nowrap">ตำแหน่ง</th>
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
                <h4 class="modal-title">เพิ่มผู้ใช้งาน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='adduserform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-group">
                        <label for="InputUsername">ชื่อผู้ใช้งาน <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" id="InputUsername" placeholder="ชื่อผู้ใช้งาน" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="InputPassword">รหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="InputPassword" placeholder="รหัสผ่าน">
                        </div>
                        <div class="form-group col-6">
                            <label for="InputPasswordConfirm">รหัสผ่านอีกครั้ง <span class="text-danger">*</span></label>
                            <input type="password" name="confirmpassword" class="form-control" id="InputPasswordConfirm" placeholder="รหัสผ่านอีกครั้ง">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="InputFirstname">ชื่อ <span class="text-danger">*</span></label>
                            <input type="text" name="firstname" class="form-control" id="InputFirstname" placeholder="ชื่อ">
                        </div>
                        <div class="form-group col-6">
                            <label for="InputLastname">นามสกุล <span class="text-danger">*</span></label>
                            <input type="text" name="lastname" class="form-control" id="InputLastname" placeholder="นามสกุล">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>เบอร์โทรศัพท์</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name='phone' id='InputPhone' class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group col-6">
                            <label>วันเกิด</label>
                            <div class="input-group date" id="Inputbirthdate" data-target-input="nearest">
                                <input type="text" name='birthdate' class="form-control datetimepicker-input" data-target="#Inputbirthdate" />
                                <div class="input-group-append" data-target="#Inputbirthdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="InputAddress">ที่อยู่ <span class="text-danger">*</span></label>
                            <textarea type="text" name="address" class="form-control" rows="3" id="InputAddress" placeholder="ที่อยู่ ..."></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="InputEducation">ประวัติการศึกษา <span class="text-danger">*</span></label>
                            <textarea type="text" name="eduction" class="form-control" rows="3" id="InputEducation" placeholder="ประวัติการศึกษา ..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleInputFile">ภาพโปรไฟล์</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">เลือกไฟล์</label>
                            </div>
                            < <div class="input-group-append">
                                <span class="input-group-text" id="">อัพโหลด</span>
                            </div> 
                        </div> -->

                        <div class="custom-file">
                            <label for="customFile">ภาพโปรไฟล์</label>
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="InputQuestion">คำถามเมื่อลืมรหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="text" name="question" class="form-control" id="InputQuestion" placeholder="Question">
                        </div>
                        <div class="form-group col-6">
                            <label for="InputAnswer">คำตอบเมื่อลืมรหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="text" name="answer" class="form-control" id="InputAnswer" placeholder="Answer">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="checkboxSex">เพศ</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="male" name="radioSex" checked>
                                <label class="form-check-label">ชาย</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="female" name="radioSex">
                                <label class="form-check-label">หญิง</label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="checkboxRole">ตำแหน่ง</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="user" name="radioRole" checked>
                                <label class="form-check-label">ผู้ใช้งาน</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="admin" name="radioRole">
                                <label class="form-check-label">ผู้ดูแลระบบ</label>
                            </div>
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

<div class="modal fade" id="modal-update" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขผู้ใช้งาน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='edituserform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <!-- disabled -->
                    <div class="form-group d-none">
                        <label for="u_InputId">รหัสผู้ใช้งาน</label>
                        <input type="text" name="u_id" class="form-control" id="u_InputId" placeholder="รหัสผู้ใช้งาน">
                    </div>
                    <div class="form-group">
                        <label for="u_InputUsername">ชื่อผู้ใช้งาน <span class="text-danger">*</span></label>
                        <input type="text" name="u_username" class="form-control" id="u_InputUsername" placeholder="ชื่อผู้ใช้งาน">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="u_InputPassword">รหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="password" name="u_password" class="form-control" id="u_InputPassword" placeholder="รหัสผ่าน">
                        </div>
                        <div class="form-group col-6">
                            <label for="u_InputPasswordConfirm">รหัสผ่านอีกครั้ง <span class="text-danger">*</span></label>
                            <input type="password" name="u_confirmpassword" class="form-control" id="u_InputPasswordConfirm" placeholder="รหัสผ่านอีกครั้ง">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="u_InputFirstname">ชื่อ <span class="text-danger">*</span></label>
                            <input type="text" name="u_firstname" class="form-control" id="u_InputFirstname" placeholder="ชื่อ">
                        </div>
                        <div class="form-group col-6">
                            <label for="u_InputLastname">นามสกุล <span class="text-danger">*</span></label>
                            <input type="text" name="u_lastname" class="form-control" id="u_InputLastname" placeholder="นามสกุล">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>เบอร์โทรศัพท์</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name='u_phone' id='u_InputPhone' class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group col-6">
                            <label>วันเกิด</label>
                            <div class="input-group date" id="u_Inputbirthdate" data-target-input="nearest">
                                <input type="text" name='u_birthdate' class="form-control datetimepicker-input" data-target="#u_Inputbirthdate" />
                                <div class="input-group-append" data-target="#u_Inputbirthdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="u_InputAddress">ที่อยู่ <span class="text-danger">*</span></label>
                            <textarea type="text" name="u_address" class="form-control" rows="3" id="u_InputAddress" placeholder="ที่อยู่ ..."></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="u_InputEducation">ประวัติการศึกษา <span class="text-danger">*</span></label>
                            <textarea type="text" name="u_eduction" class="form-control" rows="3" id="u_InputEducation" placeholder="ประวัติการศึกษา ..."></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputFile">ภาพโปรไฟล์</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">เลือกไฟล์</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">อัพโหลด</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="custom-file">
                            <label for="u_customFile">ภาพโปรไฟล์</label>
                            <input type="file" name="u_image" class="custom-file-input" id="u_customFile">
                            <label class="custom-file-label" for="u_customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="text" name="u_image_name" class="d-none" id="u_image_name" placeholder="Old Name">
                        </div>
                    </div>  
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="u_InputQuestion">คำถามเมื่อลืมรหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="text" name="u_question" class="form-control" id="u_InputQuestion" placeholder="Question">
                        </div>
                        <div class="form-group col-6">
                            <label for="u_InputAnswer">คำตอบเมื่อลืมรหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="text" name="u_answer" class="form-control" id="u_InputAnswer" placeholder="Answer">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="checkboxSex" disabled>เพศ</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="male" name="u_radioSex" checked disabled>
                                <label class="form-check-label">ชาย</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="female" name="u_radioSex" disabled>
                                <label class="form-check-label">หญิง</label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="checkboxRole">ตำแหน่ง</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="user" name="u_radioRole" checked>
                                <label class="form-check-label">ผู้ใช้งาน</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="admin" name="u_radioRole">
                                <label class="form-check-label">ผู้ดูแลระบบ</label>
                            </div>
                        </div>
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

        $.validator.setDefaults({
            submitHandler: function(form) {
                if (form.id == "adduserform") {
                    adduser();
                } else if (form.id == "edituserform") {
                    edituser();
                }
            }
        });
        $('#adduserform').validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirmpassword: {
                    required: true
                },
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                question: {
                    required: true
                },
                answer: {
                    required: true
                },
                image: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Please enter a username"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirmpassword: {
                    required: "Please provide a confirmpassword",
                },
                firstname: {
                    required: "Please enter a firstname",
                },
                lastname: {
                    required: "Please enter a lastname",
                },
                question: {
                    required: "Please enter a question",
                },
                answer: {
                    required: "Please enter a answer",
                },
                image: {
                    required: "Please Choose Your picture file"
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

        $('#edituserform').validate({
            rules: {
                u_username: {
                    required: true
                },
                u_password: {
                    required: true,
                    minlength: 5
                },
                u_confirmpassword: {
                    required: true
                },
                u_firstname: {
                    required: true
                },
                u_lastname: {
                    required: true
                },
                u_question: {
                    required: true
                },
                u_answer: {
                    required: true
                }
            },
            messages: {
                u_username: {
                    required: "Please enter a username"
                },
                u_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                u_confirmpassword: {
                    required: "Please provide a confirmpassword",
                },
                u_firstname: {
                    required: "Please enter a firstname",
                },
                u_lastname: {
                    required: "Please enter a lastname",
                },
                u_question: {
                    required: "Please enter a question",
                },
                u_answer: {
                    required: "Please enter a answer",
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

        // $('#adduserform').on('submit', function(e) {
        //     adduser();
        //     e.preventDefault();

        //     // var form_data = new FormData($('#adduserform')[0]);
        //     // $.ajax({
        //     //     type: 'post',
        //     //     url: '_adduser.php',
        //     //     enctype: 'multipart/form-data',
        //     //     data: form_data,
        //     //     dataType: 'json',
        //     //     success: function(response) {
        //     //         alert('form was submitted');
        //     //     },
        //     //     error:function(e){
        //     //         alert(e.responseText);
        //     //     }
        //     // }).then(()=>{ alert('hello')});

        // });

    });

    function adduser() {
        // var file_data = $('#customFile').prop('files')[0];
        // var form_data = new FormData();
        // var data = getFormData($('#adduserform'));
        // form_data.append('file', file_data);
        // form_data.append('data', data);
        // for (var pair of form_data.entries()) {
        //     console.log(pair[0] + ', ' + pair[1]);
        // }
        // data.file = form_data;
        // var date = moment(data.birthdate, 'DD/MMM/YYYY').format('YYYY/MM/DD');
        // var form_data = new FormData($('#adduserform')[0]);
        // data.birthdate = date;
        // if (data.password == data.confirmpassword) {


        var form_data = new FormData($('#adduserform')[0]);
        if ($('#InputPassword').val() == $('#InputPassword').val()) {
            $.ajax({
                type: 'POST',
                url: '_adduser.php',
                data: form_data,
                // dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        swal("เรียบร้อย เพิ่มข้อมูลเสร็จสิ้น!", {
                            icon: "success"
                        }).then((e) => {
                            $('#modal-lg').modal('hide');
                            window.location.href = "manageuser.php"
                        });
                    } else {
                        swal("เกิดข้อผิดพลาด ที่ฟังค์ชั่น!", {
                            icon: "error",
                        });
                    }
                },
                error: function(e) {

                }
            });
        } else {
            swal("เกิดข้อผิดพลาด รหัสผ่านไม่ตรงกัน!", {
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

    function edituser() {

        // var data = getFormData($('#edituserform'));
        // var date = moment(data.u_birthdate, 'DD/MMM/YYYY').format('YYYY/MM/DD');
        // data.u_birthdate = date;
        var form_data = new FormData($('#edituserform')[0]);
        $.ajax({
            type: 'POST',
            url: '_edituser.php',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status>=0) {
                    swal("เรียบร้อย แก้ไขข้อมูลเสร็จสิ้น!", {
                        icon: "success"
                    }).then((e) => {
                        $('#modal-update').modal('hide');
                        window.location.href = "manageuser.php"
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

    function deleteUser(username) {
        swal({
                title: "แน่ใจหรือไม่ ?",
                text: "คุณต้องการลบข้อมูลของพนักงานคนนี้ใช่หรือไม่ การลบไม่สามารถกู้กลับมาได้!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post', //วิธีการส่ง
                        url: '_deleteuser.php', //หน้าที่จะไป
                        data: {
                            username: username
                        }, //parameter ที่ส่งไป
                        dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                        success: function(response) {
                            if (response.status) {
                                swal("เรียบร้อย ลบข้อมูลเสร็จสิ้น!", {
                                    icon: "success"
                                }).then((e) => {
                                    window.location.href = "manageuser.php"
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
                $('#u_InputId').val(val.id);
                $('#u_InputUsername').val(val.username);
                $('#u_InputPassword').val(val.password);
                $('#u_InputPasswordConfirm').val(val.password);
                $('#u_InputFirstname').val(val.firstname);
                $('#u_InputLastname').val(val.lastname);
                $('#u_InputPhone').val(val.phone);
                // $('#u_customFile').val(val.img_name);
                $('.custom-file-label').text(val.img_name);
                $('#u_image_name').val(val.img_name);
                // $('#u_Inputbirthdate').val(val.birthdate);
                $('#u_Inputbirthdate').datetimepicker('date', moment(val.birthdate));
                $('#u_InputAddress').val(val.address);
                $('#u_InputEducation').val(val.education);
                $('#u_InputQuestion').val(val.question);
                $('#u_InputAnswer').val(val.answer);
                $('input:radio[name="u_radioSex"]').filter('[value="' + val.sex + '"]').attr('checked', true);
                $('input:radio[name="u_radioRole"]').filter('[value="' + val.role + '"]').attr('checked', true);
            }
        });
        //edituserform

        // console.log(id);
    }
</script>
<?php include '_footer.php'; ?>