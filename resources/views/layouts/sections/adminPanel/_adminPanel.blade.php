<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ session()->get('name') }} {{ session()->get('surname') }}</h1>
            <h2 class="mb-3">Rolü: {{ session()->get('role') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRestaurant">Restorant
                Ekle</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeRestaurant">Restorant
                Sil</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateRestaurant">Restorant
                Güncelle</button>
        </div>
    </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addRestaurant" tabindex="-1" aria-labelledby="addRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="addRestaurantLabel">Restorant Ekle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data"
                class="form-horizontal bg-light p-5 rounded-lg shadow-lg custom-form">
                @csrf

                <div class="row mb-3">
                    <h1 class="text-dark align-content-center">Restoran Ekle</h1>
                    <label for="name" class="col-sm-3 col-form-label text-dark">Restoran Adı</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control custom-input" id="name" name="name"
                            placeholder="Restoran adını giriniz" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-dark">Adres</label>
                    <div class="col-sm-9">
                        <textarea class="form-control custom-textarea" id="address" name="address" rows="3"
                            placeholder="Adres giriniz" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label text-dark">Telefon</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control custom-input" id="phone" name="phone"
                            placeholder="Telefon numarasını giriniz" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-sm-3 col-form-label text-dark">Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-select custom-select" id="category" name="category" required>
                            <option value="" disabled selected>Kategori Seçiniz</option>
                            <option value="japon-mutfagi">Japon Mutfağı</option>
                            <option value="kore-mutfagi">Kore Mutfağı</option>
                            <option value="türk-mutfagi">Türk Mutfağı</option>
                            <option value="italya-mutfagi">Italya Mutfağı</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-dark">Restoran Detayları</label>
                    <div class="col-sm-9">
                        <div id="details-container">
                            <div class="d-flex align-items-center mb-3">
                                <select class="form-select custom-select me-2" name="details[]">
                                    <option value="sertifika">Sertifika Ekle</option>
                                    <option value="menu">Menü Ekle</option>
                                    <option value="diger">Diğer</option>
                                </select>
                                <input type="file" class="form-control custom-input" name="files[]"
                                    accept=".jpg,.png,.pdf">
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm" id="add-detail">
                            + Detay Ekle
                        </button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-warning btn-lg w-100">Ekle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="removeRestaurant" tabindex="-1" aria-labelledby="removeRestaurantLabel" aria-hidden="true">
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
                        <label class="form-label">Lütfen silmek istediğiniz restorantın adını giriniz.</label>
                        <input class="form-control" type="text" name="name" id="restaurantName" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="updateRestaurantLabel">Restorant Güncelle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data"
                class="form-horizontal bg-light p-5 rounded-lg shadow-lg custom-form" id="updateRestaurantForm">

                @csrf
                @method('PUT')

                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-4">
                        <label for="name" class="col-form-label me-2">Restorant Adı</label>

                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Restoran adını giriniz" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="newName" class="col-sm-3 col-form-label text-dark">Yeni Restoran Adı</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control custom-input" id="newName" name="newName"
                            placeholder="Restoran adını giriniz" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-3 col-form-label text-dark">Açıklama</label>
                    <div class="col-sm-9">
                        <textarea class="form-control custom-textarea" id="description" name="description" rows="3"
                            placeholder="Açıklama giriniz" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-dark">Adres</label>
                    <div class="col-sm-9">
                        <textarea class="form-control custom-textarea" id="address" name="address" rows="3"
                            placeholder="Adres giriniz" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label text-dark">Telefon</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control custom-input" id="phone" name="phone"
                            placeholder="Telefon numarasını giriniz" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-dark">Restoran Detayları</label>
                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-warning btn-lg w-100">Güncelle</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Add Restaurant -->
<script>
    const addRestaurant = document.getElementById('addRestaurant');
    addRestaurant.addEventListener('show.bs.modal', function (event) {
        const modal = document.getElementById('addRestaurant');
        const form = modal.querySelector('form');

        // Yeni restoran ekleme için form action ayarlanıyor
        form.action = `/restaurants/create`;

        // Form alanlarını temizle
        form.querySelector('input[name="restaurantID"]').value = '';
        form.querySelector('input[name="name"]').value = '';
        form.querySelector('input[name="address"]').value = '';
        form.querySelector('textarea[name="description"]').value = '';
        form.querySelector('input[name="capacity"]').value = '';
        form.querySelector('input[name="email"]').value = '';
    });
</script>

<!-- Delete Restaurant -->
<script>
    const deleteRestaurantForm = document.getElementById('deleteRestaurantForm');

    deleteRestaurantForm.addEventListener('submit', function (event) {
        event.preventDefault();  // Formun varsayılan submit işlemini engelle

        const restaurantName = document.getElementById('restaurantName').value.toLowerCase(); // Input'tan değeri al ve küçük harfe çevir
        const restaurantNewName = document.getElementById('')

        // Silme işlemi için onay isteği
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlem geri alınamaz ve restoran silinecektir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX isteği ile veritabanından silme işlemi
                console.log('Sending request with name:', restaurantName);  // Hangi isimle istek gönderildiğini kontrol et
                $.ajax({
                    url: 'restaurants/delete/' + restaurantName,  // API route'u
                    method: 'Post',  // HTTP metodu
                    data: {
                        _token: '{{ csrf_token() }}',  // CSRF token
                        name: restaurantName  // Restoran adı
                    },
                    success: function (response) {
                        console.log('Response:', response);  // Backend'den gelen yanıtı kontrol et
                        if (response.success) {
                            Swal.fire({
                                title: 'Başarılı',
                                text: 'Restoran başarıyla silindi.',
                                icon: 'success'
                            }).then(() => {
                                location.reload();  // Sayfayı yenile
                            });
                        } else {
                            Swal.fire({
                                title: 'Başarısız',
                                text: 'Restoran silinirken bir hata oluştu.',
                                icon: 'error'
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('AJAX Error:', error);  // AJAX hatasını kontrol et
                        Swal.fire({
                            title: 'Başarısız',
                            text: 'Bir hata oluştu. Lütfen tekrar deneyin.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
</script>




<script>
    const updateRestaurantForm = document.getElementById('updateRestaurantForm');

    updateRestaurantForm.addEventListener('submit', function (event) {
        event.preventDefault();  // Formun varsayılan submit işlemini engelle

        const restaurantName = document.getElementById('name').value.trim(); // Eski restoran adı
        const restaurantNewName = document.getElementById('newName').value.trim();  // Yeni restoran adı
        const restaurantDescription = document.getElementById('description').value.trim();
        const restaurantAddress = document.getElementById('address').value.trim();
        const restaurantPhone = document.getElementById('phone').value.trim();
        const restaurantEmail = document.getElementById('email').value.trim();
        const restaurantCapacity = document.getElementById('capacity').value.trim();

        // Kullanıcı onayı
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlem geri alınamaz ve restoran bilgileri güncellenmiş olacaktır!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Güncelle!',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX isteği ile veritabanına güncelleme işlemi gönder
                $.ajax({
                    url: '/restaurants/update/' + encodeURIComponent(restaurantName),  // API route'u
                    method: 'POST',  // PUT yerine POST, çünkü form token ekliyor
                    data: {
                        _token: '{{ csrf_token() }}',  // CSRF token
                        newName: restaurantNewName,  // Yeni restoran adı
                        description: restaurantDescription,
                        address: restaurantAddress,
                        phone: restaurantPhone,
                        email: restaurantEmail,
                        capacity: restaurantCapacity
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Başarılı',
                                text: 'Restoran başarıyla güncellendi.',
                                icon: 'success'
                            }).then(() => {
                                location.reload();  // Sayfayı yenile
                            });
                        } else {
                            Swal.fire({
                                title: 'Başarısız',
                                text: response.message || 'Restoran güncellenirken bir hata oluştu.',
                                icon: 'error'
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: 'Başarısız',
                            text: xhr.responseJSON?.message || 'Bir hata oluştu. Lütfen tekrar deneyin.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
</script>