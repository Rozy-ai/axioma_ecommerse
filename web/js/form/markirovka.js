$('.slide-to').on('click', function (e) {
    var scrollSpeed = 1000;
    var scrollTop = $(window).scrollTop();
    var id = $(this).data('id');
    var goTo = $(id).offset().top;

    e.preventDefault();
    $("html, body").animate({scrollTop: goTo}, scrollSpeed);
});


$('#markirovka-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/forms/default/markirovka-order',
        type: 'POST',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
//        enctype: 'multipart/form-data',
        processData: false,
        success: function (response) {
//            alert(response);
//            console.log(response);
            new jBox('Notice', {
                content: 'Спасибо за обращение с вами свяжется наш менеджер',
                color: 'black'
            });
//            location.reload();
            $('#markirovka-form')[0].reset();
        }
    });
    return false;
});


