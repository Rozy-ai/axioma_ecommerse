new Mmenu(
        document.querySelector('#menu'),
        {

            drag: true,
            pageScroll: {
                scroll: true,
                update: true
            },
            navbars: {
                content: [
                    "prev",
                    "searchfield",
                    "close"]
            },
            extensions: ["shadow-panels", "fx-panels-slide-100",
                "border-none", "theme-white", "fullscreen",
                "position-right"],
            "iconbar": {
                "use": true,
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
);
//document.addEventListener('click', function (evnt) {
//    var anchor = evnt.target.closest('a[href^="#/"]');
//    if (anchor) {
//        alert('Thank you for clicking, but that\'s a demo link.');
//        evnt.preventDefault();
//    }
//});