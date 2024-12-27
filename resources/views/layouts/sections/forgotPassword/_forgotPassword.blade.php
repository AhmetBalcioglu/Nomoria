<div class="container mt-5 mb-5">
    <div class="row align-items-center" style="height: 100%;">
        <div class="col-md-6 offset-md-3">
            <h1>Şifremi Unuttum</h1>
            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <form action="{{ route('send-reset-code') }}" method="POST">
                @csrf
                <label class="form-label mt-3" for="email">E-posta:</label>
                <input class="form-control mt-3" type="email" id="email" name="email" required>
                <button class="btn btn-primary mt-3" type="submit">Şifre Sıfırlama Kodu Gönder</button>
            </form>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>