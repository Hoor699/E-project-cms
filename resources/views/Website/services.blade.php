@extends('Website.master')

@section('main')
<main class="main">
  <div class="page-title dark-background" style="background-image: url({{ asset('frontend/logis/assets/img/page-title-bg.jpg') }});">
    <div class="container text-center" data-aos="fade">
      <h1>Premium Logistics Services</h1>
      <p>Providing world-class delivery solutions across Pakistan and beyond.</p>
    </div>
  </div>

  <section id="services" class="services section">
    <div class="container">
      <div class="row gy-4">
        
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item position-relative">
            <div class="icon"><i class="fa-solid fa-truck-fast"></i></div>
            <h3>Domestic Courier</h3>
            <p>Reliable door-to-door delivery across Karachi, Lahore, Islamabad, and all major cities of Pakistan.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon"><i class="fa-solid fa-plane-departure"></i></div>
            <h3>International Freight</h3>
            <p>Expanding your business globally with our fast and secure international air cargo services.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon"><i class="fa-solid fa-warehouse"></i></div>
            <h3>Smart Warehousing</h3>
            <p>Secure storage solutions for your goods with real-time inventory management and safety.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item position-relative">
            <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
            <h3>Real-Time Tracking</h3>
            <p>Stay updated with our advanced GPS tracking system. Know exactly where your parcel is at all times.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="service-item position-relative">
            <div class="icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
            <h3>COD Services</h3>
            <p>Professional Cash on Delivery services for e-commerce businesses with fast payment cycles.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="service-item position-relative">
            <div class="icon"><i class="fa-solid fa-headset"></i></div>
            <h3>Dedicated Support</h3>
            <p>Our expert team is available 24/7 to assist you with your shipments and logistics queries.</p>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>
@endsection