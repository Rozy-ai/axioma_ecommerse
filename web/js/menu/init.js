new Mmenu(
        document.querySelector('#menu'),
        {
//            drag: true,
            pageScroll: {
                scroll: true,
                update: true
            },
            extensions: [
                "position-right"
            ]
        }
);

document.addEventListener('click', function (evnt) {
    var anchor = evnt.target.closest('a[href^="#/"]');
    if (anchor) {
        alert('Thank you for clicking, but that\'s a demo link.');
        evnt.preventDefault();
    }
});