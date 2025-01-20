$(document).ready(function () {
    // Favori restoranlar için tıklama olayı
    $('.bi-heart').on('click', function () {
        const restaurantID = $(this).data('id'); // Tıklanan SVG'nin data-id değerini al
        const svgElement = $(this); // Tıklanan SVG elementini seç

        // AJAX isteği
        $.ajax({
            url: `/favorites/toggle/${restaurantID}`,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Dinamik CSRF token
            },
            success: function (response) {
                if (response.success) {
                    if (response.added) {
                        svgElement.addClass('text-danger');
                        Swal.fire({
                            icon: 'success',
                            title: 'Favorilerinize eklendi.',
                        }).then(function () {
                            location.reload();
                        });
                    } else {
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

$(document).ready(function () {
    $('.favHearth-icon').click(function () {
        var categoryID = $(this).data('id'); // Tıklanan SVG'nin data-id değerini al
        var icon = $(this); // Tıklanan SVG elementini seç

        // AJAX isteği
        $.ajax({
            url: 'favorites/toggle/' + categoryID, // Favori ekleme/çıkarma URL'si
            method: 'GET',
            data: {
                _token: '{{ csrf_token() }}', // CSRF token
            },
            success: function (response) {
                if (response.success) {
                    if (response.added) {
                        icon.addClass('favorited'); // Favori sınıfını ekle
                        Swal.fire({
                            title: 'Favorilere Eklendi!',
                            text: 'Kategori favorilerinize eklendi.',
                            icon: 'success',
                            confirmButtonText: 'Tamam'
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        icon.removeClass('favorited'); // Favori sınıfını kaldır
                        Swal.fire({
                            title: 'Favorilerden Çıkarıldı!',
                            text: 'Kategori favorilerinizden çıkarıldı.',
                            icon: 'success',
                            confirmButtonText: 'Tamam'
                        }).then(function () {
                            location.reload();
                        });
                    }
                } else {
                    Swal.fire({
                        title: 'Bir hata oluştu!',
                        text: 'Oturum açmamış olabilirsiniz, lütfen tekrar deneyiniz!',
                        icon: 'error',
                        confirmButtonText: 'Tamam'
                    });
                }
            },
            error: function () {
                console.log('Bir hata oluştu.');
            }
        });
    });
});
