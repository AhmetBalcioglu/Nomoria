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

</style>


<div class="container">
    <div class="title-dash">
        <h1>Restoran Ziyaretçi Analiz Grafikleri</h1>
    </div>
    <div class="card-container">
        @foreach($viewStats as $index => $stat)
            <div class="card">
                <div class="card-header">
                    {{ $stat->name }} - Ziyaretçi Verileri
                </div>
                <div class="card-body">
                    <!-- Her restoran için bir grafik oluşturuluyor -->
                    <canvas id="myChart{{ $index }}" width="50" height="50"></canvas>
                </div>
            </div>

            <script>
                var ctx = document.getElementById('myChart{{ $index }}').getContext('2d');
                var myChart{{ $index }} = new Chart(ctx, {
                    type: 'bar', // Bar Chart (Çubuk Grafik)
                    data: {
                        labels: ['toplam','Günlük', 'Haftalık', 'Aylık'],
                        datasets: [{

                            data: [
                                {{ $stat->total_views }},
                                {{ $stat->daily_unique_users }},
                                {{ $stat->weekly_unique_users }},
                                {{ $stat->monthly_unique_users }}
                            ],

                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(239,236,233,0.6)',
                                'rgba(255, 159, 64, 0.6)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
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
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


