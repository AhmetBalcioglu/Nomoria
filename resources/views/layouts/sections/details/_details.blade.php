<div class="sidebar col-md-2">

    <div class="filter-container">
        <label for="districts" class="baslik">Konum Seçiniz:</label>
        <select id="districts" style="color: #f0952d">
            <option value="">Seçiniz</option>
            <option value="Adalar">Adalar</option>
            <option value="Arnavutköy">Arnavutköy</option>
            <option value="Ataşehir">Ataşehir</option>
            <option value="Avcılar">Avcılar</option>
            <option value="Bağcılar">Bağcılar</option>
            <option value="Bahçelievler">Bahçelievler</option>
            <option value="Bakırköy">Bakırköy</option>
            <option value="Başakşehir">Başakşehir</option>
            <option value="Bayrampaşa">Bayrampaşa</option>
            <option value="Beşiktaş">Beşiktaş</option>
            <option value="Beykoz">Beykoz</option>
            <option value="Beylikdüzü">Beylikdüzü</option>
            <option value="Beyoğlu">Beyoğlu</option>
            <option value="Büyükçekmece">Büyükçekmece</option>
            <option value="Çatalca">Çatalca</option>
            <option value="Çekmeköy">Çekmeköy</option>
            <option value="Esenler">Esenler</option>
            <option value="Esenyurt">Esenyurt</option>
            <option value="Eyüpsultan">Eyüpsultan</option>
            <option value="Fatih">Fatih</option>
            <option value="Gaziosmanpaşa">Gaziosmanpaşa</option>
            <option value="Güngören">Güngören</option>
            <option value="Kadıkoy">Kadıköy</option>
            <option value="Kağıthane">Kağıthane</option>
            <option value="Kartal">Kartal</option>
            <option value="Küçükçekmece">Küçükçekmece</option>
            <option value="Maltepe">Maltepe</option>
            <option value="Pendik">Pendik</option>
            <option value="Sancaktepe">Sancaktepe</option>
            <option value="Sarıyer">Sarıyer</option>
            <option value="Silivri">Silivri</option>
            <option value="Sultanbeyli">Sultanbeyli</option>
            <option value="Sultangazi">Sultangazi</option>
            <option value="Şile">Şile</option>
            <option value="Şişli">Şişli</option>
            <option value="Tuzla">Tuzla</option>
            <option value="Ümraniye">Ümraniye</option>
            <option value="Üskudar">Üsküdar</option>
            <option value="Zeytinburnu">Zeytinburnu</option>
            <!-- Daha fazla ilçe eklenebilir -->
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
            <input id="sea-view" type="checkbox">
            <label for="sea-view">Deniz Manzarası</label> <br>
            <input id="nature" type="checkbox">
            <label for="nature">Doğanın İçinde</label> <br>
            <input id="historical" type="checkbox">
            <label for="historical">Tarihi Mekan</label> <br>
            <input id="city-view" type="checkbox">
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
            <input id="kebab" type="checkbox" class="check">
            <label for="kebab">Kebap Çeşitleri</label> <br>
            <input id="doner" type="checkbox">
            <label for="doner">Döner</label> <br>
            <input id="kofte" type="checkbox">
            <label for="kofte">Köfte</label> <br>
            <input id="bonfile" type="checkbox">
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
                        <p>📍{{ $cityName }}, {{ $districtName }}</p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
