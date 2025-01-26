<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran Yönetim Paneli</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Genel Stil */
        .controlPanel-body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .restaurant-card {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .restaurant-info {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
        }

        .restaurant-info img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .restaurant-details {
            flex: 1;
        }

        .restaurant-details h2 {
            font-size: 18px;
            margin: 0 0 5px;
        }

        .restaurant-details p {
            font-size: 14px;
            color: #666;
            margin: 0 0 10px;
        }

        .restaurant-buttons button {
            font-size: 14px;
            padding: 8px 12px;
            margin-bottom: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .update-btn {
            background-color: #007bff;
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .analysis-panel {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 15px;
            border-left: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 0 10px 10px 0;
        }

        .analysis-panel .chart-placeholder {
            height: 100px;
            background-color: #f4f4f4;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .analysis-panel button {
            background-color: #ed4f15;
            color: white;
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .analysis-panel button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body class="controlPanel-body">
<div class="container">
    @foreach($restaurants as $restaurant)
        <div class="restaurant-card">
            <!-- Sol taraf: Restoran bilgisi -->
            <div class="restaurant-info">
                <img src="{{ $restaurant->image }}" alt="Restoran Görseli">
                <div class="restaurant-details">
                    <h2>{{ $restaurant->name }}</h2>
                    <p>{{ $restaurant->address }}</p>
                    <div class="restaurant-buttons">
                        <button class="update-btn">Restoranı Güncelle</button>
                        <button class="delete-btn">Restoranı Sil</button>
                    </div>
                </div>
            </div>

            <!-- Sağ taraf: Analiz paneli -->
            <div class="analysis-panel">
                <div class="chart-placeholder">
                    <canvas id="chart-{{ $restaurant->restaurantID }}" width="150" height="100"></canvas>
                </div>

                <button onclick="window.location.href='{{ route('analytics', ['restaurantID' => $restaurant->restaurantID]) }}'" class="btn btn-success">
                    Analiz Görüntüle
                </button>





            </div>
        </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        @foreach($restaurants as $restaurant)
        const ctx{{ $restaurant->restaurantID }} = document.getElementById('chart-{{ $restaurant->restaurantID }}').getContext('2d');
        new Chart(ctx{{ $restaurant->restaurantID }}, {
            type: 'bar',
            data: {
                labels: ['Toplam', 'Günlük', 'Haftalık', 'Aylık'],
                datasets: [{
                    data: [
                        {{ $restaurant->total_views ?? 0 }},
                        {{ $restaurant->daily_unique_users ?? 0 }},
                        {{ $restaurant->weekly_unique_users ?? 0 }},
                        {{ $restaurant->monthly_unique_users ?? 0 }}
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        @endforeach
    });
</script>
</body>
</html>
