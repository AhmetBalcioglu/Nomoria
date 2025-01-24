
<div class="container mt-5" style="margin-bottom: 30rem" id="profiles">
    <div class="row">
        <div class="col-md-12">
            <h1>Profil Bilgileri</h1>
            <p class="information"><b>Ad:</b> {{ session()->get('name') }}</p>
            <p class="information"><b>Soyad:</b> {{ session()->get('surname') }}</p>
            <p class="information"><b>Cinsiyet:</b> {{ session()->get('gender') }}</p>
            <p class="information"><b>Rol:</b> {{ session()->get('role')}}</p>
            <p class="information"><b>E-posta:</b> {{ session()->get('email') }}</p>
        </div>
    </div>
</div>
