<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ session()->get('name') }} {{ session()->get('surname') }}</h1>
            <h2 class="mb-3">Rolü: {{ session()->get('role') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRestaurant">Restorant
                Ekle</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeRestaurant">Restorant
                Sil</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateRestaurant">Restorant
                Güncelle</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-warning">Dash Board</button> <!-- Tuğçenin Dash Boarda yönlendirilecek-->
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
                            <label for="name" class="form-label">Restoran Adı</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Restoran Adı" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="description" class="form-label">Açıklama</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" id="description" name="description" placeholder="Açıklama"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="address" class="form-label">Adres</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" id="address" name="address" placeholder="Adres"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="city" class="form-label">İl</label>
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
                            <label for="district" class="form-label">İlçe</label>
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
                            <label for="phone" class="form-label">Telefon</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Telefon">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="email" class="form-label">E-posta</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="E-posta">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="viewType" class="form-label">Manzara Türü</label>
                        </div>
                        <div class="col-md-9">
                            <select id="viewType" class="form-select" name="viewType">
                                <option value="" selected>Boş</option>
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
                                <option value="" selected>Boş</option>
                                <option value="Kore Mutfağı">Kore Mutfağı</option>
                                <option value="Meksika Mutfağı">Meksika Mutfağı</option>
                                <option value="Japon Mutfağı">Japon Mutfağı</option>
                                <option value="İtalyan Mutfağı">İtalyan Mutfağı</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="concept" class="form-label">Konsept Türü</label>
                        </div>
                        <div class="col-md-9">
                            <select id="concept" class="form-select" name="concept">
                                <option value="" selected>Boş</option>
                                <option value="İş Yemeği">İş Yemeği</option>
                                <option value="Kutlama">Kutlama</option>
                                <option value="Tek Kişilik">Tek Kişilik</option>
                                <option value="Özel Gün">Özel Gün</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="capacity" class="form-label">Kapasite</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                placeholder="Kapasite">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="image" class="form-label">Resim</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success w-100">Ekle</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="removeRestaurant" tabindex="-1" aria-labelledby="removeRestaurantLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="removeRestaurantLabel">Restorant Sil</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" id="deleteRestaurantForm"
                class="form-horizontal bg-light p-5 rounded-lg shadow-lg custom-form">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="col-md-12">
                        <label for="restaurantName" class="form-label">Lütfen silmek istediğiniz restorantın adını
                            giriniz.</label>
                        <input class="form-control" type="text" name="name" id="restaurantName" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Update Modal-->
<div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="updateRestaurantLabel">Restorant Güncelle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateRestaurantForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mt-3 mt-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Mevcut Restoran Adı</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Mevcut Restoran Adı" required>
                        </div>
                        <div class="col-md-6">
                            <label for="newName" class="form-label">Yeni Restoran Adı</label>
                            <input type="text" class="form-control" id="newName" name="newName"
                                placeholder="Yeni Restoran Adı" required>
                        </div>
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label">Yeni Açıklama</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Açıklama"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12">
                            <label for="address" class="form-label">Yeni Adres</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Adres"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Yeni Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Telefon">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Yeni E-posta</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="E-posta">
                        </div>
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-6">
                            <label for="capacity" class="form-label">Yeni Kapasite</label>
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                placeholder="Kapasite">
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label">Yeni Resim</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>
