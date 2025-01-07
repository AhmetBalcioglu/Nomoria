<div class="sidebar col-md-2">
    <h2 class="baslik">Konsepte Göre</h2>
    <div>
        <input id="workMeal" type="checkbox">
        <label for="workMeal" class="category-title">İş Yemeği</label>
       
    </div>

    <div>
        <div class="category-title">Dünya Mutfağı</div>
        <input id="korea" type="checkbox">
        <label for="korea">Kore Mutfağı</label> <br>
        <input id="mexica" type="checkbox">
        <label for="mexica">Meksika Mutfağı</label> <br>
        <input id="japan" type="checkbox">
        <label for="japan">Japon Mutfağı</label> <br>
        <input id="italian" type="checkbox">
        <label for="italian">İtalyan Mutfağı</label> <br>
    </div>

    <div>
        <input id="celebration" type="checkbox">
        <label for="celebration" class="category-title">Kutlama</label>
        
    </div>

    <div>
        <input id="single" type="checkbox">
        <label for="single" class="category-title">Tek Kişilik</label>
        
    </div>

    <div>
        <input id="specialDay" type="checkbox">
        <label for="specialDay" class="category-title">Özel Gün</label>
     
    </div>
   <br>
    <h2 class="baslik">Menülere Göre</h2>
    <div>
        <div class="category-title">Et Yemekleri</div>
        <input id="kebab" type="checkbox" class="check">
        <label for="kebab">Kebap Çeşitleri</label> <br>
        <input id="doner" type="checkbox">
        <label for="doner">Döner</label> <br>
        <input id="kofte" type="checkbox">
        <label for="kofte">Köfte</label> <br>
        <input id="bonfile" type="checkbox">
        <label for="bonfile">Bonfile</label> <br>
    </div>

   
    <div>
        <div class="category-title">Balık</div>
        <input id="hamsi" type="checkbox">
        <label for="hamsi">Hamsi</label> <br>
        <input id="palamut" type="checkbox">
        <label for="palamut" >Palamut</label> <br>
        <input id="levrek" type="checkbox">
        <label for="levrek">Levrek</label> <br>
        <input id="istavrit" type="checkbox">
        <label for="istavrit">İstavrit</label> <br>
    </div>


    <div>
        <div class="category-title">Fast Food</div>
        <input id="pizza" type="checkbox">
        <label for="pizza">Pizza</label> <br>
        <input id="pide" type="checkbox">
        <label for="pide">Pide</label> <br>
        <input id="burger" type="checkbox">
        <label for="burger">Hamburger</label> <br>
        <input id="hotDog" type="checkbox">
        <label for="hotDog">Sosisli</label> <br>
    </div>

    <div>
        <div class="category-title">Vegan</div>
        <input id="falafel" type="checkbox">
        <label for="falafel">Falafel Bowl</label> <br>
        <input id="sezar" type="checkbox">
        <label for="sezar">Sezar Salata</label> <br>
        <input id="breakfast" type="checkbox">
        <label for="breakfast">Protein Kahvaltı</label> <br>
        <input id="kruvasan" type="checkbox">
        <label for="kruvasan">Avokadolu Kruvasan</label> <br>
    </div>

    <div>
        <div class="category-title">Alkollü Mekanlar</div>
        <input id="tuborg" type="checkbox">
        <label for="tuborg">Tuborg</label> <br>
        <input id="guinnes" type="checkbox">
        <label for="guinnes">Guinnes</label> <br>
        <input id="sol" type="checkbox">
        <label for="sol">Sol</label> <br>
        <input id="wine" type="checkbox">
        <label for="wine">Şarap</label> <br>
    </div>
</div>


<div class="container my-4">
    <div class="row">
        <!-- Restoran Kartı 1 -->
        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b1.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı</h5>
                    <p>İki kişilik menüde %20 indirim!</p>
                    <p>📍 İstanbul, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <!-- Restoran Kartı 2 -->
        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b2.png') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 2</h5>
                    <p>Pizza ve tatlı menüsünde %30 indirim!</p>
                    <p>📍 Ankara, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <!-- Restoran Kartı 3 -->
        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

         <!-- Restoran Kartı 1 -->
         <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b1.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı</h5>
                    <p>İki kişilik menüde %20 indirim!</p>
                    <p>📍 İstanbul, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <!-- Restoran Kartı 2 -->
        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b2.png') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 2</h5>
                    <p>Pizza ve tatlı menüsünde %30 indirim!</p>
                    <p>📍 Ankara, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <!-- Restoran Kartı 3 -->
        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>Restoran Adı 3</h5>
                    <p>Üç kişilik menüde ücretsiz içecek!</p>
                    <p>📍 İzmir, Türkiye</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>

        
    </div>
</div>