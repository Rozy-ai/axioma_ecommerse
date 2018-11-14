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

    //category-link

    $('.panel-click').click(function () {

        var link = $(this).attr('attr-link');

        window.location = link;

    })


    //gallery-one
    $('.gallery-popup-link-one').click(function () {
        var id = $(this).attr('product-id');

        $(this).magnificPopup({
            items: {
                src: eval('image_' + id)
            },
            type: 'image',
        }).magnificPopup('open');

        console.log(eval('image_' + id));
    })
    //gallery
    $('.gallery-popup-link').click(function () {
        var id = $(this).attr('product-id');

        $(this).magnificPopup({
            items: main['img_list_' + id],
            gallery: {
                enabled: true
            }
        }).magnificPopup('open');
    })

    console.log(main);
});