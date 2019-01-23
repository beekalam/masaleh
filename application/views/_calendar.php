<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافه کردن زمان</h4>
            </div>

            <div class="modal-body">
                <form method="post" action="<?php echo base_url('ui/products/add_service_event'); ?>"
                      class="form-horizontal">

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">تاریخ</label>
                        <div class="col-md-8">
                            <input type="text" id="date_from_fa" class="form-control" readonly/>
                            <input type="hidden" id="data"/>
                            <!-- <input type="text" class="form-control ga-datepicker" />-->
                        </div>
                    </div>

                    <div class="form-group" id="date_to_fa_div">
                        <label for="p-in" class="col-md-4 label-heading">تاریخ</label>
                        <div class="col-md-8">
                            <input type="text" id="date_to_fa" class="form-control" readonly/>
                            <!--                            <input type="hidden" id="date_edit"/>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">ساعت شروع</label>
                        <div class="col-md-8">
                            <input type="time" class="form-control" id="from_time" name="from_time">
                            <input type="hidden" class="form-control" name="start" id="start" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">ساعت پایان</label>
                        <div class="col-md-8">
                            <input type="time" class="form-control" id="to_time" name="to_time" required>
                            <input type="hidden" class="form-control" name="end" id="end">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">ظرفیت</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="capacity" name="capacity" required>
                            <input type="hidden" class="form-control" name="end" id="end">
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                <input type="hidden" name="service_date_from" id="service_date_from"/>
                <input type="hidden" name="service_date_to" id="service_date_to"/>
                <input type="hidden" name="is_range_date" id="is_range_date" value="no"/>
                <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['id']; ?>"/>
                <input type="submit" class="btn btn-primary" value="ثبت">
                </form>
                <form method="post" action="<?php echo base_url('ui/products/delete_service_event'); ?>">
                    <input type="hidden" name="service_date_from2" id="service_date_from2"/>
                    <input type="hidden" name="product_id2" id="product_id2" value="<?php echo $product['id']; ?>"/>
                    <input type="submit" class="btn  btn-danger" name="delete" value="حذف">
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel">ویرایش تعیین زمان</h4>
            </div>

            <div class="modal-body">
                <form method="post" action="<?php echo base_url('Doctors/edit_event'); ?>"
                      class="form-horizontal">

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">تاریخ</label>
                        <div class="col-md-8">
                            <input type="text" id="date_from_fa" class="form-control" readonly/>
                            <input type="hidden" id="date_edit"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">ساعت شروع</label>
                        <div class="col-md-8">
                            <input type="time" class="form-control" value="00:00" id="start_date">
                            <input type="hidden" class="form-control" name="start" id="start_date_edit">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">ساعت پایان</label>
                        <div class="col-md-8">
                            <input type="time" class="form-control" value="00:00" id="end_date">
                            <input type="hidden" class="form-control" name="end" id="end_date_edit">
                        </div>
                    </div>

                    <div class="form-group" style="200px; overflow:auto">
                        <div class="col-lg-7">
                            <div class="checkbox">
                                <!--input type="" class="form-control" name="bime" id="bime"-->
                                <textarea name="bime"
                                          style="display:none"><?php echo $doc_time[0]->bime; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">بستن</button>
                <input type="submit" class="btn btn-success" value="ویرایش">
                <input type="submit" class="btn  btn-danger" name="delete" value="حذف">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function to_jalali(date) {
        year  = parseInt(date_repare(moment(date).format('YYYY')));
        month = parseInt(date_repare(moment(date).format('MM')));
        day   = parseInt(date_repare(moment(date).format('DD')));
        return gregorian_to_jalali(year, month, day);
    }

    $(document).ready(function () {

        var date_last_clicked = null;

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },

            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            isJalaali: true,
            isRTL: true,
            lang: "fa",
            dragScroll: true,
            width: 635,
            height: 850,
            selectable: true,
            selectHelper: true,

            eventSources: [
                {
                    events: function (start, end, timezone, callback) {
                        $.ajax({
                            url: '<?php echo base_url() ?>ui/products/get_events?id=<?php echo $product['id']; ?>',
                            dataType: 'json',
                            data: {
                                // our hypothetical feed requires UNIX timestamps
                                start: start.unix(),
                                end: end.unix(),
                                hospital: '12'
                            },
                            success: function (msg) {
                                console.log(events);
                                var events = msg.events;
                                callback(events);
                            }
                        });
                    }
                },
            ],

            dayClick: function (date, jsEvent, view) {
            },
            select: function (start, end, jsEvent, view) {
                start        = date_repare(start.format());
                end          = date_repare(end.format());
                var is_range = Math.abs(start.split('-')[2] - end.split('-')[2]) > 1;
                if (is_range) {
                    $('#date_to_fa_div').show();
                    $("#date_from_fa").val(to_jalali(start));
                    $("#date_to_fa").val(to_jalali(end));
                    $("#service_date_from").val(start);
                    $("#service_date_to").val(end);
                    $("#is_range_date").val("yes");
                    $('#addModal').modal();
                } else {
                    $("#date_to_fa_div").hide();
                    $("#service_date_from").val(start);
                    $("#service_date_from2").val(start);
                    // $("#data").val(date_repare(moment(start).format('YYYY/MM/DD')));
                    $("#date_from_fa").val(to_jalali(start));
                    $("#is_range_date").val("no");
                    //$("#pdp-data-jdate").val(date_repare(moment(date).format('YYYY/MM/DD')));
                    // date_last_clicked = $(this);
                    //$(this).css('background-color', '#bed7f3');
                    $('#addModal').modal('show');
                    // console.log("in dayclick");
                    // console.log(year, month, day);
                    // console.log(gregorian_to_jalali(year, month, day));
                    //$.ajax({
                    //    type: "POST",
                    //    url: '<?php //echo base_url('ui/products/add_service_event'); ?>//',
                    //    data: {'year': year, 'month': month, 'day': day},
                    //    success: function (data) {
                    //        // $("#add_new_cat_modal").modal("hide");
                    //        console.log(data);
                    //        data = JSON.parse(data);
                    //        if (data["success"]) {
                    //        } else {
                    //        }
                    //    }
                    //});
                }
            },
            ///////edit

            // eventClick: function (event, jsEvent, view) {
            //
            //     $('#id_doctor').val(event.id_doctor);
            //
            //     $('#molaghat').val(event.molaghat);
            //
            //     if (event.molaghat == 1) {
            //         $("#hozori").attr('selected', true);
            //         $("#majazi").attr('selected', false);
            //     } else {
            //         $("#majazi").attr('selected', true);
            //         $("#hozori").attr('selected', false);
            //     }
            //
            //     $('#states').val(event.states);
            //     if (event.states == 1) {
            //         $("#everyday").attr('selected', true);
            //         $("#notday").attr('selected', false);
            //         $("#yesday").attr('selected', false);
            //     }
            //     else if (event.states == 2) {
            //         $("#notday").attr('selected', true);
            //         $("#everyday").attr('selected', false);
            //         $("#yesday").attr('selected', false);
            //     } else {
            //         $("#yesday").attr('selected', true);
            //         $("#everyday").attr('selected', false);
            //         $("#notday").attr('selected', false);
            //     }
            //     $('#bime').val(event.bime);
            //
            //     $('#id_place').val(event.id_place);
            //
            //     $('#hospital').val(event.hospital);
            //     // $('#date').val(moment(event.date).format('YYYY/MM/DD'));
            //     $("#date_edit").val(date_repare(moment(event.start).format('YYYY/MM/DD')));
            //
            //     $('#start_date').val(date_repare(moment(event.start).format('HH:mm')));
            //     $('#start_date_edit').val(date_repare(moment(event.start).format('YYYY/MM/DD HH:mm')));
            //     if (event.end) {
            //
            //         $('#end_date').val(date_repare(moment(event.end).format('HH:mm')));
            //         $('#end_date_edit').val(date_repare(moment(event.end).format('YYYY/MM/DD HH:mm')));
            //     } else {
            //
            //         $('#end_date').val(date_repare(moment(event.start).format('HH:mm')));
            //         $('#end_date_edit').val(date_repare(moment(event.end).format('YYYY/MM/DD HH:mm')));
            //     }
            //
            //     year  = parseInt(date_repare(moment(event.start).format('YYYY')));
            //     month = parseInt(date_repare(moment(event.start).format('MM')));
            //     day   = parseInt(date_repare(moment(event.start).format('DD')));
            //
            //     $("#pdp-data-gdate").val(gregorian_to_jalali(year, month, day));
            //
            //
            //     //$("#pdp-data-gdate").val(moment(event.date).format('YYYY/MM/DD'));
            //     $('#event_id').val(event.id);
            //
            //     $('#editModal').modal();
            //
            // },
        });
    });

    // $('#data,#time').keyup(function () {
    //     $("#start").val(function () {
    //         return $("#data").val() + ' ' + $("#time").val();
    //     });
    // });
    // $('#data,#time_end').keyup(function () {
    //     $("#end").val(function () {
    //         return $("#data").val() + ' ' + $("#time_end").val();
    //     });
    // });
    //
    // $('#date_edit,#start_date').keyup(function () {
    //     $("#start_date_edit").val(function () {
    //         return $("#date_edit").val() + ' ' + $("#start_date").val();
    //     });
    // });
    // $('#date_edit,#end_date').keyup(function () {
    //     $("#end_date_edit").val(function () {
    //         return $("#date_edit").val() + ' ' + $("#end_date").val();
    //     });
    // });

    $(document).ready(function () {
        //usage
        // $(".usage").persianDatepicker();

        //themes
        // $("#pdpDefault").persianDatepicker({alwaysShow: true,});
        // $("#pdpLatoja").persianDatepicker({theme: "latoja", alwaysShow: true,});
        // $("#pdpLightorang").persianDatepicker({theme: "lightorang", alwaysShow: true,});
        // $("#pdpMelon").persianDatepicker({theme: "melon", alwaysShow: true,});
        // $("#pdpDark").persianDatepicker({theme: "dark", alwaysShow: true,});
        //

        // //jdate & gdate attributes
        // $("#pdp-data-jdate").persianDatepicker({
        //
        //     onSelect: function () {
        //
        //         //alert($("#pdp-data-jdate").data("gdate"));
        //         var a = $("#pdp-data-jdate").data("gdate");
        //         $("#date").val(a);
        //
        //
        //     }
        //
        // });
        //
        // $("#pdp-data-gdate").persianDatepicker({
        //     // showGregorianDate: true,
        //     onSelect: function () {
        //         alert($("#pdp-data-gdate").data("gdate"));
        //         var a = $("#pdp-data-gdate").data("gdate");
        //         $("#date_edit").val(a);
        //     }
        // });


        //Gregorian date


        // jDateFuctions


        //startDate is tomarrow
        var p = new persianDate();
        $("#pdpStartDateTomarrow").persianDatepicker({
            startDate: p.now().addDay(1).toString("YYYY/MM/DD"),
            endDate: p.now().addDay(4).toString("YYYY/MM/DD")
        });

    });

    $("#m_doctor").change(function () {
        var id_m = $(this).val();
        $("#molaghat").val(id_m);
    });
    $("#s_doctor").change(function () {
        var ide = $(this).val();
        $("#states").val(ide);
        //alert(ide);
    });
    $("#add_molaghat").change(function () {
        var id = $(this).val();
        $("#show_add_molaghat").val(id);
    });
</script>