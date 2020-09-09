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
    // Submitting registration form
    $('form.registration-form').on('submit', function () {
        let formData = $(this).serialize();
        sendAjax('/register', formData);
    });

    // Attempt to Log in
    $('form.login-form').on('submit', function () {
        let formData = $(this).serialize();
        sendAjax('/login', formData);
    });

    // Change currency button
    $('.top-bar__change-currency button').on('click', function () {
        let data = {'setCurrency': $(this).data('currency')};
        sendAjax('/currency', data);
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
        else
            $('.to-cart .minus-button[data-item=' + response.id + ']').addClass('hidden');

        // Amount counter on product card
        $('.to-cart span[data-item=' + response.id + ']').text(response.amount);

        // Total order amount counter on top
        let count = $('.top-bar__cart-icon span');
        let targetAmount = parseInt(count.attr('data-count'), 10) + response.change;
        count.attr('data-count', targetAmount);

        // Total sum on top
        let sum = parseFloat($('.top-bar__cart-info span').text());
        let total = (sum + response.change * response.price).toFixed(2);
        $('.top-bar__cart-info span').text(total);
    }
    function changeCart (id, operation) {
        let data = {'id': id, 'operation': operation};
        sendAjax('/cart', data, changeCartHandler);
    }

    $('.card-buying .to-cart button').on('click', function () {
        let id = $(this).data('item');
        let operation = $(this).data('operation');
        changeCart(id, operation);
    });
});
