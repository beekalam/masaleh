<div class="page-bar"></div>
<?php $vm = get_defined_vars()['_ci_data']['_ci_vars']; ?>

<div class="row">

    <div class="col-xs-12 col-md-6">

        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
                    <span class="caption-subject bold uppercase">اسلایدر</span>
                </div>
                <div class="actions">
                    <button class="btn btn-default btn-sm trigger" onclick="newSliderImage()">
                        <i class="fa fa-plus"></i>افزودن اسلایدر
                    </button>
                </div>
            </div>

            <div class="portlet-body">
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
                        <?php foreach ($sliders as $slider): ?>
                            <tr>
                                <td><?php echo $index++; ?></td>
                                <td><?php echo $slider['description']; ?></td>
                                <td>
                                    <a href="<?php echo $slider['pic_absolute_path']; ?>">
                                        <img src="<?php echo $slider['pic_absolute_path']; ?>" width="100px"
                                             height="100px"/>
                                    </a>
                                </td>
                                <td>
                                    <input type="hidden" name="slider_id" id="slider_id"
                                           value="<?php echo $slider['id']; ?>">
                                    <a onclick="changeImage('<?php echo $slider['id']; ?>')"
                                       class="btn btn-sm btn-circle btn-default">تغییر تصویر</a>

                                    <a onclick="deleteImage('<?php echo $slider['id']; ?>')"
                                       class="btn btn-sm btn-circle btn-default">حذف تصویر</a>

                                    <a href="javascript:;" data-toggle="modal"
                                       data-target="#slider_<?php echo $slider['id']; ?>"
                                       class="btn btn-sm btn-circle btn-default">تغییر توضیحات</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <div class="col-xs-12 col-md-6">

        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
                    <span class="caption-subject bold uppercase"> تنظیمات کیف پول</span>
                </div>
                <div class="actions">

                </div>
            </div>

            <div class="portlet-body form">
                <form action="<?php echo base_url('ui/settings/update_wallet_discount'); ?>"
                      method="post"
                      class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="wallet_discount" class="control-label col-xs-4">درصد تخفیف خرید از کیف
                                پول</label>
                            <div class="col-xs-8">
                                <input type="number" min="0" max="100"
                                       value="<?php echo $wallet_discount; ?>"
                                       name="wallet_discount"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-xs-offset-3">
                                <button type="submit" class="btn btn-circle btn-green">ثبت</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>


    <div class="col-xs-12 col-md-6">

        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
                    <span class="caption-subject bold uppercase">قوانین سایت</span>
                </div>
                <div class="actions">

                </div>
            </div>

            <div class="portlet-body form">
                <form action="<?php echo base_url('ui/settings/update_rules'); ?>"
                      method="post"
                      class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <!--                            <label for="wallet_discount" class="control-label col-xs-4">قوانین</label>-->
                            <div class="col-xs-12">
                                <textarea name="rules"
                                          style="height: 270px;"
                                          class="form-control"><?php echo $rules; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-xs-offset-3">
                                <button type="submit" class="btn btn-circle btn-green">ثبت</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>


<?php foreach ($sliders as $slider): ?>

    <div class="modal fade" id="slider_<?php echo $slider['id']; ?>" tabindex="-1" role="dialog"
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
                <form action="<?php echo base_url('ui/settings/change_slider_description'); ?>"
                      method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="new-password" class="col-form-label">توضیح </label>
                            <textarea name="description" id="description"
                                      class="form-control" style="height:225px;"
                                      required="required"><?php echo $slider['description']; ?></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="slider_id" id="slider_id" value="<?php echo $slider['id']; ?>">
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


<!-- wallet discount setting -->

