var Cart = {
    UpdateCart: function () {

        $.get("/cart/default/update-cart", function (data) {
            
            $('.navbar-nav [href="/cart"]').html(data);
            $('.header-mobile [href="/cart"]').html(data);
        //    console.log(data);
            
        });

    },
    UpdateFavorite: function () {
        
        $.get("/cart/default/update-favorite", function (data) {
            
            $('.navbar-nav [href="/favorite"]').html(data);
            $('.header-mobile [href="/favorite"]').html(data);
        //    console.log(data);
            
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
                        color: 'green',
                        attributes: {
                            x: 'right',
                            y: 'top'
                        },
                        position: {
                            x: 20,
                            y: 70
                        },
                    });
                    Cart.UpdateCart();
                });

    },
    OneAddCart: function (id) {
    
        data = {product_id: id, count: '1'};
        var myElement = $('span.badge');
        for (const element of myElement) {
            element.style.display = 'inline-block';
          }
        var currentValue = parseInt(myElement.html());
        var newValue = currentValue + 1;

        $.post("/cart/default/add-to-cart", data)
                .done(function (data) {
                    new jBox('Notice', {
                        content: 'Товар добавлен в корзину',
                        color: 'green',
                        attributes: {
                            x: 'right',
                            y: 'top'
                        },
                        position: {
                            x: 20,
                            y: 70
                        },
                        responsivePositions: null
                    });
                    myElement.html(newValue);
                    Cart.UpdateCart();
                });

    },
    Favorite: function (id) {

        data = {product_id: id};

        $.post("/cart/default/add-to-favorite", data)
                .done(function (data) {
                    new jBox('Notice', {
                        content: 'Товар добавлен в избранное',
                        color: 'green',
                        attributes: {
                            x: 'right',
                            y: 'top'
                        },
                        position: {
                            x: 20,
                            y: 70
                        },
                        responsivePositions: null
                    });
                    Cart.UpdateFavorite();
                });

    },
    Compare: function (id) {

        data = {product_id: id};

        $.post("/cart/default/add-to-compare", data)
                .done(function (data) {
                    new jBox('Notice', {
                        content: 'Товар добавлен в сравнение',
                        color: 'green',
                        attributes: {
                            x: 'right',
                            y: 'top'
                        },
                        position: {
                            x: 20,
                            y: 70
                        },
                        responsivePositions: null
                    });
                });

    },
    CompareDelete: function () {

        $.post("/cart/default/delete-to-compare")
                .done(function () {
                    new jBox('Notice', {
                        content: 'Товары удалены в сравнение',
                        color: 'green',
                        attributes: {
                            x: 'right',
                            y: 'top'
                        },
                        position: {
                            x: 20,
                            y: 70
                        },
                        responsivePositions: null
                    });
                });
                location.reload();

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


        $('.popover-x').popoverX('hide');

    })

    $('body').on('shown.bs.modal', '#oneclick-form-modal', function () {

        var count = $('[name=count]').val();
        $('#oneclickorder-count').val(count);
        console.log(count);

    })

});