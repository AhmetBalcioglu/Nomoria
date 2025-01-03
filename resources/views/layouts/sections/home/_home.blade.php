<div class="container">

    {{-- Kampanyalı Restoranlar Banner --}}
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-5 mt-5">Kampanyalı Restoranlar</h2>
            <div class="slider">

                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/kampanya_gorsel/fastfood.png') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/kampanya_gorsel/steak.png') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/kampanya_gorsel/fish.png') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/kampanya_gorsel/vegan.png') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/kampanya_gorsel/alcohol.png') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
    </div>

    {{-- En Çok Tercih Edilen --}}
    <div class="row">
        <h2 class="text-center mb-5 mt-5">En Çok Tercih Edilen</h2>
        <div class="d-flex best">

            <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                <p class="text-center"><b>Doğum Günü Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100 border border-dark border-1
                     my-4" alt="">
            </div>

            <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                <p class="text-center"><b>İş Yemeği Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100 border border-dark border-1
                     my-4" alt="">
            </div>

            <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                <p class="text-center"><b>Tek Kişilik Rezervasyonlar</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50% " height="50%"
                    class="d-block w-100 border border-dark border-1
                     my-4" alt="">
            </div>

            <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                <p class="text-center"><b>Özel Gün Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100 border border-dark border-1
                     my-4" alt="">
            </div>

            <div class="col-md-2 border-2 border-dark border-1
             p-2 mx-3 card card-body">
                <p class="text-center"><b>Kutlama Yemeği Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100 border border-dark border-1
                     my-4" alt="">
            </div>

        </div>
    </div>

    {{-- Menü İçeriğine Göre Tercih Edilen --}}
    <div class="row">
        <div class="menubest">
            <h2 class="text-center mb-5 mt-5">Menü İçeriğine Göre Tercih Edilen</h2>
            <div class="d-flex best">

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>Doğum Günü Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-1
                         my-4" alt="">
                </div>

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>İş Yemeği Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-1
                         my-4" alt="">
                </div>

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>Tek Kişilik Rezervasyonlar</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50% " height="50%"
                        class="d-block w-100 border border-dark border-1
                         my-4" alt="">
                </div>

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>Özel Gün Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-1
                         my-4"
                        alt="">
                </div>

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>Kutlama Yemeği Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-1
                         my-4"
                        alt="">
                </div>

            </div>
        </div>
    </div>

    {{-- Fiyata Göre Tercih Edilen --}}
    <div class="row">
        <div class="fiyat mb-5">
            <h2 class="text-center mb-5 mt-5">Fiyata Göre Tercih Edilen</h2>
            <div class="d-flex best">

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>Doğum Günü Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-2 my-4" alt="">
                </div>

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>İş Yemeği Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-2 my-4" alt="">
                </div>

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>Tek Kişilik Rezervasyonlar</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50% " height="50%"
                        class="d-block w-100 border border-dark border-2 my-4" alt="">
                </div>

                <div class="col-md-2 border-2 border-dark p-2 mx-3 card card-body">
                    <p class="text-center"><b>Özel Gün Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-2 my-4" alt="">
                </div>

                <div class="col-md-2 border-2 border-dark  p-2 mx-3 card card-body">
                    <p class="text-center"><b>Kutlama Yemeği Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100 border border-dark border-2 my-4" alt="">
                </div>
            </div>
        </div>
    </div>

</div>
