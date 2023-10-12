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

    $(".portfolio-gallery").each(function (index) {

        var id = $(this).attr('data-id');

        $('.portfolio-gallery-' + id).magnificPopup({
            type: 'image',
            gallery: {
                // options for gallery
                enabled: true
            },
            // other options
        });

    });



    //category-link

    $('.panel-click').click(function () {

        var link = $(this).attr('attr-link');

        window.location = link;

    })


    //gallery-one
    $('.gallery-popup-link-one').click(function (e) {

        e.preventDefault();

        var id = $(this).attr('product-id');

        $(this).magnificPopup({
            items: {
                src: eval('image_' + id)
            },
            type: 'image',
        }).magnificPopup('open');

        return false;

//        console.log(eval('image_' + id));
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


    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    //cart

    $('.navbar-right .cart-top-btn').click(function (e) {

        e.preventDefault();
        $(this).find('.cart-top').popover('show');
//        if ($(this).find('.cart-top').is(':visible')) {
//            $(this).find('.cart-top').popover('hide');
//        } else {
//            $(this).find('.cart-top').popover('show');
//        }

    })

    $('body').on('click', '.popover-content .close-btn', function (e) {
        e.preventDefault();
        $('.cart-top').popover('hide');
    })


//    console.log(main);
});
    $(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").hover(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});


var menu = document.getElementById("bhoechie");

$('.header .catalog-button').click( function(e) {
    e.preventDefault();
    if (menu.style.display === "none") {
      $(this).addClass("active-button");
    menu.style.display = "block";
  } else {
    $(this).removeClass("active-button");
    menu.style.display = "none";
  }
});
