<div class="container" style="height: 650px">
    <div class="row">
        <!-- Sağ Kısım -->
        <div class="col-md-4">
            <div class="border p-3 rounded m-5">
                <h4>Restoran Adı</h4>
                <p>Rezervasyon öncesi gerekli bilgileri doldurmayı unutmayınız.</p>
            </div>
        </div>

        <!-- Sol Kısım: Form -->
        <div class="col-md-8">
            <div class="border p-3 rounded m-5">
                <h2>Rezervasyon Formu</h2>
                <form>
                    <!-- Üst Kısım: IMG ve Form Elemanları -->
                    <div class="d-flex align-items-start mb-3">
                        <!-- Kimlik/IMG Kutusu -->
                        <div class="me-3">
                            <div class="border p-3 rounded" style="width: 120px; height: 150px; display: flex; align-items: center; justify-content: center;">
                                <h6>IMG</h6>
                            </div>
                        </div>

                        <!-- Form Elemanları -->
                        <div style="flex-grow: 1;">
                            <!-- Ad-Soyad -->
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="adSoyad" placeholder="Ad-Soyad">
                            </div>

                            <!-- Email -->
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                                        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                                    </svg>
                                </span>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-Posta">
                            </div>

                              <!-- Alt Kısım: Diğer Form Elemanları -->
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg>
                        </span>
                        <input type="number" class="form-control" id="kisiSayisi" placeholder="Kişi Sayısı">
                    </div>
                        </div>
                    </div>

                    <!-- Alt Kısım: Diğer Form Elemanları -->

                    <label for="rezervasyonTarihi">Rezervasyon Tarihi</label>
                    <input type="date" class="form-control mb-3" id="rezervasyonTarihi">

                    <label for="rezervasyonSaati">Rezervasyon Saati</label>
                    <input type="time" class="form-control mb-3" id="rezervasyonSaati">

                    <div class="form-check mb-3">
                        <input type="checkbox" id="checkbox">
                        <label class="check" for="checkbox">Aldım Kabul Ettim 777</label>
                    </div>

                    <button type="submit" class="btn" style="background-color: #ed4f15">Rezervasyon Yap</button>
                </form>
            </div>
        </div>
    </div>
</div>
