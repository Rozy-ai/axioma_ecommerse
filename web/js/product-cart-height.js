$(function () {

    var maxHeight = 0;

    $('.product-list .panel-heading').each(function () {

        maxHeight = ($(this).height() > maxHeight) ? $(this).height() : maxHeight;


    });
    $('.product-list .panel-heading').height(maxHeight);
//    console.log(maxHeight);


});