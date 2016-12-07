<div id="modal-update-status-<?php echo $id;?>" aria-hidden="false" aria-labelledby="update-confirmation" role="dialog" tabindex="-1" class="modal fade in dialog-update-confirm-<?php echo $id; ?>">
    <?php

    $strSuccessActive =  $this->BscAdmin->__("This module have been actived!");
    $strSuccessBlock =  $this->BscAdmin->__("This module have been blocked!");
    $strUpdateFail =  $this->BscAdmin->__("Module's status haven't saved!");

    ?>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button btn-sm">
                    <span tabindex="8" aria-hidden="true">×</span>
                    <span class="sr-only"><?php echo $this->BscAdmin->__('Close');?></span>
                </button>
                <strong class="modal-title"><?php echo $this->BscAdmin->__('Confirm Update');?></strong>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn <?php echo CLASS_BUTTON_COMMON.STYLE_BUTTON_COMMON ?> admin-btn-same-with" id="update-status" onclick="updateStatus()"><?php echo $this->BscAdmin->__('Ok');?></button>
                <button class="btn <?php echo CLASS_BUTTON_DEL_CANCEL_CLOSE.STYLE_BUTTON_COMMON ?> admin-btn-same-with" type="button" id="project-cancel-update" onclick="resetRad()"><?php echo $this->BscAdmin->__('Cancel');?></button>
            </div>
        </div>
    </div>
</div>
<script>

    function updateStatus(){
        var mId = $('#module-id').val();
        var mStatus = $('#module-status').val();

        $.ajax({
            url: '<?php echo $this->Html->url(array('plugin' => 'bsc_admin', 'controller' => 'BscModule', 'action' => 'updateStatus')); ?>',
            type: 'POST',
            dataType: 'json',
            data: {moduleStatus: mStatus, moduleId: mId},
            success: function(response) {
                $('.dialog-update-confirm-'+response.moduleId).modal('hide');
                if (response.success == true) {

                    $('#radio_pending_'+response.moduleId).attr('disabled', true);
                    $('#radio_active_'+response.moduleId).attr("data-current-status",response.moduleStatus);
                    $('#radio_block_'+response.moduleId).attr("data-current-status",response.moduleStatus);

                    if(response.moduleStatus == 1){

                        slideMessage('Success', "<?php echo $strSuccessActive; ?>", 'success');
                    }else{
                        slideMessage('Success', "<?php echo $strSuccessBlock; ?>", 'success');
                    }


                }else{
                    slideMessage('Failed', "<?php echo $strUpdateFail; ?>", 'danger');
                }
            }
        });

    }

    function resetRad(){
        var mCStatus = $('#module-current-status').val();
        var mId = $('#module-id').val();

        switch(mCStatus) {
            case '1':
                $('#radio_active_'+mId).prop('checked', true);
                break;
            case '2':
                $('#radio_block_'+mId).prop('checked', true);
                break;
        }
        $('#modal-update-status-'+mId).modal('hide');
    }

</script>