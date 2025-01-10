<div class="newPassword-body">
    <div class="newPassword-container">
        <div class="logo">
            <h1>Şifreyi Yenile</h1>

            <form action="{{ route('reset-password.submit') }}" method="POST">
                @csrf

                <div class="code-container">
                    <input type="text" name="code" id="code" placeholder="Kodu giriniz" class="form-control reply mb-3"
                        required>
                </div>

                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Yeni şifrenizi giriniz"
                        class="form-control reply mb-3" required>
                    <button type="button" class="show-password">&#128065;</button>

                </div>

                <div class="repassword-container">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Yeni şifrenizi tekrar giriniz" class="form-control reply mb-3" required>
                    <button type="button" class="show-password">&#128065;</button>

                </div>

                <button type="submit" class="newPassword-button">Şifreyi yenile</button>

            </form>
        </div>
    </div>
</div>
