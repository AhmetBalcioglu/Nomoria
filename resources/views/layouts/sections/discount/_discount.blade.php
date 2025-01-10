<body>
    <div class="hero">
        <h1>Kampanyalı Restoranlar</h1>
        <p>En özel fırsatları yakalayın ve hemen rezervasyon yapın!</p>
        <p>En sevilen balık restoranları burada !</p>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="campaign-card">
                <img src="{{ asset('img/balik/b1.jpg') }}" id="deneme" alt="Restoran Resmi" class="restaurant-image">
                <h2 class="restaurant-name">Restoran Adı</h2>
                <p class="campaign-details">%20 indirim! 10 Ocak - 20 Ocak</p>
            </div>

            <!-- Modal (Büyütülen resim için) -->
            <div id="imageModal" class="modal">
                <div class="modal-content">
                    <img id="zoomImage" src="" alt="Büyütülen Resim">
                </div>
            </div>




        </div>




        <div class="row">

            <!-- Restoran Kartı 1 -->
            <div class="col-md-3">
                <div class="restaurant-card campaign-card">
                    <img src="{{ asset('img/balik/b1.jpg') }}" id="img1" alt="Restoran" class="restaurant-image">
                    <div class="restaurant-card-body">
                        <h5>Restoran Adı</h5>
                        <p>İki kişilik menüde %20 indirim!</p>

                        <a href="rezervasyon.html" class="btn btn-outline-danger ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-journal-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                            </svg>

                        </a>
                        <a href="#" class=" btn btn-unline-danger " id="heart-icon"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Modal (Büyütülen resim için) -->
                <div id="imageModal1" class="modal1">
                    <div class="modal-content1">
                        <img id="zoomImage1" src="" alt="Büyütülen Resim">
                    </div>
                </div>




            </div>
            <!-- Restoran Kartı 1 -->
            <div class="col-md-3">
                <div class="restaurant-card campaign-card">
                    <img src="{{ asset('img/balik/b1.jpg') }}" id="img1" alt="Restoran" class="restaurant-image">
                    <div class="restaurant-card-body">
                        <h5>Restoran Adı</h5>
                        <p>İki kişilik menüde %20 indirim!</p>

                        <a href="rezervasyon.html" class="btn btn-outline-danger ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-journal-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                            </svg>

                        </a>
                        <a href="#" class=" btn btn-unline-danger " id="heart-icon"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Modal (Büyütülen resim için) -->
                <div id="imageModal1" class="modal1">
                    <div class="modal-content1">
                        <img id="zoomImage1" src="" alt="Büyütülen Resim">
                    </div>
                </div>




            </div>

            <!-- Restoran Kartı 2 -->
            <div class="col-md-3">
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
            <div class="col-md-3">
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


            <!-- Restoran Kartı 4 -->
            <div class="col-md-3">
                <div class="restaurant-card">
                    <img src="{{ asset('img/balik/b1.jpg') }}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>Restoran Adı 4</h5>
                        <p>İki kişilik menüde %20 indirim!</p>
                        <p>📍 İstanbul, Türkiye</p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="container my-4">
        <div class="row mt-4">
            <!-- Restoran Kartı 5 -->
            <div class="col-md-3">
                <div class="restaurant-card">
                    <img src="{{ asset('img/balik/b2.png') }}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>Restoran Adı 5</h5>
                        <p>Pizza ve tatlı menüsünde %30 indirim!</p>
                        <p>📍 Ankara, Türkiye</p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                    </div>
                </div>
            </div>

            <!-- Restoran Kartı 6 -->
            <div class="col-md-3">
                <div class="restaurant-card">
                    <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>Restoran Adı 6</h5>
                        <p>Üç kişilik menüde ücretsiz içecek!</p>
                        <p>📍 İzmir, Türkiye</p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                    </div>
                </div>
            </div>



            <!-- Restoran Kartı 7 -->
            <div class="col-md-3">
                <div class="restaurant-card">
                    <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>Restoran Adı 7</h5>
                        <p>Üç kişilik menüde ücretsiz içecek!</p>
                        <p>📍 İzmir, Türkiye</p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                    </div>
                </div>
            </div>
            <!-- Restoran Kartı 8 -->
            <div class="col-md-3">
                <div class="restaurant-card">
                    <img src="{{ asset('img/balik/b3.jpg') }}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>Restoran Adı 8</h5>
                        <p>Üç kişilik menüde ücretsiz içecek!</p>
                        <p>📍 İzmir, Türkiye</p>
                        <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
