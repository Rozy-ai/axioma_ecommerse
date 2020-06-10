$('#good-question-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/forms/default/good-question',
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
            $('#good-question-form-modal').modal('hide');
            new jBox('Notice', {
                content: 'Спасибо за вопрос. На него ответят в ближайшее время',
                color: 'green'
            });
            $('#good-question-form')[0].reset();
//            location.reload();
        }
    });
    return false;
});

$('#contact-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/forms/default/contact-form',
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
            $('#good-question-form-modal').modal('hide');
            new jBox('Notice', {
                content: 'Спасибо за вопрос. На него ответят в ближайшее время',
                color: 'green'
            });
            $('#contact-form')[0].reset();
//            location.reload();
        }
    });
    return false;
});


