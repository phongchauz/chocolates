/**
 * Created by chaunp on 7/6/2016.
 */
var AJAXURL = {}
    , ESC_KEY = 27
    , INSERT_KEY = 45
    , ENTER_KEY = 13
    ;

AJAXURL.ApiUrl = function(path, param) {
    param = typeof param !== 'undefined' ? param : '';
    if (param != '') {
        path += '?' + $.param(param);
    }
    return AJAXURL.API_URL + path;
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
        //.css('background-image', 'url(http://4.bp.blogspot.com/-KwNbE3Fxzu8/T-oBKTqy1uI/AAAAAAAAAEs/yrBw7_rafXU/s1600/White+water+lily.jpg)')
        .css('background-image', 'url('+KPIS.ApiUrl("bsc/img/ajax-loader-green.gif")+')')
        .css('background-repeat', 'no-repeat')
        .css('background-size', '50px 50px')
        .css('background-position', 'center center')
        .appendTo('body');
};

$.loadAjax = function(url, dataPost) {
    //$.loadingStart();
    var dataJson = $.ajax({
        'url': url,
        'type': 'POST',
        'dataType': 'json',
        'data': dataPost,
        'async': false,
        success: function(data) {
            setTimeout(function() {
                //$.loadingEnd();
            }, 500);
        },
        error: function(xhr, textStatus, thrownError) {
            //$.loadingEnd();
            console.log(thrownError);
        }
    });
    return dataJson.responseText;
};



$.loadingEnd = function() {
    $('.loading-cover').remove();
};

function removePopup(){
    $('.modal-backdrop').remove();
}

function activeDatePicker(id){
    var dateFormat = 'MM/DD/YYYY';

    switch(currentLanguage) {
        case 'vi-vn':
            dateFormat = 'DD/MM/YYYY';
            break;
    }

    $('#'+id).datetimepicker({
        format: dateFormat
    });
}

function refreshSelectPicker(){
    $('.selectpicker').selectpicker('refresh');
}

function showMessageNull(message){
    if(message != '' && typeof message !== 'undefined'){
        slideMessageForUploadFile('Warning', message, 'danger', 40);
    }
}

function refreshInputFile(){
    $('.fileinput-remove-button').click();
}

function activeSelectPicker(){
    $('.selectpicker').selectpicker({
    });
}

function actionByClickArea(link, area){
    $(document).on('click tap', area, function() {
        window.location.href = link;
    });
}

function refreshForm(idModal){
    $('#'+idModal)[0].reset();
}

function setScrollPopup(idPopup, divScroll){
    $('#'+idPopup).on('shown.bs.modal', function () {
        $("#"+divScroll).slimScroll({height:"450px"});
    })
}

function disableScroll(){


}
function activeScroll(){
    $('body').css('overflow','auto');
}

function showMessExport(){
    slideMessageMultiConfig('Success', messageExport, 'success', 40);
}

function defaultAjax(path, data){
    $.loadingStart();
    $.ajax({
        url: path,
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(response) {
            setTimeout(function() {
                $.loadingEnd();
            }, 500);
            return response;
        },
        error: function(xhr, textStatus, thrownError) {
            $.loadingEnd();
            console.log(thrownError);
        }
    });
    return false;
}

function pressClosePopup(popUp){
    $(document).on('keydown', '.add-data-department', function(e) {
        var keynum;

        if(window.event) { // IE
            keynum = e.keyCode;
        } else if(e.which){ // Netscape/Firefox/Opera
            keynum = e.which;
        }

        if(keynum == ESC_KEY){
            $('#'+popUp).modal('hide');
        }

    });

}

function pressOpenPopup(popUp, inputFocus){
    $(document).on('keydown', function(e) {
        var keynum;

        if(window.event) { // IE
            keynum = e.keyCode;
        } else if(e.which){ // Netscape/Firefox/Opera
            keynum = e.which;
        }

        if(keynum == INSERT_KEY){
            $('#'+popUp).modal('show');
            if(inputFocus){
                $('#'+popUp).on('shown.bs.modal', function () {
                    $('#'+inputFocus).focus();
                })
            }
        }



    });

}


function focusInput(idPopup, idInput){
    $('#'+idPopup).on('shown.bs.modal', function () {
        $('#'+idInput).focus();
    })
}