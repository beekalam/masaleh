<script src="<?php echo base_url('assets/handlebars-v4.0.11.js'); ?>"></script>

<div class="portlet box blue">
    <div class="portlet-title">

        <div class="caption">
            <i class="fa fa-plus"></i>
            <span class="caption-subject bold uppercase">لیست خودروها</span>
        </div>

        <div class="actions">
<!--            <a href="--><?php //echo base_url('ui/suggestions/add_vehicle'); ?><!--" class="btn btn-default btn-sm">-->
<!--                <i class="fa fa-plus"></i> افزودن-->
<!--            </a>-->
        </div>

    </div>

    <div class="portlet-body">
        <div class="row">
            <table class="table table-responsive table-hover table-striped" id="table-reservations">
                <thead>
                <th>نام</th>
                <th>متن</th>
                <th>تاریخ ارسال</th>
<!--                <th>actions</th>-->
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        var opt          = build_datatable_init();
        opt["searching"]  = true;
        opt["ordering"]   = true;
        opt["order"]      = [[1, "desc"]];
        opt["ajax"]      = "<?php echo base_url('ui/suggestions/suggestion_list'); ?>";
        opt["columnDefs"] = [
            {
                "targets": 0,
                "data": "firstname",
                "render": function (data, type, row, meta) {
                    return row['firstname'] + " " + row['lastname'];
                }
            },
            {
                "targets": 1,
                "data": "suggestion",
                "searchable":true,
                "sortable":true,
                "render": function (data, type, row, meta) {
                    return data;
                }
            },
            {
                "targets": 2,
                "data": "customer_suggestions_created_at_fa",
                // "searchable":true,
                "sortable":true,
                "render": function (data, type, row, meta) {
                    return data;
                }
            },
            // {
            //     "targets": 3,
            //     "data": "customer_suggestions_id",
            //     "searchable":true,
            //     "sortable":true,
            //     "render": function (data, type, row, meta) {
            //         return data;
            //     }
            // },

        ];

        $("#table-reservations").DataTable(opt);

    });
</script>
