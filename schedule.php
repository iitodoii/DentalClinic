<!DOCTYPE html>
<html>
<?php include '_header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Calendar</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Schedule</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Draggable Events</h4>
                            </div>
                            <div class="card-body">
                                <div id="external-events">
                                    <div class="external-event bg-success">ถอนฟัน</div>
                                    <div class="external-event bg-warning">ตรวจรักษา</div>
                                    <div class="external-event bg-info">ให้คำปรึกษา</div>
                                    <div class="external-event bg-primary">อุดฟัน</div>
                                    <div class="external-event bg-danger">ผ่าตัดรากฟัน</div>
                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove">
                                            remove after drop
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create Event</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                    </ul>
                                </div>

                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-4">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button type="button" class="btn btn-block btn-danger">Bew</button> -->
    </section>
</div>

<div class="modal fade" id="modal-add-event" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มการนัดหมาย</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='add_event_form' style="overflow-y: scroll" autocomplete="off">
                <div class="modal-body">
                    <!-- <div class="row" style="overflow-y:scroll;height:40vh"> -->
                    <!-- disabled -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>รหัส/ชื่อ-นามสกุล ผู้ป่วย</label>
                            <select class="form-control a_patient_name" name="a_patient_name" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="a_tel">เบอร์โทรศัพท์ </label>
                            <input type="text" name="a_tel" class="form-control" id="a_tel" placeholder="เบอร์โทรศัพท์" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="a_title">รายการนัดรักษา</label>
                            <select class="form-control a_title" name="a_title" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="a_time">เวลาในการรักษา</label>
                            <input type="text" name="a_time" class="form-control" id="a_time" placeholder="เวลาในการรักษา" autocomplete="false" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label>วันที่นัดหมาย</label>
                            <div class="input-group date" id="a_date" data-target-input="nearest">
                                <input type="text" name='a_date' class="form-control datetimepicker-input a_date" data-target="#a_date" />
                                <div class="input-group-append" data-target="#a_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label>เวลาเริ่มต้น</label>
                            <input type="text" class="form-control a_timepicker_start" name='a_start' />
                            <!-- <div class="input-group date" id="a_start" data-target-input="nearest">
                                <input type="text" name='a_start' class="form-control datetimepicker-input a_start" data-target="#a_start" />
                                
                                <div class="input-group-append" data-target="#a_start" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div> -->
                        </div>
                        <div class="form-group col-4">
                            <label>เวลาสิ้นสุด</label>
                            <input type="text" class="form-control a_timepicker_end" name='a_end' readonly="true" />
                            <!-- <div class="input-group date" id="a_end" data-target-input="nearest">
                                <input type="text" name='a_end' class="form-control datetimepicker-input a_end" data-target="#a_end" disabled />
                                <div class="input-group-append" data-target="#a_end" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label>รหัส/ชื่อแพทย์ผู้รับผิดชอบ</label>
                        <select class="form-control a_dentist_name" name="a_dentist_name" style="width: 100%;">
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-5 d-none">
                            <label>สีพื้นหลัง</label>
                            <div class="input-group a_backgroundColor">
                                <input type="text" name="a_backgroundColor" class="form-control" value="#007BFF">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-5 d-none">
                            <label>สีเส้นขอบ</label>
                            <div class="input-group a_borderColor">
                                <input type="text" name="a_borderColor" class="form-control" value="#007BFF">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-2 d-none">
                            <label>สุ่มสีใหม่</label>
                            <button type="button" class="btn btn-block btn-default active" onclick="initColorPicker()">
                                <i class="fas fa-random"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label for="a_isAllday">isAllday</label>
                        <input type="text" name="a_isAllday" class="form-control" id="a_isAllday" value="false">
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

