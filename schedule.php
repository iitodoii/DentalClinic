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
                <div class="col-md-3">
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
                </div>

                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
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
                                <input type="text" name='a_date' class="form-control datetimepicker-input" data-target="#a_date" />
                                <div class="input-group-append" data-target="#a_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label>เวลาเริ่มต้น</label>
                            <!-- <input type="text" name='a_start' class="form-control timepicker"> -->
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
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>ชื่อ-นามสกุล ผู้ป่วย</label>
                            <select class="form-control a_patient_name" name="a_patient_name" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="a_tel">เบอร์โทรศัพท์ </label>
                            <input type="text" name="a_tel" class="form-control" id="a_tel" placeholder="เบอร์โทรศัพท์" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>ชื่อแพทย์ผู้รับผิดชอบ</label>
                        <select class="form-control a_dentist_name" name="a_dentist_name" style="width: 100%;">
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-5">
                            <label>สีพื้นหลัง</label>
                            <div class="input-group a_backgroundColor">
                                <input type="text" name="a_backgroundColor" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-5 d-none">
                            <label>สีเส้นขอบ</label>
                            <div class="input-group a_borderColor">
                                <input type="text" name="a_borderColor" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-2">
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
                            <label for="e_title">รายการนัดรักษา</label>
                            <input type="text" name="e_title" class="form-control" id="e_title" placeholder="รายการนัดรักษา">
                        </div>
                        <div class="form-group col-6">
                            <label for="e_time">เวลาในการรักษา</label>
                            <input type="text" name="e_time" class="form-control" id="e_time" placeholder="เวลาในการรักษา">
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
                            <label>เวลาเริ่มต้น</label>
                            <div class="input-group date" id="e_start" data-target-input="nearest">
                                <input type="text" name='e_start' class="form-control datetimepicker-input" data-target="#e_start" />
                                <div class="input-group-append" data-target="#e_start" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label>เวลาสิ้นสุด</label>
                            <div class="input-group date" id="e_end" data-target-input="nearest">
                                <input type="text" name='e_end' class="form-control datetimepicker-input" data-target="#e_end" />
                                <div class="input-group-append" data-target="#e_end" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="e_patient_name">ชื่อ-นามสกุล ผู้ป่วย</label>
                            <input type="text" name="e_patient_name" class="form-control" id="e_patient_name" placeholder="ชื่อ-นามสกุล ผู้ป่วย">
                        </div>
                        <div class="form-group col-6">
                            <label for="e_tel">เบอร์โทรศัพท์ </label>
                            <input type="text" name="e_tel" class="form-control" id="e_tel" placeholder="เบอร์โทรศัพท์">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="e_dentist">ชื่อแพทย์ผู้รับผิดชอบ</label>
                        <input type="text" name="e_dentist" class="form-control" id="e_dentist" placeholder="ชื่อแพทย์ผู้รับผิดชอบ">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
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
</style>

