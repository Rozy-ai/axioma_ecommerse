$(document).on('ready', function () {
    $(".vertical-center-4").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 2
    });
    $(".vertical-center-3").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $(".vertical-center-2").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2
    });
    $(".vertical-center").slick({

        vertical: true,
        centerMode: true,
    });
    $(".vertical").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
    });
    $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
    });
    $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
//        infinite: true
        dots: true,
    });


    $('.owl-carousel-1').owlCarousel({
        dots: true,
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        smartSpeed: 100,
        nav: true,
        margin: 10,
        navText: [
            "<span class='main-arrows arrow-left'></span>",
            "<span class='main-arrows arrow-right'></span>"
        ],
        responsive: {
            0: {items: 1},
            1500: {items: 6},
            1200: {items: 4},
            992: {items: 3},
            769: {items: 2}
        }
    });



});