<div class="modal fade" id="modal-edit-event" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียดการนัดหมาย</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='edit_event_form' style="overflow-y: scroll">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>รหัส/ชื่อ-นามสกุล ผู้ป่วย</label>
                            <select class="form-control e_patient_name" name="e_patient_name" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="e_tel">เบอร์โทรศัพท์ </label>
                            <input type="text" name="e_tel" class="form-control" id="e_tel" placeholder="เบอร์โทรศัพท์" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group d-none">
                            <label for="e_id">id</label>
                            <input type="text" name="e_id" class="form-control" id="e_id">
                        </div>
                        <div class="form-group col-6">
                            <label for="e_title">รายการนัดรักษา</label>
                            <select class="form-control e_title" name="e_title" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="e_time">เวลาในการรักษา</label>
                            <input type="text" name="e_time" class="form-control" id="e_time" placeholder="เวลาในการรักษา" autocomplete="false" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label>วันที่นัดหมาย</label>
                            <div class="input-group date" id="e_date" data-target-input="nearest">
                                <input type="text" name='e_date' class="form-control datetimepicker-input" data-target="#e_date" />
                                <div class="input-group-append" data-target="#e_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <!-- <label>เวลาเริ่มต้น</label>
                            <div class="input-group date" id="e_start" data-target-input="nearest">
                                <input type="text" name='e_start' class="form-control datetimepicker-input" data-target="#e_start" />
                                <div class="input-group-append" data-target="#e_start" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div> -->
                            <label>เวลาเริ่มต้น</label>
                            <input type="text" class="form-control e_timepicker_start" name='e_start' />
                        </div>
                        <div class="form-group col-4">
                            <label>เวลาสิ้นสุด</label>
                            <input type="text" class="form-control e_timepicker_end" name='e_end' readonly="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>รหัส/ชื่อแพทย์ผู้รับผิดชอบ</label>
                        <select class="form-control e_dentist_name" name="e_dentist_name" style="width: 100%;">
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:confirm_event()" class='btn btn-success mr-4'> ยืนยันการทำรายการ </a>
                        <a href="javascript:delete_event()" class='btn btn-danger'> ยกเลิกนัด </a>
                    </div>
                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* body {
        margin: 40px 10px;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    } */

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }

    @media print {

        /* All your print styles go here */
        /* #header,
        #footer,
        #nav {
            display: none !important;
        } */
        /* #calendar {
            display : none !important;
        } */
    }

    .select2-selection__clear{
        display: none;
    }
</style>

