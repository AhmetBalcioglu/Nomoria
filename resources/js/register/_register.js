

$(document).ready(function () {
    $('.showPassword').on('click', function () {
        const passwordInput = $('#password'); // Şifre alanını seçiyoruz.
        const inputType = passwordInput.attr('type') === 'password' ? 'text' : 'password'; // Türü kontrol ediyoruz.

        // Input türünü değiştir
        passwordInput.attr('type', inputType);
    });
});


$(document).ready(function () {
    $('.show-password').on('click', function () {
        // Butonun ait olduğu input alanını bul
        const $passwordInput = $(this).siblings('input'); // siblings tıklanan butonun kardeş öğesi olan input alanını seçer.
        const inputType = $passwordInput.attr('type') === 'password' ? 'text' : 'password';

        // Input türünü değiştir
        $passwordInput.attr('type', inputType);

        // Düğme metnini değiştir
        $(this).text(inputType === 'password' ? "👁" : "🙈");
    });
});
$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Kullanıcı oluşturuldu',
                        text: response.message
                    }).then(function () {
                        window.location.href = '/login';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kullanıcı oluşturulamadı',
                        text: response.message
                    });
                }
            },
            error: function (err) {
                var errors = err.responseJSON.errors;
                var message = '';
                $.each(errors, function (key, value) {
                    message += value + "<br>";
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Kullanıcı oluşturulamadı',
                    html: message
                });
            }
        });
    });
});

