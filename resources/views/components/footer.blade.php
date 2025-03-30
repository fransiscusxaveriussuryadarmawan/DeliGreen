<footer class="footer mt-auto py-4 bg-dark text-white">
    <div class="container">
        <div class="row">
            <!-- Brand Info -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="fw-bold text-primary mb-3">DeliGreen</h5>
                <p class="mb-2">Healthy food delivery system for better lifestyle.</p>
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="fw-bold text-primary mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('admin.foods.index') }}" class="text-white text-decoration-none">Food Menu</a></li>
                    <li class="mb-2"><a href="{{ route('admin.categories.index') }}" class="text-white text-decoration-none">Categories</a></li>
                    <li class="mb-2"><a href="{{ route('admin.orders.index') }}" class="text-white text-decoration-none">Orders</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-md-4">
                <h5 class="fw-bold text-primary mb-3">Contact Us</h5>
                <p><i class="fas fa-envelope me-2"></i> hello@deligreen.id</p>
                <p><i class="fas fa-phone me-2"></i> (123) 456-7890</p>
                <p><i class="fas fa-map-marker-alt me-2"></i> Surabaya, Indonesia</p>
            </div>
        </div>
        
        <!-- Copyright -->
        <hr class="my-4 bg-light opacity-25">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">&copy; 2025 DeliGreen. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-white text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>