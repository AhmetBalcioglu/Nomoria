<div class="register-body">
    <div class="register-container">
        <div class="logo"></div>
        <h1>Kayıt Ol</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="name-container">
                <input type="text" name="name" id="name" placeholder="*Adınız" class="form-control reply mb-3" required>
            </div>

            <div class="surname-container">
                <input type="text" name="surname" id="surname" placeholder="*Soyadınız" class="form-control reply mb-3"
                    required>
            </div>

            <div class="gender-container">
                <select class="form-select" name="gender" id="floatingSelect" aria-label="Floating label select example"
                    placeholder="Cinsiyetiniz" class="form-control reply mb-3">
                    <option value="" selected>*Cinsiyetiniz</option>
                    <option value="Kadın">Kadın</option>
                    <option value="Erkek">Erkek</option>
                </select>
            </div>
            <div class="role-container mt-2">
                <select class="form-select" name="role" id="role" aria-label="Floating label select example"
                    placeholder="Rolünüz" class="form-control reply mb-3">
                    <option value="" selected>--*Rol--</option>
                    <option value="customer">Müşteri</option>
                    <option value="restaurantOwner">Restoran Sahibi</option>
                </select>
            </div>

            <input type="email" name="email" placeholder="*Email" class="form-control" required>


            <div class="password-container">
                <input type="password" name="password" placeholder="*Şifrenizi giriniz" class="form-control reply mb-3"
                    required>
                <button type="button" class="show-password">&#128065;</button>
            </div>

            <div class="repassword-container">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="*Yeni şifrenizi tekrar giriniz" class="form-control reply mb-3" required>
                <button type="button" class="show-password">&#128065;</button>

            </div>

            <p class="form-text" style="margin-left: 1rem">* ile işaretli alanlar zorunludur</p>

            <button type="submit" class="register-button">Kayıt Ol</button>
        </form>
        <p>Zaten üye misin? <a href="{{ route('login') }}">Giriş Yap</a></p>

    </div>
</div>
</div>