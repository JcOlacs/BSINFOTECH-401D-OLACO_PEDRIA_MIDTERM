<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Yummy Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Ice cream yummy</h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#menu">Menu</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('products.admin') }}">Admin Login</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Order Now<br>Nomnom Later</h1>
                        <p data-aos="fade-up" data-aos-delay="100">A laravel C.R.U.D Food Menu Website</p>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                            <a href="#book-a-table" class="btn-get-started">Order now</a>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section>
        <!-- /Hero Section -->

        <!-- Menu Section -->
        <section id="menu" class="menu section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Menu</h2>
                <p>
                    <span>Check Our</span>
                    <span class="description-title">Yummy Menu</span>
                </p>
            </div><!-- End Section Title -->

            <div class="container">

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-desserts">
                            <h4>Desserts</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                            <h4>Breakfast</h4>
                        </a><!-- End tab nav item -->

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                            <h4>Lunch</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                            <h4>Dinner</h4>
                        </a>
                    </li><!-- End tab nav item -->

                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="menu-desserts">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Desserts</h3>
                        </div>

                        <div class="row gy-5">

                            @if ($desserts->count() > 0)
                                @foreach ($desserts as $dessert)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ asset($dessert->image) }}" class="glightbox">
                                            <img src="{{ asset($dessert->image) }}"
                                                class="menu-img img-fluid" alt="">
                                        </a>
                                        <h4>{{ $dessert->name }}</h4>
                                        <p class="ingredients"> {{ $dessert->description }} </p>
                                        <p class="price"> ₱{{ $dessert->price }} </p>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <p>Dessert is not available on the menu</p>
                                </div>
                            @endif

                        </div>
                    </div>
                    <!-- End Starter Menu Content -->

                    <div class="tab-pane fade" id="menu-breakfast">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Breakfast</h3>
                        </div>

                        <div class="row gy-5">

                            @if ($breakfasts->count() > 0)
                                @foreach ($breakfasts as $breakfast)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ asset($breakfast->image) }}" class="glightbox">
                                            <img src="{{ asset($breakfast->image) }}" class="menu-img img-fluid"
                                                alt="">
                                        </a>
                                        <h4>{{ $breakfast->name }}</h4>
                                        <p class="ingredients"> {{ $breakfast->description }} </p>
                                        <p class="price"> ₱{{ $breakfast->price }} </p>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <p>Breakfast is not available on the menu</p>
                                </div>
                            @endif

                        </div>
                    </div><!-- End Breakfast Menu Content -->

                    <div class="tab-pane fade" id="menu-lunch">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Lunch</h3>
                        </div>

                        <div class="row gy-5">

                            @if ($lunches->count() > 0)
                                @foreach ($lunches as $lunch)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ asset($lunch->image) }}" class="glightbox">
                                            <img src="{{ asset($lunch->image) }}" class="menu-img img-fluid"
                                                alt="">
                                        </a>
                                        <h4>{{ $lunch->name }}</h4>
                                        <p class="ingredients"> {{ $lunch->description }} </p>
                                        <p class="price"> ₱{{ $lunch->price }} </p>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <p>Lunch is not available on the menu</p>
                                </div>
                            @endif

                        </div>
                    </div><!-- End Lunch Menu Content -->

                    <div class="tab-pane fade" id="menu-dinner">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Dinner</h3>
                        </div>

                        <div class="row gy-5">

                            @if ($dinners->count() > 0)
                                @foreach ($dinners as $dinner)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ asset($dinner->image) }}" class="glightbox">
                                            <img src="{{ asset($dinner->image) }}" class="menu-img img-fluid"
                                                alt="">
                                        </a>
                                        <h4>{{ $dinner->name }}</h4>
                                        <p class="ingredients"> {{ $dinner->description }} </p>
                                        <p class="price"> ₱{{ $dinner->price }} </p>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <p>Dinner is not available on the menu</p>
                                </div>
                            @endif

                        </div>
                    </div><!-- End Dinner Menu Content -->

                </div>

            </div>

        </section>
        <!-- /Menu Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p>Malabon St.</p>
                        <p>General Trias, Cavite</p>
                        <p></p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact</h4>
                        <p>
                            <strong>Phone:</strong> <span>+63 9973 948 8839</span><br>
                            <strong>Email:</strong> <span>example@gmail.com</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-lunes:</strong> <span>11AM - 5PM</span><br>
                            <strong>Sunday</strong>: <span>Closed</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
