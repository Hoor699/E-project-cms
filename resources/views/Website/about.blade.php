@extends('Website.master')

@section('main')
<main class="main">

  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('frontend/logis/assets/img/page-title-bg.jpg') }});">
    <div class="container position-relative">
      <h1>About Our Journey</h1>
      <p>Redefining logistics with speed, safety, and global connectivity.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="current">About</li>
        </ol>
      </nav>
    </div>
  </div>

  <section id="about" class="about section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200">
          <img src="{{ asset('frontend/logis/assets/img/about.jpg') }}" class="img-fluid" alt="About ServiceFlow">
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
        </div>
        <div class="col-lg-6 content order-last order-lg-first" data-aos="fade-up" data-aos-delay="100">
          <h3>OUR BUISNESS GOAL</h3>
          <p>
            ServiceFlow Logistics is a name built on trust and excellence. We don't just move packages; we deliver your promises across borders with utmost care.
          </p>
          <ul>
            <li>
              <i class="bi bi-patch-check"></i>
              <div>
                <h5>A Legacy of Trust</h5>
                <p>We provide a 100% secure and transparent platform for your shipments. Experience our premium service once, and we guarantee your satisfaction.</p>
              </div>
            </li>
            <li>
              <i class="bi bi-globe"></i>
              <div>
                <h5>city</h5>
                <p>While we have a strong presence in <b>Karachi, Lahore, and Islamabad</b>, </p>
              </div>
            </li>
            <li>
              <i class="bi bi-shield-lock"></i>
              <div>
                <h5>Secure & Fast Delivery</h5>
                <p>Our optimized network ensures that your parcels reach their destination in the shortest possible time with real-time tracking.</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  

  <section id="stats" class="stats section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4 text-center">
        <div class="col-lg-4 col-md-6">
          <div class="stats-item w-100 h-100">
            <span class="purecounter" data-purecounter-start="0" data-purecounter-end="2500" data-purecounter-duration="1"></span>
            <p>Global Shipments</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="stats-item w-100 h-100">
            <span class="purecounter" data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"></span>
            <p>Covered Cities</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="stats-item w-100 h-100">
            <span class="purecounter" data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"></span>
            <p>Hours Expert Support</p>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection