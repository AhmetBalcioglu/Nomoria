<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ürün Kartları</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 15px;
            /* Kartlar arasındaki boşluk */
            padding: 20px;
        }

        .product-card {
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 200px;
            /* Kart genişliğini küçültüyoruz */
            transition: transform 0.3s ease;
        }

        .product-card img {
            width: 100%;
            height: auto;
            max-width: 120px;
            /* Görsel boyutunu küçültüyoruz */
            margin-bottom: 10px;
        }

        .product-card h5 {
            font-size: 16px;
            /* Başlık boyutunu küçültüyoruz */
            margin-bottom: 10px;
        }

        .product-card p {
            font-size: 12px;
            /* Açıklama fontunu küçültüyoruz */
            color: #777;
            margin-bottom: 15px;
        }

        .product-card button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            /* Buton boyutunu küçültüyoruz */
            border-radius: 4px;
            cursor: pointer;
        }

        .product-card button:hover {
            background-color: #0056b3;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="product-card">
            <img src="product1.jpg" alt="Ürün 1" />
            <h5>Ürün 1</h5>
            <p>Ürün açıklaması burada yer alacak.</p>
            <button class="btn btn-primary">Sepete Ekle</button>
        </div>
        <div class="product-card">
            <img src="product2.jpg" alt="Ürün 2" />
            <h5>Ürün 2</h5>
            <p>Ürün açıklaması burada yer alacak.</p>
            <button class="btn btn-primary">Sepete Ekle</button>
        </div>
        <div class="product-card">
            <img src="product3.jpg" alt="Ürün 3" />
            <h5>Ürün 3</h5>
            <p>Ürün açıklaması burada yer alacak.</p>
            <button class="btn btn-primary">Sepete Ekle</button>
        </div>
    </div>
</body>

</html>
