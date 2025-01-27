<!-- Bootstrap CDN for Styling -->

<!-- Custom CSS for Styling -->
<style>
    body {
        background-color: #f4f6f9;
        font-family: Arial, sans-serif;
        margin-left: 250px;
    }

    .container {
        width: calc(100vw - 200px);
        padding: 20px;
    }


    .dashboard-header {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: #ed4f15;
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .dashboard-header .logo {
        max-width: 100%;

        align-items: center;
        justify-content: center;
        margin-bottom: 40px;


    }

    h4 {
        text-align: end;
        font-size: 12px;
    }

    .dashboard-header .logo img {
        max-width: 100%;
        margin-right: 10px;
    }

    .dashboard-header h2 {
        font-size: 24px;
        text-align: center;
        margin: 0;
    }

    .dashboard-header nav {
        display: flex;
        flex-direction: column;
        margin-top: 50px;
    }

    .dashboard-header nav a {
        color: white;
        text-decoration: none;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        transition: background-color 0.2s;
    }

    .dashboard-header nav a:hover {
        background-color: white;
        color: #000;
        border-bottom: 1px solid black;
    }


    .card-container {
        margin-top: 50px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
        gap: 10px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    .card {
        border-radius: 8px;
        background-color: white;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 40px;
        max-width: 250px;
    }

    .card-header {
        background-color: #ed4f15;
        color: white;
        font-weight: bold;
    }

    .card-body {
        max-width: 350px;
    }

    canvas {
        max-width: 100%;
        max-height: 200px;
    }

    #logo:hover {
        cursor: pointer;
    }
</style>

<body>
    @php
        use App\Models\Cities;

        $cities = Cities::getAllCities();
        $districts = Cities::getAllDistricts();
    @endphp

    <!-- Restaurant Add Modal -->
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
                                <textarea class="form-control" id="address" name="address"
                                    placeholder="Adres"></textarea>
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
                                <label for="viewType" class="form-label"><b>*</b>Manzara Türü</label>
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
                                <label for="cuisineType" class="form-label"><b>*</b>Mutfak Türü</label>
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
                        <button id="submitBtn" type="submit" class="btn btn-success w-100">Ekle</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Dashboard Header (Sol Menü) -->
    <div class="dashboard-header">
        <div class="logo">
            <img id="logo" src="{{ asset('img/logo_light.png') }}" alt="Logo">

            @if (session('role') === 'admin')
                <h4>DASHBOARD admin </h4>
            @else
                <h4>DASHBOARD owner </h4>
            @endif
        </div>
        <nav>




            <a href="{{route("controlPanel")}}">Kontrol Paneli</a>
            <button id="addRestaurantBtn" class="btn">Restoran Ekle</button>
            <a href="{{route("home")}}">Çıkış</a>
        </nav>
    </div>
    <script>
        document.getElementById("logo").addEventListener("click", function () {
            window.location.href = "/";
        });
        $('#addRestaurantBtn').on('click', function () {
            $('#addRestaurant').modal('show');
        });

        // Add Restaurant AJAX
        document.addEventListener('DOMContentLoaded', function () {
            const addRestaurantForm = document.getElementById('addRestaurantForm');

            addRestaurantForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                const formData = new FormData(addRestaurantForm);

                const { value: isConfirmed } = await Swal.fire({ // İşlemi yaparken uyarılıyoruz
                    title: 'Emin misiniz?',
                    text: "Yeni bir restoran eklenecek!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Ekle!',
                    cancelButtonText: 'Vazgeç'
                });

                if (isConfirmed) {
                    try {
                        // AJAX isteği
                        const response = await $.ajax({
                            url: '/restaurants/create',
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                        });

                        // Backend işlemi başarılı ise sweetalert ile bilgilendiriliyoruz.
                        await Swal.fire({
                            title: 'Başarılı',
                            text: 'Yeni restoran başarıyla eklendi.',
                            icon: 'success'
                        });

                        location.reload(); // Sayfayı yenile
                    } catch (error) {
                        let errorMessage = 'Bir hata oluştu. Lütfen tekrar deneyin.';
                        if (error.responseJSON && error.responseJSON.errors) {
                            errorMessage = Object.values(error.responseJSON.errors).join('<br>');
                        }

                        await Swal.fire('Hata', errorMessage, 'error');
                    }
                }
            });
        });
    </script>