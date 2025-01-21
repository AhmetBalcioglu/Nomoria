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

    <div class="detail-container container">
        <div class="container my-4 d-flex justify-content-center">
            <div class="row" id="restaurant-cards">
                @if (count($restaurants) == 0)
                    <div class="col-12 text-center">
                        <p class="mt-5">Sonuç bulunamadı.</p>
                    </div>
                @else
                    @foreach ($restaurants as $restaurant)
                        <div class="col-md-3 mb-5">
                            <div class="restaurant-card position-relative">
                                <a href="{{ route('restaurants.show', $restaurant['restaurantID']) }}">
                                    <img src="{{ $restaurant['image'] }}" alt="RestaurantImg" class="img-fluid rounded">
                                </a>
                                <div class="restaurant-card-body">
                                    <h5>{{ $restaurant['name'] }}</h5>
                                    <p>📍{{ $restaurant['cities']['name'] }} {{ $restaurant['districts']['name'] }}</p>
                                    <a href="{{ route('makeReservation', ['restaurantID' => $restaurant['restaurantID']]) }}"
                                        class="btn btn-danger">Hemen Rezervasyon Yap</a>
                                </div>

                                @if ($restaurant['favorites'] == null)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                        data-id="{{ $restaurant['restaurantID'] }}"
                                        class="bi bi-heart fav-icon position-absolute top-0 end-0 m-2" viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red"
                                        data-id="{{ $restaurant['restaurantID'] }}"
                                        class="bi bi-heart fav-icon position-absolute top-0 end-0 m-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                    </svg>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

</div>