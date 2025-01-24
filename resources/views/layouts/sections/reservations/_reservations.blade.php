<div class="container my-4">
    <h2>Rezervasyonlarım</h2>
    <div class="row">
        @foreach ($reservations as $reservation)
            <!-- Restoran Kartı 1 -->
            <div class="col-md-3 mb-5 restaurantDiv" data-id="{{$reservation['restaurant']['restaurantID']}}">
                <div class="restaurant-card">
                    <img class="restaurantImage" src="{{$reservation['restaurant']['image']}}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>{{ $reservation['restaurant']['name'] }}</h5>
                        <p>Kişi Sayısı: {{ $reservation['guest_count'] }}</p>
                        <p>Rezervasyon Tarihi: {{ $reservation['reservation_time'] }}</p>
                        <p>📍 {{ $reservation['restaurant']['cities']['name'] }}
                            {{  $reservation['restaurant']['districts']['name'] }}
                        </p>
                        <button class="btn resBtn">Rezervasyon Detayları</button>

                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>