<style>
    .header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: linear-gradient(90deg, #df3c00, #ff6600);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin: 1% 2% 0 2%;
        transition: all 0.3s ease;
        height: 120px;
    }

    .header.scrolled {
        margin: 0;
        border-radius: 0;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
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
        max-width: 70%;
        border: 0.2px solid lightgray;
        border-radius: 10px;
    }

    .icon-link {
        color: #ffffff;
    }

    svg:hover {
        transform: scale(1.5);
        background-color: #ffffff;
        color: #ff6600;
        border-radius: 5px;
        width: 5%;
        height: 5%;
    }
</style>

{{-- Logo --}}

<header class="header d-flex justify-content-between align-items-center p-3 custom-header">
    <div class="col-md-2 d-flex align-items-center">
        <img src="{{ asset('img/logo_1.jpeg') }}" alt="logo" class="logo">
    </div>

    {{-- Navbar kısmı --}}
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

    {{-- Login kısmı --}}
    <div class="d-block col-md-4">
        <div class="d-flex flex-column align-items-end">
            <div class="mb-2">
                <div class="row mt-3">
                    <div class="col-md-2">
                        <a href="/login" class="icon-link">
                            <svg style="font-size: 150%;" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-person-fill mt-2" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </a>
                        {{-- Register (ÜKayıt ol) --}}
                    </div>
                    <div class="col-md-2">
                        <a href="/register" class="icon-link">
                            <svg style="font-size: 150%;" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-person-check-fill mt-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </a>
                    </div>
                    {{-- Rezervasyonlarım butonu  --}}
                    <div class="col-md-2">
                        <button style="font-size: 90%;" type="button" class="btn btn-warning me-2 custom-button">
                            Rezervasyonlarım
                        </button>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>

                {{-- Arama kısmı --}}

                <form class="d-flex me-5">
                    <input class="form-control me-2 small-input w-75" type="search" placeholder="Arama yapınız"
                        aria-label="Search">
                    <button class="btn btn-warning btn-sm" type="submit">Ara</button>
                </form>
            </div>

        </div>
    </div>
</header>

{{-- Sayfa aşağı doğru hareket etse bile haader kısmı en üstte sabit kalsın diye yazılan kod --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const header = document.querySelector(".header");
        window.addEventListener("scroll", function() {
            if (window.scrollY > 0) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    });
</script>
