


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


    </script>
