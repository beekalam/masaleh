<script src="<?php echo base_url('assets/js/mansouri.js') . "?cc=" . uniqid(); ?>"></script>
<?php $view_data = get_defined_vars()['_ci_data']['_ci_vars']; ?>
<?php
// pr($product);
// exit;
?>
<!-- BEGIN PAGE HEADER-->
<div class="page-bar"></div>


<div class="row">

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i>
                <span class="caption-subject bold uppercase">
                    زمان بندی
                    <?php @print("(" . $product['title'] . ")"); ?>
                </span>
            </div>
            <div class="actions">
                <a href="<?php echo base_url('ui/products'); ?>"
                   class="btn btn-default btn-sm" data-toggle="tooltip" title="بازگشت">
                    <i class="icon-action-undo"></i>
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div id="calendar" class=""></div>
        </div>
    </div>

    <?php $this->load->view('_calendar', array("product" => $product)); ?>
</div>