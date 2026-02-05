@extends('Website.master')

@section('main')
<main class="main">

  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('frontend/logis/assets/img/page-title-bg.jpg') }});">
    <div class="container position-relative">
      <h1>Service Plans & Pricing</h1>
      <p>Transparent pricing tailored for individual shippers and large scale businesses.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="current">Pricing</li>
        </ol>
      </nav>
    </div>
  </div>

  <section id="pricing" class="pricing section">

    <div class="container section-title" data-aos="fade-up">
      <span>Our Rates</span>
      <h2>Affordable Pricing Plans</h2>
      <p>Choose the best plan that fits your delivery requirements across Pakistan and Globally.</p>
    </div>

    <div class="container">
      <div class="row gy-4">

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-item">
            <h3>Standard Delivery</h3>
            <h4><sup>Rs.</sup>250<span> / shipment</span></h4>
            <ul>
              <li><i class="bi bi-check"></i> <span>Delivery within 3-5 Days</span></li>
              <li><i class="bi bi-check"></i> <span>Basic Real-time Tracking</span></li>
              <li><i class="bi bi-check"></i> <span>Up to 1kg Weight</span></li>
              <li class="na"><i class="bi bi-x"></i> <span>Insurance Coverage</span></li>
              <li class="na"><i class="bi bi-x"></i> <span>Overnight Shipping</span></li>
            </ul>
            <a href="#" class="buy-btn">Book Now</a>
          </div>
        </div>

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="pricing-item featured">
            <h3>Corporate / COD</h3>
            <h4><sup>Rs.</sup>450<span> / shipment</span></h4>
            <ul>
              <li><i class="bi bi-check"></i> <span>Next Day Delivery</span></li>
              <li><i class="bi bi-check"></i> <span>Cash on Delivery (COD)</span></li>
              <li><i class="bi bi-check"></i> <span>Priority Customer Support</span></li>
              <li><i class="bi bi-check"></i> <span>Bulk Shipment Discount</span></li>
              <li><i class="bi bi-check"></i> <span>Special Dashboard Access</span></li>
            </ul>
            <a href="#" class="buy-btn">Get Started</a>
          </div>
        </div>

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="pricing-item">
            <h3>International</h3>
            <h4><sup>Rs.</sup>4500<span> / starting</span></h4>
            <ul>
              <li><i class="bi bi-check"></i> <span>Global Reach (200+ Countries)</span></li>
              <li><i class="bi bi-check"></i> <span>Fastest Air Freight</span></li>
              <li><i class="bi bi-check"></i> <span>Custom Clearance Support</span></li>
              <li><i class="bi bi-check"></i> <span>Full Insurance Coverage</span></li>
              <li><i class="bi bi-check"></i> <span>Premium Door-to-Door Service</span></li>
            </ul>
            <a href="#" class="buy-btn">Contact Sales</a>
          </div>
        </div>

      </div>
    </div>

  </section>
</main>
@endsection