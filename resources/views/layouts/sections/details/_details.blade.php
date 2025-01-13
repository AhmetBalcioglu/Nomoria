<div class="sidebar col-md-2">
    <form action="{{ route('filter') }}" method="GET">
        <div class="filter-container">
            <label for="districts" class="baslik">Konum Seçiniz:</label>
            <select id="districts" name="district" style="color: #f0952d">
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

        <div>
            <div class="category-title collapsible" id="world-cuisine-title">Dünya Mutfağı
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <input id="korea" type="checkbox">
                <label for="korea">Kore Mutfağı</label> <br>
                <input id="mexica" type="checkbox">
                <label for="mexica">Meksika Mutfağı</label> <br>
                <input id="japan" type="checkbox">
                <label for="japan">Japon Mutfağı</label> <br>
                <input id="italian" type="checkbox">
                <label for="italian">İtalyan Mutfağı</label> <br>
            </div>
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
            <!--Et Yemekleri-->
            <div class="category-title collapsible" id="meat-dishes-title">
                <label>
                    <input type="checkbox" id="meat-checkbox"> Et Yemekleri
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down"
                    viewBox="0 0 16 16">
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


        <button type="submit" class="btn">Filtrele</button>
    </form>
</div>

<div class="container my-4">
    <div class="row" id="restaurant-cards">
        @foreach ($restaurants as $restaurant)
            {{-- Restoran Card --}}
            <div class="col-md-3 mb-5">
                <div class="restaurant-card">
                    <img src="{{ $restaurant['image'] }}" alt="RestaurantImg">
                    <div class="restaurant-card-body">
                        <h5></h5>
                        {{ $restaurant['name'] }}
                        <p>İki kişilik menüde %20 indirim!</p>
                        <p>📍{{ $restaurant['cities']['name'] }} {{ $restaurant['districts']['name'] }} </p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
