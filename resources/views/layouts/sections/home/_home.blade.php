

<div class="container mt-5">

    <div class="slider-wrapper slider-container">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/k1.png') }}" class="d-block w-100" alt="Kampanya 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/k2.png') }}" class="d-block w-100" alt="Kampanya 2">






                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/k3.png') }}" class="d-block w-100" alt="Kampanya 3">






                </div>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>




























    <div class="best card-container mt-3">
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Doğum Günü">
            <p>Doğum Günü Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="İş Yemeği">
            <p>İş Yemeği Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Tek Kişilik">
            <p>Tek Kişilik Rezervasyonlar</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Özel Gün">
            <p>Özel Gün Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Kutlama Yemeği">
            <p>Kutlama Yemeği Rezervasyonları</p>
        </div>
    </div>

    <div class="best card-container mt-3">
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Doğum Günü">
            <p>Doğum Günü Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="İş Yemeği">
            <p>İş Yemeği Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Tek Kişilik">
            <p>Tek Kişilik Rezervasyonlar</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Özel Gün">
            <p>Özel Gün Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Kutlama Yemeği">
            <p>Kutlama Yemeği Rezervasyonları</p>
        </div>
    </div>

    <div class="best card-container mt-3">
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Doğum Günü">
            <p>Doğum Günü Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="İş Yemeği">
            <p>İş Yemeği Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Tek Kişilik">
            <p>Tek Kişilik Rezervasyonlar</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Özel Gün">
            <p>Özel Gün Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Kutlama Yemeği">
            <p>Kutlama Yemeği Rezervasyonları</p>
        </div>
    </div>

    <div class="best card-container mt-3">
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Doğum Günü">
            <p>Doğum Günü Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="İş Yemeği">
            <p>İş Yemeği Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Tek Kişilik">
            <p>Tek Kişilik Rezervasyonlar</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Özel Gün">
            <p>Özel Gün Rezervasyonları</p>
        </div>
        <div class="card">
            <img src="{{ asset('img/div_img.png') }}" alt="Kutlama Yemeği">
            <p>Kutlama Yemeği Rezervasyonları</p>
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
