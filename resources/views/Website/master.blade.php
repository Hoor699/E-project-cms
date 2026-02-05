<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Logis Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
<link href="{{ asset('frontend/logic/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontend/logic/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/logis/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/logis/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/logis/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/logis/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/logis/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/logis/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('frontend/logis/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Logis
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Logis</h1>
      </a>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('services') }}">Services</a></li>
        <li><a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>

        {{-- Authentication Check --}}
        @if(Auth::check())
           
            <li><a href="{{ route('user.logout') }}">Logout</a></li>
        @else
            <li><a href="{{ route('user.login') }}">User Login</a></li>
            <li><a href="{{ route('user.register') }}">Register</a></li>
        @endif

        <li><a href="{{ route('user.track') }}">Track Order</a></li>

        <li class="dropdown">
            <a href="#"><span>More Links</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{ route('about') }}">Our Team</a></li>
                <li><a href="{{ route('pricing') }}">Pricing Plans</a></li>
                <li><a href="{{ route('service.details') }}">Service Details</a></li>
            </ul>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

<a class="btn-getstarted" href="{{ route('quote') }}">Book Shipment</a>

    </div>
  </header>
  @yield('main')
  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <span class="sitename">ServiceFlow</span>
          </a>
          <p>ServiceFlow is your premier partner for domestic and international logistics. We bridge the gap between businesses and customers with secure, fast, and reliable delivery solutions tailored to your needs.</p>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About us</a></li>
            <li><a href="#">Track Shipment</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Domestic Courier</a></li>
            <li><a href="#">International Shipping</a></li>
            <li><a href="#">Cargo Services</a></li>
            <li><a href="#">Warehousing</a></li>
            <li><a href="#">Door-to-Door Delivery</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>Main Shahrah-e-Faisal</p>
          <p>Karachi, Pakistan</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+92 3XX XXXXXXX</span></p>
          <p><strong>Email:</strong> <span>support@serviceflow.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">ServiceFlow</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Developed for <a href="#">Academic Seminar 2026</a>
      </div>
    </div>

</footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
<script src="{{ asset('frontend/logis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/logis/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('frontend/logis/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/logis/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontend/logis/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/logis/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Main JS File -->
  <script src="{{ asset('frontend/logis/assets/js/main.js') }}"></script>



</body>

</html>