<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}
?>

<?php require 'partials/header.php'; ?>
<?php require 'partials/nav.php'; ?>

<section id="home" class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 fw-bold">WELCOME TO OUR HOMECAFE</h1>
            <p class="lead mb-5">Taste the deliciousness of our handcrafted desserts and drinks.</p>
        </div>
    </section>

    <section id="about" class="about-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">About Ny.Cakeu</h2>
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <p><strong>Ny.Cakeu is a homecafé that has been serving handcrafted desserts and drinks since 2021.</strong> Made with love in every process, we focus on quality, comfort, and authenticity.</p>
                    <p>All of our products are freshly made <strong>without preservatives</strong>, so you can enjoy every bite with peace of mind.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="call-us" class="call-us-section py-5 text-center">
        <div class="container">
            <h2>Need a Quick Order? Call Us!</h2>
            <p class="lead">We are ready to take your orders now.</p>
            <a href="tel:+628123456789" class="btn btn-lg btn-primary btn-call-now shadow-lg">
                <i class="fas fa-phone-alt me-2"></i> Call Now (+62 812-3456-789)
            </a>
            <p class="mt-3 text-muted">Available from 9 AM to 9 PM (WIB)</p>
        </div>
    </section>

   
    <section id="portfolio" class="portfolio-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">Dessert</h2>

            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="cheesecake.jpg" class="card-img-top" alt="Burnt Cheesecake Original">
                        <div class="card-body">
                            <h5 class="card-title">Burnt Cheesecake OG</h5>
                            <p class="card-text">Creamy layers with a gentle richness.</p>
                            <div class="product-price">Rp 45.000</div>
                            <button class="btn btn-primary w-100 add-to-cart" data-name="Burnt Cheesecake OG" data-price="45000">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="cookies.jpg" class="card-img-top" alt="Freshly Baked Cookies">
                        <div class="card-body">
                            <h5 class="card-title">Cookies</h5>
                            <p class="card-text">Freshly baked soft cookies.</p>
                            <div class="product-price">Rp 12.000</div>
                            <button class="btn btn-primary w-100 add-to-cart" data-name="Cookies" data-price="12000">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="chocolate.jpg" class="card-img-top" alt="Chocolate Fudge Cake">
                        <div class="card-body">
                            <h5 class="card-title">Chocolate Fudge Decadence</h5>
                            <p class="card-text">Rich cake with fudge frosting.</p>
                            <div class="product-price">Rp 47.000</div>
                            <button class="btn btn-primary w-100 add-to-cart" data-name="Chocolate Fudge" data-price="47000">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>

          
            <h2 class="text-center my-5">Drinks</h2>

            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="matcha.jpg" class="card-img-top" alt="Matcha Latte">
                        <div class="card-body">
                            <h5 class="card-title">Matcha Latte</h5>
                            <p class="card-text">Ceremonial-grade matcha with milk.</p>
                            <div class="product-price">Rp 45.000</div>
                            <button class="btn btn-primary w-100 add-to-cart" data-name="Matcha Latte" data-price="45000">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="coffee.jpg" class="card-img-top" alt="Coffee Latte">
                        <div class="card-body">
                            <h5 class="card-title">Coffee Latte</h5>
                            <p class="card-text">Smooth espresso with milk.</p>
                            <div class="product-price">Rp 32.000</div>
                            <button class="btn btn-primary w-100 add-to-cart" data-name="Coffee Latte" data-price="32000">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="hot_chocolate.jpg" class="card-img-top" alt="Premium Chocolate Latte">
                        <div class="card-body">
                            <h5 class="card-title">Premium Chocolate Latte</h5>
                            <p class="card-text">Velvety premium cocoa blend.</p>
                            <div class="product-price">Rp 45.000</div>
                            <button class="btn btn-primary w-100 add-to-cart" data-name="Premium Chocolate Latte" data-price="45000">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    
    <section id="contact" class="contact-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">Contact Us</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form id="contactForm" class="p-4 border rounded shadow-sm">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message / Address</label>
                            <textarea class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-kirim w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section id="cart" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Your Cart 🛍</h2>
            <ul id="cartItems" class="list-group mb-3"></ul>
            <p class="fw-bold text-end fs-5">Total: <span id="cartTotal">Rp 0</span></p>
        </div>
    </section>

<?php require 'partials/footer.php'; ?>
<?php require 'partials/scripts.php'; ?>