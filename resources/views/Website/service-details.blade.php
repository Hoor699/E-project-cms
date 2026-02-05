@extends('Website.master')

@section('main')
<main class="main">

  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('frontend/logis/assets/img/page-title-bg.jpg') }});">
    <div class="container position-relative">
      <h1>Service Excellence</h1>
      <p>Discover how our comprehensive logistics solutions can empower your business or personal needs.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="current">Service Details</li>
        </ol>
      </nav>
    </div>
  </div>

  <section id="service-details" class="service-details section">
    <div class="container">
      <div class="row gy-4">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="services-list">
            <a href="#" class="active"><i class="bi bi-box-seam me-2"></i>Smart Storage</a>
            <a href="#"><i class="bi bi-truck me-2"></i>Local Logistics</a>
            <a href="#"><i class="bi bi-ship me-2"></i>Global Cargo</a>
            <a href="#"><i class="bi bi-speedometer2 me-2"></i>Express Trucking</a>
            <a href="#"><i class="bi bi-gift me-2"></i>Secure Packaging</a>
          </div>

          <div class="help-box d-flex flex-column justify-content-center align-items-center mt-4 p-4 bg-primary text-white rounded">
            <i class="bi bi-headset fs-1 mb-2"></i>
            <h4>Need Help?</h4>
            <p class="text-center">Contact our 24/7 support for any shipment queries.</p>
            <p class="fw-bold">+92 21 34567890</p>
          </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <img src="{{ asset('frontend/logis/assets/img/services.jpg') }}" alt="Logistics Services" class="img-fluid services-img rounded mb-4">
          
          <h3>End-to-End Logistics & Delivery Solutions</h3>
          <p>
            At <strong>ServiceFlow</strong>, we understand that every shipment is more than just a package—it's a commitment. We specialize in handling everything from small documents to massive industrial cargo with the same level of precision and care.
          </p>
          
          <div class="row my-4">
            <div class="col-md-6">
              <div class="p-3 border rounded shadow-sm h-100">
                <h5><i class="bi bi-shield-check text-primary"></i> Secure Handling</h5>
                <p class="small">Advanced safety protocols to ensure your items reach their destination in perfect condition.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 border rounded shadow-sm h-100">
                <h5><i class="bi bi-clock-history text-primary"></i> On-Time Delivery</h5>
                <p class="small">Our optimized route planning ensures the fastest transit times in the industry.</p>
              </div>
            </div>
          </div>

          <h4>Why Choose Our Expertise?</h4>
          <p>
            Our infrastructure is built to support the growing demands of modern e-commerce and international trade.
          </p>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> <span>Real-time GPS tracking for every shipment.</span></li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> <span>Customized warehousing for short and long-term storage.</span></li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> <span>Multimodal transport: Air, Sea, and Road connectivity.</span></li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> <span>Hassle-free customs documentation for international orders.</span></li>
          </ul>
          
          <p class="mt-4 border-start border-4 border-primary ps-3 italic">
            "We bridge distances and connect businesses globally, ensuring your growth never stops."
          </p>
        </div>

      </div>
    </div>
  </section>
</main>
@endsection