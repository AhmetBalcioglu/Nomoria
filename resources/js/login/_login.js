$(document).ready(function(){
    //şifre göster/gizle fonksiyonu

    $(".show-password").on("click", function(){
        const $passwordInput = $(".password-container input");
        const passwordType = $passwordInput.attr("type")==="password" ? "text" : "password";
        $passwordInput.attr("type", passwordType);

        $(this).text(passwordType === "password" ? "👁" : "🙈");
});
});
