<div class="modal fade" id="modal-add-chocolate-type" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title text-normal text-bold text-default"><?php echo $this->AdminPortal->__('Add Chocolate Type');?></h4>
                </div>
                <div class="modal-body text-normal">
                    <div class="form-group has-success">
                        <label class="control-label text-default"><?php echo $this->AdminPortal->__('Code');?> (<span class="input-require text-danger">*</span>)</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control add-data" id="code" required> </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label text-default"><?php echo $this->AdminPortal->__('Name');?> (<span class="input-require text-danger">*</span>)</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control add-data" id="name" required> </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn blue btn-act btn-smooth" id="save-chocolate-type"><?php echo $this->AdminPortal->__('Save');?></button>
                    <button type="button" class="btn default btn-act btn-smooth" data-dismiss="modal"><?php echo $this->AdminPortal->__('Close');?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>

    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    focusInput('modal-add-chocolate-type', 'code');
</script>
