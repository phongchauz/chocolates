<div id="modal-update-status-<?php echo $id;?>" aria-hidden="false" aria-labelledby="update-confirmation" role="dialog" tabindex="-1" class="modal fade in dialog-update-confirm-<?php echo $id; ?>">
    <?php

    $strSuccessActive =  $this->BscAdmin->__("This function have been actived!");
    $strSuccessBlock =  $this->BscAdmin->__("This function have been blocked!");
    $strUpdateFail =  $this->BscAdmin->__("Function's status haven't saved!");

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
        var fId = $('#function-id').val();
        var fStatus = $('#function-status').val();

        $.ajax({
            url: '<?php echo $this->Html->url(array('plugin' => 'bsc_admin', 'controller' => 'BscFunction', 'action' => 'updateStatus')); ?>',
            type: 'POST',
            dataType: 'json',
            data: {functionStatus: fStatus, functionId: fId},
            success: function(response) {
                $('.dialog-update-confirm-'+response.functionId).modal('hide');
                if (response.success == true) {

                    $('#radio_pending_'+response.functionId).attr('disabled', true);
                    $('#radio_active_'+response.functionId).attr("data-current-status",response.functionStatus);
                    $('#radio_block_'+response.functionId).attr("data-current-status",response.functionStatus);

                    if(response.functionStatus == 1){

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
        var fCStatus = $('#function-current-status').val();
        var fId = $('#function-id').val();

        switch(fCStatus) {
            case '1':
                $('#radio_active_'+fId).prop('checked', true);
                break;
            case '2':
                $('#radio_block_'+fId).prop('checked', true);
                break;
        }
        $('#modal-update-status-'+fId).modal('hide');
    }

</script>