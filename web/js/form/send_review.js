$('#send-review-form').on('beforeSubmit', function (evt) {

//    console.log(1);

    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/forms/default/send-review',
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
            $('#send-review-form-modal').modal('hide');
            new jBox('Notice', {
                content: 'Спасибо за ваш отзыв',
                color: 'black'
            });
            $('#send-review-form')[0].reset();
//            location.reload();
        }
    });
    return false;
});