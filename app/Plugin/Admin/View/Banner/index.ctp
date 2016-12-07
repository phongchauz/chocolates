<link href="<?php echo $this->webroot; ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">List of Banners</h1>
	</div>
	<!-- /.col-lg-12 -->
	<div class="col-lg-12">
		<div class="table-responsive col-sm-12">        
	    	<a class="btn btn-primary btn-round btn-add-banner" href="javascript:void(0)"><i class="fa fa-plus"></i> Add Banner</a>
            <table id="tableBanner" class="table table-hover table-checkable table-condensed table-striped no-footer" role="grid">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Picture/Video link</th>
                    <th>Title</th>
                    <th>Main</th>
                    <th>Location</th>
                    <th class="text-right"></th>
                </tr>
                </thead>                
            </table>
        </div>
	</div>
</div>

<script>

	    var ajaxBannerTable;

	    $(function() {

	    	ajaxBannerTable = $('#tableBanner').DataTable({
	    		searching: false,
	    		info: false,
	    		lengthChange: false,
	    		ordering: false,
	    		processing: true,
	    		serverSide: true,
	    		deferLoading: 0,
	    		ajax: {
    	            url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'banner', 'action' =>'index'), true); ?>",
    	            type: "POST"	    	            
    	    	},
	            order: [[ 1, "asc" ]],
	            fnRowCallback: function( nRow, aData, iDisplayIndex ) {
	            	var info = ajaxBannerTable.page.info();
	            	var index = iDisplayIndex + 1 + (info.page*info.length);
	            	$('td:eq(0)', nRow).html(index);
	            	return nRow;
	            },
	            columns: [
	            	{ "data": "id" },
	                { "data": "name" },
	                { "data": "picture" },
	                { "data": "picture_title" },
	                { "data": "main" },
	                { "data": "location_type" },
	                { "data": null }
	            ],
	            columnDefs: [{
            		"targets": 2,
            		"render" : function ( data, type, row ) {
							var result = '';
							if(row.type == 0){
								result = '<img style="height: 50px;" class="img-rounded" src="'+'<?php echo $this->webroot.'uploads/Banner/' ?>'+row.id+'/'+data+'">';
							} else {
								result = row.link_video;
							}
							return result;
                    	}
		            },{
					"targets": 4,
					"render" : function ( data, type, row ) {
						var result = '';
						if(row.main == 1){
							result = '<b>x</b>';
						} else {
							result = '';
						}
						return result;
					}
				},{
	                "targets": -1,
	                "class" : "text-right admin-cls-action",
	                "defaultContent": '<a class="btn btn-round btn-sm btn-primary admin-btn-same-with btn-edit-banner" href="javascript:;"><i class="fa fa-edit"></i> Edit</a><a style="margin-left: 10px;" class="btn btn-sm btn-danger admin-btn-same-with btn-remove-banner btn-round" href="javascript:;"><i class="fa fa-trash"></i> Delete</a>'
	            }]
	        }).ajax.reload();

	    	$(document).on('click', '.btn-add-banner', function (event) {
				var contentHtml = '<h4>Add Banner</h4>';
				$('.modal-add-edit-banner-header').html(contentHtml);
	    		$.getContentModal(APP.ApiUrl('admin/banner/add'), ".modal-edit-banner-body", "#modalEditBanner");
	    		$("#pictureBanner").fileinput({
	    	        showUpload: false,
	    	        showRemove: false,
//	    	        minFileCount: 1,
	    	        maxFileCount: 1,
	    	        msgProgress: 'Loading file {index} of {files} - {name} - {percent}% completed.',
	    	        allowedFileExtensions: ["jpg", "png"],
	    	        overwriteInitial: true,
	    	        allowedFileTypes: ["image"]
	    	    });
	    	});

	    	$(document).on('click', '.btn-edit-banner', function (event) {
				var contentHtml = '<h4>Edit Banner</h4>';
				$('.modal-add-edit-banner-header').html(contentHtml);
	    		elmEdit = $(this).parents('tr');
	    		var record = ajaxBannerTable.row(elmEdit).data();
	    		$.getContentModal(APP.ApiUrl('admin/banner/edit/'+ record.id), ".modal-edit-banner-body", "#modalEditBanner");

	    		var idP = record.id;
	    		var type = record.type;
				if(type == 0){
					var pictureName = record.picture;
					$("#pictureBanner").fileinput({
						initialPreview: ['<img src="<?php echo $this->webroot ?>uploads/Banner/'+idP+'/'+record.picture+'" class= "file-preview-image">'],
						initialPreviewConfig: [
							{caption: record.picture}
						],
						showUpload: false,
						showRemove: false,
						maxFileCount: 1,
						msgProgress: 'Loading file {index} of {files} - {name} - {percent}% completed.',
						allowedFileExtensions: ["jpg", "png"],
						overwriteInitial: true,
						allowedFileTypes: ["image"],
						previewFileType: ["image"]

					});

					$('.file-actions').hide();
				}
	    	});
	    	
	    	$(document).on('click', '.btn-remove-banner', function (event) {
	    		elmEdit = $(this).parents('tr');
	    		var record = ajaxBannerTable.row(elmEdit).data();
	    		$("#formDeleteBanner").attr("action", APP.ApiUrl('admin/banner/delete/'+ record.id));
	    		$('#modalConfirmDeleteBanner').modal('show');	     
	    	});

	    	$(document).on('submit', '#formDeleteBanner', function (event) {		
	    		event.preventDefault();
	    		var dataJson = $.postFormAjax($(this));
	            var dataObj  = JSON.parse(dataJson);
	            if (dataObj.success == true) {
	            	ajaxBannerTable.row(elmEdit).remove().draw(false);
	                //Show modal popup delete success
	                $.slideTopMessage('Delete successful!', 'success');	  
	            } else {
	                //Show modal popup delete un-success
	                $.slideTopMessage('Delete fail!', 'danger');
	            }	     	
	            $('#modalConfirmDeleteBanner').modal('hide');	            
	    	});
	    	
	    	$(document).on('submit', '#formCreateBanner', function (event) {
	    		// Stop form from submitting normally
	            	event.preventDefault();
	    		 	var dataJson = $.postFormAjaxWithFile($(this));
	    	        var dataObj  = JSON.parse(dataJson);
	    	        if (dataObj.success == true) {
	    	            //Show modal popup update success
	    	            $.slideTopMessage(dataObj.message, 'success');
	    	            if(dataObj.action == "add"){
	    	            	ajaxBannerTable.row.add(dataObj.data).draw(false);
	    	            }else{
	    	            	ajaxBannerTable.row(elmEdit).data(dataObj.data).draw(false);
	    	            }
	    	            $('#modalEditBanner').modal('hide');
	    	        } else {
	    	            //Show modal popup update un-success
	    	            $.slideTopMessage(dataObj.message, 'danger');
	    	        }
	    	});
	        
	    });

</script>
	
<?php echo $this->element($this->plugin.'.modal/modal_edit_banner'); ?>
<?php echo $this->element($this->plugin.'.modal/modal_confirm_delete_banner'); ?>    
