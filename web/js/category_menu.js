$(function () {

    $('body').on('click', '.more', function () {

//    $(this + '> .dropdown-menu').addClass('active');

        console.log($(this));
        console.log($(this).siblings('.dropdown-menu'));

        if ($(this).siblings('.dropdown-menu').hasClass("active"))
            $(this).siblings('.dropdown-menu').removeClass('active');
//    ;
        else
            $(this).siblings('.dropdown-menu').addClass('active');
    })
//$('body').on('mouseleave', '.dropdown', function () {
//
//    $(this).find('.dropdown-menu').removeClass('active');
//
//})

//CheckActive


    var active = $('.dropdown._active');

    if (active != 'undefined') {

        active.parents('.forAnimate').addClass('active');
//        alert(1);
    }


})
