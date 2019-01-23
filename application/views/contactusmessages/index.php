<script src="<?php echo base_url('assets/handlebars-v4.0.11.js'); ?>"></script>

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-plus"></i>
            <span class="caption-subject bold uppercase">
           </span>
        </div>
        <div class="actions">
            <!--            <a class="btn btn-default btn-sm trigger" href="-->
            <?php //echo base_url('admin/blog/add_post'); ?><!--">-->
            <!--                <i class="fa fa-plus"></i>افزودن-->
            <!--            </a>-->
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <table class="table table-responsive table-hover table-striped" id="table-reservations">
                <thead>
                <!--                <th>نام</th>-->
                <th>فرستنده</th>
                <th>متن</th>
                <th>تاریخ ارسال</th>
                <th>actions</th>
                <!--<th>is_employer</th>-->
                <!--<th>emp details</th>-->
                <!--<th>created_at</th>-->
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var opt           = build_datatable_init();
        opt["searching"]  = true;
        opt["ordering"]   = true;
        opt["order"]      = [[2, "desc"]];
        opt["ajax"]       = "<?php echo base_url('ui/contactusmessages/message_list'); ?>";
        opt["columnDefs"] = [
            {
                "targets": 0,
                "data": "email",
                "orderable": true,
                "searchable": true,
                "render": function (data, type, row, meta) {
                    return data;
                }
            },
            {
                "targets": 1,
                "data": "message",
                "orderable": true,
                "searchable": true,
                "render": function (data, type, row, meta) {
                    return chop_str(data, 80);
                }
            },
            {
                "targets": 2,
                "data": "created_at",
                "orderable": true,
                "searchable": true,
                "render": function (data, type, row, meta) {
                    var datas = data.split(" ");
                    if(datas[0] && datas[1]){
                        return datas[1] + "   " + datas[0];
                    }else{
                        return data;
                    }
                }
            },
            {
                "targets": 3,
                "data": "id",
                "orderable": false,
                "searchable": false,
                "render": function (data, type, row, meta) {
                    var ret = '';
                    ret += "<button class='btn btn-sm btn-circle btn-danger' onclick='deleteContactusMessage({0})'>{1}</button>".format(data, "حذف");
                    return ret;
                }
            }
        ];

        $("#table-reservations").DataTable(opt);

    });


    function deleteContactusMessage(id) {
        var dlg = {
            "url": "<?php echo base_url('ui/contactusmessages/delete_message'); ?>",
            "reload_on_success": true,
            "title": "حذف پست",
            "html": "مطمئن هستید؟",
            "to_send": {
                'id': id
            }
        };
        ask_user_confirm(dlg);
    }


</script>
