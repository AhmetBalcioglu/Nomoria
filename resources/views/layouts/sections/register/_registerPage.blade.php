<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomoria - Register Page</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <h1>Kayıt Formu</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Adınız:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="surname">Soyadınız:</label>
                        <input type="text" name="surname" id="surname" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="password">Şifreniz:</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                </div>
               
                <button class="btn btn-primary mt-5 mb-5" >Kayıt Ol</button>
                
            </form>
        </div>
    </div>
</body>

</html>