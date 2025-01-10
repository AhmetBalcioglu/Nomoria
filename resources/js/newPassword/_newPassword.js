
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





