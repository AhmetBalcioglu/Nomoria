<header class="header d-flex justify-content-between align-items-center p-3 custom-header">
    <!-- Logo Section -->
    <div class="col-md-2 col-4 d-flex align-items-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo_1.jpeg') }}" alt="logo" class="logo img-fluid">
        </a>
    </div>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
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

    <!-- Login Section -->
    <div class="d-block col-md-4 col-8">
        <div class="d-flex flex-column align-items-end">
            <div class="mb-2">
                <div class="row mt-3">
                    <!-- Rezervasyonlarım button and icon -->
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-end">
                            <button style="font-size: 90%;" type="button" class="btn btn-warning custom-button me-2">
                                Rezervasyonlarım
                            </button>
                            <button style="font-size: 90%;" type="button" class="btn btn-warning custom-button me-2">
                                Favorilerim
                            </button>
                            <div class="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill mt-2 mx-1 process" 
                                     viewBox="0 0 16 16" data-bs-toggle="dropdown" aria-expanded="false">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item processOptions" href="/login">Giriş Yap</a></li>
                                    <li><a class="dropdown-item processOptions" href="/register">Kayıt Ol</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>

                <!-- Search Section -->
                <form class="d-flex me-5">
                    <input id="searchBar" name="searchBar" class="form-control me-2 small-input w-75" type="search"
                           placeholder="Arama yapın" aria-label="Search">
                    <button class="btn btn-warning btn-sm" type="submit">Ara</button>
                </form>
            </div>
        </div>
    </div>
</header>
