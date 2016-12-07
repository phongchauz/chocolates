<?php echo $this->Html->css('bootstrap-select');?>
<h1>Chocolates Types</h1>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-share font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Portlet</span>
                    <span class="caption-helper">monthly stats...</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default tooltips" href="#" id="download-sample" data-original-title="<?php echo $this->AdminPortal->__('Download Sample');?>" data-container="body">
                        <i class="fa fa-file-excel-o"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default tooltips" href="javascript:;"  data-original-title="<?php echo $this->AdminPortal->__('Import Data');?>" data-container="body">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default tooltips" href="javascript:;"  data-original-title="<?php echo $this->AdminPortal->__('Export Data');?>" data-container="body">
                        <i class="icon-cloud-download"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default tooltips" href="javascript:;" id="add-chocolate-type" data-original-title="<?php echo $this->AdminPortal->__('Add New');?>" data-container="body">
                        <i class="fa fa-plus"></i>
                    </a>
                    <?php echo $this->element('CoreData/add_chocolate_type'); ?>
                </div>
            </div>
            <div class="portlet-body">

                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Form->create('ChocolateTypeList', array('type' => 'get', 'class' => 'form-inline', 'url' => '#')); ?>
                            <div class="form-group">
                                <label for="searchValue"><?php echo $this->AdminPortal->__('Search For'); ?></label>
                                <input autocomplete="off" maxlength="250" type="text" id="searchValue" name="searchValue" class="form-control search-for input-search select-data search-data" value="<?php echo isset($searchValue) ? $searchValue : ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="fieldValue"><?php echo $this->AdminPortal->__('Field Value'); ?></label>
                                <select name="fieldValue" class="form-control selectpicker search-data select-data cbb-search-key" id="fieldValue">
                                    <?php
                                    foreach($arrFieldsSearch as $key => $value) {
                                        $selected = isset($fieldValue) &&  $key == $fieldValue ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $key ?>" <?php echo $selected; ?>><?php echo $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php echo $this->Form->end(null); ?>
                    </div>
                </div>
                <hr>

                <div class="table-responsive col-md-12" id="main-content">

                    <?php echo $this->element('CoreData/main_content_chocolate_type', array('chocolateTypeList' => $chocolateTypeList, 'recordNum' => $recordNum)); ?>


                </div>
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>
<script>

</script>
<?php echo $this->Html->script($this->plugin.'.CoreData/chocolate-type.js');?>

