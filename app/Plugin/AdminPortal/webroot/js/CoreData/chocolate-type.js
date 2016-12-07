$( document ).ready(function() {

    showModalAdd();
    saveData();
    showDeleteData();
    deleteData();
    showUpdateData();
    updateData();
    reWriteStatus();
    pressSaveData();
    pressUpdateData();
    searchData();
});

function showModalAdd(){
    $(document).on('click', '#add-chocolate-type', function() {
        $('#modal-add-chocolate-type').modal('show');
        focusInput('modal-add-chocolate-type', 'code');
    });
}

function saveData(){
    $(document).on('click', '#save-chocolate-type', function() {
        submitSaveData();
    });
}

function showDeleteData(){

    $(document).on('click', '.td-delete-data', function() {
        var id = $(this).attr('data-id');
        $('#modal-delete-'+id).modal('show');
    });

}

function deleteData(){

    $(document).on('click', '.btn-delete-object', function() {
        var id = $(this).attr('data-id')
            , searchValue = $('#searchValue').val()
            , fieldValue = $('#fieldValue').val()
            , url = AJAXURL.ApiUrl('admin_portal/CoreData/deleteChocolateType')
            , dataPost = {id: id, fieldValue: fieldValue, searchValue: searchValue}
            ;

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: dataPost,
            success: function(response) {
                if (response.success) {

                    slideMessage(lblSuccess, lblDeleteSuccess, 'success');
                    $('#main-content').html(response.contentHTML);
                    removePopup();
                }else{
                    removePopup();
                    slideMessage(lblError, response.alert, 'danger');
                }
            }
        });
    });
}

function showUpdateData(){

    $(document).on('click', '.td-update-data', function() {
        var id = $(this).attr('data-id');
        $('#modal-update-chocolate-type-'+id).modal('show');
        focusInput('modal-update-chocolate-type-'+id, 'code-'+id);
    });

}

function updateData(){
    $(document).on('click', '.btn-edit-object', function() {
        submitUpdateData($(this).attr('data-id'));
    });
}

function reWriteStatus(){

    $(document).on('click', '.status-object', function() {
        var value = $(this).val()
            , id = $(this).attr('data-id')
            ;
        $('#status-hidden-'+id).val(value);
    });
}

function pressSaveData(){
    $(document).on('keypress', 'input.add-data', function(e) {
        if(e.keyCode == ENTER_KEY){
            submitSaveData();
        }
    });

}

function pressUpdateData(){
    $(document).on('keypress', 'input.update-data', function(e) {
        if(e.keyCode == ENTER_KEY){
            submitUpdateData($(this).attr('data-id'));
        }
    });

}

function submitSaveData(){
    var code = $('#code').val()
        , name = $('#name').val()
        , searchValue = $('#searchValue').val()
        , fieldValue = $('#fieldValue').val()
        ;
    if(code == '' || typeof code == 'undefined'){
        slideMessage(lblError, lblCodeNValid);
        return;
    }

    if(name == '' || typeof name == 'undefined'){
        slideMessage(lblError, lblNameNValid);
        return;
    }

    $.ajax({
        url: AJAXURL.ApiUrl('admin_portal/CoreData/saveChocolateType'),
        type: 'POST',
        dataType: 'json',
        data: {code: code, name: name, searchValue: searchValue, fieldValue: fieldValue},
        success: function(response) {
            if (response.success) {
                slideMessage(lblSuccess, lblInsertSuccess, 'success');
                $('#main-content').html(response.contentHTML);
                resetForm();
            }else{
                refreshSelectPicker();
                slideMessage(lblError, response.alert, 'danger');
            }
        }
    });
}

function submitUpdateData(id){
    var code = $('#code-'+id).val()
        , name = $('#name-'+id).val()
        , status = $('#status-hidden-'+id).val()
        , searchValue = $('#searchValue').val()
        , fieldValue = $('#fieldValue').val()
        ;
    if(code == '' || typeof code == 'undefined'){
        slideMessage(lblError, lblCodeNValid);
        return;
    }

    if(name == '' || typeof name == 'undefined'){
        slideMessage(lblError, lblNameNValid);
        return;
    }

    $.ajax({
        url: AJAXURL.ApiUrl('admin_portal/CoreData/updateChocolateType'),
        type: 'POST',
        dataType: 'json',
        data: {id: id, code: code, name: name, status: status, searchValue: searchValue, fieldValue: fieldValue},
        success: function(response) {
            if (response.success) {
                slideMessage(lblSuccess, lblUpdateSuccess, 'success');
                $('#main-content').html(response.contentHTML);
            }else{
                slideMessage(lblError, response.alert, 'danger');
            }
        }
    });
}

function resetForm(){
    $('#code').val('');
    $('#name').val('');
    $('#code').focus();
}

function searchData(){
    $(document).on('change keyup pasted', '.search-data', function() {
        var searchValue = $('#searchValue').val()
            , fieldValue = $('#fieldValue').val()
            ;

        clearTimeout(lastChange);
        lastChange = setTimeout(function(){
            $.ajax({
                url: AJAXURL.ApiUrl('admin_portal/CoreData/searchChocolateType'),
                type: 'POST',
                dataType: 'json',
                data: {searchValue: searchValue, fieldValue: fieldValue},
                success: function(response) {
                    if (response.success) {
                        $('#main-content').html(response.contentHTML);
                        refreshSelectPicker();
                    }
                }
            });
        }, 1000);
    });
}


