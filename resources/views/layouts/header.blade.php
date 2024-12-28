<style>
    .header {
        background: linear-gradient(90deg, #df3c00, #ff6600);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin: 1% 2% 0 2%;
        z-index: 1;
    }

    .custom-header {
        border-bottom: none;
        font-family: 'Poppins', sans-serif;
    }

    .custom-link {
        color: #ffffff;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .custom-link:hover {
        background-color: #ffffff;
        color: #ff6600;
        transform: scale(1.1);
    }

    .small-input {
        height: 40px;
        font-size: 16px;
        border-radius: 20px;
        border: 1px solid #ffa726;
        padding: 5px 15px;
    }

    .btn-warning {
        background-color: #ffffff;
        color: #ff6600;
        font-weight: bold;
        border: 1px solid #ff6600;
        border-radius: 20px;
        padding: 10px 20px;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease;
    }

    .btn-warning:hover {
        background-color: #ff6600;
        color: #ffffff;
        transform: scale(1.1);
    }

    .btn-outline-secondary {
        border: none;
        background-color: transparent;
        color: #ffffff;
        transition: color 0.3s ease;
    }

    .btn-outline-secondary:hover {
        color: #ff6600;
    }

    .navbar-toggler {
        border-color: #ffffff;
    }

    .navbar-toggler-icon {
        background-color: #faf8f8;
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
        }

        .navbar-nav {
            flex-direction: column;
            align-items: center;
        }

        .small-input {
            width: 100%;
        }
    }

    .custom-button:active {
        transform: scale(0.95);
    }

    .logo {
        max-width: 100%;
        border: 0.2px solid lightgray;
        border-radius: 10px;
    }
</style>

<header class="header d-flex justify-content-between align-items-center p-3 custom-header">
    <div class="col-md-2 d-flex align-items-center">
        <img src="{{ asset('img/logo_1.jpeg') }}" alt="logo" class="logo ">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/') }}">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/about') }}">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/restaurants') }}">Restoranlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/contact') }}">İletişim</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-block col-md-4">
        <div class="d-flex flex-column align-items-end">
            <div class="mb-2">
                <button type="button" class="btn btn-warning me-2 custom-button">
                    Rezervasyonlarım
                </button>
                <button type="button" class="btn btn-outline-secondary me-2 custom-button">
                    <i class="bi bi-heart"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary custom-button">
                    <i class="bi bi-calendar2-check"></i>
                </button>
            </div>
            <form class="d-flex w-75">
                <input class="form-control me-2 small-input" type="search" placeholder="Arama yapın" aria-label="Search">
                <button class="btn btn-warning btn-sm" type="submit">Ara</button>
            </form>
        </div>
    </div>
</header>
