// Token header on every ajax request
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {

    // Submitting registration form
    $('form.registration-form').on('submit', function () {
        let formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '/register',
            async: false,
            data: formData,
            cache: false,
            processData: false,
            success: function (response) {
                location.href = '/';
            },
            error: function (data) {
                console.log(data);
                alert('Error!');
            }
        });
    });

    // Attempt to Log in
    $('form.login-form').on('submit', function () {
        let formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '/login',
            async: false,
            data: formData,
            cache: false,
            processData: false,
            success: function (response) {
                location.href = '/';
            },
            error: function (data) {
                console.log(data);
                alert('Error!');
            }
        });
    });
});
