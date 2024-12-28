<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomoria - Login Page</title>
</head>

<body>
    <div class="container">
        <H1>Login Sayfası</H1>
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

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="password" class="form-label">Şifre:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <input type="checkbox" id="showPasswordInput" onclick="showPassword()">
                    <label for="showPasswordInput">Şifreyi Göster</label>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Giriş</button>
                </div>
            </div>
        </form>

    </div>
</body>

</html>
