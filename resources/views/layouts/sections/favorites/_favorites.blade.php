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
                            <div class="restaurant-card">
                                <a href="{{ route('restaurants.show', $favorite->restaurant->restaurantID) }}">
                                    <img src="{{ asset($favorite->restaurant->image) }}" alt="Restaurant Image"
                                        class="img-fluid">
                                </a>
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
                                    <!-- Favori Olmayan (Boş Kalp) SVG -->
                                    @if (!$favorite->restaurant->favorites)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            data-id="{{ $favorite->restaurant->restaurantID }}" class="bi bi-heart"
                                            viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                                            <path
                                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            data-id="{{ $favorite->restaurant->restaurantID }}" class="bi bi-heart text-danger"
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
                        <div class="col-md-2 col-sm-2 col-md-2 p-2 mx-3 card card-body position-relative">
                            <p class="text-center"><b>{{ $favorite->category->categoryName }}</b></p>
                            <img src="{{ asset($favorite->category->image) }}" class="d-block w-100 my-4" alt="Category Image"
                                style="width: 100%; height: 150px; object-fit: cover;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" stroke="black"
                                class="bi bi-suit-heart-fill position-absolute top-0 end-0 m-2 hearth-icon"
                                data-id="{{ $favorite->category->categoryID }}" viewBox="0 0 16 16">
                                <path
                                    d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
                            </svg>
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





<script>
    $(document).ready(function () {
        // Tüm kalp simgelerini seç
        $('.bi-heart').each(function () {
            $(this).on('click', function () {
                const restaurantID = $(this).data('id'); // Tıklanan SVG'nin data-id değerini al
                const svgElement = $(this); // Tıklanan SVG elementini seç

                // AJAX isteği
                $.ajax({
                    url: `/favorites/toggle/${restaurantID}`,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            if (response.added) {
                                // Favoriye eklenmişse sınıf ekle
                                svgElement.addClass('text-danger');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Favorilerinize eklendi.',
                                }).then(function () {
                                    location.reload();
                                });
                            } else {
                                // Favoriden çıkarılmışsa sınıfı kaldır
                                svgElement.removeClass('text-danger');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Favorilerinizden kaldırıldı.',
                                }).then(function () {
                                    location.reload();
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Bir hata oluştu.',
                                text: response.message,
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'AJAX isteği başarısız.',
                            text: xhr.statusText,
                        });
                    }
                });
            });
        });
    });

    $(document).ready(function () {
        $('.hearth-icon').click(function () {
            var categoryID = $(this).data('id');
            console.log(categoryID);


            $.ajax({
                url: 'favorites/toggle/' + categoryID, // URL'yi API endpoint'inizle eşleştirin
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token
                },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        console.log(response.message);
                        // Burada favori simgesini güncelleyebilirsiniz
                        if (response.added) {
                            $(this).addClass('text-danger'); // Kalp simgesini kırmızıya dönüştürme
                        } else {
                            $(this).removeClass('text-danger'); // Kalp simgesini gri yapma
                        }
                    }
                },
                error: function () {
                    console.log('Bir hata oluştu.');
                }
            });
        });
    });
</script>