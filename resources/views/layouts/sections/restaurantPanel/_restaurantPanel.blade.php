<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ session()->get('name') }} {{ session()->get('surname') }}</h1>
            <h2 class="mb-3">Rolü: @if (session()->get('role') == 'restaurantOwner')
                Restoran Sahibi
            @else
                Unknown
            @endif
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRestaurant">Restorant
                Ekle</button>
        </div>
    </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addRestaurant" tabindex="-1" aria-labelledby="addRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="addRestaurantLabel">Restorant Ekle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addRestaurantForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="name" class="form-label"><b>*</b>Restoran Adı</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Restoran Adı"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="description" class="form-label"><b>*</b>Açıklama</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" id="description" name="description"
                                placeholder="Açıklama"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="address" class="form-label"><b>*</b>Adres</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" id="address" name="address" placeholder="Adres"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="city" class="form-label"><b>*</b>İl</label>
                        </div>
                        <div class="col-md-9">
                            <select id="city" name="city" class="form-select">
                                @foreach ($cities as $city)
                                    <option value="{{ $city['citiesID'] }}">{{ $city['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="district" class="form-label"><b>*</b>İlçe</label>
                        </div>
                        <div class="col-md-9">
                            <select id="district" name="district" class="form-select">
                                @foreach ($districts as $district)
                                    <option value="{{ $district['districtsID'] }}">{{ $district['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="phone" class="form-label"><b>*</b>Telefon</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="email" class="form-label"><b>*</b>E-posta</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-posta">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="viewType" class="form-label">Manzara Türü</label>
                        </div>
                        <div class="col-md-9">
                            <select id="viewType" class="form-select" name="viewType">
                                <option value="" selected>--Seçiniz--</option>
                                <option value="Deniz Manzarası">Deniz Manzarası</option>
                                <option value="Doğanın İçinde">Doğanın İçinde</option>
                                <option value="Tarihi Mekan">Tarihi Mekan</option>
                                <option value="Şehir Manzarası">Şehir Manzarası</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="cuisineType" class="form-label">Mutfak Türü</label>
                        </div>
                        <div class="col-md-9">
                            <select id="cuisineType" class="form-select" name="cuisineType">
                                <option value="" selected>--Seçiniz--</option>
                                <option value="Kore Mutfağı">Kore Mutfağı</option>
                                <option value="Meksika Mutfağı">Meksika Mutfağı</option>
                                <option value="Japon Mutfağı">Japon Mutfağı</option>
                                <option value="İtalyan Mutfağı">İtalyan Mutfağı</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="concept" class="form-label"><b>*</b>Konsept Türü</label>
                        </div>
                        <div class="col-md-9">
                            <select id="concept" class="form-select" name="categoryID">
                                <option value="" selected>--Seçiniz--</option>
                                <option value="3">İş Yemeği</option>
                                <option value="2">Kutlama</option>
                                <option value="4">Tek Kişilik</option>
                                <option value="1">Özel Gün</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="capacity" class="form-label"><b>*</b>Kapasite</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                placeholder="Kapasite" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="image" class="form-label"><b>*</b>Resim</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                </div>
                <p class="form-text" style="margin-left: 1rem">* ile işaretli alanlar zorunludur</p>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success w-100">Ekle</button>
                </div>
            </form>

        </div>
    </div>
</div>