<script>
    var curetime;
    var alldata = [];
    $(document).ready(function() {
        $('.select2-selection__clear').hide();
        initialData();
        genCalendarData();
        $('input.a_timepicker_start').timepicker({
            timeFormat: 'HH:mm',
            minTime: '9',
            maxTime: '20',
            defaultDate: '9:00',
            zindex: 3500,
            change: function(time) {
                $('input.a_timepicker_end').val(moment.utc($('input.a_timepicker_start').val(), 'hh:mm').add(curetime, 'minutes').format('HH:mm'));
                //$('input.a_timepicker_end').timepicker('setTime', moment.utc($('input.a_timepicker_start').val(),'hh:mm').add(curetime,'minutes').format('HH:mm'));
                var param = {
                    assign_date: moment($('#a_date').datetimepicker('date')._d).format('DD/MMM/YYYY'),
                    start_time: $('input.a_timepicker_start').val(),
                    end_time: $('input.a_timepicker_end').val()
                };
                getDentist(param);
            }
        });

        $('input.e_timepicker_start').timepicker({
            timeFormat: 'HH:mm',
            minTime: '9',
            maxTime: '20',
            defaultDate: '9:00',
            zindex: 3500,
            change: function(time) {
                $('input.e_timepicker_end').val(moment.utc($('input.e_timepicker_start').val(), 'hh:mm').add(curetime, 'minutes').format('HH:mm'));
                //$('input.a_timepicker_end').timepicker('setTime', moment.utc($('input.a_timepicker_start').val(),'hh:mm').add(curetime,'minutes').format('HH:mm'));

                var param = {
                    assign_date: moment($('#e_date').datetimepicker('date')._d).format('DD/MMM/YYYY'),
                    start_time: $('input.e_timepicker_start').val(),
                    end_time: $('input.e_timepicker_end').val()
                };

                getDentist(param);

            }
        });

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.html(val)
            event.addClass('testdom');
            $('#external-events').prepend(event)

            //Add draggable funtionality
            ini_events(event)

            //Remove event from text input
            $('#new-event').val('')
        })
        $('.a_patient_name').change(() => getPhone())
        $('.e_patient_name').change(() => getPhoneEditMode())
        $('.a_title').change(() => {
            getCureTime()
            $('.a_timepicker_start').val("");
            $('.a_timepicker_end').val("");
        });
        $('.e_title').change(() => {
            getCureTimeEditMode().then(() => {
                $('input.e_timepicker_end').val(moment.utc($('input.e_timepicker_start').val(), 'hh:mm').add(curetime, 'minutes').format('HH:mm'));
            });
        })
        $.validator.setDefaults({
            submitHandler: function(form) {
                if (form.id == "add_event_form") {
                    add_event();
                } else if (form.id == "edit_event_form") {
                    edit_event();
                }
            }
        });
        $('#add_event_form').validate({
            rules: {
                a_title: {
                    required: true
                },
                a_date: {
                    required: true
                },
                a_start: {
                    required: true
                },
                a_patient_name: {
                    required: true
                },
                a_dentist_name: {
                    required: true
                },
                a_backgroundColor: {
                    required: true
                },
                a_borderColor: {
                    required: true
                }
            },
            messages: {
                a_title: {
                    required: "กรุณาเลือกรายการรักษา"
                },
                a_date: {
                    required: "กรุณาเลือกวันที่รับรักษา"
                },
                a_start: {
                    required: "กรุณากรอกเวลาเริ่มรักษา"
                },
                a_patient_name: {
                    required: "กรุณาเลือกผู้ป่วยที่เข้ารับการรักษา"
                },
                a_dentist_name: {
                    required: "กรุณาเลือกแพทย์ที่รับผิดชอบ"
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

        $('#edit_event_form').validate({
            rules: {
                e_title: {
                    required: true
                },
                e_date: {
                    required: true
                },
                e_start: {
                    required: true
                },
                e_patient_name: {
                    required: true
                },
                e_dentist_name: {
                    required: true
                },
            },
            messages: {
                e_title: {
                    required: "กรุณาเลือกรายการรักษา"
                },
                e_date: {
                    required: "กรุณาเลือกวันที่รับรักษา"
                },
                e_start: {
                    required: "กรุณาเลือกวันที่รับรักษา",
                },
                e_patient_name: {
                    required: "กรุณาเลือกผู้ป่วยที่เข้ารับการรักษา"
                },
                e_dentist_name: {
                    required: "กรุณาเลือกแพทย์ที่รับผิดชอบ"
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

    function add_event() {
        let start = $('.a_timepicker_start').val();
        let end = $('.a_timepicker_end').val();
        let flag_other_day = true;
        let flag_can_insert = true;
        $.each(alldata, function(i, val) {
            if (moment(val.event_start).format('DD/MM/YYYY') == moment($('.a_date').val()).format('DD/MM/YYYY')) {
                let val_start = moment(val.event_start).format('HH:mm');
                let val_end = moment(val.event_end).format('HH:mm');
                if ((start >= val_start && start <= val_end ||
                        end >= val_start && end <= val_end) &&
                    val.user_id == $('.a_dentist_name').val())
                // ||
                // (val_start >= start && val_end <= start &&
                // val_start >= end &&  val_end <= end))
                {
                    flag_can_insert = false;
                    return false;
                } else {
                }
            }
        });
        if (alldata.length == 0 || flag_can_insert) {
            var form_data = new FormData($('#add_event_form')[0]);
            $.ajax({
                type: 'POST',
                url: '_addevent.php',
                data: form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status >= 0) {
                        swal("เรียบร้อย เพิ่มข้อมูลเสร็จสิ้น!", {
                            icon: "success"
                        }).then((e) => {
                            $('#modal-add-event').modal('hide');
                            genCalendarData();
                            // window.location.href = "managepatient.php"
                        });
                        return false;
                    } else {
                        swal("เกิดข้อผิดพลาด ที่ฟังค์ชั่น!", {
                            icon: "error",
                        });
                        return false;
                    }
                },
                error: function(e) {
                    swal('error');
                }
            });
        } else {
            swal("ไม่สามารถเลือกเวลาซ้ำกันได้ !", {
                icon: "error",
            });
        }


    }

    function edit_event() {
        var form_data = new FormData($('#edit_event_form')[0]);
        $.ajax({
            type: 'POST',
            url: '_editevent.php',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status >= 0) {
                    swal("เรียบร้อย แก้ไขข้อมูลเรียบร้อย!", {
                        icon: "success"
                    }).then((e) => {
                        $('#modal-edit-event').modal('hide');
                        genCalendarData();
                        // window.location.href = "managepatient.php"
                    });
                } else {
                    swal("เกิดข้อผิดพลาด ที่ฟังค์ชั่น!", {
                        icon: "error",
                    });
                }
            },
            error: function(e) {
                swal('error');
            }
        });
    }

    function delete_event() {
        var id = $('#e_id').val();
        swal({
            title: "แน่ใจหรือไม่ ?",
            text: "คุณต้องการยกเลิกนัดนี้หรือไม่",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'post', //วิธีการส่ง
                    url: '_deleteschedule.php', //หน้าที่จะไป
                    data: {
                        id: id
                    }, //parameter ที่ส่งไป
                    dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                    success: function(response) {
                        if (response.status) {
                            swal("เรียบร้อย ลบข้อมูลเสร็จสิ้น!", {
                                icon: "success"
                            }).then((e) => {
                                window.location.href = "schedule.php"
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

    function confirm_event() {
        var id = $('#e_id').val();
        swal({
            title: "แน่ใจหรือไม่ ?",
            text: "คุณต้องการยืนยันนัดนี้หรือไม่",
            icon: "info",
            buttons: true,
            dangerMode: false,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'post', //วิธีการส่ง
                    url: '_deleteschedule.php', //หน้าที่จะไป
                    data: {
                        id: id
                    }, //parameter ที่ส่งไป
                    dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
                    success: function(response) {
                        if (response.status) {
                            swal("เรียบร้อย ยืนยันทำรายการเรียบร้อย!", {
                                icon: "success"
                            }).then((e) => {
                                window.location.href = "schedule.php"
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
                swal("ปฏิเสธ ยังไม่ได้ทำการยืนยัน!");
            }
        });
    }

    function genCalendarData() {
        var event_data = [];
        $.ajax({
            type: 'post',
            url: '_getschedule.php',
            dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
            success: function(response) {
                if (response.status) {
                    alldata = response.data;
                    $.each(response.data, function(i, val) {
                        event_data.push({
                            id: val.id,
                            title: val.title_name,
                            start: val.event_start,
                            end: val.event_end,
                            backgroundColor: val.event_backgroundColor,
                            borderColor: val.event_borderColor,
                            allDay: val.event_isAllday,
                            url: val.event_url,
                            detaildata: val
                        });
                    });
                    gencalendardetail(event_data);
                    console.log(event_data);
                } else {
                    swal("เกิดข้อผิดพลาด!", {
                        icon: "error",
                    });
                }
            },
            error: function(e) {}
        });


    }

    function gencalendardetail(event_data) {
        $('#calendar').empty();
        /* initialize the calendar
        -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)

        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        // new Draggable(containerEl, {
        //     itemSelector: '.external-event',
        //     eventData: function(eventEl) {
        //         console.log(eventEl);
        //         return {
        //             title: eventEl.innerText,
        //             backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
        //             borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
        //             textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
        //         };
        //     }
        // });

        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                // center: 'addEventButton',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            height: 600,
            validRange: {
                start: '2000-01-01' //moment().format('YYYY-MM-DD')
            },
            'themeSystem': 'bootstrap',
            //Random default events
            events: event_data,
            eventLimit: true,
            views: {
                agenda: {
                    eventLimit: 3
                },
                timeGrid: {
                    eventLimit: 3
                },
                dayGridMonth: {
                    eventLimit: 3
                },
            },
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            droppable: false, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },
            customButtons: {
                addEventButton: {
                    text: 'add event...',
                    click: function() {
                        var dateStr = prompt('Enter a date in YYYY-MM-DD format');
                        var date = moment(dateStr);
                        if (date.isValid()) {
                            $('#calendar').fullCalendar('renderEvent', {
                                title: 'dynamic event',
                                start: date,
                                allDay: true
                            });
                            alert('Great. Now, update your database...');
                        } else {
                            alert('Invalid date.');
                        }
                    }
                }
            },
            selectable: true,
            selectHelper: false,
            editable: true,
            eventLimit: true,
            select: function(date) {
                // swal('startDate:' + moment(date.start).format('DD/MMM/YYYY') + ' endDate:' + moment(date.end - 1).format('DD/MMM/YYYY'));
                if (date.start >= moment()) {
                    //initColorPicker();
                    getDentist();
                    $('#a_date').datetimepicker('date', moment(date.start).format('DD/MMM/YYYY'));
                    $('.a_timepicker_start').val("");
                    $('.a_timepicker_end').val("");
                    $('#modal-add-event').modal('show');
                } else {
                    swal("เลือกไม่ได้", "ท่านไม่สามารถนัดหมายวันที่ผ่านมาแล้วได้!", "warning");
                }

                // $('a_date').val(moment(date.start).format('DD/MMM/YYYY'));
            },
            eventClick: function(calEvent) {
                // var title = 
                // swal(calEvent.title);
                // swal('id:' + calEvent.event.id + 'title' + calEvent.event.title);
                $('#modal-edit-event').modal('show');
                $.each(event_data, function(i, val) {
                    if (val.id == calEvent.event.id) {
                        $('#e_id').val(val.detaildata.id);
                        $('#e_title').val(val.detaildata.event_name);
                        getCureTimeEditMode();
                        $('#e_date').datetimepicker('date', moment(val.detaildata.event_start).format('DD/MMM/YYYY'));
                        // $('#e_start').datetimepicker('date', moment(val.detaildata.event_start).format('h:mm a'));
                        $('input.e_timepicker_start').val(moment(val.detaildata.event_start).format('H:mm'));
                        $('input.e_timepicker_end').val(moment(val.detaildata.event_end).format('H:mm'));
                        // $('#e_end').datetimepicker('date', moment(val.detaildata.event_end).format('h:mm a'));
                        //$('#e_patient_name').val(val.detaildata.patient_name);
                        $('.e_patient_name').val(val.detaildata.patient_id).trigger('change');
                        $('#e_tel').val(val.detaildata.patient_phone);

                        var param = {
                            assign_date: moment($('#e_date').datetimepicker('date')._d).format('DD/MMM/YYYY'),
                            start_time: $('input.e_timepicker_start').val(),
                            end_time: $('input.e_timepicker_end').val()
                        };

                        getDentist(param).then(() => {
                            $('.e_dentist_name').val(val.detaildata.user_id).trigger('change');
                            $('.select2-selection__clear').hide();
                        });
                        
                    }
                });
                // calEvent.title = title;
                // $("#calendar").fullCalendar("updateEvent", calEvent);
            }
        });

        calendar.render();
    }

    function initColorPicker() {
        let color = getRandomColor();
        $('.a_backgroundColor').colorpicker('setValue', color); //bind text color code 
        $('.a_backgroundColor .fa-square').css('color', color); //bind color square icon

        $('.a_borderColor').colorpicker('setValue', color)
        $('.a_borderColor .fa-square').css('color', color);

        $('.a_backgroundColor').on('colorpickerChange', function(event) {
            $('.a_backgroundColor .fa-square').css('color', event.color.toString());
        });

        $('.a_borderColor').colorpicker()

        $('.a_borderColor').on('colorpickerChange', function(event) {
            $('.a_borderColor .fa-square').css('color', event.color.toString());
        });
    }

    function initialData() {
        getDentist();
        getPatient().then(() => {
            getPhone()
        });
        getCure().then(() => {
            getCureTime()
        });
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

        var date = new Date();
        $('#e_date').datetimepicker({
            "singleDatePicker": true,
            format: 'DD/MMM/YYYY',
            minDate: date.setDate(date.getDate() - 1)
        });

        $('#e_end').datetimepicker({
            stepping: 30,
            enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19],
            format: 'HH:mm'
        });

        $('#a_date').datetimepicker({
            defaultDate: moment(),
            "singleDatePicker": true,
            format: 'DD/MMM/YYYY',
            minDate: date.setDate(date.getDate() - 1)
        });

        $('#a_start').datetimepicker({
            // defaultDate:moment(),
            stepping: 30,
            enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19],
            format: 'HH:mm'
        });
        $('#a_date').on("change.datetimepicker", () => {

            var param = {
                assign_date: moment($('#a_date').datetimepicker('date')._d).format('DD/MMM/YYYY'),
                start_time: $('input.a_timepicker_start').val(),
                end_time: $('input.a_timepicker_end').val()
            };
            if (param.start_time != "" && param.end_time != "") {
                getDentist(param);
            }
            // if(param.s)

        });

        // $('#a_end').datetimepicker({
        //     // defaultDate:moment(),
        //     stepping: 30,
        //     enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19],
        //     format: 'HH:mm'
        // });

        /* initialize the external events
        -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))
    }

    function getCure() {
        return $.ajax({
            type: 'post',
            url: '_getCure.php',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $.each(response.data, function(i, val) {
                        $('.a_title').append('<option value="' + val.id + '">' + val.text + '</option>')
                        $('.e_title').append('<option value="' + val.id + '">' + val.text + '</option>')
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

    function getCureTime() {
        $.ajax({
            type: 'post',
            url: '_getCure.php',
            dataType: 'json',
            data: {
                id: $('.a_title').val()
            },
            success: function(response) {
                if (response.status) {
                    if (response.data[0].hour == 0) {
                        $('#a_time').val(response.data[0].min + ' นาที')
                        curetime = response.data[0].min;
                    } else if (response.data[0].min == 0) {
                        $('#a_time').val(response.data[0].hour + ' ชั่วโมง')
                        curetime = response.data[0].hour * 60;
                    } else {
                        $('#a_time').val(response.data[0].hour + ' ชั่วโมง ' + response.data[0].min + ' นาที')
                        curetime = response.data[0].hour * 60 + response.data[0].min * 1
                    }
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

    function getCureTimeEditMode() {
        return $.ajax({
            type: 'post',
            url: '_getCure.php',
            dataType: 'json',
            data: {
                id: $('.e_title').val()
            },
            success: function(response) {
                if (response.status) {
                    if (response.data[0].hour == 0) {
                        $('#e_time').val(response.data[0].min + ' นาที')
                        curetime = response.data[0].min;
                    } else if (response.data[0].min == 0) {
                        $('#e_time').val(response.data[0].hour + ' ชั่วโมง')
                        curetime = response.data[0].hour * 60;
                    } else {
                        $('#e_time').val(response.data[0].hour + ' ชั่วโมง ' + response.data[0].min + ' นาที')
                        curetime = response.data[0].hour * 60 + response.data[0].min * 1
                    }
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

    function getDentist(data) {
        return $.ajax({
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

    function getPhone() {
        $.ajax({
            type: 'post',
            url: '_getPatient.php',
            dataType: 'json',
            data: {
                id: $('.a_patient_name').val()
            },
            success: function(response) {
                if (response.status) {
                    if(response.data.length != 0)
                        $('#a_tel').val(response.data[0].phone)
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

    function getPhoneEditMode() {
        $.ajax({
            type: 'post',
            url: '_getPatient.php',
            dataType: 'json',
            data: {
                id: $('.e_patient_name').val()
            },
            success: function(response) {
                if (response.status) {
                    $('#e_tel').val(response.data[0].phone)
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

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>
<?php include '_footer.php'; ?>

</html>