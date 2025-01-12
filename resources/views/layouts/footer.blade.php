<footer class="custom-footer text-white">
    <div class="container">
        <div class="row align-items-center">
            <!-- Sol Bölüm: Logo ve İsim -->
            <div class="col-md-4 text-center text-md-start mb-2 mb-md-0">
                <div class="footer-logo d-flex align-items-center justify-content-center justify-content-md-start mt-5">
                    <img src="{{ asset('img/logo_1.jpeg') }}" alt="Logo" class="img-fluid me-2" style="height: 5rem;">
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
                    <a href="https://x.com" target="_blank" class="footer-social" aria-label="X">
                        <i class="bi bi-x"></i>
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
                <small>© 2025 Nomoria. Tüm Hakları Saklıdır. | <a href="#privacy" class="footer-link">Gizlilik
                        Politikası</a></small>
            </div>
        </div>
    </div>
</footer>
