@extends('Website.master')

@section('main')
  <main class="main">

    <section id="hero" class="hero section dark-background">
      <img src="{{ asset('frontend/logis/assets/img/world-dotted-map.png') }}" alt="" class="hero-bg">
      <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up">Your Trusted Global <br><span>Logistics Partner</span></h2>
            <p data-aos="fade-up" data-aos-delay="100">Safe, fast, and reliable courier solutions across Pakistan and 200+ countries worldwide. Experience seamless delivery today.</p>

            <form action="{{ route('user.status') }}" method="POST" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <input type="text" name="tracking_no" class="form-control" placeholder="Enter Tracking ID (e.g. SF-123456)" required>
              <button type="submit" class="btn btn-primary">Track Now</button>
            </form>

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">
              <div class="col-lg-4 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span class="purecounter">2500</span>
                  <p>Daily Shipments</p>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span class="purecounter">500</span>
                  <p>Partner Hubs</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="{{ asset('frontend/logis/assets/img/hero-img.svg') }}" class="img-fluid mb-3 mb-lg-0 animated" alt="Logistics Illustration">
          </div>
        </div>
      </div>
    </section>

    <section id="featured-services" class="featured-services section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-shield-halved"></i></div>
            <div>
              <h4 class="title">Secure Transit</h4>
              <p class="description">Har parcel ki hifazat hamari zimmedari. Advanced security for all your goods.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-bolt"></i></div>
            <div>
              <h4 class="title">Express Delivery</h4>
              <p class="description">Tez-tariin delivery network across Karachi, Lahore, and Islamabad.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-headset"></i></div>
            <div>
              <h4 class="title">24/7 Expert Support</h4>
              <p class="description">Hamari team har waqt aapki shipment guide karne ke liye dastyab hai.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="about section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up">
            <img src="{{ asset('frontend/logis/assets/img/about.jpg') }}" class="img-fluid rounded shadow" alt="About ServiceFlow">
          </div>
          <div class="col-lg-6 content order-last order-lg-first" data-aos="fade-up">
            <h3> Distances with Technology</h3>
            <p>
              ServiceFlow is a state-of-the-art courier management system designed to make logistics simple, transparent, and accessible for everyone.
            </p>
            <ul>
              <li><i class="bi bi-check-all text-primary"></i> <span><strong>Automated Tracking:</strong> Real-time updates at your fingertips.</span></li>

              <li><i class="bi bi-check-all text-primary"></i> <span><strong>Eco-Friendly:</strong> Optimized routes to reduce carbon footprint.</span></li>
            </ul>
            <p class="italic">"We don't just deliver packages; we deliver peace of mind."</p>
            <a href="{{ route('about') }}" class="btn btn-outline-primary mt-3">Learn More About Us</a>
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection