$('#vacancy-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/forms/default/vacancy',
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
            $('#vacancy-form-modal').modal('hide');
            new jBox('Notice', {
                content: 'Спасибо за обращение по вакансии с вами свяжется наш менеджер',
                color: 'black'
            });
//            location.reload();
            $('#vacancy-form')[0].reset();
        }
    });
    return false;
});


