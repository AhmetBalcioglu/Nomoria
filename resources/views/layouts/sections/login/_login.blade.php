@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/logo_1.jpeg') }}" alt="logo" class="logo img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div style="border-right: 2px solid white; height: 80px;"></div>
            <div class="px-3 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="white"
                    class="bi bi-person" viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg>
                <h1 class="ms-3 text-white">Giriş Formu</h1>
            </div>
        </div>
    </div>


    <form action="{{ route('login') }}" method="POST" class="form">
        @csrf
        <div class="row mt-3 mb-3">
            <div class="col-md-12 mb-3">
                <label for="email" class="form-label fs-4 text-white">Email:</label>
                <input type="email" class="form-control reply" id="email" name="email" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="password" class="form-label fs-4 text-white">Şifre:</label>
                <input type="password" class="form-control reply" id="password" name="password" required>
                <div class="form-check">
                    <input class="form-check-input mt-3" type="checkbox" id="showPasswordInput"
                        onclick="showPassword()">
                    <label class="form-check-label fs-4 text-white mt-2" for="showPasswordInput">Şifreyi
                        Göster</label>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Giriş</button>
                <a href="{{ route('register') }}" type="submit" class="btn btn-primary btn-lg">Kayıt ol</a>
            </div>
        </div>
    </form>

</div>
