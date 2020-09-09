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
                console.log(data);
                alert('Error!');
            }
        });
    }

    function defaultHandler (response) {
        console.log(response);
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

    // Active class changer for main grid buttons
    $('.main-tabs button').on('click', function () {
        $('.main-tabs button').removeClass('active');
        $(this).addClass('active');
    });

    // Add/remove item to cart
    function changeCartHandler (response) {
        console.log(response);
        let count = $('.top-bar__cart-icon span');
        let targetAmount = parseInt(count.attr('data-count'), 10) + 1;
        count.attr('data-count', targetAmount);
    }
    function changeCart (id, operation) {
        let data = {'id': id, 'operation': operation};
        sendAjax('/cart', data, changeCartHandler);
    }

    $('.card-buying .to-cart button').on('click', function () {
        let id = $(this).data('item');
        changeCart(id, "add");
    });
});
