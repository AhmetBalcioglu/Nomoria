<div class="login-container">
    <div class="logo"></div>
    <h1>Giriş Yap</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <div class="password-container">
            <input type="password" name="password" placeholder="Şifre" required>
            <button type="button" class="show-password">&#128065;</button>
        </div>
        <div class="remember-me">
            <label for="">
                <input type="checkbox" name="remember" id="remember">
                Beni Hatırla
            </label>
        </div>
    </form>

            <p>Henüz hesabın yok mu? <a href="route">Hesap aç</a></p>

            <div>
                <span>VEYA</span>
            </div>
            <div class="social-login">
               
<button class="google-btn">Google ile Giriş yap</button>        
<button class="apple-btn">Apple ile Giriş yap</button>
        
</div>
</div>