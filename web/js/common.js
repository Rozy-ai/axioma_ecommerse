$(document).ready(function () {

    //product 
    $('.pgwSlider').pgwSlider({
        listPosition: 'right',
        autoSlide: false,
        verticalCentering: true,
        adaptiveHeight: true,
    });

//  popup image
    $('.popup').magnificPopup({
        type: 'image',
        gallery: {
            // options for gallery
            enabled: false
        },
        // other options
    });

    $('.popup-gallery').magnificPopup({
        type: 'image',
        gallery: {
            // options for gallery
            enabled: true
        },
        // other options
    });

});