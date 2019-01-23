<!-- BEGIN PAGE HEADER-->
<div class="page-bar"></div>

<div class="row">

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i>
                <span class="caption-subject bold uppercase">
                    زمان بندی
                </span>
            </div>
            <div class="actions">
                <a href="<?php echo base_url('ui/vehicles'); ?>" class="btn btn-default btn-sm" data-toggle="tooltip"
                   title="بازگشت">
                    <i class="icon-action-undo"></i>
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <form action="<?php echo base_url('ui/vehicles/vehicle_service_update'); ?>"
                  method="post"
                  class="form-horizontal">
                <div class="form-body">
                    <div class="row">
                        <?php foreach ($products as $p): ?>

                            <div class="form-group col-xs-6">
                                <label for="p-in" class="col-md-4 label-heading">
                                    <?php echo $p['title']; ?>
                                </label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control"
                                           id="product_<?php echo $p['id']; ?>"
                                           name="product_<?php echo $p['id']; ?>"
                                           value="<?php echo $p['service_price']; ?>">
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-actions">
                    <div class="row">
                        <div class="col-xs-offset3">
                            <input type="submit" class="btn blue-hoki" value="ثبت">
                            <input type="hidden" name="vehicle_id" value="<?php echo $id; ?>"/>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>