
// Add Restaurant
document.addEventListener('DOMContentLoaded', function () {
    const addRestaurantForm = document.getElementById('addRestaurantForm');

    addRestaurantForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(addRestaurantForm);

        Swal.fire({ // İşlemi yaparken uyarılıyoruz
            title: 'Emin misiniz?',
            text: "Yeni bir restoran eklenecek!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Ekle!',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX isteği
                $.ajax({
                    url: '/restaurants/create',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) { // Backend işlemi başarılı ise sweetalert ile bilgilendiriliyoruz.
                        Swal.fire({
                            title: 'Başarılı',
                            text: 'Yeni restoran başarıyla eklendi.',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr) {
                        let errorMessage = 'Bir hata oluştu. Lütfen tekrar deneyin.';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).join('<br>');
                        }
                        Swal.fire('Hata', errorMessage, 'error');
                    }
                });
            }
        });
    });
});

// Delete Restaurant AJAX
document.addEventListener('DOMContentLoaded', function () {
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
                    url: '/restaurants/delete/' + encodeURIComponent(restaurantName), // URL'deki restoran adı encode edilerek gönderiliyor
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
});


// Update Restaurant
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