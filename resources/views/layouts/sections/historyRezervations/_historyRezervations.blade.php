<div class="container my-4">

    {{-- Geçmiş Rezervasyonlar --}}
    <h2 class="mb-1 mt-3"><b>Geçmiş Rezervasyonlarım</b></h2>
    <div class="row">
        @if (count($pastReservations) > 0)
            @foreach ($pastReservations as $reservation)
                @if ($reservation['reservation_time'] < Illuminate\Support\Carbon::now()->format('Y-m-d'))
                    <!-- Restaurant Card -->
                    <div class="col-md-3 mb-5 restaurantDiv">
                        <div class="restaurant-card">
                            <img class="restaurantImage" src="{{$reservation['restaurant']['image']}}" alt="Restoran"
                                data-id="{{$reservation['restaurant']['restaurantID']}}">
                            <div class="restaurant-card-body">
                                <h5>{{ $reservation['restaurant']['name'] }}</h5>
                                <p>Kişi Sayısı: {{ $reservation['guest_count'] }}</p>
                                <p>Rezervasyon Tarihi: {{ $reservation['reservation_time'] }}</p>
                                <p>📍 {{ $reservation['restaurant']['cities']['name'] }}
                                    {{  $reservation['restaurant']['districts']['name'] }}
                                </p>
                                

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p class="mt-5"><b>Geçmiş rezervasyon bulunamadı.</b></p>

        @endif



    </div>

    {{-- İptal edilen rezervasyonlar --}}
    <h2 class="mb-1 mt-5"><b>İptal Edilen Rezervasyonlarım</b></h2>
    <div class="row" style="margin-bottom: 30rem;">
        @if (count($cancelledReservations) > 0)
            @foreach ($cancelledReservations as $reservation)
                <!-- Restaurant Card -->
                <div class="col-md-3 mb-5 restaurantDiv">
                    <div class="restaurant-card">
                        <img class="restaurantImage" src="{{$reservation['restaurant']['image']}}" alt="Restoran"
                            data-id="{{$reservation['restaurant']['restaurantID']}}">
                        <div class="restaurant-card-body">
                            <h5>{{ $reservation['restaurant']['name'] }}</h5>
                            <p>Kişi Sayısı: {{ $reservation['guest_count'] }}</p>
                            <p>Rezervasyon Tarihi: {{ $reservation['reservation_time'] }}</p>
                            <p>📍 {{ $reservation['restaurant']['cities']['name'] }}
                                {{  $reservation['restaurant']['districts']['name'] }}
                            </p>
                            <button class="btn resBtn" data-id="{{$reservation['restaurant']['restaurantID']}}">Restoran
                                Özellikleri</button>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="mt-5"><b>İptal edilen rezervasyon bulunamadı.</b></p>

        @endif
    </div>

</div>