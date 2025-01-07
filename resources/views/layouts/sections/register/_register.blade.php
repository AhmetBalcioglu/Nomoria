@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container container1">

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/logo_1.jpeg') }}" alt="logo" class="logo img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div style="border-right: 2px solid white; height: 80px;"></div>
            <div class="px-3 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="white"
                    class="bi bi-person-add" viewBox="0 0 16 16">
                    <path
                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                    <path
                        d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                </svg>
                <h1 class="ms-3 text-white">Kayıt Formu</h1>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label fs-4 text-white" for="name">Adınız:</label>
                    <input type="text" name="name" id="name" class="form-control reply mb-3">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label fs-4 text-white" for="surname">Soyadınız:</label>
                    <input type="text" name="surname" id="surname" class="form-control reply mb-3">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label fs-4 text-white" for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control reply mb-3">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label fs-4 text-white" for="password">Şifreniz:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <input class="form-check-input mt-3" type="checkbox" id="showPasswordInput"
                        onclick="showPassword()">
                    <label class="form-check-label fs-4 text-white mt-2" for="showPasswordInput">Şifreyi Göster</label>
                </div>
            </div>

            <button class="btn btn-primary mt-5 mb-5">Kayıt Ol</button>

        </form>
    </div>
</div>
