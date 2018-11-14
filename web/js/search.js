//$('body').on('change', '.search .q', function () {
//
//    var q = $(this).val();
//
//    var data = {q: q};
//
//    $.post("/search/default/ajax-search", data)
//            .done(function (data) {
//
//                $('.ajax-result').empty();
//                $('.ajax-result').append(data);
//
//                console.log(data);
////                new jBox('Notice', {
////                    content: data,
////                    color: 'blue'
////                });
//            });
//
//})


$(".search .q").keypress(function (event) {
    var q = $(this).val();

    if (q.length > 4) {

        var data = {q: q};

        $.post("/search/default/ajax-search", data)
                .done(function (data) {

                    $('.ajax-result').empty();
                    $('.ajax-result').append(data);

                    console.log(data);
//                new jBox('Notice', {
//                    content: data,
//                    color: 'blue'
//                });
                });
    }
});

$(".search .q").click(function () {
    $(".search .q").keypress();
});