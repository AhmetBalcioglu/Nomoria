<div class="container">
    <h1>{{ $restaurant->name }} Restoran Analiz</h1>
    <p><b>Adres:</b> {{ $restaurant->address }}</p>
    <p><b>Telefon:</b> {{ $restaurant->phone }}</p>
    <p><b>E-posta:</b> {{ $restaurant->email }}</p>
    <hr>
    <h3>Ziyaretçi Analizi</h3>
    <canvas id="myChart" width="400" height="400"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Toplam', 'Günlük', 'Haftalık', 'Aylık'],
            datasets: [{
                data: [
                    {{ $viewStats->total_views }},
                    {{ $viewStats->daily_unique_users }},
                    {{ $viewStats->weekly_unique_users }},
                    {{ $viewStats->monthly_unique_users }}
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
</script>

<div class="container">
    <div class="restaurant-comments card mb-5" style="max-width: 600px; width: 100%;">
        <div class="card-header" style="background-color: #ff5722; color: white;">
            <h2>Yorumlar</h2>
        </div>
        <div class="card-body">
            @foreach($restaurant->comments as $comment)
                <div class="comment mb-3">
                    <p><strong>{{ $comment->user_name }}</strong> -
                        {{ $comment->created_at->format('d.m.Y H:i') }}
                    </p>
                    <p>
                        @for ($i = 0; $i < 5; $i++)
                            <span style="color: {{ $i < $comment->rating ? 'gold' : '#ccc' }}">&#9733;</span>
                        @endfor
                    </p>
                    <p>{{ $comment->comment ?? 'Yorum yok' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .restaurant-comments {
        max-width: 800px;
        /* Genişliği artır */
        width: 100%;
        margin: 0 auto;
    }

    .restaurant-comments .card-header {
        background-color: #ff5722;
        color: white;
        font-size: 24px;
        text-align: center;
    }
</style>