<script>
    function addNewCat() {
        $("#add_new_cat_modal").modal();
    }

    $(document).ready(function () {
        $("#main-products-table").dataTable({});

        //$("#submit_new_cat").click(function (e) {
        //    e.preventDefault();
        //    $.ajax({
        //        type: "POST",
        //        url: '<?php //echo base_url('ui/category/add_category'); ?>//',
        //        data: {'cat_name': $("#cat_name").val()},
        //        success: function (data) {
        //            $("#add_new_cat_modal").modal("hide");
        //            data = JSON.parse(data);
        //            if (data["success"]) {
        //                swal({
        //                    type: 'success',
        //                    title: 'عملیات با موفقیت انجام شد.',
        //                    showConfirmButton: false,
        //                });
        //                setTimeout(function () {
        //                    window.location.reload();
        //                }, 2000)
        //            } else {
        //                swal({
        //                    type: 'error',
        //                    title: 'خطا در انجام عملیات.',
        //                    text: data['error'],
        //                });
        //
        //            }
        //        }
        //    });
        //
        //});

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

    function deleteImage(slider_id) {
        var dlg = {
            "url": "<?php echo base_url('ui/settings/delete_slider'); ?>",
            "reload_on_success": true,
            "title": "حذف اسلایدر",
            "html": "مطمئن هستید؟",
            "to_send": {
                'slider_id': slider_id
            }
        };
        ask_user_confirm(dlg);
    }

    function changeImage(slider_id) {
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
                                            url: "<?php echo base_url('ui/settings/change_picture'); ?>",
                                            data: {"img": img, "slider_id": slider_id},
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


    function newSliderImage() {
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
                                            url: "<?php echo base_url('ui/settings/new_slider'); ?>",
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

</script>


<!-- site settings -->
<div class="row">

    <!-- general settings -->
    <div class="col-xs-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gear font-dark"></i>
                    <span class="caption-subject bold font-dark uppercase">تنظیمات سایت</span>
                </div>
                <div class="actions">
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_general_settings" data-toggle="tab" aria-expanded="false"> تنظیمات کلی </a>
                    </li>

                    <li class="">
                        <a href="#tab_about_us" data-toggle="tab" aria-expanded="false"> صفحه درباره ما </a>
                    </li>

                    <li class="" style="">
                        <a href="#tab_our_services" data-toggle="tab" aria-expanded="false">صفحه خدمات ما</a>
                    </li>

                    <li class="" style="display: none;">
                        <a href="#tab_contact_us" data-toggle="tab" aria-expanded="false">صفحه تماس با ما</a>
                    </li>

                    <li class="" style="display: none;">
                        <a href="#tab_location" data-toggle="tab" aria-expanded="false">موقعیت </a>
                    </li>

                </ul>

            </div>
            <div class="portlet-body">

                <div class="tab-content">

                    <div class="tab-pane active" id="tab_general_settings">
                        <div class="form-body">
                            <form method="POST" action="<?php echo base_url('ui/settings/update_settings'); ?>">
                                <div class="row">
                                    <?php
                                    function form_group($lbl, $txt)
                                    {
                                        $lbl_text = $lbl["text"];
                                        $lbl_for  = $lbl["for"];
                                        unset($lbl["for"]);
                                        unset($lbl["text"]);
                                        echo "<div class='col-xs-6'>";
                                        echo "<div clsss='form-group'>";
                                        echo form_label($lbl_text, $lbl_for, $lbl);
                                        echo form_input($txt);
                                        echo "</div>";
                                        echo "</div>";
                                    }

                                    $lbl = array("class" => 'col-form-label', "for" => "");
                                    $txt = array("class" => 'form-control', "id" => "", "name" => "");

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "mobile";
                                    $lbl["text"]  = "موبایل";
                                    $txt["value"] = $mobile;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "phone";
                                    $lbl["text"]  = "تلفن";
                                    $txt["phone"] = $phone;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "fax";
                                    $lbl["text"]  = "فاکس";
                                    $txt["value"] = $fax;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "address";
                                    $lbl["text"]  = "آدرس";
                                    $txt["value"] = $address;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "email";
                                    $lbl["text"]  = "ایمیل";
                                    $txt["value"] = $email;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "copyright";
                                    $lbl["text"]  = "copyright";
                                    $txt["value"] = $copyright;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "about_us";
                                    $lbl["text"]  = "درباره ما";
                                    $txt["value"] = $about_us;
                                    // form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "enemad_url";
                                    $lbl["text"]  = "آدرس اینماد";
                                    $txt["value"] = $enemad_url;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "samandehi_url";
                                    $lbl["text"]  = "آدرس ساماندهی";
                                    $txt["value"] = $samandehi_url;
                                    form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "facebook_url";
                                    $lbl["text"]  = "آدرس فیس بوک";
                                    $txt["value"] = $facebook_url;
                                    // form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "instagram_url";
                                    $lbl["text"]  = "آدرس اینستا";
                                    $txt["value"] = $instagram_url;
                                    // form_group($lbl, $txt);

                                    $lbl["for"]          = $txt["id"] = $txt["name"] = "telegram_url";
                                    $lbl["text"]         = "آدرس تلگرام";
                                    $txt["telegram_url"] = $telegram_url;
                                    // form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "meta_description";
                                    $lbl["text"]  = "meta_description";
                                    $txt["value"] = $meta_description;
                                    // form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "keywords";
                                    $lbl["text"]  = "keywords";
                                    $txt["value"] = $keywords;
                                    // form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "business_moto";
                                    $lbl["text"]  = "شعار تبلیغاتی";
                                    $txt["value"] = $business_moto;
                                    // form_group($lbl, $txt);

                                    $lbl["for"]   = $txt["id"] = $txt["name"] = "contactus_email";
                                    $lbl["text"]  = "ایمیل دریافت پیامها:";
                                    $txt["value"] = $contactus_email;
                                    // form_group($lbl, $txt);

                                    ?>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="vorodi-description" class="col-form-label">توضیحات</label>
                                            <input type="text" class="form-control" id="vorodi-description"
                                                   name="vorodi-description">
                                            <span id="vorodi-description-error" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary" id="add-new-duration">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_about_us">
                        <div class="form-body">
                            <form method="POST" action="<?php echo base_url('ui/settings/update_about_us'); ?>">

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">محتوای صفحه درباره ما </label>
                                        <textarea id="about_us_long" rows="10" name="about_us_long"
                                                  cols="80"><?php echo $about_us_long; ?></textarea>
                                        <script>
                                            CKEDITOR.replace('about_us_long');
                                        </script>
                                    </div>

                                    <div class="form-group col-md-12" style="display: none;">
                                        <label for="exampleInputEmail1"> contact us page </label>
                                        <textarea id="about_us_long_en" rows="10" name="about_us_long_en"
                                                  cols="80"><?php echo $about_us_long_en; ?></textarea>
                                        <script>
                                            CKEDITOR.replace('about_us_long_en');
                                        </script>
                                    </div>

                                </div>

                                <!--<div class="form-group col-md-12">-->
                                <!--<input type="hidden" name="task_id" value="--><? //= $task_id; ?><!--">-->
                                <!--</div>-->
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-primary btn-sm btn-circle"
                                           value="ثبت">
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_our_services">
                        <?php $this->load->view("settings/_our_services", get_defined_vars()['_ci_data']['_ci_vars']); ?>
                    </div>

                    <div class="tab-pane" id="tab_contact_us">
                        <div class="form-body">
                            <form method="POST" action="<?php echo base_url('admin/settings/update_contact_us'); ?>">

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1"> محتوای صفحه تماس با ما </label>
                                        <textarea id="contact_us" rows="10" name="contact_us"
                                                  cols="80"><?php echo $contact_us; ?></textarea>
                                        <script>
                                            CKEDITOR.replace('contact_us');
                                        </script>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1"> contact us page </label>
                                        <textarea id="contact_us_en" rows="10" name="contact_us_en"
                                                  cols="80"><?php echo $contact_us_en; ?></textarea>
                                        <script>
                                            CKEDITOR.replace('contact_us_en');
                                        </script>
                                    </div>

                                </div>

                                <!--<div class="form-group col-md-12">-->
                                <!--<input type="hidden" name="task_id" value="--><? //= $task_id; ?><!--">-->
                                <!--</div>-->
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-primary btn-sm btn-circle"
                                           value="ثبت">
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_location">
                        <div class="form-body">
                            <form method="POST" action="<?php echo base_url('admin/settings/update_location'); ?>">

                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">موقعیت نقشه گوگل</label><br>


                                        <div class="form-group col-md-4">
                                            <label for="location_lat">latitude</label>
                                            <input name="location_lat" id="location_lat"
                                                   value="<?php echo isset($location_lat) ? $location_lat : ''; ?>"
                                                   type="text" class="form-control" style="text-align:right;"
                                                   placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="location_lng">longitude</label>
                                            <input name="location_lng" id="location_lng"
                                                   value="<?php echo isset($location_lng) ? $location_lng : ''; ?>"
                                                   type="text" class="form-control" style="text-align:right;"
                                                   placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="location_zoom">zoom</label>
                                            <input name="location_zoom" id="location_zoom"
                                                   value="<?php echo isset($location_zoom) ? $location_zoom : ''; ?>"
                                                   type="number"
                                                   class="form-control" style="text-align:right;" placeholder="">
                                        </div>

                                    </div>


                                    <div style="width:100%;padding:20px;">
                                        <div id="map" style="width:100%;height:300px;"></div>

                                        <script>
                                            var oldmarker;

                                            function myMap() {
                                                var mapCanvas  = document.getElementById("map");
                                                var myCenter   = new google.maps.LatLng(<?php if (isset($location_lat)) echo $location_lat; else '29.62517556'; ?>, <?php if (isset($location_lng)) echo $location_lng; else '52.52745867'; ?>);
                                                var mapOptions = {
                                                    center: myCenter,
                                                    zoom: <?php if ($location_zoom) echo $location_zoom; else '16'; ?>
                                                };
                                                var map        = new google.maps.Map(mapCanvas, mapOptions);
                                                google.maps.event.addListener(map, 'click', function (event) {
                                                    placeMarker(map, event.latLng);
                                                });
                                            }

                                            function placeMarker(map, location) {
                                                if (oldmarker) oldmarker.setMap(null);
                                                var marker = new google.maps.Marker({
                                                    position: location,
                                                    map: map
                                                });

                                                oldmarker                                      = marker;
                                                document.getElementById("location_lat").value  = location.lat();
                                                document.getElementById("location_lng").value  = location.lng();
                                                document.getElementById("location_zoom").value = map.getZoom();
//                                        var infowindow = new google.maps.InfoWindow({
//                                            content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
//                                        });
                                                infowindow.open(map, marker);
                                            }
                                        </script>

                                    </div>

                                </div>

                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-primary btn-sm btn-circle"
                                           value="ثبت">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

