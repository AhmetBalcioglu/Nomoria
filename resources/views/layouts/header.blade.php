<header class="header d-flex justify-content-between align-items-center px-3 py-2 custom-header">
    <!-- Logo Section -->
    <div class="col-2 d-flex align-items-center">
        <a href="{{ url('/') }}">
            <img id="light-logo" src="{{ asset('img/logo_light.png') }}" alt="Light Logo" class="logo img-fluid">
            <img id="dark-logo" src="{{ asset('img/logo_dark.png') }}" alt="Dark Logo" class="logo img-fluid d-none">
        </a>
    </div>


    {{-- Hamburger menü üç çizgi özellikleri ve ayarlarının yapıldığı kısım --}}
    <nav class="navbar navbar-dark mt-2 overflow-hidden">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


    {{-- Arama Çubuğu --}}
    <form id="searchForm" class="d-flex mt-2" action="{{ route('search') }}" method="GET">
        <input id="searchBar" name="searchBar" class="form-control me-2" type="search"
            placeholder="Aradığın restoranı buraya yazabilirsin" aria-label="Search" style="width: 50rem;">
        <button class="btn btn-light btn-sm" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>

        </button>
    </form>



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
            </ul>
        </div>
    </div>
    {{-- Dark Mode --}}
    <nav class="navbar navbar-dark mt-2">
        <div class="container-fluid">
            <button id="themeToggle" class="navbar-toggler" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-moon-stars" viewBox="0 0 16 16">
                    <path
                        d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286" />
                    <path
                        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Login Section -->
    <div class="col-1 d-flex flex-column align-items-start">


        {{-- login register kısmı --}}
        @if (!session()->has('role'))
            <div class="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill mt-1 mx-1"
                    viewBox="0 0 16 16" data-bs-toggle="dropdown" aria-expanded="false" width="24" height="24">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item processOptions" href="/login">Üye Girişi</a></li>
                    <li><a class="dropdown-item processOptions" href="/register">Kayıt Ol</a></li>
                    @if (!(session()->has('name') && session()->has('surname') && session()->has('role')))
                        <li><a class="dropdown-item processOptions" href="/login">Rezervasyonlarım</a></li>
                    @else
                        <li><a href="{{ route('reservation') }}" class="btn btn-primary custom-button me-2">Rezervasyonlarım</a>
                        </li>
                    @endif
                    {{-- Favorilerim --}}
                    @if (!(session()->has('name') && session()->has('surname') && session()->has('role')))
                        <li><a class="dropdown-item processOptions" href="/login">Favorilerim</a></li>
                    @else
                        <li><a href="{{ route('favorites') }}" class="btn btn-secondary custom-button me-2">Favorilerim</a></li>
                    @endif
                </ul>

            </div>
        @endif

        {{-- Loginden sonra kullanıcı adının yazıldığı kısım --}}

        @if (session()->has('name') && session()->has('surname') && session()->has('role'))
            <div class="dropdown text-center">
                <img src="{{ session()->has('gender') && session()->get('gender') == 'Kadın' ? '/img/she_icon.png' : '/img/he_icon.png' }}"
                    alt="User Icon" class="img-fluid w-25 h-25" data-bs-toggle="dropdown" aria-expanded="false"
                    style="cursor: pointer; display: block; margin: 0 auto;">

                <h6 class="mt-2">{{ session()->get('name') }} {{ session()->get('surname') }}</h6>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Hesabım</a></li>
                    @if (session('role') == 'admin' || session('role') == 'restaurantOwner')
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Restoran İşlemleri(Dashboard)</a></li>
                    @endif
                    <li><a class="dropdown-item" href="/favorites">Favorilerim</a></li>
                    <li><a class="dropdown-item" href="{{ route('reservations') }}">Rezervasyonlarım</a></li>
                    <li><a class="dropdown-item" href="/historyRezervations">Geçmiş Rezervasyonlarım</a></li>
                    <li> <a href="{{ route('logout') }}" class="btn btn-danger custom-button me-2 information">Çıkış
                            Yap</a></li>
                </ul>

            </div>
        @endif
    </div>

    </div>

</header>


{{-- search kısmı script kodu --}}
<script>
    document.getElementById('searchForm').addEventListener('submit', function (event) {
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