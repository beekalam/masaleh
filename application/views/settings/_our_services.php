<script>

    function newServiceImage() {
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
                                            url: "<?php echo base_url('ui/settings/new_service'); ?>",
                                            data: {"img": img},
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


    function deleteService(service_id) {
        var dlg = {
            "url": "<?php echo base_url('ui/settings/delete_service'); ?>",
            "reload_on_success": true,
            "title": "حذف ",
            "html": "مطمئن هستید؟",
            "to_send": {
                'service_id': service_id
            }
        };
        ask_user_confirm(dlg);
    }
</script>
<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-default pull-right" id="add_new_service" onclick="newServiceImage()">افزودن</button>
    </div>
    <div class="col-xs-12">

        <!--<div class="portlet box blue-hoki">-->
        <!--    <div class="portlet-title">-->
        <!--        <div class="caption">-->
        <!--            <i class="fa fa-plus"></i>-->
        <!--            <span class="caption-subject bold uppercase">اسلایدر</span>-->
        <!--        </div>-->
        <!--        <div class="actions">-->
        <!--            <button class="btn btn-default btn-sm trigger" onclick="newSliderImage()">-->
        <!--                <i class="fa fa-plus"></i>افزودن اسلایدر-->
        <!--            </button>-->
        <!--        </div>-->
        <!--    </div>-->
        <!---->
        <!--    <div class="portlet-body">-->
        <div class="row">
            <?php $index = 1; ?>
            <table class="table table-responsive table-hover table-striped" id="main-products-table">
                <thead>
                <th>#</th>
                <th>توضیحات</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                <?php foreach ($our_services as $service): ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $service['title']; ?></td>
                        <td>
                            <a href="<?php echo $service['pic_absolute_path']; ?>">
                                <img src="<?php echo $service['pic_absolute_path']; ?>" width="100px"
                                     height="100px"/>
                            </a>
                        </td>
                        <td>
                            <input type="hidden" name="slider_id" id="slider_id"
                                   value="<?php echo $service['id']; ?>">

                            <a onclick="deleteService('<?php echo $service['id']; ?>')"
                               class="btn btn-sm btn-circle btn-default">حذف </a>

                            <a href="javascript:;" data-toggle="modal"
                               data-target="#service_<?php echo $service['id']; ?>"
                               class="btn btn-sm btn-circle btn-default">تغییر توضیحات</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--    </div>-->
        <!--</div>-->
    </div>
</div>

<?php foreach ($our_services  as $service): ?>

    <div class="modal fade" id="service_<?php echo $service['id']; ?>" tabindex="-1" role="dialog"
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
                <form action="<?php echo base_url('ui/settings/change_service_descriptions'); ?>"
                      method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="new-password" class="col-form-label">عنوان </label>
                            <textarea name="title" id="title"
                                      class="form-control" style="height:225px;"
                                      required="required"><?php echo $service['title']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="new-password" class="col-form-label">توضیح </label>
                            <textarea name="subtitle" id="subtitle"
                                      class="form-control" style="height:225px;"
                                      required="required"><?php echo $service['subtitle']; ?></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="service_id" id="service_id" value="<?php echo $service['id']; ?>">
                        <button type="submit" class="btn btn-primary change_slider_description">ثبت</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
