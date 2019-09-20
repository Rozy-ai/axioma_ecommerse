var Cart = {
    UpdateCart: function () {

        var wrap = $('.navbar-right [href="/cart"]');

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
                        color: 'green'
                    });
                    Cart.UpdateCart();
                });

    },
    OneAddCart: function (id) {

        data = {product_id: id, count: '1'};

        $.post("/cart/default/add-to-cart", data)
                .done(function (data) {
                    new jBox('Notice', {
                        content: 'Товар добавлен в корзину',
                        color: 'green'
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
    Plus: function (id) {
        var count = $('.count-' + id);


        var krat = Number(count.attr('data-krat'));
        var _count = Number(count.val()) + krat;
        count.val(_count);

        Cart.SetCount(id, _count);
        this.UpdateSumm(id);
        Cart.LoadCart();
    },
    Minus: function (id) {
        var count = $('.count-' + id);

        var krat = Number(count.attr('data-krat'));
        var _count = Number(count.val()) - krat;

        if (_count <= krat)
            count.val(krat);
        else
            count.val(_count);

        Cart.SetCount(id, _count);
        this.UpdateSumm(id);
        Cart.LoadCart();
    },
    UpdateSumm: function (id) {

        var count = $('.count-' + id).val();
        var one = $('.cart__summ_one').html();

        //btn  update

        $('.btn-count-' + id).html(count);
//        console.log(id);
        console.log(count);
//        console.log(one);
        var all = $('.cart__summ_all');

        var sum = Number(one) * Number(count);
//        console.log(sum);
        all.html(sum);

    },
};

$(function () {

    Cart.UpdateCart();

    if ("cart" in window)
        Cart.LoadCart();

    $('body').on('click', '.count-helper-ok', function () {

        var count = Number($('.count-helper').val());
        $('.count-helper').val(count);

        var id = $('.count-helper').attr('attr-id');

        console.log(count);
        console.log(id);
        console.log($('[name=count]'));

//        $('[name=count]').val(count);
        $('.btn-count-' + id).html(count);

        Cart.SetCount(id, count);
        Cart.UpdateSumm(id);
        Cart.LoadCart();


        $('.popover').popover('hide');

    })

    $('body').on('shown.bs.modal', '#oneclick-form-modal', function () {

        var count = $('[name=count]').val();
        $('#oneclickorder-count').val(count);
        console.log(count);

    })

});