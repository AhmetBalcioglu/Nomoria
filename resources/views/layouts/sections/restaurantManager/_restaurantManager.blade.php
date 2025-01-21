<style>
    /* Sayfanın tamamında yatay kaydırmayı gizler */
    body {
        overflow-x: hidden;
    }

    /* Row yapısındaki taşmayı engeller */
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        /* Kolonlar arasındaki boşluğu ayarlar */
    }

    /* Kolonların ekran boyutuna uygun şekilde sıralanmasını sağlar */
    .col {
        flex: 1 1 calc(25% - 16px);
        /* 4 kolon yerleştirmek için */
        box-sizing: border-box;
        /* İçeriklerin kolon sınırına sığmasını sağlar */
    }

    /* Restaurant kartlarının boyutlarını aynı yapar */
    .restaurant-card {
        max-width: 100%;
        /* Kartın genişliği ekranı aşmaz */
        height: 350px;
        /* Kartların sabit yüksekliği */
        box-sizing: border-box;
        /* Kartların içeriği düzgün şekilde sığar */
        position: relative;
        display: flex;
        flex-direction: column;
        /* Kartın içeriği dikey hizalanacak */
    }

    /* Görsellerin taşmasını engeller ve uyumlu hale getirir */
    .restaurant-card img {
        width: 100%;
        height: 200px;
        /* Görselin yüksekliği sabitlenir */
        object-fit: cover;
        /* Görselin boyutları kartla uyumlu hale gelir */
        border-radius: 8px;
        /* Köşeleri yuvarlar */
    }

    /* Restoran adı ve açıklamanın düzgün görünmesini sağlar */
    .restaurant-card-body {
        flex-grow: 1;
        /* İçeriğin kart içinde genişlemesini sağlar */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* İçeriği yukarı ve aşağıya yerleştirir */
    }

    /* Kolonlar arasında boşluk bırakır */
    .g-4 {
        gap: 1rem;
    }

    /* Görsel ve buton arası boşluk */
    .restaurant-card-body h5 {
        margin: 0;
    }

    .restaurant-card-body p {
        margin: 0;
        font-size: 14px;
    }

    .restaurant-card-body .btn {
        margin-top: auto;
        /* Butonu alt kısma yerleştirir */
    }

    .container {
        margin-top: 50px
    }
</style>

<div class="container">
    <h1 class="mb-3">Restoranlarım</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($restaurants as $restaurant)
            <div class="col">
                <div class="restaurant-card position-relative">
                    <a href="{{ route('restaurants.show', $restaurant['restaurantID']) }}">
                        <img src="{{ $restaurant['image'] }}" alt="RestaurantImg" class="img-fluid rounded">
                    </a>
                    <div class="restaurant-card-body">
                        <h5>{{ $restaurant['name'] }}</h5>
                        <p>📍{{ $restaurant['cities']['name'] }} {{ $restaurant['districts']['name'] }}</p>
                        <button class="btn btn-success updateRestaurantBtn" data-bs-toggle="modal"
                            data-bs-target="#updateRestaurant" data-restaurantid="{{ $restaurant['restaurantID'] }}"
                            data-restaurantname="{{ $restaurant['name'] }}"
                            data-restaurantdescription="{{ $restaurant['description'] }}"
                            data-restaurantaddress="{{ $restaurant['address'] }}"
                            data-restaurantphone="{{ $restaurant['phone'] }}"
                            data-restaurantemail="{{ $restaurant['email'] }}"
                            data-restaurantcapacity="{{ $restaurant['capacity'] }}">Restoran Güncelle</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Güncelleme Modal'ı -->
<div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="updateRestaurantLabel">Restoran Güncelle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateRestaurantForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="restaurantID" name="restaurantID">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="newName" class="form-label"><b>*</b>Yeni Restoran Adı</label>
                            <input type="text" class="form-control" id="newName" name="newName"
                                placeholder="Yeni Restoran Adı" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label"><b>*</b>Yeni Açıklama</label>
                            <textarea class="form-control" id="description" name="description"
                                placeholder="Açıklama"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="address" class="form-label"><b>*</b>Yeni Adres</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Adres"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label"><b>*</b>Yeni Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label"><b>*</b>Yeni E-posta</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-posta">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="capacity" class="form-label"><b>*</b>Yeni Kapasite</label>
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                placeholder="Kapasite">
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label"><b>*</b>Yeni Resim</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                </div>
                <p class="form-text" style="margin-left: 1rem">* ile işaretli alanlar zorunludur</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Güncelle butonuna tıklandığında modal'a verileri doldur
        $('.updateRestaurantBtn').on('click', function () {
            $('#restaurantID').val($(this).data('restaurantid'));
            $('#newName').val($(this).data('restaurantname'));
            $('#description').val($(this).data('restaurantdescription'));
            $('#address').val($(this).data('restaurantaddress'));
            $('#phone').val($(this).data('restaurantphone'));
            $('#email').val($(this).data('restaurantemail'));
            $('#capacity').val($(this).data('restaurantcapacity'));
        });

        // Formu gönderme işlemi
        $('#updateRestaurantForm').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let restaurantID = $('#restaurantID').val();

            $.ajax({
                url: '/RestaurantManager/update/' + restaurantID,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire('Başarılı', 'Restoran başarıyla güncellendi.', 'success').then(() => {
                        $('#updateRestaurant').modal('hide');
                        location.reload();
                    });
                },
                error: function () {
                    Swal.fire('Hata', 'Güncelleme sırasında hata oluştu.', 'error');
                }
            });
        });
    });
</script>