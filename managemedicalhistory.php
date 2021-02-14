<!-- <!DOCTYPE html> -->
<html>
<?php include '_header.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ประวัติการรักษา</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">ผู้ป่วย</li>
                        <li class="breadcrumb-item active">จัดการประวัติการรักษา</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <!-- <h1>ข้อมูลผู้ใช้ระบบ</h1> -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">จัดการประวัติการรักษา</h3>
            </div>
            <!-- /.card-header -->
            <?php $sql = "SELECT MH.*,CONCAT(MP.firstname,' ',MP.lastname) as patient_name,MP.drug_allergy,
                CONCAT(MU.firstname,' ',MU.lastname) dentist_name,
                MC.cure_name,MC.cure_piece,MH.cure_count,MH.net_total,MD.drug_name,MD.drug_price

                FROM `master_medical_history` MH JOIN master_patient MP on MH.patient_id = MP.patient_id 
                JOIN master_user MU on MH.user_id = MU.id
                JOIN master_cure MC on MH.cure_id = MC.id
                JOIN master_drug MD on MH.drug_id = MD.id";
            $result = $conn->query($sql);
            $myJson2 = json_encode($result);

            ?>
            <div class="card-body">
                <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-lg">
                    เพิ่มประวัติการรักษา
                </button>
                <table id="tbl_user" class="table table-bordered table-striped table-hover display nowrap">
                    <thead>
                        <tr>
                            <th class="text-nowrap">รหัสประวัติการรักษา</th>
                            <th class="text-nowrap">รหัสผู้ป่วย</th>
                            <th class="text-nowrap">ชื่อผู้ป่วย</th>
                            <th class="text-nowrap">ฟันที่ได้รับการรักษา</th>
                            
                            <th class="text-nowrap">การรักษา</th>
                            <th class="text-nowrap">ราคาการรักษา</th>
                            <th class="text-nowrap">จำนวนที่รับรักษา</th>

                            <th class="text-nowrap">ยาที่ได้รับ</th>
                            <th class="text-nowrap">จำนวนยา</th>
                            <th class="text-nowrap">ราคายา</th>

                            <th class="text-nowrap">ราคาสุทธิ</th>

                            <th class="text-nowrap">วันที่รับการรักษา</th>
                            <th class="text-nowrap">แพทย์ที่รับผิดชอบ</th>
                            <th class="text-nowrap">ประวัติแพ้ยา</th>
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
                                    "<td>" . $row["patient_id"] . "</td>" .
                                    "<td>" . $row["patient_name"] . "</td>" .
                                    "<td>" . $row["teeth"] . "</td>" .
                                    "<td>" . $row["cure_name"] . "</td>" .
                                    "<td>" . $row["cure_piece"] . "</td>" .
                                    "<td>" . $row["cure_count"] . "</td>" .
                                    "<td>" . $row["drug_name"] . "</td>" .
                                    "<td>" . $row["drug_count"] . "</td>" .
                                    "<td>" . $row["drug_price"] . "</td>" .
                                    "<td>" . $row["net_total"] . "</td>" .
                                    "<td>" . $row["date"] . "</td>" .
                                    "<td>" . $row["dentist_name"] . "</td>" .
                                    "<td>" . $row["drug_allergy"] . "</td>" .
                                    "<td>" . "<a href=\"javascript:bindData('" . $row["id"] . "')\" > <i class='fas fa-user-edit'></i> </a> " . "</td>" .
                                    "<td>" . "<a href=\"javascript:deleteHistory('" . $row["id"] . "')\" class='text-danger' > <i class='fas fa-user-minus'></i> </a> " . "</td>" .
                                    "</tr>";
                            }
                        } else {
                            echo "0 result";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th class="text-nowrap">รหัสประวัติการรักษา</th>
                            <th class="text-nowrap">รหัสผู้ป่วย</th>
                            <th class="text-nowrap">ชื่อผู้ป่วย</th>
                            <th class="text-nowrap">ฟันที่ได้รับการรักษา</th>
                            
                            <th class="text-nowrap">การรักษา</th>
                            <th class="text-nowrap">ราคาการรักษา</th>
                            <th class="text-nowrap">จำนวนที่รับรักษา</th>

                            <th class="text-nowrap">ยาที่ได้รับ</th>
                            <th class="text-nowrap">จำนวนยา</th>
                            <th class="text-nowrap">ราคายา</th>

                            <th class="text-nowrap">ราคาสุทธิ</th>

                            <th class="text-nowrap">วันที่รับการรักษา</th>
                            <th class="text-nowrap">แพทย์ที่รับผิดชอบ</th>
                            <th class="text-nowrap">ประวัติแพ้ยา</th>
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
            <form id='addhistoryform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>วันที่รับการรักษา</label>
                            <div class="input-group date" id="a_date" data-target-input="nearest">
                                <input type="text" name='a_date' class="form-control datetimepicker-input" data-target="#a_date" />
                                <div class="input-group-append" data-target="#a_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>รหัส/ชื่อแพทย์ผู้รับผิดชอบ</label>
                            <select class="form-control a_dentist_name" name="a_dentist_name" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>รหัส/ชื่อ-นามสกุล ผู้ป่วย</label>
                            <select class="a_patient_name" name="a_patient_name" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="a_drug_allergy">ประวัติแพ้ยา </label>
                            <input type="text" name="a_drug_allergy" class="form-control" id="a_drug_allergy" placeholder="ประวัติการแพ้ยา" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <label>รายการรักษา</label>
                            <select class="form-control a_cure" name="a_cure" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="a_cure_piece">ราคา </label>
                            <input type="text" name="a_cure_piece" class="form-control" id="a_cure_piece" placeholder="ราคา" disabled>
                        </div>
                        <div class="form-group col-3">
                            <label for="inputCount">จำนวน</label>
                            <input type="number" name="a_cure_count" class="form-control" id="a_cure_count" placeholder="จำนวนที่รับรักษา" step="1">
                        </div>
                        <div class="form-group col-3">
                            <label for="a_cure_total">ราคาการรักษาสุทธิ</label>
                            <input type="text" name="a_cure_total" class="form-control" id="a_cure_total" placeholder="ค่าใช้จ่ายทั้งหมด" readonly='true'>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-3">
                            <label>รายการยา</label>
                            <select class="form-control a_drug" name="a_drug" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="a_drug_piece">ราคา </label>
                            <input type="text" name="a_drug_piece" class="form-control" id="a_drug_piece" placeholder="ราคา" disabled>
                        </div>
                        <div class="form-group col-3">
                            <label for="a_drug_count">จำนวน</label>
                            <input type="number" name="a_drug_count" class="form-control" id="a_drug_count" placeholder="จำนวนที่รับรักษา" step="1">
                        </div>
                        <div class="form-group col-3">
                            <label for="a_drug_total">ราคายาสุทธิ</label>
                            <input type="text" name="a_drug_total" class="form-control" id="a_drug_total" placeholder="ค่าใช้จ่ายทั้งหมด" readonly='true'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-9">
                        </div>
                        <div class="form-group col-3">
                            <label for="a_net_total">ราคารวมสุทธิ</label>
                            <input type="text" name="a_net_total" class="form-control" id="a_net_total" placeholder="ค่าใช้จ่ายทั้งหมด" readonly='true'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="a_teeth">ฟันซี่ที่รับรักษา</label>
                            <textarea type="text" name="a_teeth" class="form-control" rows="3" id="a_teeth" placeholder="ฟันซี่ที่รับรักษา ..."></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="a_note">หมายเหตุ</label>
                            <textarea type="text" name="a_note" class="form-control" rows="3" id="a_note" placeholder="หมายเหตุ ..."></textarea>
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
            <form id='edithistoryform' style="overflow-y: scroll">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <div class="form-row">
                        <div class="form-group d-none">
                            <label for="e_id">id</label>
                            <input type="text" name="e_id" class="form-control" id="e_id">
                        </div>
                        <div class="form-group col-6">
                            <label>วันที่รับการรักษา</label>
                            <div class="input-group date" id="e_date" data-target-input="nearest">
                                <input type="text" name='e_date' class="form-control datetimepicker-input" data-target="#e_date" />
                                <div class="input-group-append" data-target="#e_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>รหัส/ชื่อแพทย์ผู้รับผิดชอบ</label>
                            <select class="form-control e_dentist_name" name="e_dentist_name" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>รหัส/ชื่อ-นามสกุล ผู้ป่วย</label>
                            <select class="e_patient_name" name="e_patient_name" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="e_drug_allergy">ประวัติแพ้ยา </label>
                            <input type="text" name="e_drug_allergy" class="form-control" id="e_drug_allergy" placeholder="ประวัติการแพ้ยา" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>รายการรักษา</label>
                            <select class="form-control e_cure" name="e_cure" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="a_cure_piece">ราคา </label>
                            <input type="text" name="e_cure_piece" class="form-control" id="e_cure_piece" placeholder="e_cure_piece" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="e_cure_count">จำนวน</label>
                            <input type="number" name="e_cure_count" class="form-control" id="e_cure_count" placeholder="จำนวนที่รับรักษา" step="1">
                        </div>
                        <div class="form-group col-6">
                            <label for="e_cure_total">ราคาสุทธิ</label>
                            <input type="text" name="e_cure_total" class="form-control" id="e_cure_total" readonly='true'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <label>รายการยา</label>
                            <select class="form-control e_drug" name="e_drug" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="e_drug_piece">ราคา </label>
                            <input type="text" name="e_drug_piece" class="form-control" id="e_drug_piece" placeholder="ราคา" disabled>
                        </div>
                        <div class="form-group col-3">
                            <label for="e_drug_count">จำนวน</label>
                            <input type="number" name="e_drug_count" class="form-control" id="e_drug_count" placeholder="จำนวนที่รับรักษา" step="1">
                        </div>
                        <div class="form-group col-3">
                            <label for="e_drug_total">ราคายาสุทธิ</label>
                            <input type="text" name="e_drug_total" class="form-control" id="e_drug_total" placeholder="ค่าใช้จ่ายทั้งหมด" readonly='true'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-9">
                        </div>
                        <div class="form-group col-3">
                            <label for="e_net_total">ราคารวมสุทธิ</label>
                            <input type="text" name="e_net_total" class="form-control" id="e_net_total" placeholder="ค่าใช้จ่ายทั้งหมด" readonly='true'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="e_teeth">ฟันซี่ที่รับรักษา</label>
                            <textarea type="text" name="e_teeth" class="form-control" rows="3" id="e_teeth" placeholder="ฟันซี่ที่รับรักษา ..."></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="e_note">หมายเหตุ</label>
                            <textarea type="text" name="e_note" class="form-control" rows="3" id="e_note" placeholder="หมายเหตุ ..."></textarea>
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
        getPatient().then(() => {
            getDrugAllergy();
            getDrugAllergyEdit();
        });
        getDentist();
        getCure().then(() => {
            getCurePiece();
            getCurePieceEdit();
        });

        getDrug().then(() => {
            getDrugPiece();
            getDrugPieceEdit();
        });

        $('.a_patient_name').select2();
        $('.a_dentist_name').select2();
        $('.e_patient_name').select2();
        $('.e_dentist_name').select2();

        $('.a_patient_name').select2({
            placeholder: "ค้นหาผู้ป่วย",
            allowClear: true
        });
        $('.a_dentist_name').select2({
            placeholder: "ค้นหาแพทย์",
            allowClear: true
        });
        $('.e_patient_name').select2({
            placeholder: "ค้นหาผู้ป่วย",
            allowClear: true
        });
        $('.e_dentist_name').select2({
            placeholder: "ค้นหาแพทย์",
            allowClear: true
        });

        $('.a_patient_name').one('select2:open', function(e) {
            $('input.select2-search__field').prop('placeholder', 'ค้นหาผู้ป่วย');
        });
        $('.a_dentist_name').one('select2:open', function(e) {
            $('input.select2-search__field').prop('placeholder', 'ค้นหาแพทย์');
        });

        $('.e_patient_name').one('select2:open', function(e) {
            $('input.select2-search__field').prop('placeholder', 'ค้นหาผู้ป่วย');
        });
        $('.e_dentist_name').one('select2:open', function(e) {
            $('input.select2-search__field').prop('placeholder', 'ค้นหาแพทย์');
        });

        $('.a_patient_name').change(() => getDrugAllergy())

        $('.e_patient_name').change(() => getDrugAllergyEdit())



        $('.a_cure').change(() => getCurePiece().then(() => {
            $('#a_cure_total').val($('#a_cure_count').val() * $('#a_cure_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        }))
        $('#a_cure_count').change(() => {
            $('#a_cure_total').val($('#a_cure_count').val() * $('#a_cure_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        })

        $('.e_cure').change(() => getCurePieceEdit().then(() => {
            $('#e_cure_total').val($('#e_cure_count').val() * $('#e_cure_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        }))
        $('#e_cure_count').change(() => {
            $('#e_cure_total').val($('#e_cure_count').val() * $('#e_cure_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        })

        $('.a_drug').change(() => getDrugPiece().then(() => {
            $('#a_drug_total').val($('#a_drug_count').val() * $('#a_drug_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        }))
        $('#a_drug_count').change(() => {
            $('#a_drug_total').val($('#a_drug_count').val() * $('#a_drug_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        })

        $('.e_drug').change(() => getDrugPieceEdit().then(() => {
            $('#e_drug_total').val($('#e_drug_count').val() * $('#e_drug_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        }))
        $('#a_drug_count').change(() => {
            $('#e_drug_total').val($('#e_drug_count').val() * $('#e_drug_piece').val());
            let a = parseFloat($('#a_cure_total').val());
            let b = parseFloat($('#a_drug_total').val());
            $('#a_net_total').val(a+b);
            if(isNaN($('#a_net_total').val())){
                $('#a_net_total').val(0);
            }
        })

        var date = new Date();
        $('#a_date').datetimepicker({
            defaultDate: moment(),
            "singleDatePicker": true,
            format: 'DD/MMM/YYYY',
            minDate: date.setDate(date.getDate() - 1)
        });
        $('#e_date').datetimepicker({
            defaultDate: moment(),
            "singleDatePicker": true,
            format: 'DD/MMM/YYYY',
            minDate: date.setDate(date.getDate() - 1)
        });

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
                if (form.id == "addhistoryform") {
                    addhistory();
                } else if (form.id == "edithistoryform") {
                    editHistory();
                }
            }
        });
        $('#addhistoryform').validate({
            rules: {

            },
            messages: {

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

        $('#edithistoryform').validate({
            rules: {

            },
            messages: {

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

    function getDentist(data) {
        $.ajax({
            type: 'post',
            url: '_getDentist.php',
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('.a_dentist_name').empty();
                    $('.e_dentist_name').empty();
                    $('.a_dentist_name').append('<option></option>');
                    $('.e_dentist_name').append('<option></option>');
                    $.each(response.data, function(i, val) {
                        $('.a_dentist_name').append('<option value="' + val.id + '">' + val.id + ' : ' + val.text + '</option>')
                        $('.e_dentist_name').append('<option value="' + val.id + '">' + val.id + ' : ' + val.text + '</option>')
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

    function getPatient() {
        return $.ajax({
            type: 'post',
            url: '_getPatient.php',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('.a_patient_name').append('<option></option>');
                    $('.e_patient_name').append('<option></option>');
                    $.each(response.data, function(i, val) {
                        $('.a_patient_name').append('<option value="' + val.id + '">' + val.id + ' : ' + val.text + '</option>')
                        $('.e_patient_name').append('<option value="' + val.id + '">' + val.id + ' : ' + val.text + '</option>')
                    });
                } else {
                    swal("เกิดข้อผิดพลาด :" + response.errmsg, {
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


    function getDrugAllergy() {
        $.ajax({
            type: 'post',
            url: '_getPatient.php',
            dataType: 'json',
            data: {
                id: $('.a_patient_name').val()
            },
            success: function(response) {
                if (response.status) {
                    if (response.data.length != 0)
                        $('#a_drug_allergy').val(response.data[0].drug_allergy)
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

    function getDrugAllergyEdit() {
        $.ajax({
            type: 'post',
            url: '_getPatient.php',
            dataType: 'json',
            data: {
                id: $('.e_patient_name').val()
            },
            success: function(response) {
                if (response.status) {
                    if (response.data.length != 0)
                        $('#e_drug_allergy').val(response.data[0].drug_allergy)
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

    function getCure() {
        var id = $('.a_cure').val();
        return $.ajax({
            type: 'post',
            url: '_getCure.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $.each(response.data, function(i, val) {
                        $('.a_cure').append('<option value="' + val.id + '">' + val.text + '</option>')
                        $('.e_cure').append('<option value="' + val.id + '">' + val.text + '</option>')
                    });
                } else {
                    swal("เกิดข้อผิดพลาด :" + response.errmsg, {
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

    function getDrug() {
        var id = $('.a_drug').val();
        return $.ajax({
            type: 'post',
            url: '_getDrug.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('.a_drug').append('<option value="0">-</option>');
                    $('.e_drug').append('<option value="0">-</option>');
                    $.each(response.data, function(i, val) {
                        $('.a_drug').append('<option value="' + val.id + '">' + val.text + '</option>')
                        $('.e_drug').append('<option value="' + val.id + '">' + val.text + '</option>')
                    });
                } else {
                    swal("เกิดข้อผิดพลาด :" + response.errmsg, {
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

    function getCurePiece() {
        var id = $('.a_cure').val();
        return $.ajax({
            type: 'post',
            url: '_getCure.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    if(response.data.length != 0)
                        $('#a_cure_piece').val(response.data[0].cure_piece)
                } else {
                    swal("เกิดข้อผิดพลาด :" + response.errmsg, {
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

    function getDrugPiece() {
        var id = $('.a_drug').val();
        return $.ajax({
            type: 'post',
            url: '_getDrug.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    if(response.data.length != 0)
                        $('#a_drug_piece').val(response.data[0].drug_price)
                } else {
                    swal("เกิดข้อผิดพลาด :" + response.errmsg, {
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

    function getCurePieceEdit() {
        var id = $('.e_cure').val();
        return $.ajax({
            type: 'post',
            url: '_getCure.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    if(response.data.length != 0)
                        $('#e_cure_piece').val(response.data[0].cure_piece)
                } else {
                    swal("เกิดข้อผิดพลาด :" + response.errmsg, {
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
    function getDrugPieceEdit() {
        var id = $('.e_drug').val();
        return $.ajax({
            type: 'post',
            url: '_getDrug.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    if(response.data.length !=0 )
                        $('#e_drug_piece').val(response.data[0].drug_price)
                } else {
                    swal("เกิดข้อผิดพลาด :" + response.errmsg, {
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

    function addhistory() {
        var form_data = new FormData($('#addhistoryform')[0]);
        $.ajax({
            type: 'POST',
            url: '_addhistory.php',
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
                        window.location.href = "managemedicalhistory.php"
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

    function editHistory() {
        // var data = getFormData($('#edituserform'));
        // var date = moment(data.u_birthdate, 'DD/MMM/YYYY').format('YYYY/MM/DD');
        // data.u_birthdate = date;
        var form_data = new FormData($('#edithistoryform')[0]);
        $.ajax({
            type: 'POST',
            url: '_edithistory.php',
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
                        window.location.href = "managemedicalhistory.php"
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

    function deleteHistory(id) {
        swal({
                title: "แน่ใจหรือไม่ ?",
                text: "คุณต้องการลบข้อมูลการรักษานี้ใช่หรือไม่ การลบไม่สามารถกู้กลับมาได้!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post', //วิธีการส่ง
                        url: '_deleteHistory.php', //หน้าที่จะไป
                        data: {
                            id: id
                        }, //parameter ที่ส่งไป
                        dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                        success: function(response) {
                            if (response.status) {
                                swal("เรียบร้อย ลบข้อมูลเสร็จสิ้น!", {
                                    icon: "success"
                                }).then((e) => {
                                    window.location.href = "managemedicalhistory.php"
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
                $('#e_date').datetimepicker('date', moment(val.date));
                //$('#e_dentist_name').val(val.user_id);
                $('.e_dentist_name').val(val.user_id).trigger('change');
                //$('#e_patient_name').val(val.patient_id);
                $('.e_patient_name').val(val.patient_id).trigger('change');
                $('#e_drug_allergy').val(val.drug_allergy);
                $('#e_cure').val(val.cure_id);
                $('#e_cure_piece').val(val.cure_piece);
                $('#e_cure_count').val(val.cure_count);
                $('#e_net_total').val(val.net_total);
                $('#e_teeth').val(val.teeth);
                $('#e_medicine').val(val.medicine);
            }
        });
        //edituserform

        // console.log(id);
    }
</script>
<?php include '_footer.php'; ?>