<div class="container-fluid">
    <div class="page-header">
        <h3>Settings</h3>
    </div>

    <?php
    if($session = $this->Session->flash()) {
        echo AppHelper::okeFlash($session);
    }

    if(!empty($errors)) {
        echo AppHelper::showErrors($errors);
    }

    ?>

    <?php
    echo $this->Form->create('Setting',
        array('class' => "form-horizontal",
            'role' => 'form',
            'type' => 'post'));
    ?>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active">
            <a href="#banner" role="tab" data-toggle="tab">
                <span class="menu-icon-setting span-option  icon-mn-function-menu-setting" data-original-title=""></span>
                <label class="label-option">Banner</label>
            </a>
        </li>
        
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="banner">
            <br>
            <div class="form-group">
                <label class="col-md-2">Type Banner</label>
                <div class="col-sm-4">
                    <select class="form-control" name="data[Setting][type_banner]">
                        <option value="0" <?php echo $setting['Setting']['type_banner'] == 0 ? 'selected' : '' ?>>Picture</option>
                        <option value="1" <?php echo $setting['Setting']['type_banner'] == 1 ? 'selected' : '' ?>>Video</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <div class="col-sm-12 margin-footer">
                    <div class="col-sm-2 col-sm-offset-4 margin-footer"><input class="btn btn-success btn-lg btn-block" type="submit"
                                                                               id="save" name="_eventId_save" value="Save"/></div>
                    <div class="col-sm-2 margin-footer"><input class="btn btn-default btn-lg btn-block" type="reset"
                                                               name="_eventId_cancel" value="Reset"/></div>
                </div>
            </div>
        </div>
    </footer>

    <?php echo $this->Form->end(null); ?>

</div>




