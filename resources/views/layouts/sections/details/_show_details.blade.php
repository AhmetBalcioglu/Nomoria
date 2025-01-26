<!-- Restoran üst kısmı: Görsel, isim ve konum -->
<div class="restaurant-header">
    <img src="/img/makeReservation/r3.jpg" alt="Restaurant Image">
    <div class="overlay"></div>
    <div class="overlay-text">
        <h1>{{ $restaurant->name }}</h1>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>
            {{ $restaurant->address }}
        </p>
        <button onclick="window.location.href = '/makeReservation?restaurantID={{ $restaurant->restaurantID }}'"
            class="btn btn-danger">
            Rezervasyon Yap</button>
    </div>
</div>


<!-- Yönlendirme sekmeleri (Hakkında, Galeri, Menü, Yorumlar) -->
<nav class="navbar navbar-expand-lg" id="showDetails">
    <div class="container">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#gallery">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reviews">Yorumlar</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Menü Kısmı -->
<section id="menu" class="py-5">
    <div class="container d-flex justify-content-center">
        <button type="button" class="menuBtn openMenuModal" data-restaurant-id="{{ $restaurant->restaurantID }}">
            Menüyü Görmek İçin Tıklayınız
        </button>
    </div>
</section>

<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuModalLabel">Menü Listesi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="menuList"></ul>
            </div>
        </div>
    </div>
</div>

<section id="gallery" class="py-5">
    <div class="container">
        <h2>Galeri</h2>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <!-- Slider İçeriği -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $restaurant->detail_image->image }}" class="img-fluid rounded"
                                alt="Gallery Image 1" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ $restaurant->detail_image->image2 }}" class="img-fluid rounded"
                                alt="Gallery Image 2" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ $restaurant->detail_image->image3 }}" class="img-fluid rounded"
                                alt="Gallery Image 3" style="height: 200px; object-fit: cover;">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $restaurant->detail_image->image4 }}" class="img-fluid rounded"
                                alt="Gallery Image 4" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ $restaurant->detail_image->image5 }}" class="img-fluid rounded"
                                alt="Gallery Image 5" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ $restaurant->detail_image->image6 }}" class="img-fluid rounded"
                                alt="Gallery Image 6" style="height: 200px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kontroller -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section id="reviews" class="py-5">
    <div class="container">
        <h2>Yorumlar</h2>
        <div id="reviewList">
            @foreach($restaurant->comments as $comment)
                <div class="card col-md-8 mb-3">
                    <div class="card-body">
                        <p class="text-muted">{{ $comment->created_at->format('d.m.Y H:i') }}</p>
                        <h5 class="card-title">{{ $comment->user_name }}</h5>

                        <p class="card-text">{{ $comment->comment ?? 'Yorum yok' }}</p>
                        <p>
                            @for ($i = 0; $i < 5; $i++)
                                <span style="color: {{ $i < $comment->rating ? 'gold' : '#ccc' }}">&#9733;</span>
                            @endfor
                        </p>

                        @if (Session::get('userID') === $comment->userID)
                            <div class="comment-actions">
                                <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn comment-update-btn">Yorumu Güncelle</button>
                                    <div class="comment-update-form d-none">
                                        <textarea name="content" required>{{ $comment->comment }}</textarea>
                                        <button type="submit" class="btn gonder-btn">Gönder</button>
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete-btn">Yorumu Sil</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Düşüncelerinizi Paylaşabilirsiniz</h5>
                @if (Session::has('userID'))
                    <form method="POST" action="/comments" class="comment-form">
                        @csrf
                        <input type="hidden" name="restaurantID" value="{{ $restaurant->restaurantID }}">
                        <div class="mb-3">
                            <div id="ratingStars" class="d-flex align-items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star" data-value="{{ $i }}">&#9733;</span>
                                @endfor
                                <span id="ratingValue" class="ms-3 text-muted">0/5</span>
                                <input type="hidden" name="rating" id="hiddenRating"> <!-- Gizli input -->
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="content" class="form-control" placeholder="Yorumunuzu yazın..."
                                required></textarea>
                        </div>
                        <button type="submit" class="btn">Gönder</button>
                    </form>
                @else
                    <p>Yorum yapmak için <a href="{{ url('/login') }}" class="login">giriş yapmalısınız</a>.</p>
                @endif
            </div>
        </div>
    </div>
</section>