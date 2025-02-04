<div class="container mt-5">

    @foreach ($categories->chunk(4) as $chunk)

        <div class="row mb-5">
            @foreach ($chunk as $category)
                <div class="col-md-2 col-sm-2 col-md-2 p-2 mx-3 card card-body position-relative category_url"
                    data-url="{{ $category->categoryName }}">
                    <p class="text-center"><b>{{ $category->categoryName }}</b></p>
                    <img src="{{ asset($category->image) }}" width="50%" height="50%" class="d-block w-100 my-4" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        class="bi bi-suit-heart-fill position-absolute top-0 end-0 m-2 hearth-icon
                                                           {{ in_array($category->categoryID, $favoritedCategories) ? 'favorited' : '' }}" data-id="{{ $category->categoryID }}"
                        viewBox="0 0 16 16">
                        <path
                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
                    </svg>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<div class="container">
    <div class="row">
        <div class=" col md-12" id="hero" style="height: 40rem;">
            <img src="{{ asset('img/hero-bg.png') }}" alt="">
        </div>
    </div>

</div>




<div class="container my-5" id="campaigns">
    <h2 class="text-dark">Sizin için seçtiklerimiz</h2>

    {{-- Alt slider - Kampanya ve özel restoranlar --}}

    <div id="campaignCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" id="carousel-inner">
            <!-- İlk Slide -->
            <div class="carousel-item active">
                <div class="row g-4">
                    <!-- Balık Restoranları Kartı -->
                    <div class="col-md-6">
                        <div class="campaign-card text-center bg-dark text-light">
                            <img src="{{ asset('img/homepage_img/balik.jpg') }}" alt="Balık Restoranları"
                                class="img-fluid">
                            <h3 class="campaign-title">Balık restoranlarında Kampanya</h3>
                            <p class="discount">20%</p>

                            <p class="campaign-text">Nomaria'ya özel</p>
                            <a href="/discount" class="btn btn-campaign">Restorana Git</a>


                        </div>
                    </div>
                    <!-- Et Restoranları Kartı -->
                    <div class="col-md-6">
                        <div class="campaign-card text-center bg-dark text-light">
                            <img src="{{ asset('img/homepage_img/et.jpg') }}" alt="Et Restoranları" class="img-fluid">
                            <h3 class="campaign-title">Et menülerinde Kampanya</h3>
                            <p class="discount">15%</p>
                            <p class="campaign-text">Nomaria'ya özel</p>

                            <a href="/discount" class="btn btn-campaign">Restorana Git</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- İkinci Slide -->
            <div class="carousel-item">
                <div class="row g-4">
                    <!-- Diğer Kampanya Kartları -->
                    <div class="col-md-6">
                        <div class="campaign-card text-center bg-dark text-light">
                            <img src="{{ asset('img/kampanya_gorsel/vegan.png') }}" alt="Vegan Restoranları"
                                class="img-fluid">
                            <h3 class="campaign-title">Vegan menülerde Kampanya</h3>
                            <p class="discount">10%</p>
                            <p class="campaign-text">Nomaria'ya özel</p>

                            <a href="/discount" class="btn btn-campaign">Restorana Git</a>



                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="campaign-card text-center bg-dark text-light">
                            <img src="{{ asset('img/kampanya_gorsel/vegan.png') }}" alt="Vegan Restoranları"
                                class="img-fluid">
                            <h3 class="campaign-title">Tatlılarda Kampanya</h3>
                            <p class="discount">5%</p>

                            <p class="campaign-text">Nomaria'ya özel</p>

                            <a href="/discount" class="btn btn-campaign">Restorana Git</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Kontrolleri -->
        <button class="carousel-control-prev" type="button" data-bs-target="#campaignCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#campaignCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


</div>

@if (!(session()->has('name') && session()->has('surname') && session()->has('role')))
    <div id="blur-bg" class="blur-bg"></div>
    <div id="popup" class="popup">
        <button class="close-btn">×</button>
        <div class="popup-content">
            <img src="{{ asset('img/popup.png') }}" alt="Popup Görseli">
            <button onclick="window.location.href = '/register'" class="uyeol-btn">ÜYE OL</button>
        </div>
    </div>
@endif