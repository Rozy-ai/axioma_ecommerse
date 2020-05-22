//new Mmenu(
//        document.querySelector('#menu'),
//        {
//
//            drag: true,
//            pageScroll: {
//                scroll: true,
//                update: true
//            },
//            navbars: {
//                content: [
//                    "prev",
////                    "searchfield",
//                    "close"]
//            },
//            extensions: ["shadow-panels", "fx-panels-slide-100",
//                "border-none", "theme-white", "fullscreen",
//                "position-right"],
//            "iconbar": {
//                "use": true,
//                "top": [
//                    "<a href='/'><i class='fa fa-home'></i></a>",
//                    "<a href='/enter'><i class='fa fa-user'></i></a>"
//                ],
//                "bottom": [
//                    "<a href='#/'><i class='fa fa-cart-arrow-down'></i></a>",
////                    "<a href='#/'><i class='fas fa-facebook'></i></a>",
////                    "<a href='#/'><i class='fas fa-linkedin'></i></a>"
//                ]
//            }
//        }
//);

var $menu = $("#menu").mmenu({

//    drag: true,
    language: 'ru',
    title: false,
    pageScroll: {
        scroll: true,
        update: true
    },
    navbars: {
//        content: [
//            "prev",
////                    "searchfield",
//            "close"
//        ]
    },
    extensions: [
        "position-bottom",
        "fullscreen",
        "listview-50",
        "fx-panels-slide-up",
        "fx-listitems-drop",
        "border-offset",
        "fx-panels-slide-60",
        "theme-white",
//        "border-none",
//        "shadow-panels", "fx-panels-slide-100",
//        "border-none", "theme-white",
//        "pagedim-black",
//        "fullscreen",
//        "position-right"
    ],
    "iconbar": {
        "use": false,
        "top": [
            "<a href='/'><i class='fa fa-home'></i></a>",
            "<a href='/enter'><i class='fa fa-user'></i></a>"
        ],
        "bottom": [
            "<a href='#/'><i class='fa fa-cart-arrow-down'></i></a>",
//                    "<a href='#/'><i class='fas fa-facebook'></i></a>",
//                    "<a href='#/'><i class='fas fa-linkedin'></i></a>"
        ]
    }

}
, {
// configuration
    classNames: {
        fixedElements: {
            fixed: "fix",
            sticky: "stick"
        }
    }
}
);
var $icon = $("#mmenu-icon");
var API = $menu.data("mmenu");

$icon.on("click", function () {
    API.open();
});

API.bind("open:finish", function () {
    setTimeout(function () {
        $icon.addClass("is-active");
    }, 100);
});
API.bind("close:finish", function () {
    setTimeout(function () {
        $icon.removeClass("is-active");
    }, 100);
});