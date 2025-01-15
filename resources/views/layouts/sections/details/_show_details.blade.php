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
