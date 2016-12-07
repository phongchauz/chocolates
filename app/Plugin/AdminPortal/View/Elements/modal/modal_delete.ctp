<div class="modal fade" id="modal-delete-<?php echo $id;?>" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-normal text-bold t-left"><?php echo $headerConfirm;?></h4>
            </div>
            <div class="modal-body text-normal">
                <div class="t-left">
                    <?php  echo $str; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" id="btn-delete-object-<?php echo $id;?>" data-id="<?php echo $id;?>" class="btn blue btn-act btn-delete-object btn-smooth" ><?php echo $this->AdminPortal->__('Delete');?></button>
                <button type="button" class="btn default btn-act btn-smooth" data-dismiss="modal"><?php echo $this->AdminPortal->__('Close');?></button>
            </div>
        </div>

    </div>
    <!-- /.modal-dialog -->
</div>

