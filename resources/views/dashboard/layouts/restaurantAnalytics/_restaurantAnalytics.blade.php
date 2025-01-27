<div class="container mt-5">
    <h1>Restoran: {{ $restaurant->name }}</h1>
    <p>Toplam Görüntülenme: {{ $viewStats->total_views }}</p>
    <p>Günlük Benzersiz Kullanıcılar: {{ $viewStats->daily_unique_users }}</p>
    <p>Haftalık Benzersiz Kullanıcılar: {{ $viewStats->weekly_unique_users }}</p>
    <p>Aylık Benzersiz Kullanıcılar: {{ $viewStats->monthly_unique_users }}</p>


    <h3>Toplam Görüntülenmeler</h3>
    <canvas id="totalChart" style="height: 400px;"></canvas>


    <h3>Günlük Görüntülenmeler</h3>
    <canvas id="dailyChart" style="height: 200px;"></canvas>


    <h3>Haftalık Görüntülenmeler</h3>
    <canvas id="weeklyChart" style="height: 200px;"></canvas>


    <h3>Aylık Görüntülenmeler</h3>
    <canvas id="monthlyChart" style="height: 200px;"></canvas>

    <a href="{{ route('analytics', ['restaurantID' => $restaurantID]) }}" class="btn btn-primary">
        Verileri Güncelle
    </a>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    const totalData = @json($dailyData);
    const ctxTotal = document.getElementById('totalChart').getContext('2d');
    new Chart(ctxTotal, {
        type: 'line',
        data: {
            labels: Object.keys(totalData),
            datasets: [{
                label: 'Toplam Görüntülenmeler',
                data: Object.values(totalData),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    const dailyData = @json($dailyData);
    const ctxDaily = document.getElementById('dailyChart').getContext('2d');
    new Chart(ctxDaily, {
        type: 'line',
        data: {
            labels: Object.keys(dailyData),
            datasets: [{
                label: 'Günlük Görüntülenmeler',
                data: Object.values(dailyData),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    const weeklyData = @json($weeklyData);
    const ctxWeekly = document.getElementById('weeklyChart').getContext('2d');
    new Chart(ctxWeekly, {
        type: 'line',
        data: {
            labels: Object.keys(weeklyData),
            datasets: [{
                label: 'Haftalık Görüntülenmeler',
                data: Object.values(weeklyData),
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    const monthlyData = @json($monthlyData);
    const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
    new Chart(ctxMonthly, {
        type: 'line',
        data: {
            labels: Object.keys(monthlyData),
            datasets: [{
                label: 'Aylık Görüntülenmeler',
                data: Object.values(monthlyData),
                borderColor: 'rgba(255, 159, 64, 1)',
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>