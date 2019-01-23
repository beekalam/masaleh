<div class="page-bar"></div>
<?php $vm = get_defined_vars()['_ci_data']['_ci_vars']; ?>
<div class="row">

    <div class="col-xs-12 col-md-6">

        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
                    <span class="caption-subject bold uppercase"></span>
                </div>
                <div class="actions">
                    <button class="btn btn-default btn-sm trigger" onclick="addNewCat()">
                        <i class="fa fa-plus"></i> افزودن
                    </button>
                </div>
            </div>

            <div class="portlet-body">
                <div class="row">
                    <?php $index = 1; ?>
                    <table class="table table-responsive table-hover table-striped" id="main-products-table">
                        <thead>
                        <th>#</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php foreach ($sub_cats as $cat): ?>
                            <tr>
                                <td><?php echo $index++; ?></td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal"
                                       data-target="#slider_<?php echo $cat['id']; ?>"
                                       class="">
                                        <?php echo $cat['cat_name']; ?>
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action="<?php echo base_url('ui/category/toggle_status'); ?>">
                                        <input type="hidden" name="cat_id" value="<?php echo $cat['id']; ?>">
                                        <button type="submit"
                                                class="btn btn-sm btn-circle btn-success">
                                            <?php echo $cat['status'] == '1' ? ' غیر فعال شود' : 'فعال شود'; ?>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="modal fade" id="add_new_cat_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title persian-font" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="new-password" class="col-form-label">نام زیر دسته</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control" required="required"/>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="submit" class="btn btn-primary" id="submit_new_cat">ثبت</button>
            </div>
        </div>
    </div>
</div>

<?php foreach ($sub_cats as $cat): ?>

    <div class="modal fade" id="slider_<?php echo $cat['id']; ?>" tabindex="-1" role="dialog"
         aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title persian-font" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('ui/category/change_cat_name'); ?>"
                      method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="new-password" class="col-form-label">نام دسته </label>
                            <input name="new_cat_name"
                                   id="new_cat_name"
                                   class="form-control"
                                   value="<?php echo empty($cat['cat_name']) ? "_____" : $cat['cat_name']; ?>"
                                   required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_cat_id" id="_cat_id" value="<?php echo $cat['id']; ?>">
                        <button type="submit" class="btn btn-primary change_slider_description">ثبت</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<script>
    function addNewCat() {
        $("#add_new_cat_modal").modal();
    }

    $(document).ready(function () {
        $("#main-products-table").dataTable({});

        $("#submit_new_cat").click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('ui/category/add_sub_category'); ?>',
                data: {'cat_name': $("#cat_name").val(), "parent": "<?php echo $parent; ?>"},
                success: function (data) {
                    $("#add_new_cat_modal").modal("hide");
                    data = JSON.parse(data);
                    if (data["success"]) {
                        swal({
                            type: 'success',
                            title: 'عملیات با موفقیت انجام شد.',
                            showConfirmButton: false,
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000)
                    } else {
                        swal({
                            type: 'error',
                            title: 'خطا در انجام عملیات.',
                            text: data['error'],
                        });

                    }
                }
            });

        });
    });
</script>
