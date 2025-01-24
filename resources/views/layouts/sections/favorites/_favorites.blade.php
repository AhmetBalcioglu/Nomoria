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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red"
                                    data-id="{{ $favorite->restaurant->restaurantID }}"
                                    class="bi bi-heart fav-icon position-absolute top-0 end-0 m-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                </svg>
                                <div class="restaurant-card-body">
                                    <h5>{{ $favorite->restaurant->name }}</h5>
                                    <p>📍 {{ $favorite->restaurant->districts->name ?? 'Bilinmiyor' }},
                                        {{ $favorite->restaurant->districts->city->name ?? 'Şehir bilgisi mevcut değil.' }}
                                    </p>
                                    <a href="{{route('makeReservation', $favorite->restaurant->restaurantID)}}" class="btn btn-danger">Hemen Rezervasyon Yap</a>
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
                            <div class="category_url" data-url="{{ $favorite->category->categoryName }}">
                                <div class="card card-body text-center position-relative" style="transition: all 0.3s ease-in-out;">
                                    <p><b>{{ $favorite->category->categoryName }}</b></p>
                                    <img src="{{ asset($favorite->category->image) }}" width="50%" height="50%"
                                        class="d-block w-100 my-4" alt="" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        class="bi bi-suit-heart-fill position-absolute top-0 end-0 m-2 favHearth-icon"
                                        data-id="{{ $favorite->category->categoryID }}" viewBox="0 0 16 16" style="fill: red;">
                                        <path
                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                    @endif
                @empty
                    <p>Favorilere eklediğiniz bir kategori bulunmamaktadır.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>