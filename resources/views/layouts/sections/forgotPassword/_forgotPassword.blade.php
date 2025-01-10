<div class="forgotPassword-body">
    <div class="forgotPassword-container">
        <div class="logo">
            <h1>Şifremi Unuttum</h1>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <form action="{{ route('send-reset-code') }}" method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email" id="email" name="email" required>

                <button class="forgotPassword-button" type="submit">Şifre Sıfırlama Kodu Gönder</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
