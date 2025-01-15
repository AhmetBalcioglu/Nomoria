<div class="register-body">
    <div class="register-container">
        <div class="logo"></div>
        <h1>Kayıt Ol</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="name-container">
                <input type="text" name="name" id="name" placeholder="Adınız" class="form-control reply mb-3">
            </div>

            <div class="surname-container">
                <input type="text" name="surname" id="surname" placeholder="Soyadınız"
                    class="form-control reply mb-3">
            </div>

            <div class="gender-container">
                <select class="form-select" name="gender" id="floatingSelect"
                    aria-label="Floating label select example" placeholder="Cinsiyetiniz"
                    class="form-control reply mb-3">
                    <option selected>Cinsiyetiniz</option>
                    <option value="Kadın">Kadın</option>
                    <option value="Erkek">Erkek</option>
                </select>
            </div>

            <input type="email" name="email" placeholder="Email" class="form-control" required>


            <div class="password-container">
                <input type="password" name="password" placeholder="Şifrenizi giriniz" class="form-control reply mb-3"
                    required>
                <button type="button" class="show-password">&#128065;</button>
            </div>

            <div class="repassword-container">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Yeni şifrenizi tekrar giriniz" class="form-control reply mb-3" required>
                <button type="button" class="show-password">&#128065;</button>

            </div>



            <button type="submit" class="register-button">Kayıt Ol</button>
        </form>

    </div>
</div>
</div>
