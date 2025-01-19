<div class="detail-container">
    <div class="sidebar col-md-2">
        <form action="{{ route('filter') }}" method="GET">
            <div>
                <label for="districts" class="baslik">Konum</label>
                <select id="districts" class="form-select" name="district">
                    <option value="all" {{ request()->query('district') == 'all' ? 'selected' : '' }}>Tümü</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district['districtsID'] }}" {{ request()->query('district') == $district['districtsID'] ? 'selected' : '' }}>
                            {{ $district['name'] }}
                        </option>
                    @endforeach
                </select>
                <div id="selected-district" class="mb-5"></div>
            </div>

            {{-- Mekan --}}
            <div class="mb-5">
                <h2 class="baslik">Manzara </h2>
                <select name="viewType" class="form-select">
                    <option value="all" {{ request()->query('viewType') == 'all' ? 'selected' : '' }}>Tümü</option>
                    <option value="Deniz Manzarası" {{ request()->query('viewType') == 'Deniz Manzarası' ? 'selected' : '' }}>Deniz Manzarası</option>
                    <option value="Doğanın İçinde" {{ request()->query('viewType') == 'Doğanın İçinde' ? 'selected' : '' }}>Doğanın İçinde</option>
                    <option value="Tarihi Mekan" {{ request()->query('viewType') == 'Tarihi Mekan' ? 'selected' : '' }}>
                        Tarihi Mekan</option>
                    <option value="Şehir Manzarası" {{ request()->query('viewType') == 'Şehir Manzarası' ? 'selected' : '' }}>Şehir Manzarası</option>
                </select>
            </div>

            {{-- Kategoriler --}}
            <div>
                <h2 class="baslik">Kategoriler </h2>
                <select name="category" class="form-select mb-5">
                    <option value="all" {{ request()->query('category') == 'all' ? 'selected' : '' }}>Tümü</option>
                    <option value="3" {{ request()->query('category') == '3' ? 'selected' : '' }}>İş Yemeği</option>
                    <option value="2" {{ request()->query('category') == '2' ? 'selected' : '' }}>Kutlama</option>
                    <option value="4" {{ request()->query('category') == '4' ? 'selected' : '' }}>Tek Kişilik</option>
                    <option value="1" {{ request()->query('category') == '1' ? 'selected' : '' }}>Özel Gün</option>
                </select>
            </div>

            {{-- Mutfak --}}
            <div class="mb-5">
                <h2 class="baslik">Mutfak </h2>
                <select name="couisineType" class="form-select">
                    <option value="all" {{ request()->query('couisineType') == 'all' ? 'selected' : '' }}>Tümü</option>
                    <option value="Türk Mutfağı" {{ request()->query('couisineType') == 'Türk Mutfağı' ? 'selected' : '' }}>Türk Mutfağı</option>
                    <option value="Kore Mutfağı" {{ request()->query('couisineType') == 'Kore Mutfağı' ? 'selected' : '' }}>Kore Mutfağı</option>
                    <option value="Meksika Mutfağı" {{ request()->query('couisineType') == 'Meksika Mutfağı' ? 'selected' : '' }}>Meksika Mutfağı</option>
                    <option value="Japon Mutfağı" {{ request()->query('couisineType') == 'Japon Mutfağı' ? 'selected' : '' }}>Japon Mutfağı</option>
                    <option value="İtalyan Mutfağı" {{ request()->query('couisineType') == 'İtalyan Mutfağı' ? 'selected' : '' }}>İtalyan Mutfağı</option>
                </select>
            </div>

            {{-- Menü --}}
            <div class="mb-5">
                <h2 class="baslik">Menü </h2>
                <select name="menuType" class="form-select">
                    <option value="all" {{ request()->query('menuType') == 'all' ? 'selected' : '' }}>Tümü</option>
                    <option {{ request()->query('menuType') == 'Et Yemekleri' ? 'selected' : '' }}>Et Yemekleri</option>
                    <option {{ request()->query('menuType') == 'Balık Yemekleri' ? 'selected' : '' }}>Balık Yemekleri
                    </option>
                    <option {{ request()->query('menuType') == 'Fast Food' ? 'selected' : '' }}>Fast Food</option>
                    <option {{ request()->query('menuType') == 'Vegan Yemekleri' ? 'selected' : '' }}>Vegan Yemekleri
                    </option>
                    <option {{ request()->query('menuType') == 'Alkol Servisi' ? 'selected' : '' }}>Alkol Servisi</option>
                </select>
            </div>

            <button id="filterButton" type="submit" class="btn">Filtrele</button>
        </form>
    </div>


    <div class="container my-4">
        <div class="row" id="restaurant-cards">
            @if (count($restaurants) == 0) {{-- Eğer hiçbir restoran bulunamazsa ekrana 'Sonuç Bulunamadı' yazsın --}}
                <div class="col-12 text-center">
                    <p class="mt-5">Sonuç bulunamadı.</p>
                </div>
            @else
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
            @endif

        </div>
    </div>
</div>