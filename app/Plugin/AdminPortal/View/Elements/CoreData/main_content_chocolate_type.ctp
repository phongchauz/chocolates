<table class="table table-hover">
    <thead>
    <tr>
        <th class="col-sm-1 col-md-1 col-lg-1"> <?php echo $this->AdminPortal->__('No.');?> </th>
        <th class="col-sm-1 col-md-1 col-lg-1"> <?php echo $this->AdminPortal->__('Code');?> </th>
        <th class="col-sm-7 col-md-7 col-lg-7"> <?php echo $this->AdminPortal->__('Name');?> </th>
        <th class="col-sm-1 col-md-1 col-lg-1"> <?php echo $this->AdminPortal->__('Status');?> </th>
        <th class="col-sm-1 col-md-1 col-lg-1"> <?php echo $this->AdminPortal->__('Created At'); ?> </th>
        <th class="col-sm-1 col-md-1 col-lg-1"></th>
        <th class="col-sm-1 col-md-1 col-lg-1"> </th>
    </tr>
    </thead>
    <tbody>

    <?php
        $no = 0;
        foreach($chocolateTypeList as $chocolateType){
            $no++;
            $object     = $chocolateType['ChocolateType'];
            $id         = $object['id'];
            $code       = $object['code'];
            $name       = $object['name'];
            $status     = $object['status'];
            $createdAt  = $this->AdminPortal->formatDate($object['created_at']);
        ?>
        <tr>
            <td> <?php echo ($no + $recordNum);?> </td>
            <td> <?php echo $code;?> </td>
            <td> <?php echo $name;?> </td>
            <td> <?php echo $this->AdminPortal->renderStatus($status);?> </td>
            <td> <?php echo $createdAt;?></td>
            <td class="text-center pointer">
                <div class="edit-ico td-update-data" data-id="<?php echo $id;?>">
                    <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="<?php echo $this->AdminPortal->__('Edit Chocolate Type');?>"></i>
                </div>
                <script>

                    $(function(){
                        $('[data-toggle="tooltip"]').tooltip();
                    });


                </script>
            </td>
            <?php echo $this->element('CoreData/edit_chocolate_type', array('object' => $object)); ?>
            <td class="text-center pointer">
                <div class="edit-ico td-delete-data" data-id="<?php echo $id;?>" data-name="<?php echo $name;?>">
                    <i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="<?php echo $this->AdminPortal->__('Delete Chocolate Type');?>"></i>
                </div>

                <script>
                    $(function(){
                        $('[data-toggle="tooltip"]').tooltip();
                    });

                </script>
            </td>
            <?php
            echo $this->element('modal/modal_delete'
                , array(
                    'id' => $id
                    , 'headerConfirm' => $this->AdminPortal->__('Confirm Delete Chocolate Type')
                    , 'str' => $this->AdminPortal->__('Are you sure you want to delete').': <b>'.$name.'</b>?'
                )
            );
            ?>
        </tr>
    <?php }?>


    </tbody>
</table>
<?php echo $this->element('_paging', array('controller' => 'chocolateType')); ?>