<script>
    var curetime;
    $(document).ready(function() {
        initialData();
        genCalendarData();
        $('input.a_timepicker_start').timepicker({
            timeFormat: 'H:mm',
            minTime: '9',
            maxTime: '20',
            defaultDate:'9:00',
            zindex: 3500,
            change: function(time) {
                // var element = $(this),
                //     text;
                // alert($('#a_time').val());
                // $('input.a_timepicker_end').timepicker({
                //     timeFormat: 'H:mm',
                //     minTime: '9',
                //     maxTime: '20',
                //     defaultTime: moment.utc($('input.a_timepicker_start').val(),'hh:mm').add(curetime,'minutes').format('HH:mm'),
                //     zindex: 3500
                // });
                $('input.a_timepicker_end').val(moment.utc($('input.a_timepicker_start').val(),'hh:mm').add(curetime,'minutes').format('HH:mm'));
                //$('input.a_timepicker_end').timepicker('setTime', moment.utc($('input.a_timepicker_start').val(),'hh:mm').add(curetime,'minutes').format('HH:mm'));
                
                var param = {
                    assign_date : $('#a_date').datetimepicker('date')._i,
                    start_time : $('input.a_timepicker_start').val(),
                    end_time : $('input.a_timepicker_end').val()
                };

                getDentist(param);
                // $('input.a_timepicker_end').val(moment.utc($('input.a_timepicker_start').val(),'hh:mm').add(curetime,'minutes').format('HH:mm'));
                // $('input.a_timepicker_end').text(moment.utc($('input.a_timepicker_start').val(),'hh:mm').add(curetime,'minutes').format('HH:mm'))
                // var timepicker = element.timepicker();
                // text = 'Selected time is: ' + timepicker.format(time);
                // element.siblings('span.help-line').text(text);
                
            }
        });
        // $('input.a_timepicker_end').timepicker({
        //     timeFormat: 'H:mm',
        //     zindex: 3500
        // });
        

        // getPatient();
        // getDentist();
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
        $('.a_title').change(() => getCureTime())
        $.validator.setDefaults({
            submitHandler: function(form) {
                if (form.id == "add_event_form") {
                    add_event();
                    // swal('Hello');
                } else if (form.id == "edit_event_form") {
                    edituser();
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
                a_end: {
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
                    required: "Select title"
                },
                a_date: {
                    required: "Select date"
                },
                a_start: {
                    required: "Select start time"
                },
                a_end: {
                    required: "Select end time"
                },
                a_patient_name: {
                    required: "Select patient"
                },
                a_dentist_name: {
                    required: "Select dentist"
                },
                a_backgroundColor: {
                    required: "Select background color"
                },
                a_borderColor: {
                    required: "Select border color"
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
                u_firstname: {
                    required: true
                },
                u_lastname: {
                    required: true
                }
            },
            messages: {
                u_firstname: {
                    required: "Please enter a firstname",
                },
                u_lastname: {
                    required: "Please enter a lastname",
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

    function add_event() {
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


    function genCalendarData() {
        var event_data = [];
        $.ajax({
            type: 'post',
            url: '_getschedule.php',
            dataType: 'json', //Type ข้อมูลที่ส่งกลับมา
            success: function(response) {
                if (response.status) {
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

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                console.log(eventEl);
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                // center: 'addEventButton',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            validRange: {
                start: '2000-01-01' //moment().format('YYYY-MM-DD')
            },
            'themeSystem': 'bootstrap',
            //Random default events
            events: event_data,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
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
                initColorPicker();
                $('#a_date').datetimepicker('date', moment(date.start).format('DD/MMM/YYYY'));
                $('#modal-add-event').modal('show');
                // $('a_date').val(moment(date.start).format('DD/MMM/YYYY'));
            },
            eventClick: function(calEvent) {
                // var title = 
                // swal(calEvent.title);
                // swal('id:' + calEvent.event.id + 'title' + calEvent.event.title);
                $('#modal-edit-event').modal('show');
                $.each(event_data, function(i, val) {
                    if (val.id == calEvent.event.id) {
                        $('#e_title').val(val.detaildata.event_name);
                        $('#e_date').datetimepicker('date', moment(val.detaildata.event_start).format('DD/MMM/YYYY'));
                        $('#e_start').datetimepicker('date', moment(val.detaildata.event_start).format('h:mm a'));
                        $('#e_end').datetimepicker('date', moment(val.detaildata.event_end).format('h:mm a'));
                        $('#e_patient_name').val(val.detaildata.patient_name);
                        $('#e_tel').val(val.detaildata.patient_phone);
                        $('#e_dentist').val(val.detaildata.dentist_name);
                    }
                });
                calEvent.title = title;
                $("#calendar").fullCalendar("updateEvent", calEvent);
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
        var date = new Date();
        $('#e_date').datetimepicker({
            "singleDatePicker": true,
            format: 'DD/MMM/YYYY',
            minDate: date.setDate(date.getDate() - 1)
        });

        $('#a_start').datetimepicker({
            stepping: 30,
            enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19],
            format: 'HH:mm',
            onDatesChange: function() {
                swal('test');
            },
            onSelect: function() {
                swal('test');
            }
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
                        curetime = response.data[0].hour*60;
                    } else {
                        $('#a_time').val(response.data[0].hour + ' ชั่วโมง ' + response.data[0].min + ' นาที')
                        curetime = response.data[0].hour*60+response.data[0].min*1
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
                    $.each(response.data, function(i, val) {
                        $('.a_patient_name').append('<option value="' + val.id + '">' + val.text + '</option>')
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
        $.ajax({
            type: 'post',
            url: '_getDentist.php',
            data:data,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('.a_dentist_name').empty();
                    $.each(response.data, function(i, val) {
                        $('.a_dentist_name').append('<option value="' + val.id + '">' + val.text + '</option>')
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