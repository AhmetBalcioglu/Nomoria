$(document).ready(function () {
    // Kullanıcının giriş yapıp yapmadığını kontrol et
    let isUserLoggedIn = $('meta[name="user-logged-in"]').attr('content') === 'true';

    if (!isUserLoggedIn) {
        // Kullanıcı çıkış yaptıysa tüm favori ikonlarını temizle
        $('.bi-heart, .favHearth-icon').removeClass('text-danger favorited').attr('fill', 'white');
    }

    // Favori ekleme/çıkarma işlemi
    $('.bi-heart, .favHearth-icon').on('click', function () {
        if (!isUserLoggedIn) {
            Swal.fire({
                icon: 'error',
                title: 'Giriş Yapmalısınız!',
                text: 'Favorilere eklemek için giriş yapmalısınız.',
            });
            return;
        }

        const restaurantID = $(this).data('id'); 
        const svgElement = $(this);

        $.ajax({
            url: `/favorites/toggle/${restaurantID}`,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    if (response.added) {
                        svgElement.addClass('text-danger favorited').attr('fill', 'red');
                        Swal.fire({
                            icon: 'success',
                            title: 'Favorilere Eklendi!',
                        });
                    } else {
                        svgElement.removeClass('text-danger favorited').attr('fill', 'white');
                        Swal.fire({
                            icon: 'success',
                            title: 'Favorilerden Çıkarıldı!',
                        });
                    }
                }
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    text: xhr.statusText,
                });
            }
        });
    });

    // Kategori yönlendirme işlemi
    $('.category_url img').on('click', function (event) {
        event.stopPropagation();

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

        let data = $(this).closest('.category_url').data('url');
        let district = "all";
        let viewType = "all";

        let category = categoryArray[data] ?? 'all';
        let couisineType = cuisineArray.includes(data) ? data.replaceAll(" ", "+") : 'all';
        let menuType = menuArray.includes(data) ? data.replaceAll(" ", "+") : 'all';

        let url = `http://nomoria.local/filter?district=${district}&viewType=${viewType}&category=${category}&couisineType=${couisineType}&menuType=${menuType}`;
        console.log("Redirecting to URL:", url);
        window.location.href = url;
    });
});
