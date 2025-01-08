<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorum Ekle</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container mt-2">
    <h1>Yorum Ekle</h1>
    <form action=" " method="POST" enctype="multipart/form-data" class="form-horizontal bg-light p-5 rounded-lg shadow-lg custom-form">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-sm-3 col-form-label text-dark">Adınız</label>
            <div class="col-sm-9">
                <input type="text" class="form-control custom-input" id="name" name="name" placeholder="Adınızı giriniz" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="comment" class="col-sm-3 col-form-label text-dark">Yorumunuz</label>
            <div class="col-sm-9">
                <textarea class="form-control custom-textarea" id="comment" name="comment" rows="3" placeholder="Yorumunuzu giriniz" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label text-dark">Yıldız Puanı</label>
            <div class="col-sm-9">
                <div id="rating" class="rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <input type="hidden" name="rating" id="rating-value" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-warning btn-lg w-100">Yorum Ekle</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
