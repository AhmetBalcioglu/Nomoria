@php
    dd($restaurant);
@endphp
<div class="restaurant-detail-container">
    <div class="restaurant-card">
        <div class="restaurant-image">
            <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}">
        </div>
        <div class="restaurant-info">
            <h1 class="restaurant-title">{{ $restaurant->name }}</h1>
            <p class="restaurant-description">{{ $restaurant->description }}</p>
            <p class="restaurant-address">📍 <strong>Adres:</strong> {{ $restaurant->address }}</p>
            <div class="restaurant-actions">
                <button class="btn-reserve"> Rezervasyon Yap</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="restaurant-comments card">
        <div class="card-header">
            <h2>Yorumlar</h2>
        </div>
        <div class="card-body">
            @foreach($restaurant->comments as $comment)
                <div class="comment mb-3">
                    <p class="mb-0"><strong>{{ $comment->user_name }}</strong> -
                        {{ $comment->created_at->format('d.m.Y H:i') }}
                    </p>
                    <p class="mb-0">
                        @for ($i = 0; $i < 5; $i++)
                            <span style="color: {{ $i < $comment->rating ? 'gold' : '#ccc' }}">&#9733;</span>
                        @endfor
                    </p>
                    <p class="mb-0">{{ $comment->comment ?? 'Yorum yok' }}</p>

                    @if (Session::get('userID') === $comment->userID)
                        <div class="comment-actions mt-2">
                            <!-- Güncelleme Formu -->
                            <form method="POST" action="{{ route('comments.update', $comment->id) }}" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-warning comment-update-btn">Güncelle</button>
                                <div class="comment-update-form d-none">
                                    <textarea class="form-control" name="content" placeholder="Yorumunuzu güncelleyin..."
                                        required>{{ $comment->comment }}</textarea>
                                    <button type="submit" class="btn btn-success">Güncelle</button>
                                </div>
                            </form>

                            <!-- Silme Formu -->
                            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach



            @if (Session::has('userID'))
                <form method="POST" action="/comments">
                    @csrf
                    <input type="hidden" name="restaurantID" value="{{ $restaurant->restaurantID }}">
                    <div class="rating mb-3">
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