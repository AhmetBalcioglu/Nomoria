<div class="container mt-5">

    {{-- Kampanyalı Restoranlar Banner --}}
    <div class="row">
        <div class="col-md-12">

            <div class="slider mb-5">

                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">

                    <div class="carousel-inner">
                        <div class="carousel-item ">

                            <a class="nav-link custom-link" href="{{ url('/discount') }}"><img
                                    src="{{ asset('img/kampanya_gorsel/fastfood.png') }}"
                                    class="d-block w-100 img-fluid" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <a class="nav-link custom-link" href="{{ url('/discount') }}"><img
                                    src="{{ asset('img/kampanya_gorsel/steak.png') }}" class="d-block w-100 img-fluid"
                                    alt="..."></a>
                        </div>
                        <div class="carousel-item active">
                            <a class="nav-link custom-link" href="{{ url('/discount') }}"> <img
                                    src="{{ asset('img/kampanya_gorsel/fish.png') }}" class="d-block w-100 img-fluid"
                                    alt="..."> </a>
                        </div>
                        <div class="carousel-item">
                            <a class="nav-link custom-link" href="{{ url('/discount') }}"><img
                                    src="{{ asset('img/kampanya_gorsel/vegan.png') }}" class="d-block w-100 img-fluid"
                                    alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <a class="nav-link custom-link" href="{{ url('/discount') }}"> <img
                                    src="{{ asset('img/kampanya_gorsel/alcohol.png') }}" class="d-block w-100 img-fluid"
                                    alt="..."></a>
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
                <p class="text-center"><b>Özel Günler</b></p>
                <img src="{{ asset('img/homepage_img/ozengun.jpg') }}" width="50%" height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   p-2 mx-3 card card-body">
                <p class="text-center"><b>Kutlamalar</b></p>
                <img src="{{ asset('img/homepage_img/kutlama.jpg') }}" width="50%" height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   p-2 mx-3 card card-body">
                <p class="text-center"><b>İş Yemekleri</b></p>
                <img src="{{ asset('img/homepage_img/is.jpg') }}" width="50% " height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   p-2 mx-3 card card-body">
                <p class="text-center"><b>Tek Kişilik</b></p>
                <img src="{{ asset('img/homepage_img/tek_kisi.jpg') }}" width="50%" height="50%"
                    class="d-block w-100   
                     my-4" alt="">
            </div>

            <div class="col-md-2   
             p-2 mx-3 card card-body">
                <p class="text-center"><b>Dünya Mutfağı</b></p>
                <img src="{{ asset('img/homepage_img/dunya_mutfagi.jpg') }}" width="50%" height="50%"
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
                    <p class="text-center"><b>Et Menüleri</b></p>
                    <img src="{{ asset('img/homepage_img/et.jpg') }}" width="50%" height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2  p-2 mx-3 card card-body">
                    <p class="text-center"><b>Balık Menüleri</b></p>
                    <img src="{{ asset('img/homepage_img/balik.jpg') }}" width="50%" height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2   p-2 mx-3 card card-body">
                    <p class="text-center"><b>Fast Food Menüleri</b></p>
                    <img src="{{ asset('img/homepage_img/fastfood.jpg') }}" width="50% " height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2   p-2 mx-3 card card-body">
                    <p class="text-center"><b>Vegan Menüler</b></p>
                    <img src="{{ asset('img/homepage_img/vegan.png') }}" width="50%" height="50%"
                        class="d-block w-100   
                         my-4" alt="">
                </div>

                <div class="col-md-2   p-2 mx-3 card card-body">
                    <p class="text-center"><b>Alkollü Menüler</b></p>
                    <img src="{{ asset('img/homepage_img/alkol.jpg') }}" width="50%" height="50%"
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
        <p>Beğendiğin restoranları favorilerine ekle. </p>
        <p>Lezzetli Fırsatları Kaçırma!</p>
        <button onclick="window.location.href = '/register' " class="btn btn-danger">ÜYE OL</button>
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
