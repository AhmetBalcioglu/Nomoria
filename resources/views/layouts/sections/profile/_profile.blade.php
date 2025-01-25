
<div class="container mt-5" style="margin-bottom: 30rem" id="profiles">
    <div class="row">
        <div class="col-md-12">
            <h1>Profil Bilgileri</h1>
            <p class="information"><b>Ad:</b> {{ session()->get('name') }}</p>
            <p class="information"><b>Soyad:</b> {{ session()->get('surname') }}</p>
            <p class="information"><b>Cinsiyet:</b> {{ session()->get('gender') }}</p>
            <p class="information"><b>Rol:</b> {{ session()->get('role')}}</p>
            <p class="information"><b>E-posta:</b> {{ session()->get('email') }}</p>
            <button id="updateProfile" type="submit" class="btn"  >Güncelle</button>
        </div>
    </div>
</div>


{{-- Güncelle butonunun modal'ı oluşturuluyor --}}

<!-- Update Modal-->
<div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="updateRestaurantLabel">Restorant Güncelle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateRestaurantForm" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="row">
                <label for="newEmail">Yeni E-posta</label>
                <input type="email" class="form-control" id="newEmail" name="newEmail">
            </div>
                <div class="row">
                <label for="newPassword">Yeni Şifre:</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword">

                <label for="confirmPassword">Yeni Şifre tekrarı:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">

                <script>
                    document.getElementById('updateRestaurantForm').addEventListener('submit', function (event) {
                        const newPassword = document.getElementById('newPassword').value;
                        const confirmPassword = document.getElementById('confirmPassword').value;
                        
                        if (newPassword !== confirmPassword) {
                            event.preventDefault();
                            alert('Şifreler uyuşmuyor');
                        }
                    });
                </script>
            </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger w-100">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- güncelle ajax kısmı --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {
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
                            Swal.fire('Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.', 'error');
                        }
                    });
                }
            });
        });
    });

</script>