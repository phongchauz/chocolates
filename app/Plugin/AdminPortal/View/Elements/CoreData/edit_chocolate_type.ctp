<?php
$id     = $object['id'];
$code   = $object['code'];
$name   = $object['name'];
$active = ($object['status'] == 1) ? 'checked' : '';
$lock   = ($object['status'] == 0) ? 'checked' : '';

?>

<div class="modal fade" id="modal-update-chocolate-type-<?php echo $id;?>" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-normal text-bold"><?php echo $this->AdminPortal->__('Edit Chocolate Type');?></h4>
            </div>
            <div class="modal-body text-normal">

                <div class="form-group has-success">
                    <label class="control-label text-left text-default"><?php echo $this->AdminPortal->__('Code');?> (<span class="input-require text-danger">*</span>):</label>
                    <div class="input-icon right">
                        <input type="text" class="form-control update-data text-default" data-id="<?php echo $id;?>" data-current-code="<?php echo $code;?>" id="code-<?php echo $id;?>" required value="<?php echo $code;?>"> </div>
                </div>
                <div class="form-group has-success">
                    <label class="control-label text-left text-default"><?php echo $this->AdminPortal->__('Name');?> (<span class="input-require text-danger">*</span>):</label>
                    <div class="input-icon right">
                        <input type="text" class="form-control update-data text-default" data-id="<?php echo $id;?>" id="name-<?php echo $id;?>" required value="<?php echo $name;?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label text-left"><?php echo $this->AdminPortal->__('Status');?> (<span class="input-require text-danger">*</span>):</label>
                    <div class="input-icon right text-normal">
                        <div class="form-group form-md-radios">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" data-id="<?php echo $id;?>" value="1" id="status-active-<?php echo $id;?>" name="status-object-<?php echo $id;?>" class="md-radiobtn status-object" <?php echo $active;?>>
                                    <label for="status-active-<?php echo $id;?>">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span> <?php echo $this->AdminPortal->__('Active');?> </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" data-id="<?php echo $id;?>" value="0" id="status-lock-<?php echo $id;?>" name="status-object-<?php echo $id;?>" class="md-radiobtn status-object" <?php echo $lock;?>>
                                    <label for="status-lock-<?php echo $id;?>">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span> <?php echo $this->AdminPortal->__('Lock');?> </label>
                                </div>

                            </div>
                        </div>
                        <input id="status-hidden-<?php echo $id;?>" value="<?php echo $object['status'];?>" hidden>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" data-id="<?php echo $id;?>" class="btn blue btn-act btn-edit-object btn-smooth"><?php echo $this->AdminPortal->__('Save');?></button>
                <button type="button" class="btn default btn-act btn-smooth" data-dismiss="modal"><?php echo $this->AdminPortal->__('Close');?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>

</script>
