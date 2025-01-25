<div class="container mt-5" style="margin-bottom: 30rem" id="profiles">
    <div class="row">
        <div class="col-md-12">
            <h1>Profil Bilgileri</h1>
            <p class="information"><b>Ad:</b> {{ session()->get('name') }}</p>
            <p class="information"><b>Soyad:</b> {{ session()->get('surname') }}</p>
            <p class="information"><b>Cinsiyet:</b> {{ session()->get('gender') }}</p>
            <p class="information"><b>Rol:</b> {{ session()->get('role')}}</p>
            <p class="information"><b>E-posta:</b> {{ session()->get('email') }}</p>
            <button id="updateProfile" type="button" class="btn" data-bs-toggle="modal"
                data-bs-target="#updateRestaurant">Güncelle</button>
        </div>
    </div>
</div>


{{-- Güncelle butonunun modal'ı oluşturuluyor --}}

<!-- Update Modal-->
<div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="updateRestaurantLabel">Kullanıcı Bilgilerini Güncelle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateUserForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="userID" value="{{ session('userID') }}">
                    <div class="mb-3">
                        <label for="currentEmail" class="form-label">Mevcut E-posta</label>
                        <input type="email" class="form-control" id="currentEmail" name="currentEmail"
                            value="{{ session('email') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newEmail" class="form-label">Yeni E-posta</label>
                        <input type="email" class="form-control" id="newEmail" name="newEmail"
                            placeholder="Yeni e-posta girin">
                    </div>
                    <button type="button" class="btn btn-info w-100" id="sendVerificationCodeBtn">Doğrulama Kodu
                        Gönder</button>

                    <div class="mb-3 mt-3">
                        <label for="verificationCode" class="form-label">Doğrulama Kodu</label>
                        <input type="text" class="form-control" id="verificationCode" name="verificationCode"
                            placeholder="Doğrulama kodunu girin" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Yeni Şifre</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword"
                            placeholder="Yeni şifre girin">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Yeni Şifre Tekrarı</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            placeholder="Şifreyi tekrar girin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger w-100">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const updateUserForm = document.getElementById('updateUserForm');
        const verificationCodeField = document.getElementById('verificationCode');
        const sendVerificationCodeBtn = document.getElementById('sendVerificationCodeBtn');

        sendVerificationCodeBtn.addEventListener('click', function () {
            const newEmail = document.getElementById('newEmail').value;

            if (!newEmail) {
                Swal.fire('Hata', 'Lütfen yeni e-posta adresinizi girin.', 'error');
                return;
            }

            $.ajax({
                url: '{{ route('sendVerificationCode') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    newEmail: newEmail
                },
                success: function (data) {
                    if (data.success) {
                        Swal.fire('Başarılı', 'Doğrulama kodu yeni e-posta adresinize gönderildi.', 'success');
                        verificationCodeField.disabled = false;
                    } else {
                        Swal.fire('Hata', data.error || 'Bir hata oluştu.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.', 'error');
                }
            });
        });
    });
    updateUserForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (newPassword !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: 'Şifreler uyuşmuyor.'
            });
            return;
        }

        const userID = $('#updateUserForm input[name="userID"]').val();

        if (!userID) {
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: 'User ID bulunamadı.'
            });
            return;
        }

        Swal.fire({
            title: 'Emin misiniz?',
            text: "Kullanıcı bilgileri güncellenecek!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Güncelle!',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.isConfirmed) {
                // FormData kullanarak form verilerini toplayalım
                var formData = new FormData(document.getElementById('updateUserForm'));

                $.ajax({
                    url: `/profile/update/${userID}`,
                    method: 'POST',
                    data: formData,
                    processData: false, // formData kullanıldığında bu `false` olmalı
                    contentType: false, // formData kullanıldığında bu `false` olmalı
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Başarılı',
                                text: 'Kullanıcı bilgileri güncellendi.',
                                icon: 'success'
                            }).then(() => {
                                location.reload(); // Sayfayı yenileyerek değişiklikleri görebiliriz
                            });
                        }
                    },
                    error: function (xhr) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        // Hata mesajlarını birleştirip göstermek için
                        for (const field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                errorMessage += `${errors[field].join('<br>')}<br>`;
                            }
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Hata',
                            html: errorMessage || 'Bir hata oluştu.'
                        });
                    }
                });
            }
        });
    });

</script>