<div class="login-body">
    <div class="login-container">
        <div class="logo">
            <h1>Giriş Yap</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" name="password" placeholder="Şifre" required>
                    <button type="button" class="show-password">&#128065;</button>
                </div>

                <div class="login-options">
                    <div class="forgot-password">
                        <a href="{{ route('forgotPassword') }}" class="forgotPassword" rel="nofollow"
                            style="color:#ed4f15">Şifremi Unuttum</a>
                    </div>
                    <div class="remember-me">
                        <label class="remember-checkbox">
                            <input type="checkbox" name="remember" id="remember">
                        </label>
                        <span>Beni hatırla</span>
                    </div>
                </div>
                <button type="submit" class="login-button">Giriş yap</button>

            </form>

            <p>Henüz hesabın yok mu? <a href="{{ route('register') }}">Hesap aç</a></p>


        </div>
    </div>
</div>
