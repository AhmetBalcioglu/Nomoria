<div class="container mt-5" style="margin-bottom: 30rem">
    <div class="row">
        <div class="col-md-12">
            <h1><b>Profil Bilgileri</b></h1>
            <p><b>Ad:</b> {{ session()->get('name') }}</p>
            <p><b>Soyad:</b> {{ session()->get('surname') }}</p>
            <p><b>Cinsiyet:</b> {{ session()->get('gender') }}</p>
            <p><b>Rol:</b> {{ session()->get('role')}}</p>
            <p><b>E-posta:</b> {{ session()->get('email') }}</p>
            <h2 class="text-center mt-3"><b>Restoranlarım</b></h2>
            <ul class="list-group">
                @foreach ($restaurants as $restaurant)
                    @if ($restaurant->userID == session()->get('userID'))
                        <li class="list-group-item">{{ $restaurant->name }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>