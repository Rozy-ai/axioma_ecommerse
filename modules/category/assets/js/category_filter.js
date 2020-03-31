//
//$('#radio_button_productsearch-view').on('click', '.btn', function (e) {
//
//    e.preventDefault();
//
//    if ($(this).hasClass('hover')) {
//        console.log(1);
//        $("#category-search").submit();
//    } else {
//        console.log(2);
//    }
//
//    return false;
//})
//
//$('#radio_button_productsearch-view .btn').mouseover(function () {
//
////    $('#radio_button_productsearch-view .btn').removerClass('hover');
//    $(this).addClass('hover');
//})

$('#productsearch-view').change(function () {
//    console.log('change');
        $("#category-search").submit();
})


