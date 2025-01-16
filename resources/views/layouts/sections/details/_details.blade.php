<div class="sidebar col-md-2">
    <form action="{{ route('filter') }}" method="GET">
        <div class="filter-container">
            <label for="districts" class="baslik">Konum Seçiniz:</label>
            <select id="districts" name="district" style="color: #f0952d">
                <option value="all" selected>Tümü</option>
                @foreach ($districts as $district)
                    <option value="{{ $district['districtsID'] }}">{{ $district['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div id="selected-district"></div>

        <h2 class="baslik">Mekan Türü</h2>
        <div>
            <div class="category-title collapsible" id="mekan-turu-title"> Seçiniz
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <input id="sea-view" type="checkbox" name="seaView">
                <label for="sea-view">Deniz Manzarası</label> <br>

                <input id="nature" type="checkbox" name="inNature">
                <label for="nature">Doğanın İçinde</label> <br>

                <input id="historical" type="checkbox" name="historicalPlace">
                <label for="historical">Tarihi Mekan</label> <br>

                <input id="city-view" type="checkbox" name="cityView">
                <label for="city-view">Şehir Manzarası</label> <br>
            </div>
        </div>

        <h2 class="baslik">Konsepte Göre</h2>


        <div style="display: flex">
            <input id="workMeal" type="checkbox">
            <label for="workMeal" class="category-title mx-2">İş Yemeği</label>
        </div>

        <div style="display: flex">
            <input id="celebration" type="checkbox">
            <label for="celebration" class="category-title mx-2">Kutlama</label>
        </div>

        <div style="display: flex">
            <input id="single" type="checkbox">
            <label for="single" class="category-title mx-2">Tek Kişilik</label>
        </div>

        <div style="display: flex">
            <input id="specialDay" type="checkbox">
            <label for="specialDay" class="category-title mx-2">Özel Gün</label>
        </div>

        <br>
        <h2 class="baslik">Menülere Göre</h2>
        <div>
            <div class="category-title collapsible" id="world-cuisine-title">
                <label>
                    <input type="checkbox" id="world-cuisine-checkbox"> Dünya Mutfağı
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <p>Kore Mutfağı</p>
                <p>Meksika Mutfağı</p>
                <p>Japon Mutfağı</p>
                <p>İtalyan Mutfağı</p>
            </div>
        </div>
        <div>
            <div class="category-title collapsible" id="meat-dishes-title">
                <label>
                    <input type="checkbox" id="meat-checkbox"> Et Yemekleri
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <p>Kebab Çeşitleri</p>
                <p>Döner</p>
                <p>Köfte</p>
                <p>Bonfile</p>
            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="fish-dishes-title">
                <label>
                    <input type="checkbox" id="fish-checkbox"> Balık Yemekleri
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <p>Hamsi</p>
                <p>Palamut</p>
                <p>Levrek</p>
                <p>Çupra</p>
            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="fast-food-title">
                <label>
                    <input type="checkbox" id="fast-food-checkbox"> Fast Food
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <p>Pizza</p>
                <p>Pide</p>
                <p>Hamburger</p>
                <p>Sosisli</p>
            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="vegan-dishes-title">
                <label>
                    <input type="checkbox" id="vegan-checkbox"> Vegan Yemekler
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <p>Felafel Bowl</p>
                <p>Sezar Salata</p>
                <p>Protein Kahvaltı</p>
                <p>Avokadolu Kruvasan</p>

            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="alcoholic-places-title">
                <label>
                    <input type="checkbox" id="alcoholic-checkbox"> Alkol Servisi
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-caret-down" viewBox="0 0 16 16">
                        <path
                            d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                    </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <p>Tuborg</p>
                <p>Guinnes</p>
                <p>Sol</p>
                <p>Şarap</p>
            </div>
        </div> <br>


        <button id="filterButton" type="submit" class="btn">Filtrele</button>
    </form>
</div>
</div>

<div class="container my-4">
    <div class="row" id="restaurant-cards">
        @foreach ($restaurants as $restaurant)
            <div class="col-md-3 mb-5">z
                <div class="restaurant-card">
                    <a href="{{ route('restaurants.show', $restaurant['restaurantID']) }}">
                        <img src="{{ $restaurant['image'] }}" alt="RestaurantImg">
                    </a>

                    <div class="restaurant-card-body">
                        <h5>{{ $restaurant['name'] }}</h5>
                        <p>İki kişilik menüde %20 indirim!</p>
                        <p>📍{{ $restaurant['cities']['name'] }} {{ $restaurant['districts']['name'] }}</p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                        @if ($restaurant['favorites'] == null)
                            <!-- Favori Olmayan (Boş Kalp) SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" data-id="{{ $restaurant['restaurantID'] }}" class="bi bi-heart"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                            </svg>
                        @else
                            <!-- Favori Olan (Dolu Kalp) SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" data-id="{{ $restaurant['restaurantID'] }}"
                                class="bi bi-heart text-danger" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                            </svg>
                        @endif


                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Tüm kalp simgelerini seç
        const heartIcons = document.querySelectorAll('.bi-heart');

        // Her bir kalp simgesine tıklama olayı ekle
        heartIcons.forEach(function(icon) {
            icon.addEventListener('click', function() {
                const restaurantID = this.getAttribute(
                    'data-id'); // Tıklanan SVG'nin data-id değerini al
                const svgElement = this; // Tıklanan SVG elementini seç

                // AJAX isteği
                const xhr = new XMLHttpRequest();
                xhr.open('POST', `/favorites/toggle/${restaurantID}`, true);

                // CSRF Token ekle
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                // İstek tamamlandığında
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);

                        if (response.success) {
                            if (response.added) {
                                // Favoriye eklenmişse sınıf ekle
                                svgElement.classList.add('text-danger');

                                // Sweet Alert
                                Swal.fire({
                                    title: 'Favorilere Eklendi!',
                                    text: 'Restoran favorilerinize eklendi.',
                                    icon: 'success',
                                    confirmButtonText: 'Tamam'
                                });
                            } else {
                                // Favoriden çıkarılmışsa sınıfı kaldır
                                svgElement.classList.remove('text-danger');

                                // Sweet Alert
                                Swal.fire({
                                    title: 'Favorilerden Çıkarıldı!',
                                    text: 'Restoran favorilerinize çıkarıldı.',
                                    icon: 'success',
                                    confirmButtonText: 'Tamam'
                                });
                            }
                        } else {
                            Swal.fire({
                                title: 'Bir hata oluştu!',
                                text: 'Oturum açmamış olabilirsiniz lütfen tekrar deneyiniz!',
                                icon: 'error',
                                confirmButtonText: 'Tamam'
                            });
                        }
                    } else {
                        console.error('AJAX isteği başarısız:', xhr.statusText);
                    }
                };

                // Hata durumunda
                xhr.onerror = function() {
                    console.error('AJAX hatası meydana geldi.');
                };

                // Sunucuya JSON verisini gönder
                xhr.send(JSON.stringify({
                    restaurantID: restaurantID
                }));
            });
        });
    });
</script>>
