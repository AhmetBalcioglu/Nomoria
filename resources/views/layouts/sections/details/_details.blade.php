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
            <div class="category-title collapsible" id="meat-dishes-title">Et Yemekleri
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <label for="kebab">Kebap Çeşitleri</label> <br>
                <label for="doner">Döner</label> <br>
                <label for="kofte">Köfte</label> <br>
                <label for="bonfile">Bonfile</label> <br>
            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="fish-dishes-title">Balık
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <input id="hamsi" type="checkbox">
                <label for="hamsi">Hamsi</label> <br>
                <input id="palamut" type="checkbox">
                <label for="palamut">Palamut</label> <br>
                <input id="levrek" type="checkbox">
                <label for="levrek">Levrek</label> <br>
                <input id="istavrit" type="checkbox">
                <label for="istavrit">İstavrit</label> <br>
            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="fast-food-title">Fast Food
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <input id="pizza" type="checkbox">
                <label for="pizza">Pizza</label> <br>
                <input id="pide" type="checkbox">
                <label for="pide">Pide</label> <br>
                <input id="burger" type="checkbox">
                <label for="burger">Hamburger</label> <br>
                <input id="hotDog" type="checkbox">
                <label for="hotDog">Sosisli</label> <br>
            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="vegan-dishes-title">Vegan
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <input id="falafel" type="checkbox">
                <label for="falafel">Falafel Bowl</label> <br>
                <input id="sezar" type="checkbox">
                <label for="sezar">Sezar Salata</label> <br>
                <input id="breakfast" type="checkbox">
                <label for="breakfast">Protein Kahvaltı</label> <br>
                <input id="kruvasan" type="checkbox">
                <label for="kruvasan">Avokadolu Kruvasan</label> <br>
            </div>
        </div>

        <div>
            <div class="category-title collapsible" id="alcoholic-places-title">Alkollü Mekanlar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path
                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                </svg>
            </div>
            <div class="checkbox-container" style="display: none;">
                <input id="tuborg" type="checkbox">
                <label for="tuborg">Tuborg</label> <br>
                <input id="guinnes" type="checkbox">
                <label for="guinnes">Guinnes</label> <br>
                <input id="sol" type="checkbox">
                <label for="sol">Sol</label> <br>
                <input id="wine" type="checkbox">
                <label for="wine">Şarap</label> <br>
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
