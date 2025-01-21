<h2>Geçmiş rezervasyonlarım</h2>
<div class="container my-4">
    <div class="row">

        @foreach ($reservations as $reservation)
            <!-- Restoran Kartı 1 -->
            <div class="col-md-3 mb-5 restaurantDiv" data-id="{{$reservation['restaurant']['restaurantID']}}">
                <div class="restaurant-card">
                    <img class="restaurantImage" src="{{$reservation['restaurant']['image']}}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>{{ $reservation['restaurant']['name'] }}</h5>
                        <p>İki kişilik menüde %20 indirim!</p>
                        <p>📍 {{ $reservation['restaurant']['cities']['name'] }}
                            {{  $reservation['restaurant']['districts']['name'] }}
                        </p>
                        <button class="btn resBtn">Rezervasyon Tarihi: 2025/12/01</button>
                        <div id="date1" style="display:none;">
                            <input type="date" class="form-control mt-2">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>