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
            <a href="{{route("home")}}">Çıkış</a>
        </nav>
    </div>
    <script>
        document.getElementById("logo").addEventListener("click", function () {
            window.location.href = "/";
        });
    </script>