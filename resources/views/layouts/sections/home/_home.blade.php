<div class="container mt-5">

    {{-- Kampanyalı Restoranlar Banner --}}
    <div class="row">
        <div class="col-md-12">

            <div class="slider mb-5">

                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">

                    <div class="carousel-inner">
                        <div class="carousel-item ">

                            <img src="{{ asset('img/kampanya_gorsel/fastfood.png') }}" class="d-block w-100 img-fluid"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/kampanya_gorsel/steak.png') }}" class="d-block w-100 img-fluid"
                                alt="...">
                        </div>
                        <div class="carousel-item active">
                            <a class="nav-link custom-link" href="{{ url('/discount') }}"> <img
                                    src="{{ asset('img/kampanya_gorsel/fish.png') }}" class="d-block w-100 img-fluid"
                                    alt="..."> </a>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/kampanya_gorsel/vegan.png') }}" class="d-block w-100 img-fluid"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/kampanya_gorsel/alcohol.png') }}" class="d-block w-100 img-fluid"
                                alt="...">
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
    <div class="row mb-5">
        <div class="d-flex best">

            <div class="col-md-2   p-2 mx-3 card card-body">
                <p class="text-center"><b>Kutlama Yemeği Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   p-2 mx-3 card card-body">
                <p class="text-center"><b>İş Yemeği Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   p-2 mx-3 card card-body">
                <p class="text-center"><b>Tek Kişilik Rezervasyonlar</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50% " height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   p-2 mx-3 card card-body">
                <p class="text-center"><b>Yöresel Lezzetler Yemekleri Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   
             p-2 mx-3 card card-body">
                <p class="text-center"><b>Özel Gün Rezervasyonları</b></p>
                <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

        </div>
    </div>

    {{-- Menü İçeriğine Göre Tercih Edilen --}}
    <div class="row mb-5">
        <div class="menubest">
            <div class="d-flex best">

                <div class="col-md-2   p-2 mx-3 card card-body">
                    <p class="text-center"><b>Et Yemekleri Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2  p-2 mx-3 card card-body">
                    <p class="text-center"><b>Balık Yemekleri Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2   p-2 mx-3 card card-body">
                    <p class="text-center"><b>Fastfood Rezervasyonlar</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50% " height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2   p-2 mx-3 card card-body">
                    <p class="text-center"><b>Vegan Yemekleri Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2   p-2 mx-3 card card-body">
                    <p class="text-center"><b>Alkollü Menü Rezervasyonları</b></p>
                    <img src="{{ asset('img/div_img.png') }}" width="50%" height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

            </div>
        </div>
    </div>



</div>
<div id="popup" class="popup">
    <button class="close-btn" onclick="closePopup()">×</button>
    <div class="popup-content">
        <img src="{{ asset('img/div_img.png') }}" alt="">
        <h4>Hemen üye ol</h4>
        <p>Beğendiğin restaurantları favorilerine ekle. </p>
        <p>kampanylardan haberin olsun!</p>
        <button class="btn btn-danger">ÜYE OL</button>
    </div>
</div>

<script>
    window.onload = function() {
        setTimeout(function() {
            document.getElementById("popup").style.display = "block";
        }, 500);
    }


    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
