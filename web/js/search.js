$('body').on('keypress', '.search .q', function () {

    var q = $(this).val();

    var data = {q: q, data: 1234};

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

})
