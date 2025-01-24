<div class="container my-4">
    <h2 class="mb-5 mt-3" ><b>Geçmiş Rezervasyonlarım</b></h2> 
    <div class="row" style="margin-bottom: 46rem;">
        @if (count($pastReservations) > 0)
            @foreach ($pastReservations as $reservation)
                @if ($reservation['reservation_time'] < Illuminate\Support\Carbon::now()->format('Y-m-d'))
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
                                <button class="btn resBtn">Restoran Özellikleri</button>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p class="mt-5"><b>Geçmiş rezervasyon bulunamadı.</b></p>

        @endif



    </div>
</div>