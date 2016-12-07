<!-- BEGIN FORM-->
<?php
$id = isset($id) ? $id : 0 ;
$type = isset($type) ? $type : 0 ;
echo $this->Form->create('Banner',
    array('class' => "form-horizontal",
        'id' => 'formCreateBanner',
        'role' => 'form',
        'type' => 'file'
    ));

?>
<div class="form-body">

    <div class="form-group <?php echo ($id == 0) ? '' : 'hide' ?>">
        <label class="col-md-3">
            Type
        </label>
        <div class="col-md-2">
            <input type="radio" name="typeBanner" value="0" class="rdbTypePicture" <?php echo $type == 0 ? 'checked' : '' ?> > Picture <br>
        </div>
        <div class="col-md-7">
            <input type="radio" name="typeBanner" value="1" class="rdbTypeVideo" <?php echo $type == 1 ? 'checked' : '' ?>> Video<br>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3">
            Name
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->input('name',
                array('class' => 'form-control',
                    'label' => false,
                    'required' => true,
                    'error' => false
                ));
            ?>
        </div>
    </div>


<!--    picture-->
    <div class="form-group picture">
        <label class="col-sm-12 col-md-3 padding-top-10">Picture</label>
        <div class="col-sm-12 col-md-9">
            <input id="pictureBanner" name="data[Banner][picture_file]" type="file" class="form-control" accept="image/*" >
        </div>
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-9">
            <span class="hint-img">Image for PC: 1600x1000, for Mobile: 1136x1008</span>
        </div>
    </div>

    <div class="form-group picture">
        <label class="col-md-3">
            Picture Caption
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->input('picture_caption',
                array('class' => 'form-control',
                    'label' => false,
                    'required' => false,
                    'error' => false
                ));
            ?>
        </div>
    </div>

    <div class="form-group picture">
        <label class="col-md-3">
            Picture Title
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->input('picture_title',
                array('class' => 'form-control',
                    'label' => false,
                    'required' => false,
                    'error' => false
                ));
            ?>
        </div>
    </div>

    <div class="form-group picture">
        <label class="col-md-3">
            Picture Alt
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->input('picture_alt',
                array('class' => 'form-control',
                    'label' => false,
                    'required' => false,
                    'error' => false
                ));
            ?>
        </div>
    </div>

    <div class="form-group picture">
        <label class="col-md-3">
            Picture Location
        </label>
        <div class="col-md-9">
            <select name="location_type" class="form-control" id="location-type">
                <?php
                foreach($arrLocationType as $locType){
                    $selected = (isset($locationType) && $locationType == $locType['id']) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $locType['id']; ?>" <?php echo $selected ?> ><?php echo $locType['name'] ?></option>
                    <?php
                }
                ?>

            </select>
        </div>
    </div>

    <div class="form-group picture">
        <label class="col-md-3">
            Order
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->input('order',
                array('class' => 'form-control',
                    'type' => 'number',
                    'default' => 0,
                    'min' => 0,
                    'label' => false,
                    'required' => false,
                    'error' => false
                ));
            ?>
        </div>
    </div>

<!--     video-->
    <div class="form-group video">
        <label class="col-md-3">
            Video Url
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->input('link_video',
                array('class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'Eg: https://www.youtube.com/watch?v=kpQMogfIWew',
                    'type' => 'text',
                    'required' => true,
                    'error' => false
                ));
            ?>
        </div>
    </div>

    <div class="form-group video">
        <label class="col-md-3">
            Main
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->checkbox('main', array('default' => 0)); ?>
        </div>
    </div>


    <div class="form-group">
        <label class="col-md-3">
            Active
        </label>
        <div class="col-md-9">
            <?php echo $this->Form->checkbox('is_active', array('default' => 1)); ?>
        </div>
    </div>

    <?php echo $this->Form->input('picture',
        array('class' => 'form-control',
            'label' => false,
            'type' => 'hidden',
            'error' => false
        ));
    ?>

    <hr>
    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success admin-btn-same-with btn-round">Save</button>
            <button data-dismiss="modal" class="btn btn-default admin-btn-same-with btn-round">Close</button>
        </div>
    </div>
</div>

<?php echo $this->Form->end(null); ?>
<!-- END FORM-->

<script>
    $(function(){
        var type = '<?php echo $type ?>';
        if(type == 0){
            $('.video').hide();
            $('#BannerLinkVideo').val("link");
        } else {
            $('.picture').hide();
        }

        $(document).on('click','.rdbTypePicture', function(){
            $('#BannerName').val("");
            $('#BannerLinkVideo').val("link");
            $('#BannerIsActive').prop("checked", true);
            $('.picture').show();
            $('.video').hide();
        });

        $(document).on('click','.rdbTypeVideo', function(){
            $('#BannerName').val("");
            $('#BannerLinkVideo').val("");
            $('#BannerIsActive').prop("checked", true);
            $('.picture').hide();
            $('.video').show();
        });
    })
</script>