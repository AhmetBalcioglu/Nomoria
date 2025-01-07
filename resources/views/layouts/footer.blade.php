
</div>
<footer class="custom-footer text-white ">
    <div class="container">
        <div class="row align-items-center">
            <!-- Sol Bölüm: Logo ve İsim -->
            <div class="col-md-4 text-center text-md-start mb-2 mb-md-0 ">
                <div class="footer-logo d-flex align-items-center justify-content-center justify-content-md-start text-center mt5">
                    <img src="{{ asset('img/logo_1.jpeg') }}" alt="Logo" class="img-fluid me-2" style="height: 3rem;">

                </div>
                <p class="mt-2">Hayatınıza lezzet katıyoruz!</p>
            </div>

            <!-- Orta Bölüm: Menü -->
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <ul class="footer-menu list-unstyled d-flex justify-content-center gap-4 m-0">
                    <li><a href="{{ url('/about') }}" class="footer-link">Hakkımızda</a></li>
                    <li><a href="{{ url('/') }}" class="footer-link">Menü</a></li>
                    <li><a href="{{ url('/contact') }}" class="footer-link">İletişim</a></li>
                </ul>
            </div>

            <!-- Sağ Bölüm: Sosyal Medya -->
            <div class="col-md-4 text-center text-md-end">
                <div class="social-icons d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="https://facebook.com" target="_blank" class="footer-social" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="footer-social" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="footer-social" aria-label="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="footer-social" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Alt Kısım -->
        <div class="row mt-4">
            <div class="col text-center">
                <small>© 2025 Nomoria. Tüm Hakları Saklıdır. | <a href="#privacy" class="footer-link">Gizlilik Politikası</a></small>
            </div>
        </div>
    </div>
</footer>

<style>
    .custom-footer {

        background-color: #1b1b1b;
        border-top: 5px solid #f46c2c;
    }
    .footer-logo {
    ;
    }
    .footer-logo h3 {
        color: #f46c2c;
        font-weight: bold;
        font-family: 'Poppins', sans-serif;
    }

    .footer-menu {
        font-size: 1rem;
    }

    .footer-link {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: #f46c2c;
    }

    .social-icons i {
        font-size: 1.5rem;
        color: #ffffff;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .footer-social:hover i {
        color: #f46c2c;
        transform: scale(1.2);
    }

    .custom-footer p, .custom-footer small {
        font-size: 0.9rem;
        color: #b3b3b3;
    }
</style>
