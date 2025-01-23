<div class="container">
    @if (session()->get('role') == 'admin')
        <h1 class="mb-3">Tüm Restoranlar</h1>
    @elseif (session()->get('role') == 'restaurantOwner')
        <h1 class="mb-3">Restoranlarım</h1>
    @endif
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($restaurants as $restaurant)
            <div class="col">
                <div class="restaurant-card position-relative">
                    <a href="{{ route('restaurant.analiz', $restaurant['restaurantID']) }}">
                        <img src="{{ $restaurant['image'] }}" alt="RestaurantImg" class="img-fluid rounded">
                    </a>
                    <div class="restaurant-card-body">
                        <h5>{{ $restaurant['name'] }}</h5>
                        <p>📍{{ $restaurant['cities']['name'] }} {{ $restaurant['districts']['name'] }}</p>
                        <button class="btn btn-warning updateRestaurantBtn" data-bs-toggle="modal"
                            data-bs-target="#updateRestaurant" data-restaurantid="{{ $restaurant['restaurantID'] }}"
                            data-restaurantname="{{ $restaurant['name'] }}"
                            data-restaurantdescription="{{ $restaurant['description'] }}"
                            data-restaurantaddress="{{ $restaurant['address'] }}"
                            data-restaurantphone="{{ $restaurant['phone'] }}"
                            data-restaurantemail="{{ $restaurant['email'] }}"
                            data-restaurantcapacity="{{ $restaurant['capacity'] }}">Restoran Güncelle</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Güncelleme Modal'ı -->
<div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="updateRestaurantLabel">Restoran Güncelle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateRestaurantForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="restaurantID" name="restaurantID">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="newName" class="form-label"><b>*</b>Yeni Restoran Adı</label>
                            <input type="text" class="form-control" id="newName" name="newName"
                                placeholder="Yeni Restoran Adı" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label"><b>*</b>Yeni Açıklama</label>
                            <textarea class="form-control" id="description" name="description"
                                placeholder="Açıklama"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="address" class="form-label"><b>*</b>Yeni Adres</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Adres"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label"><b>*</b>Yeni Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label"><b>*</b>Yeni E-posta</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-posta">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="capacity" class="form-label"><b>*</b>Yeni Kapasite</label>
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                placeholder="Kapasite">
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label"><b>*</b>Yeni Resim</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                </div>
                <p class="form-text" style="margin-left: 1rem">* ile işaretli alanlar zorunludur</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>