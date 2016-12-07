/** http://bootstrap-notify.remabledesigns.com/*/

function slideMessage(title, message, typeMessage){

    var notify = $.notify(
        {
            title: '<strong>'+title+'</strong>'
            , message: ' <br/>'+message+''
        }
        , {
            type: typeMessage
            , allow_dismiss: false
            , element: 'body'
            , autoHideDelay: 4000
            , delay:  1500 /** timeout*/
            , offset: 50/** padding for placement*/
            , z_index: 12000
            , placement: {
                from: "top",
                align: "center"
            }
        }
    );
}