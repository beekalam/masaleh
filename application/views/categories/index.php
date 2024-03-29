<div class="page-bar"></div>
<?php $vm = get_defined_vars()['_ci_data']['_ci_vars']; ?>
<div class="row">

    <div class="col-xs-12">

        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
                    <span class="caption-subject bold uppercase"></span>
                </div>
                <div class="actions">
                    <button class="btn btn-default btn-sm trigger" onclick="addNewCat()">
                        <i class="fa fa-plus"></i>افزودن دسته
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
                        <th>مدیریت زیر دسته ها</th>
                        <th>تغییر تصویر</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $cat): ?>
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
                                    <a href="<?php echo $cat['pic_absolute_path']; ?>">
                                        <img src="<?php echo $cat['pic_absolute_path']; ?>" width="100px"
                                             height="100px"/>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('ui/category/sub_cats?cat_id=') . $cat['id'] . "&name=" . $cat['cat_name']; ?>"
                                       class="btn btn-sm btn-circle btn-default">زیر دسته ها</a>
                                </td>
                                <td>
                                    <!--<a onclick="showImage(' //echo $cat['pic_absolute_path'] )"-->
                                    <!--class="btn btn-sm btn-circle btn-default">مشاهده تصویر</a>-->

                                    <form action="<?php echo base_url('ui/category/change_picture'); ?>"
                                          style="form" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $image_id  = "image_" . uniqid();
                                        $submit_id = "s_" . uniqid();
                                        ?>
                                        <input type="file" name="img" class="btn btn-default btn-circle btn-sm"/>
                                        <input type="hidden" name="cat_id" id="cat_id"
                                               value="<?php echo $cat['id']; ?>">
                                        <input type="submit" value="ارسال تصویر"
                                               class="btn btn-default btn-sm btn-circle" id="<?php echo $image_id; ?>">
                                    </form>


                                    <a onclick="changeImage('<?php echo $cat['id']; ?>')" style="display: none;"
                                       class="btn btn-sm btn-circle btn-default">تغییر تصویر</a>
                                </td>
                                <td>
                                    <a onclick="deleteCategory('<?php echo $cat['id']; ?>')"
                                       class="btn btn-sm btn-circle btn-danger">حذف</a>
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


<?php foreach ($categories as $cat): ?>

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
                        <label for="new-password" class="col-form-label">نام دسته</label>
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

<script>
    function deleteCategory(cat_id) {
        var dlg = {
            "url": "<?php echo base_url('ui/category/delete_category'); ?>",
            "reload_on_success": true,
            "title": "حذف دسته  و تمامی زیر دسته ها",
            "html": "مطمئن هستید؟",
            "to_send": {
                'id': cat_id
            }
        };
        ask_user_confirm(dlg);
    }


    function addNewCat() {
        $("#add_new_cat_modal").modal();
    }

    $(document).ready(function () {
        $("#main-products-table").dataTable({});

        $("#submit_new_cat").click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('ui/category/add_category'); ?>',
                data: {'cat_name': $("#cat_name").val()},
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

    function showImage(image_path) {
        swal({
            title: '',
            text: '',
            imageUrl: image_path,
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: '',
            animation: false
        });
    }

    function changeImage(cat_id) {
        swal({
            title: 'یک تصویر انتخاب کنید.',
            input: 'file',
            inputAttributes: {
                'accept': 'image/*',
                'aria-label': 'Upload your profile picture'
            },
            inputValidator: function (value) {
                return new Promise(function (resolve) {
                    if (value) {
                        var reader    = new FileReader();
                        reader.onload = function (e) {
                            var img = reader.result;
                            swal({
                                title: 'Your uploaded picture',
                                imageUrl: e.target.result,
                                showLoaderOnConfirm: true,
                                showCancelButton: true,
                                confirmButtonText: 'ارسال',
                                cancelButtonText: 'لغو',
                                cancelButtonColor: '#ff5d48',
                                preConfirm: function () {
                                    return new Promise(function (resolve, reject) {
                                        $.ajax({
                                            url: "<?php echo base_url('ui/category/change_picture'); ?>",
                                            data: {"img": img, "cat_id": cat_id},
                                            type: 'POST',
                                            cache: false
                                        }).done(function (data) {
                                            data = JSON.parse(data);
                                            if (data["success"]) {
                                                window.location.reload();
                                            } else {
                                                // reject(data['error']);
                                            }
                                        });
                                    });
                                }
                            });
                        };
                        reader.readAsDataURL(value);
                    }
                });
            }
        });
    }

</script>
