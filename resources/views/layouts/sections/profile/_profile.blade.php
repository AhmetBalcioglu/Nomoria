<div class="container mt-5" style="margin-bottom: 30rem">
    <div class="row">
        <div class="col-md-12">
            <h1><b>Profil Bilgileri</b></h1>
            <p><b>Ad:</b> {{ session()->get('name') }}</p>
            <p><b>Soyad:</b> {{ session()->get('surname') }}</p>
            <p><b>Cinsiyet:</b> {{ session()->get('gender') }}</p>
            <p><b>Rol:</b> {{ session()->get('role')}}</p>
            <p><b>E-posta:</b> {{ session()->get('email') }}</p>
        </div>
    </div>
</div>