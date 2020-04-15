$(function () {

    var topMenu = $('#top-line');
    var _top = topMenu.offset().top;



    $(window).scroll(function () {

        console.log(_top);

        if ($(window).scrollTop() >= _top) {
            topMenu.addClass('fixed');
            $('.header .middle-line').css('margin-bottom', '40px');

        } else {
            topMenu.removeClass('fixed');
            $('.header .middle-line').css('margin-bottom', '20px');
        }
    }
    );
});
