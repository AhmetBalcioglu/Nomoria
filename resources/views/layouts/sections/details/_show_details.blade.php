{{--<div class="restaurant-detail-container">
    <div class="restaurant-card">
        <div class="restaurant-image">
            <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}">
        </div>
        <div class="restaurant-info">
            <h1 class="restaurant-title">{{ $restaurant->name }}</h1>
            <p class="restaurant-description">{{ $restaurant->description }}</p>
            <p class="restaurant-address">📍 <strong>Adres:</strong> </p>
            <div class="restaurant-actions">
                <button onclick="window.location.href = '/makeReservation?restaurantID={{ $restaurant->restaurantID }}'"
                    class="btn-reserve">
                    Rezervasyon Yap</button>
                <button type="button" class="btn btn-secondary openMenuModal"
                    data-restaurant-id="{{ $restaurant->restaurantID }}">
                    Menü
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Menü Modal -->
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

<div class="container">
    <div class="restaurant-comments card mb-5">
        <div class="card-header">
            <h2>Yorumlar</h2>
        </div>
        <div class="card-body">
            @foreach($restaurant->comments as $comment)
                <div class="comment mb-3">
                    <p><strong>{{ $comment->user_name }}</strong> -
                        {{ $comment->created_at->format('d.m.Y H:i') }}
                    </p>
                    <p>
                        @for ($i = 0; $i < 5; $i++) <span style="color: {{ $i < $comment->rating ? 'gold' : '#ccc' }}">
                            &#9733;</span>
                        @endfor
                    </p>
                    <p>{{ $comment->comment ?? 'Yorum yok' }}</p>

                    @if (Session::get('userID') === $comment->userID)
                        <div class="comment-actions">
                            <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-warning comment-update-btn">Güncelle</button>
                                <div class="comment-update-form d-none">
                                    <textarea name="content" required>{{ $comment->comment }}</textarea>
                                    <button type="submit" class="btn btn-success">Güncelle</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach

            @if (Session::has('userID'))
                <form method="POST" action="/comments" class="comment-form">
                    @csrf
                    <input type="hidden" name="restaurantID" value="{{ $restaurant->restaurantID }}">
                    <div class="rating">
                        <input type="radio" name="rating" value="1" required id="rate-1">
                        <label for="rate-1" data-rating="1">★</label>
                        <input type="radio" name="rating" value="2" required id="rate-2">
                        <label for="rate-2" data-rating="2">★</label>
                        <input type="radio" name="rating" value="3" required id="rate-3">
                        <label for="rate-3" data-rating="3">★</label>
                        <input type="radio" name="rating" value="4" required id="rate-4">
                        <label for="rate-4" data-rating="4">★</label>
                        <input type="radio" name="rating" value="5" required id="rate-5">
                        <label for="rate-5" data-rating="5">★</label>
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Yorumunuzu yazın..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Yorum Yap</button>
                </form>
            @else
                <p>Yorum yapmak için <a href="{{ url('/login') }}">giriş yapın</a>.</p>
            @endif
        </div>
    </div>
</div>
--}}


<!-- Restoran üst kısmı: Görsel, isim ve konum -->
<div class="restaurant-header">
    <img src="/img/makeReservation/r3.jpg" alt="Restaurant Image">
    <div class="overlay"></div>
    <div class="overlay-text">
        <h1>{{ $restaurant->name }}</h1>
        <p>{{ $restaurant->address }}</p>
        <button onclick="window.location.href = '/makeReservation?restaurantID={{ $restaurant->restaurantID }}'"
            class="btn btn-danger">
            Rezervasyon Yap</button>
    </div>
</div>

<!-- Yönlendirme sekmeleri (Hakkında, Galeri, Menü, Yorumlar) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#menu">Menü</a>
            </li>
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
    <div class="container">
        <h2>Menü</h2>
        <button type="button" class="btn btn-secondary openMenuModal"
            data-restaurant-id="{{ $restaurant->restaurantID }}">
            Menü
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

<section id="gallery" class="py-5 bg-light">
    <div class="container">
        <h2>Galeri</h2>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <!-- Slider İçeriği -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{$restaurant->image}}" class="img-fluid rounded" alt="Gallery Image 1">
                        </div>
                        <div class="col-md-4">
                            <img src="{{$restaurant->image}}" class="img-fluid rounded" alt="Gallery Image 2">
                        </div>
                        <div class="col-md-4">
                            <img src="{{$restaurant->image}}" class="img-fluid rounded" alt="Gallery Image 3">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/img/kampanya_gorsel/alcohol.png" class="img-fluid rounded" alt="Gallery Image 4">
                        </div>
                        <div class="col-md-4">
                            <img src="/img/kampanya_gorsel/alcohol.png" class="img-fluid rounded" alt="Gallery Image 5">
                        </div>
                        <div class="col-md-4">
                            <img src="/img/kampanya_gorsel/alcohol.png" class="img-fluid rounded" alt="Gallery Image 6">
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

<section id="reviews" class="py-5 bg-light">
    <div class="container">
        <h2>Yorumlar</h2>
        <div id="reviewList">
            @foreach($restaurant->comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->user_name }}</h5>
                        <p class="card-text">{{ $comment->comment ?? 'Yorum yok' }}</p>
                        <p>
                            @for ($i = 0; $i < 5; $i++)
                                <span style="color: {{ $i < $comment->rating ? 'gold' : '#ccc' }}">&#9733;</span>
                            @endfor
                        </p>
                        <p class="text-muted">{{ $comment->created_at->format('d.m.Y H:i') }}</p>
                        @if (Session::get('userID') === $comment->userID)
                            <div class="comment-actions">
                                <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn btn-warning comment-update-btn">Güncelle</button>
                                    <div class="comment-update-form d-none">
                                        <textarea name="content" required>{{ $comment->comment }}</textarea>
                                        <button type="submit" class="btn btn-success">Güncelle</button>
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Sil</button>
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
                                    <input type="radio" name="rating" value="{{ $i }}" id="rate-{{ $i }}" required>
                                    <label for="rate-{{ $i }}" data-rating="{{ $i }}">&#9733;</label>
                                @endfor
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="content" class="form-control" placeholder="Yorumunuzu yazın..."
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </form>
                @else
                    <p>Yorum yapmak için <a href="{{ url('/login') }}">giriş yapın</a>.</p>
                @endif
            </div>
        </div>
    </div>
</section>