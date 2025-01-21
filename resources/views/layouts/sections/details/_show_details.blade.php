<style>
    body {
        background-color: #f4f4f9;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
    }

    .restaurant-detail-container {
        max-width: 1300px;
        margin: 50px auto;
        padding: 50px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        overflow: hidden;
    }

    .restaurant-detail-container:hover {
        transform: translateY(-10px);
    }

    .restaurant-card {
        display: flex;
        background-color: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        height: 500px;
    }

    .restaurant-image {
        flex: 1;
        position: relative;
    }

    .restaurant-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px 0 0 20px;
    }

    .restaurant-info {
        padding: 40px 30px;
        flex: 1;
        background: linear-gradient(to bottom right, rgba(255, 165, 0, 0.8), rgba(255, 50, 50, 0.7));
        border-radius: 0 20px 20px 0;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
    }

    .restaurant-title {
        font-size: 50px;
        font-weight: 700;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: white;
    }

    .restaurant-description {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 15px;
        line-height: 1.6;
    }

    .restaurant-address {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.9);
        margin-top: 20px;
    }

    .restaurant-actions .btn-reserve {
        background-color: #ff6b6b;
        color: white;
        padding: 15px 30px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .restaurant-actions .btn-reserve:hover {
        background-color: #ff4040;
        transform: scale(1.1);
    }

    .restaurant-comments .card {
        border-radius: 12px;
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        background: #fff;
        border: none;
    }

    .restaurant-comments .card-header {
        background-color: #ff6b6b;
        padding: 25px;
        border-radius: 12px 12px 0 0;
        color: #fff;
        text-align: center;
    }

    .restaurant-comments .card-header h2 {
        margin: 0;
        font-size: 30px;
        text-transform: uppercase;
    }

    .comment {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .comment:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .comment p {
        margin: 8px 0;
    }

    .comment .comment-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 15px;
    }

    .comment .comment-actions .btn {
        padding: 8px 15px;
        font-size: 16px;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .comment .comment-actions .btn-warning {
        background-color: #ffc107;
        color: #fff;
    }

    .comment .comment-actions .btn-warning:hover {
        background-color: #e0a800;
        transform: scale(1.1);
    }

    .comment .comment-actions .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .comment .comment-actions .btn-danger:hover {
        background-color: #c82333;
        transform: scale(1.1);
    }

    .rating {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 35px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .rating input:checked~label {
        color: gold;
    }

    .comment-form {
        background-color: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    .comment-form textarea {
        width: 100%;
        padding: 15px;
        border-radius: 12px;
        border: 1px solid #ddd;
        font-size: 18px;
        resize: vertical;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .comment-form button {
        background-color: #4CAF50;
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-size: 18px;
        margin-top: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s ease;
    }

    .comment-form button:hover {
        background-color: #45a049;
    }

    .comment-form p {
        font-size: 18px;
        color: #555;
    }

    .comment-form a {
        color: #ff6b6b;
        text-decoration: none;
        font-weight: bold;
    }

    .restaurant-comments .card-body {
        padding: 25px;
        max-height: 500px;
        overflow-y: auto;
    }

    .restaurant-detail-container {
        max-height: 550px;
        overflow: hidden;
    }
</style>

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
                <button class="btn-reserve">Rezervasyon Yap</button>
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
                        @for ($i = 0; $i < 5; $i++)
                            <span style="color: {{ $i < $comment->rating ? 'gold' : '#ccc' }}">&#9733;</span>
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