<div class="container">
    <div class="row">
        @forelse ($favorities as $favority)
            <div class="col-md-3 mb-5">
                <div class="restaurant-card">
                    <img src="{{ $favority->restaurant->image }}" alt="Restaurant Image" class="img-fluid">
                    <div class="restaurant-card-body">
                        <h5>{{ $favority->restaurant->name }}</h5>
                        <p>İki kişilik menüde %20 indirim!</p>
                        <p>📍{{ $favority->restaurant->districts->name }} {{ $favority->restaurant->districts->city->name }}
                        </p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                        <!-- Favori Olmayan (Boş Kalp) SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            data-id="{{ $favority->restaurant->restaurantID }}" class="bi bi-heart" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                        </svg>
                    </div>
                </div>
            </div>
        @empty
            <p>Favorilere eklediğiniz bir restoran bulunmamaktadır.</p>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tüm kalp simgelerini seç
        const heartIcons = document.querySelectorAll('.bi-heart');

        // Her bir kalp simgesine tıklama olayı ekle
        heartIcons.forEach(function (icon) {
            icon.addEventListener('click', function () {
                const restaurantID = this.getAttribute('data-id'); // Tıklanan SVG'nin data-id değerini al
                const svgElement = this; // Tıklanan SVG elementini seç

                // AJAX isteği
                const xhr = new XMLHttpRequest();
                xhr.open('POST', `/favorites/toggle/${restaurantID}`, true);

                // CSRF Token ekle
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                // İstek tamamlandığında
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);

                        if (response.success) {
                            if (response.added) {
                                // Favoriye eklenmişse sınıf ekle
                                svgElement.classList.add('text-danger');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Favorilerinize eklendi.',
                                }).then(function () {
                                    location.reload();
                                });
                            } else {
                                // Favoriden çıkarılmışsa sınıfı kaldır
                                svgElement.classList.remove('text-danger');
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
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'AJAX isteği başarısız.',
                            text: xhr.statusText,
                        });
                    }
                };

                // Hata durumunda
                xhr.onerror = function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'AJAX hatası meydana geldi.',
                    });
                };

                // Sunucuya JSON verisini gönder
                xhr.send(JSON.stringify({ restaurantID: restaurantID }));
            });
        });
    });

</script>

