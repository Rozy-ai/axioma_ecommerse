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

//     $('.navbar-nav .cart-top-btn').click(function (e) {

//         // e.preventDefault();
//         $(this).find('.cart-top').popover('show');
// //        if ($(this).find('.cart-top').is(':visible')) {
// //            $(this).find('.cart-top').popover('hide');
// //        } else {
// //            $(this).find('.cart-top').popover('show');
// //        }

//     })

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
    $("#catalog_button").find("i").removeClass("fa-list").addClass("fa-angle-up icon_up");
  } else {
    $(this).removeClass("active-button");
    menu.style.display = "none";
    $("#catalog_button").find("i").removeClass("fa-angle-up").addClass("fa-angle-down");
  }
});

var catalog_mobile = document.getElementById("catalog_mobile");

$('.mobile_catalog_btn').click( function(e) {
    e.preventDefault();
    if (catalog_mobile.style.display === "none") {
        catalog_mobile.style.display = "block";
  } else {
        catalog_mobile.style.display = "none";
  }
});


const header = document.querySelector('.fixed-header');
const mainHeader = document.querySelector('.header');

window.addEventListener('scroll', () => {
    var scrollY = window.scrollY;
    //  var mt = 84 - scrollY;
  if (window.scrollY > 164) {
    header.classList.add('scrolled');
    // header.style.marginTop = '0px';
    header.style.display = 'block';
    header.append(menu);
  } else {
    header.classList.remove('scrolled');
    // header.style.marginTop = mt+'px';
    header.style.display = 'none';
    mainHeader.append(menu);
  }
});

const scrollLinks = document.querySelectorAll('.scroll-link');

scrollLinks.forEach(link => {
  link.addEventListener('click', event => {
    event.preventDefault();
    const sectionId = link.getAttribute('href');
    const section = document.querySelector(sectionId);
    var rect = section.getBoundingClientRect();
    const offsetTop = section.offsetTop;
    const headerHeight = document.querySelector('.fixed-header').offsetHeight;
    // section.style.marginTop = headerHeight+'px';
    window.scrollTo({
      top: rect.y  + window.scrollY - headerHeight - 100,
      behavior: 'smooth'
    });
  });
});

function openTab(tabId) {
    $("a[href='#w1-tab1']").trigger("click");
  }

  var grid = document.getElementById("product-list");
  var list = document.getElementById("product-item");

  function changeGrid() {   
      grid.style.display = "none";
      list.style.display = "block";
};

function changeList() {   
    list.style.display = "none";
    grid.style.display = "block";
};

$(".favorite-img-top").on("mouseover", function(){
    $(this).find("img").attr("src","/image/ico/Избранное(зеленый).svg");
}).on("mouseout", function(){
    $(this).find("img").attr("src","/image/ico/Избранное.svg");
});

$(".favorite-img").on("mouseover", function(){
    $(this).attr("src","/image/ico/Избранное(зеленый).svg");
}).on("mouseout", function(){
    $(this).attr("src","/image/ico/Избранное.svg");
});

$(".cart-img-top").on("mouseover", function(){
    $(this).find("img").attr("src","/image/ico/Cart(зеленый).svg");
}).on("mouseout", function(){
    $(this).find("img").attr("src","/image/ico/Cart.svg");
});

$(".enter-link").on("mouseover", function(){
    $(this).find("img").attr("src","/image/ico/Иконка login 24x24px(взаимодействие).svg");
}).on("mouseout", function(){
    $(this).find("img").attr("src","/image/ico/Войти.svg");
});

var accordions = document.querySelectorAll(".accordion");
accordions.forEach((acc) =>
  acc.addEventListener("click", () => {
    if (acc.classList.contains("fa-plus-circle")) {
      acc.classList.remove("fa-plus-circle");
      acc.classList.add("fa-minus-circle");
    } else {
      acc.classList.remove("fa-minus-circle");
      acc.classList.add("fa-plus-circle");
    }
  })
);

