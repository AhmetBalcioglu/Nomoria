@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




<div class="register-body">
<div class="register-container">
    <div class="logo"></div>
    <h1>Kayıt Ol</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <button type="button" class="info-button">&#8505;</button>

        

        
        <button type="button" class="register-button">Kayıt Ol</button>

    </form>

            <p>Zaten hesabın var mı? <a href="{{ route('login') }}">Giriş yap</a></p>

            <div class="divider">
                <span>VEYA</span>
            </div>
            <div class="social-login">

<button class="google-btn">Google ile Kayıt Ol</button>
<button class="apple-btn">Apple ile Kayıt Ol</button>