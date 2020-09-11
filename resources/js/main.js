$(document).ready(function () {

    // Token header on every ajax request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function sendAjax (url, data, handler = defaultHandler) {
        $.ajax({
            type: 'POST',
            url: url,
            async: false,
            data: data,
            cache: false,
            success: function (response) {
                handler(response);
            },
            error: function (data) {
                if (data.status === 422) {
                    let response = data.responseJSON.errors;
                    let message = "";
                    $.each(response, function (key, el) {
                        message += el[0] + "\n";
                    });
                    alert(message);
                }
                else alert('Error!');
            }
        });
    }

    function defaultHandler (response) {
        location.href = '/';
    }
    function stayHandler (response) {
        location.reload();
    }
    // Submitting registration form
    $('form.registration-form').on('submit', function () {
        let formData = $(this).serialize();
        sendAjax('/register', formData);
    });

    // Attempt to Log in
    $('form.login-form').on('submit', function () {
        let formData = $(this).serialize();
        sendAjax('/login', formData, stayHandler);
    });

    // Change currency button
    $('.top-bar__change-currency button').on('click', function () {
        let data = {'setCurrency': $(this).data('currency')};
        sendAjax('/currency', data, stayHandler);
    });

    // Change displayed products on tab change
    function changeProducts (button) {
        let target = $(button).data('target');
        $('.main-grid__card').addClass('hidden');
        $('.main-grid__card.' + target).removeClass('hidden');
        // history.pushState({}, '', '?type=' + target);
    }

    // Active class changer for main grid buttons
    $('.main-tabs button').on('click', function () {
        changeProducts(this);
        $('.main-tabs button').removeClass('active');
        $(this).addClass('active');
    });

    // Add/remove item to cart
    function changeCartHandler (response) {
        // Minus button
        if (response.amount > 0)
            $('.to-cart .minus-button[data-item=' + response.id + ']').removeClass('hidden');
        else {
            // For main page
            $('.to-cart .minus-button[data-item=' + response.id + ']').addClass('hidden');
            // For cart page
            $('.cart-products .cart-position[data-item=' + response.id + ']').addClass('hidden');
        }

        // Amount counter on product card
        $('span.change-cart[data-item=' + response.id + ']').text(response.amount);

        // Total order amount counter on top
        let count = $('.top-bar__cart-icon span');
        let targetAmount = parseInt(count.attr('data-count'), 10) + response.change;
        count.attr('data-count', targetAmount);

        // Total sum on top
        let sum = parseFloat($('.top-bar__cart-info span').text());
        let total = (sum + response.change * response.price).toFixed(2);
        $('.top-bar__cart-info span').text(total);
        // Total sum for cart page
        $('.cart-total__main-price .changeable span').text(total);
        let deliveryCost = parseFloat($('.cart-total__delivery-price .value span').text()).toFixed(2);
        $('.cart-total__total-price .changeable span').text(+total + +deliveryCost);

    }
    function changeCart (id, operation) {
        let data = {'id': id, 'operation': operation};
        sendAjax('/cart', data, changeCartHandler);
    }

    $('button.change-cart').on('click', function () {
        let id = $(this).data('item');
        let operation = $(this).data('operation');
        changeCart(id, operation);
    });

    // Checkout select address for auth user
    $('.checkout-form .address-item__body').on('click', function () {
        let address = $(this).data('address');
        $('.checkout-form input.address').val(address);

        $('.checkout-form .address-item__body').removeClass('active');
        $(this).addClass('active');
    });

    // Checkout submit
    function checkoutHandler (response) {
        if (response.order) {
            alert('Your order successfully sent!');
            location.href = '/';
        }
        else
            alert('Error submitting your order');
    }

    $('form.checkout-form').on('submit', function () {
        let formData = $(this).serialize();
        sendAjax('/checkout', formData, checkoutHandler);
    });

    // Profile order history expand arrow changing down-to-up
    $('.profile-order-history .expand-arrow button').on('click', function () {
        let icon = $(this).find('i.fa');
        if (icon.hasClass('fa-angle-down')) {
            icon.removeClass('fa-angle-down');
            icon.addClass('fa-angle-up');
        }
        else {
            icon.removeClass('fa-angle-up');
            icon.addClass('fa-angle-down');
        }
    });

    // Profile addresses slider
    $('.profile-addresses').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        prevArrow: $('.prev-slick'),
        nextArrow: $('.next-slick')
    });
});
