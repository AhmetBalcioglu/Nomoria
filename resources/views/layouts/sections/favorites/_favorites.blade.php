<div class="container">
    <div class="row">
        <h1 class="mt-5 mb-5">Favorilenmiş Restoranlar ve Kategoriler</h1>

        <!-- Favori Restoranlar -->
        <div class="col-12">
            <div class="row">
                <h3>Favori Restoranlar</h3>
                @forelse ($favoritedRestaurants as $favorite)
                    @if ($favorite->restaurant)
                        <div class="col-md-3 mb-5">
                            <div class="restaurant-card position-relative">
                                <a href="{{ route('restaurants.show', $favorite->restaurant->restaurantID) }}">
                                    <img src="{{ asset($favorite->restaurant->image) }}" alt="Restaurant Image"
                                        class="img-fluid rounded">
                                </a>
                                <!-- Favori ikonu sağ üst köşeye sabitlendi ve hep görünür yapıldı -->
                                @if (!$favorite->restaurant->favorites)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                        data-id="{{ $favorite->restaurant->restaurantID }}"
                                        class="bi bi-heart fav-icon position-absolute top-0 end-0 m-2" viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red"
                                        data-id="{{ $favorite->restaurant->restaurantID }}"
                                        class="bi bi-heart fav-icon position-absolute top-0 end-0 m-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                    </svg>
                                @endif

                                <div class="restaurant-card-body">
                                    <h5>{{ $favorite->restaurant->name }}</h5>
                                    <p>📍
                                        @if ($favorite->restaurant->districts)
                                            {{ $favorite->restaurant->districts->name }},
                                            @if ($favorite->restaurant->districts->city)
                                                {{ $favorite->restaurant->districts->city->name }}
                                            @else
                                                Şehir bilgisi mevcut değil.
                                            @endif
                                        @else
                                            İlçe bilgisi mevcut değil.
                                        @endif
                                    </p>
                                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <p>Favorilere eklediğiniz bir restoran bulunmamaktadır.</p>
                @endforelse

            </div>
        </div>

        <!-- Favori Kategoriler -->
        <div class="col-12 mt-5">
            <div class="row">
                <h3>Favori Kategoriler</h3>
                @forelse ($favoritedCategories as $favorite)
                    @if ($favorite->category)
                        <div class="col-md-2 col-sm-3 col-6 mb-3">
                            <div class="card card-body text-center position-relative">
                                <p><b>{{ $favorite->category->categoryName }}</b></p>
                                <img src="{{ asset($favorite->category->image) }}" class="d-block w-100 my-4"
                                    alt="Category Image" style="object-fit: cover; height: 150px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    data-id="{{ $favorite->category->categoryID }}"
                                    class="bi bi-heart fav-icon position-absolute top-0 end-0 m-2" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                </svg>

                            </div>
                        </div>
                    @else
                        <p>Favorilere eklediğiniz bir kategori bulunmamaktadır.</p>
                    @endif
                @empty
                    <p>Favorilere eklediğiniz bir kategori bulunmamaktadır.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>