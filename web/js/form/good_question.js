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
                content: 'Спасибо вопрос. На него ответят в ближайшее время',
                color: 'black'
            });
             $('#good-question-form')[0].reset();
//            location.reload();
        }
    });
    return false;
});


