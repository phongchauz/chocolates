<div id="modal-update-status-<?php echo $id;?>" aria-hidden="false" aria-labelledby="update-confirmation" role="dialog" tabindex="-1" class="modal fade in dialog-update-confirm-<?php echo $id; ?>">
    <?php

    $strSuccessActive =  $this->BscAdmin->__("This project have been actived!");
    $strSuccessBlock =  $this->BscAdmin->__("This project have been blocked!");
    $strUpdateFail =  $this->BscAdmin->__("Project's status haven't saved!");

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
        var pId = $('#project-id').val();
        var pStatus = $('#project-status').val();

        $.ajax({
            url: '<?php echo $this->Html->url(array('plugin' => 'bsc_admin', 'controller' => 'BscProject', 'action' => 'updateStatus')); ?>',
            type: 'POST',
            dataType: 'json',
            data: {projectStatus: pStatus, projectId: pId},
            success: function(response) {
                $('.dialog-update-confirm-'+response.projectId).modal('hide');
                if (response.success == true) {

                    $('#radio_pending_'+response.projectId).attr('disabled', true);
                    $('#pending-column-'+response.projectId).addClass('label-pending');

                    $('#radio_pending_'+response.projectId).attr("data-current-status",response.projectStatus);
                    $('#radio_active_'+response.projectId).attr("data-current-status",response.projectStatus);
                    $('#radio_block_'+response.projectId).attr("data-current-status",response.projectStatus);

                    if(response.projectStatus == 1){

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
        var pCStatus = $('#project-current-status').val();
        var pId = $('#project-id').val();

        switch(pCStatus) {
            case '0':
                $('#radio_pending_'+pId).prop('checked', true);
                break;
            case '1':
                $('#radio_active_'+pId).prop('checked', true);
                break;
            case '2':
                $('#radio_block_'+pId).prop('checked', true);
                break;
        }
        $('#modal-update-status-'+pId).modal('hide');
    }

</script>