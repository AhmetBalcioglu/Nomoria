$(document).ready(function () {
    // Favori kategoriler için tıklama olayı
    $('.favHearth-icon').on('click', function () {
        const categoryID = $(this).data('id'); // Kategorinin ID'sini al
        const iconElement = $(this); // Tıklanan simgeyi seç

        // AJAX isteği
        $.ajax({
            url: `/favorites/toggle/${categoryID}`, // Favori ekleme/çıkarma URL'si
            method: 'GET',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // Dinamik CSRF token
            },
            success: function (response) {
                if (response.success) {
                    if (response.added) {
                        iconElement.addClass('text-danger'); // Favoriye eklenirse kırmızı
                        Swal.fire({
                            icon: 'success',
                            title: 'Favorilerinize eklendi.',
                        }).then(function () {
                            location.reload(); // Sayfayı yenileyerek güncel veriyi göster
                        });
                    } else {
                        iconElement.removeClass('text-danger'); // Favoriden çıkarılırsa kırmızı kaldır
                        Swal.fire({
                            icon: 'success',
                            title: 'Favorilerinizden kaldırıldı.',
                        }).then(function () {
                            location.reload(); // Sayfayı yenileyerek güncel veriyi göster
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Bir hata oluştu.',
                        text: response.message, // Hata mesajını göster
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Bir hata oluştu.',
                    text: 'Favori güncellenirken bir sorun oluştu.',
                });
            }
        });
    });
});
