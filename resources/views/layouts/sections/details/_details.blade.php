<div class="detail-container">
    <div class="sidebar col-md-2">
        <form action="{{ route('filter') }}" method="GET">
            <div>
                <label for="districts" class="baslik">Konum</label>
                <select id="districts" class="form-select" name="district">
                    <option value="all" selected>Tümü</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district['districtsID'] }}">{{ $district['name'] }}</option>
                    @endforeach
                </select>
                <div id="selected-district" class="mb-5"></div>
            </div>

            {{-- Mekan --}}
            <div class="mb-5">
                <h2 class="baslik">Manzara </h2>
                <select name="viewType" class="form-select">
                    <option value="all">Tümü</option>
                    <option value="Deniz Manzarası">Deniz Manzarası</option>
                    <option value="Doğanın İçinde">Doğanın İçinde</option>
                    <option value="Tarihi Mekan">Tarihi Mekan</option>
                    <option value="Şehir Manzarası">Şehir Manzarası</option>
                </select>
            </div>

            {{-- Konsept --}}
            <div>
                <h2 class="baslik">Konsept </h2>
                <select name="concept" class="form-select mb-5">
                    <option value="all">Tümü</option>
                    <option value="İş Yemeği">İş Yemeği</option>
                    <option value="Kutlama">Kutlama</option>
                    <option value="Tek Kişilik">Tek Kişilik</option>
                    <option value="Özel Gün">Özel Gün</option>
                </select>
            </div>

            {{-- Mutfak --}}
            <div class="mb-5">
                <h2 class="baslik">Mutfak </h2>
                <select name="couisineType" class="form-select">
                    <option value="all">Tümü</option>
                    <option value="Türk Mutfağı">Türk Mutfağı</option>
                    <option value="Kore Mutfağı">Kore Mutfağı</option>
                    <option value="Meksika Mutfağı">Meksika Mutfağı</option>
                    <option value="Japon Mutfağı">Japon Mutfağı</option>
                    <option value="İtalyan Mutfağı">İtalyan Mutfağı</option>
                </select>
            </div>

            {{-- Menü --}}
            <div class="mb-5">
                <h2 class="baslik">Menü </h2>
                <select name="menuType" class="form-select">
                    <option value="all">Tümü</option>
                    <option>Et Yemekleri</option>
                    <option>Balık Yemekleri</option>
                    <option>Fast Food</option>
                    <option>Vegan Yemekleri</option>
                    <option>Alkol Servisi</option>
                </select>
            </div>

            <button id="filterButton" type="submit" class="btn">Filtrele</button>
        </form>
    </div>


    <div class="container my-4">
        <div class="row" id="restaurant-cards">
            @foreach ($restaurants as $restaurant)
                <div class="col-md-3 mb-5">
                    <div class="restaurant-card">
                        <a href="{{ route('restaurants.show', $restaurant['restaurantID']) }}">
                            <img src="{{ $restaurant['image'] }}" alt="RestaurantImg">
                        </a>

                        <div class="restaurant-card-body">
                            <h5>{{ $restaurant['name'] }}</h5>
                            <p>İki kişilik menüde %20 indirim!</p>
                            <p>📍{{ $restaurant['cities']['name'] }} {{ $restaurant['districts']['name'] }}</p>
                            <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                            @if ($restaurant['favorites'] == null)
                                <!-- Favori Olmayan (Boş Kalp) SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    data-id="{{ $restaurant['restaurantID'] }}" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                                </svg>
                            @else
                                <!-- Favori Olan (Dolu Kalp) SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    data-id="{{ $restaurant['restaurantID'] }}" class="bi bi-heart text-danger"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                                </svg>
                            @endif


                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>