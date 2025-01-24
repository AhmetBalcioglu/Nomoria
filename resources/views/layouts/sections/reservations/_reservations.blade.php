<div class="container my-4">
    <h2 class="mb-5 mt-3"><b>Rezervasyonlarım</b></h2>
    <div class="row">
        @foreach ($futureReservations as $reservation)
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
                        <button class="btn resBtn">Rezervasyonu  Güncelle</button>
                        <button class="btn btn-danger">İptal Et</button>

                    </div>  
                </div>
            </div>
        @endforeach


    </div>
</div>