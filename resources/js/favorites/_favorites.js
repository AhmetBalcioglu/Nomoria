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

    // Favori kategoriler için tıklama olayı
    $('.hearth-icon').on('click', function () {
        const categoryID = $(this).data('id'); // Kategorinin ID'sini al
        const iconElement = $(this); // Tıklanan simgeyi seç

        $.ajax({
            url: `/favorites/toggle/${categoryID}`,
            method: 'GET',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // Dinamik CSRF token
            },
            success: function (response) {
                if (response.success) {
                    if (response.added) {
                        iconElement.addClass('text-danger');
                        Swal.fire({
                            icon: 'success',
                            title: 'Favorilerinize eklendi.',
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        iconElement.removeClass('text-danger');
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
