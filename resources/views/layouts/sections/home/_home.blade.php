

<style>
    body {
        background-color: #f4f2f2;
        font-family: 'Arial', sans-serif;
    }

    .slider-wrapper {
        margin: 0 70px;
    }

    .slider-container {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
        width: 100%;
    }


    .carousel-inner img {
        height: 300px;
        object-fit: cover;
        width: 100%;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        justify-content: flex-start;
    }

    .card {
        transition: all 0.3s ease-in-out;
        border-radius: 10px;
        border: 1px solid #ece9e9;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #fbfafa;
        overflow: hidden;
        width: 18%; /* Kartların genişliği */
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        background-color: #f5f7fa;
    }

    .card p {
        font-size: 0.9rem;
        color: #555;
        margin: 10px 0;
        text-align: center;
    }

    .card img {
        border-radius: 10px 10px 0 0;
        object-fit: cover;
        height: 150px;
        width: 100%;
    }

    h2 {
        font-family: 'Arial', sans-serif;
        color: #333;
        letter-spacing: 0.5px;
        margin: 1.5rem 0;
        text-align: center;
    }

    /* Popup */
    .popup {
        display: none;
        position: fixed;
        top: 20%;
        right: 20%;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        width: 300px;
        max-width: 90%;
        animation: fadeIn 0.8s ease-in-out;
        img {
            max-width: 100%;
            margin-top: 2rem;
        }
    }

    .popup .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.2rem;
        background: none;
        border: none;
        cursor: pointer;
    }

    .popup .popup-content {
        font-size: 1rem;
        color: #333;
    }


    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

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
