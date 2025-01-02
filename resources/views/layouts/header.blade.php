{{-- Logo --}}
<header class="header d-flex justify-content-between align-items-center p-3 custom-header">
    <div class="col-md-2 d-flex align-items-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo_1.jpeg') }}" alt="logo" class="logo">
        </a>
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

                        {{-- Register (Kayıt ol) --}}
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
                    <input id="searchBar" name="searchBar" class="form-control me-2 small-input w-75" type="search"
                        placeholder="Arama yapın" aria-label="Search">
                    <button class="btn btn-warning btn-sm" type="submit">Ara</button>
                </form>
            </div>

        </div>
    </div>
</header>
