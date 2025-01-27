


<div class="controlPanel-body">
    <div class="container">
        @foreach($restaurants as $restaurant)
            <div class="restaurant-card">
                <!-- Sol taraf: Restoran bilgisi -->
                <div class="restaurant-info">
                    <img src="{{ $restaurant->image }}" alt="Restoran Görseli">
                    <div class="restaurant-details">
                        <h2>{{ $restaurant->name }}</h2>
                        <p>{{ $restaurant->address }}</p>
                        <div class="restaurant-buttons">
                            <button class="update-btn" data-restaurant-name="{{ $restaurant->name }}"
                                data-description="{{ $restaurant->description }}"
                                data-address="{{ $restaurant->address }}" data-phone="{{ $restaurant->phone }}"
                                data-email="{{ $restaurant->email }}" data-capacity="{{ $restaurant->capacity }}"
                                >Restoranı
                                Güncelle</button>
                                <button class="comments-btn" data-restaurant-name="{{ $restaurant->name }}">Restoran Yorumları</button>
                            <button class="delete-btn" data-restaurant-name="{{ $restaurant->name }}">Restoranı Sil</button>

                        </div>
                    </div>
                </div>

                <!-- Sağ taraf: Analiz paneli -->
                <div class="analysis-panel">
                    <div class="chart-placeholder">
                        <canvas id="chart-{{ $restaurant->restaurantID }}" width="150" height="100"></canvas>
                    </div>

                    <button
                        onclick="window.location.href='{{ route('analytics', ['restaurantID' => $restaurant->restaurantID]) }}'">
                        Analiz Görüntüle
                    </button>





                </div>
            </div>
        @endforeach

        <!-- Delete Modal -->
        <div class="modal fade" id="removeRestaurant" tabindex="-1" aria-labelledby="removeRestaurantLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="removeRestaurantLabel">Restorant Sil</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data" id="deleteRestaurantForm"
                        class="form-horizontal bg-light p-5 rounded-lg shadow-lg custom-form">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="restaurantName" class="form-label">Lütfen silmek istediğiniz restorantın
                                    adını
                                    giriniz.</label>
                                <input class="form-control" type="text" name="name" id="restaurantName" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger mt-2">Sil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Modal-->
        <div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="updateRestaurantLabel">Restoran Güncelle</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateRestaurantForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mt-3 mt-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Mevcut Restoran Adı</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Mevcut Restoran Adı" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="newName" class="form-label">Yeni Restoran Adı</label>
                                    <input type="text" class="form-control" id="newName" name="newName"
                                        placeholder="Yeni Restoran Adı" required>
                                </div>
                            </div>
                            <div class="row mt-3 mt-3">
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Yeni Açıklama</label>
                                    <textarea class="form-control" id="description" name="description"
                                        placeholder="Açıklama"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3 mt-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Yeni Adres</label>
                                    <textarea class="form-control" id="address" name="address"
                                        placeholder="Adres"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3 mt-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Yeni Telefon</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Telefon">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Yeni E-posta</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="E-posta">
                                </div>
                            </div>
                            <div class="row mt-3 mt-3">
                                <div class="col-md-6">
                                    <label for="capacity" class="form-label">Yeni Kapasite</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity"
                                        placeholder="Kapasite">
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Yeni Resim</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="updateRestaurantButton" class="btn  w-100">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @foreach($restaurants as $restaurant)
                const ctx{{ $restaurant->restaurantID }} = document.getElementById('chart-{{ $restaurant->restaurantID }}').getContext('2d');
                new Chart(ctx{{ $restaurant->restaurantID }}, {
                    type: 'bar',
                    data: {
                        labels: ['Toplam', 'Günlük', 'Haftalık', 'Aylık'],
                        datasets: [{
                            data: [
                                {{ $restaurant->total_views ?? 0 }},
                                {{ $restaurant->daily_unique_users ?? 0 }},
                                {{ $restaurant->weekly_unique_users ?? 0 }},
                                {{ $restaurant->monthly_unique_users ?? 0 }}
                            ],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 205, 86, 0.6)',
                                'rgba(255, 99, 132, 0.6)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            @endforeach

            // Delete Restaurant AJAX
            const deleteRestaurantForm = document.getElementById('deleteRestaurantForm');

            deleteRestaurantForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const restaurantName = document.getElementById('restaurantName').value.trim();

                if (!restaurantName) {
                    Swal.fire('Hata', 'Lütfen silmek istediğiniz restoranın adını giriniz.', 'error');
                    return;
                }

                Swal.fire({
                    title: 'Emin misiniz?',
                    text: restaurantName + " restoranını silmek üzeresiniz!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Sil!',
                    cancelButtonText: 'Vazgeç'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX isteği
                        $.ajax({
                            url: '/restaurants/delete/' + restaurantName, // URL'deki restoran adı encode edilerek gönderiliyor
                            method: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ı alıyoruz
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Başarılı',
                                        text: response.message,
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload(); // Sayfayı yeniden yükleyerek güncellenmiş listeyi gösterir
                                    });
                                } else {
                                    Swal.fire('Hata', response.message || 'Bir hata oluştu.', 'error');
                                }
                            },
                            error: function (xhr) {
                                Swal.fire('Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.', 'error');
                            }
                        });
                    }
                });
            });


            // Update Restaurant AJAX
            const updateRestaurantForm = document.getElementById('updateRestaurantForm');

            updateRestaurantForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const formData = new FormData(updateRestaurantForm);
                const restaurantName = formData.get('name');

                Swal.fire({ // İşlemi yaparken uyarılıyoruz
                    title: 'Emin misiniz?',
                    text: "Restoran bilgileri güncellenecek!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Güncelle!',
                    cancelButtonText: 'Vazgeç'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX isteği
                        $.ajax({
                            url: '/restaurants/update/' + encodeURIComponent(restaurantName),
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) { //Backend işlemi başarılı ise sweetalert ile bilgilendiriliyoruz.
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Başarılı',
                                        text: 'Restoran güncellendi.',
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Hata', response.message || 'Bir hata oluştu.', 'error');
                                }
                            },
                            error: function (xhr) {
                                const response = JSON.parse(xhr.responseText);
                                Swal.fire('Hata', response.message || 'Bir hata oluştu.', 'error');
                            }
                        });
                    }
                });
            });

            $('.update-btn').click(function () {

                $('#name').val($(this).data('restaurant-name'));
                $('#newName').val($(this).data('restaurant-name'));
                $('#description').val($(this).data('description'));
                $('#address').val($(this).data('address'));
                $('#phone').val($(this).data('phone'));
                $('#email').val($(this).data('email'));
                $('#capacity').val($(this).data('capacity'));

                $('#updateRestaurant').modal('show');
            });

            $('.delete-btn').click(function () {
                $('#restaurantName').val($(this).data('restaurant-name'));

                $('#removeRestaurant').modal('show');
            });

        });
    </script>
</div>

