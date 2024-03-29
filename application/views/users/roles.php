<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubbles"></i> لیست رول ها
                </div>
                <div class="actions">
                    <a href="javascript:;"
                       class="btn btn-danger btn-sm btn-circle" id="new-role">
                        <i class="fa fa-plus"></i> رول جدید </a>
                    <a href="<?php echo base_url('admin/user/users'); ?>" class="btn btn-default btn-sm" data-toggle="tooltip" title="بازگشت">
                         <i class="icon-action-undo"></i>
                    </a>
                </div>
            </div>
            <div class="portlet-body">

                <table border="0" class="table table-responsive table-bordered table-striped"
                       id="customers-table">
                    <thead>
                    <tr>
                        <!-- <th>ردیف</th> -->
                        <th>نام</th>
                        <!-- <th>نام کاربری</th> -->
                        <!-- <td>نوع کاربر</td> -->
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $index = 1;
                    foreach ($roles as $role) {
                        echo "<tr>";
                        // echo  "<td>" . $index++ . "</td>";
                        echo "<td>" . $role["name"] . "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-sm btn-danger' data-id='{$role["id"]}' data-toggle='modal' data-target='#{$role["id"]}'>" . "ویرایش" . "</button>";
                        echo "<form method='POST' action='" .
                            base_url('admin/user/delete_role') .
                            "' style='display:inline;'>";
                        echo "<input type='hidden' name='role_id' value='" . $role["id"] . "'/>";
                        echo "<input type='submit' class='btn btn-sm btn-danger' data-id='" . $role["id"] . "' value='حذف'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog"
                     aria-labelledby="modalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?php echo base_url('admin/user/change_password') ?>"
                                      id="">

                                    <div class="form-group">
                                        <label for="new-password" class="col-form-label">گذر واژه جدید</label>
                                        <input type="text" class="form-control"
                                               id="new-password"
                                               name="new-password">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                <input type="hidden" value="" id="user-id" name="user-id"/>
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <?php foreach ($roles as $role): ?>
                    <div class="modal fade" id="<?php echo $role["id"]; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="modalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title persian-font" id="modalLabel">انتخاب اختیارات این رول</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?php echo base_url('admin/user/update_role') ?>" id="">

                                        <div class="form-group">
                                            <div class="row">
                                                <?php
                                                $index = 0;
                                                // $permissions = o2a(json_decode($role["permissions"]));
                                                $role_perms    = array_column($role["permissions"], "permission_name");
                                                $all_perm_keys = array_column($all_perms, "permission_name");
                                                foreach ($all_perms as $perm) {
                                                    $has_perm = in_array($perm["permission_name"], $role_perms);
                                                    echo "<div class='col-xs-4'>";

                                                    echo sprintf(
                                                        "<input type='checkbox' class='' name='%s' value='%s' style='display:inline;' %s>",
                                                        $perm["permission_name"],
                                                        $has_perm == true ? 'true' : 'false',
                                                        $has_perm == true ? 'checked' : ''
                                                    );
                                                    // echo($perm[] ? $perm_descriptions[$perm] : $perm);
                                                    echo $perm["permission_description"];
                                                    echo "</div>";
                                                }
                                                ?>

                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="role_id" value="<?php echo $role["id"]; ?>"/>
                                    <button type="submit" class="btn btn-primary">ثبت</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


                <div class="modal fade" id="new-role-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title persian-font" id="modalLabel">نام رول</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?php echo base_url('admin/user/add_role') ?>"
                                      id="">

                                    <div class="form-group">
                                        <label for="new-password" class="col-form-label">نام رول</label>
                                        <input type="text" name="role_name" id="role_name" class="form-control"/>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ثبت</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <script>

                    $(document).ready(function () {
                        $("#new-role").click(function () {
                            $("#new-role-modal").modal();
                        });

                        $("#customers-table").DataTable({
                            "searchign": false,
                            "sorting": false,
                            "ordering": false,
                            scrollY: 300,
                            scroller: {
                                loadingIndicator: true
                            },
                            "language": {
                                "sEmptyTable": "هیچ داده ای در جدول وجود ندارد",
                                "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                                "sInfoEmpty": "نمایش 0 تا 0 از 0 رکورد",
                                "sInfoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                                "sInfoPostFix": "",
                                "sInfoThousands": ",",
                                "sLengthMenu": "نمایش _MENU_ رکورد",
                                "sLoadingRecords": "در حال بارگزاری...",
                                "sProcessing": "در حال پردازش...",
                                "sSearch": "جستجو:",
                                "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                                "oPaginate": {
                                    "sFirst": "ابتدا",
                                    "sLast": "انتها",
                                    "sNext": "بعدی",
                                    "sPrevious": "قبلی"
                                },
                                "oAria": {
                                    "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                                    "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                                }
                            },
                        });

                        // $(document).on('click',".delete-user",function()
                        // {
                        // 		var id = $(this).attr("data-id");
                        // var thisrow = $(this).parents("tr");
                        // swal({
                        //     title: "",
                        //     text: "",
                        //     type: "warning",
                        //     showCancelButton: true,
                        //     confirmButtonClass: "btn-danger",
                        //     confirmButtonText: "حذف",
                        //     cancelButtonText: 'بازگشت',
                        //     closeOnConfirm: false
                        // },
                        // function () {
                        //      $.ajax({
                        //         url: '<?php echo base_url('admin/user/delete_user'); ?>',
                        //         async: 'false',
                        //         cache: 'false',
                        //         type: 'POST',
                        //         data: {"what": id},
                        //         success: function (response) {
                        //             var data = JSON.parse(response);
                        //             if (data["success"] == false) {
                        //                 var msg = data["error"] || "خطا در حذف";
                        //                 swal("", msg , "warning")
                        //             } else {
                        //             	window.location="<?php echo base_url('admin/user/users') ?>"
                        //             }
                        //         }
                        //     }); //$.ajax
                        // });
                        // });

                        // $(document).on('click','.change-password',function()
                        // {
                        //       var id = $(this).attr("data-id");
                        //       $("#user-id").attr("value",id);
                        //       $("#change-password-modal").modal();
                        // });

                        // $("#new-user").click(function()
                        // {
                        //   $("#new-user-modal").modal();
                        // })

                    });
                </script>
            </div>
        </div>
    </div>
</div>


