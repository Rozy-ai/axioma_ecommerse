$('#callback-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/forms/default/call-back',
        type: 'POST',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
//        enctype: 'multipart/form-data',
        processData: false,
        success: function (response) {
//            alert(response);
            console.log(response);
            $('#callback-form-modal').modal('hide');
            new jBox('Notice', {
                content: 'Спасибо за обращение с вами свяжется наш менеджер',
                color: 'black'
            });
//            location.reload();
            $('#callback-form')[0].reset();
        }
    });
    return false;
});
$('#callback-form-footer').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/forms/default/call-back',
        type: 'POST',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
//        enctype: 'multipart/form-data',
        processData: false,
        success: function (response) {
//            alert(response);
            console.log(response);
            $('#callback-form-modal-footer').modal('hide');
            new jBox('Notice', {
                content: 'Спасибо за обращение с вами свяжется наш менеджер',
                color: 'black'
            });
//            location.reload();
            $('#callback-form-footer')[0].reset();
        }
    });
    return false;
});


