@if (session('role') == 'admin')
    <form id="discountForm" method="POST">
        @csrf
        <div class="form-group">
            <label for="restaurantName">Restaurant Name:</label>
            <input type="text" id="restaurantName" name="restaurantName" class="form-control" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary mt-2" onclick="handleAddDiscount(event)">Add Discount</button>
            <button type="submit" class="btn btn-danger mt-2" onclick="handleRemoveDiscount(event)">Remove Discount</button>
        </div>
    </form>
@endif

@if ($discountRestaurants->isNotEmpty())
    <div class="container mb-5 mt-5">
        <div class="row">
            <h1>Kampanyalı Restoranlar</h1>
            @foreach ($discountRestaurants as $discount)
                <div class="col-md-3 mb-5">
                    <div class="restaurant-card position-relative">
                        <a href="{{ route('restaurants.show', $discount->restaurant['restaurantID']) }}">
                            <img src="{{ $discount->restaurant['image'] ?? 'default-image.jpg' }}" alt="RestaurantImg"
                                class="img-fluid rounded">
                        </a>
                        <div class="restaurant-card-body">
                            <h5>{{ $discount->restaurant['name'] }}</h5>
                            <p>📍{{ $discount->restaurant['cities']['name'] ?? 'Şehir bilgisi mevcut değil.' }}
                                {{ $discount->restaurant['districts']['name'] ?? 'Bilinmiyor' }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('makeReservation', ['restaurantID' => $discount->restaurant['restaurantID']]) }}"
                                    class="btn btn-danger me-4">Hemen Rezervasyon Yap</a>
                                @if ($discount->restaurant->favorites === null)
                                    <svg style="margin-top:15px" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        class="bi bi-suit-heart-fill fav-icon" data-id="{{ $discount->restaurant->restaurantID }}"
                                        viewBox="0 0 16 16" fill="black">
                                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 
                                                             4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 
                                                             0 2.755 1.79 1 4 1" />
                                    </svg>
                                @else

                                    <svg style="margin-top:15px" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        class="bi bi-suit-heart-fill favorited fav-icon"
                                        data-id="{{ $discount->restaurant->restaurantID }}" viewBox="0 0 16 16" fill="red">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 
                                                              4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@else
    <p>Kampanyalı restoran yok</p>
@endif





<script>
    // Kampanyaya restoran ekleme fonksiyonu
    function handleAddDiscount(event) {
        event.preventDefault();

        let restaurantName = document.getElementById('restaurantName').value.trim();

        if (restaurantName === '') {
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: 'Lütfen bir restoran adı girin.'
            });
            return;
        }

        let encodedName = encodeURIComponent(restaurantName);
        let formAction = `/discount/create/${encodedName}`;

        fetch(formAction, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ restaurantName: restaurantName })
        })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'already_in_campaign') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Uyarı!',
                        text: 'Bu restoran zaten kampanyalı restoranlarda mevcut!'
                    }).then(() => {
                        window.location.reload();
                    });
                } else if (data.message === 'Kampanyalı restoranlara eklendi') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı!',
                        text: 'Restoran kampanyalı restoranlara eklendi.'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız!',
                        text: 'Restoran kampanyalı restoranlara eklenemedi.'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Hata',
                    text: 'Bir hata oluştu!'
                }).then(() => {
                    window.location.reload();
                });
            });
    }

    // Kampanyadan restoran silme fonksiyonu
    function handleRemoveDiscount(event) {
        event.preventDefault();

        let restaurantName = document.getElementById('restaurantName').value.trim();
        if (restaurantName === '') {
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: 'Lütfen bir restoran adı girin.'
            });
            return;
        }

        let encodedName = encodeURIComponent(restaurantName);
        let formAction = `/discount/delete/${encodedName}`;

        fetch(formAction, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ restaurantName: restaurantName })
        })
            .then(response => response.json())
            .then(data => {
                if (data.message == "Kampanyalı restorandan silindi") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız!',
                        text: 'Restoran kampanyalı restoranlardan silindi.'
                    }).then(() => {
                        window.location.reload();
                    });
                } else if (data.message == "Restoran bulunamadı") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız!',
                        text: 'Restoran bulunamadı.'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız!',
                        text: 'Restoran bulunamadı.'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Hata',
                    text: 'Bir hata oluştu!'
                }).then(() => {
                    window.location.reload();
                });
            });
    }

    $(document).ready(function () {
        $('.fav-icon').on('click', function () {
            const restaurantID = $(this).data('id');
            const svgElement = $(this);

            $.ajax({
                url: `/favorites/toggle/${restaurantID}`,
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        if (response.added) {
                            svgElement.attr('fill', 'red');
                            svgElement.addClass('favorited');
                            Swal.fire({ icon: 'success', title: 'Favorilere eklendi.' });
                        } else {
                            svgElement.attr('fill', 'black');
                            svgElement.removeClass('favorited');
                            Swal.fire({ icon: 'success', title: 'Favorilerden kaldırıldı.' });
                        }
                    } else {
                        Swal.fire({ icon: 'error', title: 'Hata oluştu.', text: response.message });
                    }
                },
                error: function (xhr) {
                    Swal.fire({ icon: 'error', title: 'İşlem başarısız!', text: xhr.statusText });
                }
            });
        });
    });

</script>