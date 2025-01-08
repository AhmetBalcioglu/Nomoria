<div class="container container1 mt-3 mb-5">

    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal bg-light p-5 rounded-lg shadow-lg custom-form">
        @csrf

        <div class="row mb-3">
            <h1 class="text-center text-dark">Restoran Ekle</h1>
            <label for="name" class="col-sm-3 col-form-label text-dark">Restoran Adı</label>
            <div class="col-sm-9">
                <input type="text" class="form-control custom-input" id="name" name="name" placeholder="Restoran adını giriniz" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="address" class="col-sm-3 col-form-label text-dark">Adres</label>
            <div class="col-sm-9">
                <textarea class="form-control custom-textarea" id="address" name="address" rows="3" placeholder="Adres giriniz" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="phone" class="col-sm-3 col-form-label text-dark">Telefon</label>
            <div class="col-sm-9">
                <input type="tel" class="form-control custom-input" id="phone" name="phone" placeholder="Telefon numarasını giriniz" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="category" class="col-sm-3 col-form-label text-dark">Kategori</label>
            <div class="col-sm-9">
                <select class="form-select custom-select" id="category" name="category" required>
                    <option value="" disabled selected>Kategori Seçiniz</option>
                    <option value="japon-mutfagi">Japon Mutfağı</option>
                    <option value="kore-mutfagi">Kore Mutfağı</option>
                    <option value="dogu-anadolu-mutfagi">Doğu Anadolu Mutfağı</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label text-dark">Restoran Detayları</label>
            <div class="col-sm-9">
                <div id="details-container">
                    <div class="d-flex align-items-center mb-3">
                        <select class="form-select custom-select me-2" name="details[]">
                            <option value="sertifika">Sertifika Ekle</option>
                            <option value="menu">Menü Ekle</option>
                            <option value="diger">Diğer</option>
                        </select>
                        <input type="file" class="form-control custom-input" name="files[]" accept=".jpg,.png,.pdf">
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" id="add-detail">
                    + Detay Ekle
                </button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-warning btn-lg w-100">Ekle</button>
            </div>
        </div>
    </form>
</div>
