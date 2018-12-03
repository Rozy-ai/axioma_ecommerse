$(function () {

//    $('body').on('click', '.more', function () {
//
////    $(this + '> .dropdown-menu').addClass('active');
//
//        console.log($(this));
//        console.log($(this).siblings('.dropdown-menu'));
//
//        if ($(this).siblings('.dropdown-menu').hasClass("active"))
//            $(this).siblings('.dropdown-menu').removeClass('active');
////    ;
//        else
//            $(this).siblings('.dropdown-menu').addClass('active');
//    })
//$('body').on('mouseleave', '.dropdown', function () {
//
//    $(this).find('.dropdown-menu').removeClass('active');
//
//})

    $('body').on('click', '.more', function (e) {

        e.preventDefault();

        var parent = $(this).closest('.li-dropdown');

        console.log(1);
        console.log(parent);

        if (parent.hasClass("active")) {
            parent.removeClass('active');
            $(this).html('<i class="fas fa-plus"></i>');
        } else
        {
            parent.addClass('active');
            $(this).html('<i class="fas fa-minus"></i>');
        }


    })

//CheckActive


    var active = $('.active');

    if (active != 'undefined') {

        active.parents('.li-dropdown').addClass('active');
//        alert(1);
    }


})
