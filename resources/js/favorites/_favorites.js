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
            url: '/favorites/toggle/' + categoryID, // Favori ekleme/çıkarma URL'si
            method: 'GET',
            data: {
                _token: '{{ csrf_token() }}', // CSRF token
            },
            success: function (response) {
                if (response.success) {
                    if (response.added) {
                        icon.addClass('favorited').attr('fill', 'red'); // Favori sınıfını ekle ve rengi değiştir
                        Swal.fire({
                            title: 'Favorilere Eklendi!',
                            text: 'Kategori favorilerinize eklendi.',
                            icon: 'success',
                            confirmButtonText: 'Tamam'
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        icon.removeClass('favorited').attr('fill', 'white'); // Favori sınıfını kaldır ve rengi değiştir
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

$('.category_url img').on('click', function (event) {
    event.stopPropagation(); // Tıklama olayının diğer üst elementlere bulaşmasını engeller

    let categoryArray = {
        "İş Yemekleri": 3,
        "Kutlamalar": 2,
        "Tek Kişilik": 4,
        "Özel Günler": 1
    };

    let cuisineArray = [
        "Türk Mutfağı",
        "Kore Mutfağı",
        "Meksika Mutfağı",
        "Japon Mutfağı",
        "İtalyan Mutfağı"
    ];

    let menuArray = [
        "Et Yemekleri",
        "Balık Yemekleri",
        "Fast Food",
        "Vegan Yemekleri",
        "Alkol Servisi"
    ];

    // Resmin bulunduğu öğenin data-url değerini alıyoruz
    let data = $(this).closest('.category_url').data('url');
    let district = "all";
    let viewType = "all";

    // categoryArray ile eşleşen kategori ID'sini alıyoruz
    let category = categoryArray[data] ?? 'all';

    // cuisineArray ve menuArray içinde veri kontrolü yapıyoruz
    let couisineType = cuisineArray.includes(data) ? data : 'all';
    let menuType = menuArray.includes(data) ? data : 'all';

    // Boşlukları "+" ile değiştiriyoruz
    couisineType = couisineType.replaceAll(" ", "+");
    menuType = menuType.replaceAll(" ", "+");

    // URL oluşturuluyor
    let url = `http://nomoria.local/filter?district=${district}&viewType=${viewType}&category=${category}&couisineType=${couisineType}&menuType=${menuType}`;
    console.log("Redirecting to URL:", url); // URL'yi konsola yazdırıyoruz

    window.location.href = url; // Yönlendirme işlemi
});
