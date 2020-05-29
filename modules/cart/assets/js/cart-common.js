var Cart = {
    UpdateCart: function () {

        var wrap = $('.cart-widget');

        $.get("/cart/default/update-cart", function (data) {
            wrap.html(data);
        });
    },
    AddCart: function () {

        data = $("#add_cart").serialize();

//        data = {id: id, time: count, start_time: start_time, right: right, repeat: repeat, compilation_id: compilation_id, csrf: csrfToken};

//        console.log(data);

        $.post("/cart/default/add-to-cart", data)
                .done(function (data) {
                    new jBox('Notice', {
                        content: 'Товар добавлен в корзину',
                        color: 'blue',

                    });
                    Cart.UpdateCart();
                });

    },
    LoadCart: function () {

        if ("cart" in window) {
            var wrap = $('.cart-index-wrap');

            $.get("/cart/default/ajax-index")
                    .done(function (data) {
                        wrap.html(data);
                    });
        }
    },
    SetCount: function (id, count) {

        $.get("/cart/default/set-count?id=" + id + '&count=' + count)
                .done(function (data) {
                    $('.cart-widget').html(data);
                });
        Cart.UpdateCart();

    },
    Delete: function (id) {

        $.get("/cart/default/delete?id=" + id)
                .done(function (data) {

                    console.log(data);
                    Cart.UpdateCart();
                    Cart.LoadCart();

                });

    },
    Set: function (id) {
        var count = $('.count-' + id);

        var _count = Number(count.val());


        Cart.SetCount(id, _count);
        this.UpdateSumm();
        Cart.LoadCart();
    },
    Plus: function (id) {
        var count = $('.count-' + id);

        var _count = Number(count.val()) + 1

        count.val(_count);

        Cart.SetCount(id, _count);
        this.UpdateSumm();
        Cart.LoadCart();
    },
    Minus: function (id) {
        var count = $('.count-' + id);

        var _count = count.val() - 1;

        if (_count <= 1)
            count.val(1);
        else
            count.val(_count);

        Cart.SetCount(id, _count);
        this.UpdateSumm();
        Cart.LoadCart();
    },
    UpdateSumm: function () {

        var count = $('[name="count"]').val();
        var one = $('.cart__summ_one').html();
        console.log(count);
        console.log(one);
        var all = $('.cart__summ_all');

        var sum = Number(one) * Number(count);
        console.log(sum);
        all.html(sum);

    },
};

$(function () {

    Cart.UpdateCart();

    if ("cart" in window)
        Cart.LoadCart();

});