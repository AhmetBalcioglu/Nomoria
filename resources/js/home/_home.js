window.onload = function () {
    setTimeout(function () {
        const popup = document.getElementById("popup");
        if (popup) {
            popup.style.display = "block";
        }
    }, 500);
}

// Popup'ı kapatma fonksiyonu
function closePopup() {
    const popup = document.getElementById("popup");
    if (popup) {
        popup.style.display = "none";
    }
}


$('.close-btn').on('click', function () {
    closePopup();
});


document.addEventListener('DOMContentLoaded', function () {
    const heartIcons = document.querySelectorAll('.redirect-to-login');
    heartIcons.forEach(function (icon) {
        icon.addEventListener('click', function () {
            icon.setAttribute('fill', 'red');
            window.location.href = '/login';
        });

        icon.addEventListener('mouseover', function () {
            icon.classList.add('heart-icon-grow');
        });

        icon.addEventListener('mouseout', function () {
            icon.classList.remove('heart-icon-grow');
        });
    });




});

$(document).ready(function () {
    $('.hearth-icon').click(function () {
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
                    // Favori eklenmişse
                    if (response.added) {
                        icon.attr('fill', 'red'); // Kalp simgesini kırmızıya dönüştür
                        Swal.fire({
                            title: 'Favorilere Eklendi!',
                            text: 'Kategori favorilerinize eklendi.',
                            icon: 'success',
                            confirmButtonText: 'Tamam'
                        });
                    } else {
                        icon.attr('fill', 'black'); // Kalp simgesini siyaha döndür
                        Swal.fire({
                            title: 'Favorilerden Çıkarıldı!',
                            text: 'Kategori favorilerinizden çıkarıldı.',
                            icon: 'success',
                            confirmButtonText: 'Tamam'
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