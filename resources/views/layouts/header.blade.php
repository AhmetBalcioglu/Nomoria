<header class="d-flex justify-content-between">
    <div class="col-md-2 d-flex">
        <img src="{{ asset('img/logo_task.png') }}" alt="logo" width="100px" height="100px" class="logo">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-center" id="navbarNav d-flex ">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}" style="color: brown"><b>Anasayfa</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}" style="color: brown"><b>Hakkımızda</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}" style="color: brown"><b>Restoranlar</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}" style="color: brown"><b>İletişim</b></a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="d-block col-md-4 justify-content-space-between">
        <div class="juctify-content-end mt-3">
            <button type="button" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    <path
                        d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z" />
                </svg></button>
            <button type="button" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-heart" viewBox="0 0 16 16">
                    <path
                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                </svg></button>
            <button type="button" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
                    <path
                        d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                </svg>
                Rezervasyonlarım</button>
        </div>
        <div>
            <form class="d-flex juctify-content-end mt-2" role="search">
                <input class="form-control me-2 w-50" type="search" placeholder="Search" aria-label="Search">
                <button type="button" class="btn btn-warning">Ara</button>
            </form>
        </div>
    </div>


</header>
