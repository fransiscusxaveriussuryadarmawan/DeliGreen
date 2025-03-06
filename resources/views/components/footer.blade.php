<!-- resources/views/partials/footer.blade.php -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Tentang Kami -->
            <div class="col-md-6 col-lg-3">
                <h5 class="text-success mb-3">DeliGreen</h5>
                <p class="small">
                    Komitmen kami menyajikan makanan sehat dengan bahan organik berkualitas tinggi.
                    Pesan sekarang dan rasakan manfaatnya!
                </p>
                <div class="d-flex gap-2">
                    <span class="badge bg-success">Halal</span>
                    <span class="badge bg-success">Organik</span>
                </div>
            </div>

            <!-- Link Cepat -->
            <div class="col-md-6 col-lg-3">
                <h5 class="text-success mb-3">Navigasi</h5>
                <ul class="list-unstyled">
                    <li><a href="/menu" class="text-white text-decoration-none small mb-2 d-block">Menu</a></li>
                    <li><a href="/promo" class="text-white text-decoration-none small mb-2 d-block">Promo</a></li>
                    <li><a href="/about" class="text-white text-decoration-none small mb-2 d-block">Tentang Kami</a></li>
                    <li><a href="/terms" class="text-white text-decoration-none small mb-2 d-block">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-6 col-lg-3">
                <h5 class="text-success mb-3">Hubungi Kami</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt-fill text-success me-2"></i>
                        <span class="small">Jl. Sehat No. 123, Jakarta</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-telephone-fill text-success me-2"></i>
                        <span class="small">(021) 555-1234</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope-fill text-success me-2"></i>
                        <span class="small">hello@deligreen.id</span>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="col-md-6 col-lg-3">
                <h5 class="text-success mb-3">Update Promo</h5>
                <form>
                    <div class="input-group">
                        <input type="email" class="form-control form-control-sm" placeholder="Email Anda">
                        <button class="btn btn-success btn-sm">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                    <p class="small text-muted mt-2">Dapatkan diskon 15% untuk subscriber pertama!</p>
                </form>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="border-top border-secondary">
        <div class="container py-3">
            <div class="d-md-flex justify-content-between align-items-center">
                <span class="small text-muted">&copy; {{ date('Y') }} DeliGreen. All rights reserved</span>
                <div class="mt-2 mt-md-0">
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>