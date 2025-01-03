<div class="container">
    <div class="row align-items-center" style="height: 100%;">
        <div class="col-md-6 offset-md-3">
            <h1>Şifre Yenile</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('reset-password.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="code">Kod:</label>
                        <input type="text" id="code" name="code" required class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="password">Yeni Şifre:</label>
                        <input type="password" id="password" name="password" required class="form-control">
                        <input type="checkbox" id="showPasswordInput" onclick="showPassword()">
                        <label for="showPasswordInput">Şifreyi Göster</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="password_confirmation">Yeni Şifre (Tekrar):</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Şifreyi Yenile</button>
                    </div>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
