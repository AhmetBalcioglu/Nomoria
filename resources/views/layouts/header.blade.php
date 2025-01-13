<header class="header d-flex justify-content-between align-items-center px-3 py-2 custom-header">
    <!-- Logo Section -->
    <div class="col-2 d-flex align-items-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo_2.png') }}" alt="logo" class="logo img-fluid">
        </a>
    </div>
    <!-- Navbar Section -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light">
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
                    <a class="nav-link custom-link" href="{{ url('/details') }}">Restoranlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/contact') }}">İletişim</a>
                </li>
                @if (session()->has('name') && session()->has('surname') && session()->has('role') && (session()->get('role') == 'admin' || session()->get('role') == 'restaurant'))
                    <li class="nav-item">
                        <a class="nav-link custom-link" href="{{ route('adminPanel') }}">Admin Panel</a>
                    </li>
                @endif

            </ul>
        </div>
    </nav> --}}


    {{-- Navbbar hamburger solda açılır menü --}}
    {{-- <nav class="navbar fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start custom-offcanvas" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menü</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Anasayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Restoranlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yardım ve Destek</a>
                        </li>

                        {{-- Login olduktan sonra menüye  gelen admin paneli kısmı --}}
    {{-- @if (session()->has('name') && session()->has('surname') && session()->has('role') && (session()->get('role') == 'admin' || session()->get('role') == 'restaurant'))
                            <li class="nav-item">
                                <a class="nav-link custom-link" href="{{ route('adminPanel') }}">Admin Panel</a>
                            </li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </nav>  --}}


    {{-- Hamburgerr menüü --}}
    {{-- <div class="collapse mt-4" id="navbarToggleExternalContent" data-bs-theme="secondary">
        <div class="p-4">

            <ul class="navbar-nav d-flex flex-row justify-content-start pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Restoranlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Yardım ve Destek</a>
                </li>

                @if (session()->has('name') && session()->has('surname') && session()->has('role') && (session()->get('role') == 'admin' || session()->get('role') == 'restaurant'))
                    <li class="nav-item">
                        <a class="nav-link custom-link" href="{{ route('adminPanel') }}">Admin Panel</a>
                    </li>
                @endif

            </ul>
        </div>
    </div> --}}

    {{-- Hamburger menü üç çizgi özellikleri ve ayarlarının yapıldığı kısım --}}
    {{-- <nav class="navbar navbar-dark border-radius border-color:white" style="margin-right:10px; ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> --}}
    {{-- 
    <form id="searchForm" class="d-flex mt-2" action="{{ route('search') }}" method="GET">
        <input id="searchBar" name="searchBar" class="form-control me-2" type="search"
            placeholder="Restoran Arayabilirsiniz" aria-label="Search" style="width: 70rem;">
        <button class="btn btn-secondary btn-sm" type="submit">Ara</button>
    </form> --}}


    {{-- Arama Çubuğu --}}
    <form id="searchForm" class="d-flex mt-2" action="{{ route('search') }}" method="GET">
        <input id="searchBar" name="searchBar" class="form-control me-2" type="search"
            placeholder="Aradığın restoranı buraya yazabilirsin" aria-label="Search" style="width: 70rem;">
        <button class="btn btn-light btn-sm" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-search" viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>

        </button>
    </form>

    {{-- Hamburger menü üç çizgi özellikleri ve ayarlarının yapıldığı kısım --}}
    <nav class="navbar navbar-dark mt-2">
        <div class="container-fluid ">
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    {{-- Hamburger Menü İçeriği --}}
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="p-4" style="background-color: #f8f9fa; border: 1px solid #ddd;">
            <ul class="navbar-nav d-flex flex-row justify-content-start pe-3">
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/') }}">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/details') }}">

                        Restoranlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="{{ url('/contact') }}">Yardım ve Destek</a>
                </li>
                @if (session()->has('name') &&
                        session()->has('surname') &&
                        session()->has('role') &&
                        (session()->get('role') == 'admin' || session()->get('role') == 'restaurant'))
                    <li class="nav-item">
                        <a class="nav-link custom-link" href="{{ route('adminPanel') }}">Admin Panel</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    {{-- Dark Mode --}}
    <nav class="navbar navbar-dark mt-2">
        <div class="container-fluid ">
            <button class="navbar-toggler " type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-moon-stars" viewBox="0 0 16 16">
                    <path
                        d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286" />
                    <path
                        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                </svg>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item processOptions">Dark Mode</a></li>
                <li><a class="dropdown-item processOptions">Light Mode</a></li>
            </ul>

        </div>
    </nav>




    <!-- Login Section -->
    <div class="col-1 d-flex flex-column align-items-start">
        {{-- <div class="d-flex align-items-center justify-content-end">
            @if (!(session()->has('name') && session()->has('surname') && session()->has('role')))
                <button class="btn btn-primary custom-button me-2">Rezervasyonlarım</button>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary custom-button me-2">Rezervasyonlarım</a>
            @endif

            @if (!(session()->has('name') && session()->has('surname') && session()->has('role')))
                <a class="btn btn-secondary custom-button me-2">Favorilerim</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-secondary custom-button me-2">Favorilerim</a>
            @endif --}}



        {{-- login register kısmı --}}
        @if (!session()->has('role'))
            <div class="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill mt-1 mx-1"
                    viewBox="0 0 16 16" data-bs-toggle="dropdown" aria-expanded="false" width="24" height="24">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item processOptions" href="/login">Giriş Yap</a></li>
                    <li><a class="dropdown-item processOptions" href="/register">Kayıt Ol</a></li>
                    <li>
                        @if (!(session()->has('name') && session()->has('surname') && session()->has('role')))
                            <button class="btn btn-primary custom-button me-2">Rezervasyonlarım</button>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-primary custom-button me-2">Rezervasyonlarım</a>
                        @endif

                    </li>
                    <li>

                        @if (!(session()->has('name') && session()->has('surname') && session()->has('role')))
                            <a class="btn btn-secondary custom-button me-2">Favorilerim</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary custom-button me-2">Favorilerim</a>
                        @endif
                    </li>
                </ul>
            </div>
        @endif

        {{-- Loginden sonra kullanıcı adının yazıldığı kısım --}}
        @if (session()->has('name') && session()->has('surname') && session()->has('role'))
            <a href="{{ route('logout') }}" class="btn btn-secondary custom-button me-2 information">Çıkış Yap</a>
            <h3>{{ session()->get('name') }} {{ session()->get('surname') }}</h3>
        @endif
    </div>

    </div>

</header>


{{-- searc kısmı script kodu --}}
<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        const searchInput = document.getElementById('searchBar').value.trim();

        if (!searchInput) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Hata!',
                text: 'Arama kutusu boş olamaz!',
            });
        }
    });
</script>
