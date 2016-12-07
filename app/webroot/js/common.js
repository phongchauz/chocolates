var APP = {};

APP.ApiUrl = function(path, param) {
    param = typeof param !== 'undefined' ? param : '';
    if (param != '') {
        path += '?' + $.param(param);
    }
    return APP.API_URL + path;
};

$.loadAjax = function(url, dataPost) {
	$.loadingStart();
    var dataJson = $.ajax({
        'url': url,
        'type': 'POST',
        'dataType': 'json',
        'data': dataPost,
        'async': false,
        success: function(data) {
        	$.loadingEnd();
        },
        error: function(xhr, textStatus, thrownError) {
        	$.loadingEnd();
            console.log(thrownError);
        }
    });    
    return dataJson.responseText;
};

$.loadContentModal = function(url, target, elm, modal) {   
	$(elm).html("");
	$.get(url, function (data) {
        var $content = $(data).find(target);
        $(elm).html($content);
        $(modal).modal("show");
    });	
};

$.getContentModal = function(url, elm, modal) {   
	dataJson = $.loadAjax(url, {action: "get"}),
    dataObj  = JSON.parse(dataJson);	
	if (dataObj.success == true) {
        //Show modal popup
        var contentHtml = dataObj.contentHtml;
        $(elm).html(contentHtml);
        $(modal).modal("show");        
    }
};

$.postFormAjax = function(form) {   	
    var fields = form.serializeArray();
    var url = form.attr("action");
    var dataPost = {};
    $.each( fields, function( i, field ) {
       dataPost[field.name] = field.value;
    });   
    var dataJson = $.loadAjax(url, dataPost);
    return dataJson;
};

$.postFormAjaxWithFile = function(form) {   	
	var dataPost = new FormData(form[0]);
    var url = form.attr("action");   
    var dataJson = $.ajax({
        url: url,
        type: 'POST',
        data: dataPost,
        async: false,
        success: function (data) {
        	$.loadingEnd();
        },
        error: function(xhr, textStatus, thrownError) {
        	$.loadingEnd();
            console.log(thrownError);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return dataJson.responseText;
};

$.loadingStart = function() {
    var cover = $('<div class="loading-cover"></div>')
        .css('position', 'fixed')
        .css('width', $(window).width())
        .css('height', $(window).height())
        .css('z-index', 11000)
        .css('opacity', '0.4')
        .css('filter', 'alpha(opacity=40);')
        .css('background-color', 'black')
        .css('top', 0)
        .css('background-image', 'url('+APP.ApiUrl("img/ajax-loader-green.gif")+')')
        .css('background-repeat', 'no-repeat')
        .css('background-size', '50px 50px')
        .css('background-position', 'center center')
        .appendTo('body');
};

$.loadingEnd = function() {
    $('.loading-cover').remove();
};

$.setNavigation = function() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);

    $(".nav-custom a").each(function () {
        var href = $(this).attr('href');
        if (path.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active').parent().closest('li').addClass('active');
        }
    });
}

$.initSelectPicker = function(elm) {
	
	$(elm).selectpicker({
		liveSearch: true,
		//width: "auto",
        size: 5
	}); 
	
}

$.initInputFile = function(elm, preview) {
	
	$(elm).fileinput({
        initialPreview: preview,
        showUpload: false,
        showRemove: false,
        maxFileSize: 5012,
        maxFileCount: 1,
        msgProgress: 'Loading file {index} of {files} - {name} - {percent}% completed.',
        allowedFileExtensions: ["jpg", "png"],
        overwriteInitial: true,
        allowedFileTypes: ["image"]
    });
    
    $('.file-actions').hide();
	
}

$.slideTopMessage = function(message, type){
	
    $.notify({
        message: message,
    },{
        allow_dismiss: true,
        type: type,
        placement: {
                from: "top",
                align: "center"
        },
        animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
        },
        delay: 3000,
        z_index: 10060,
        timer: 1000
    });
    
}

$(function() {
	
	$( ".dropdown" ).hover(function() {
		
	    $( this ).addClass( "open" );
	    
	  }, function() {
		  
	    $( this ).removeClass( "open" );
	    
	  }
	  
	);
  
	$( ".dropdown-submenu" ).hover(function() {
		
	    $( this ).addClass( "open" );
	    
	  }, function() {
		  
	    $( this ).removeClass( "open" );
	    
	  }
	  
	);

});