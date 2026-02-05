@extends('Website.master')

@section('main')
<main class="main">
  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('frontend/logis/assets/img/page-title-bg.jpg') }});">
    <div class="container position-relative">
      <h1>Book Your Shipment</h1>
      <p>Fill in the details below to schedule your pickup and delivery instantly.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="current">Book Now</li>
        </ol>
      </nav>
    </div>
  </div>

  <section id="get-a-quote" class="get-a-quote section">
    <div class="container">
      <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-5 quote-bg d-flex align-items-end" style="background-image: url({{ asset('frontend/logis/assets/img/quote-bg.jpg') }});">
            <div class="p-4 text-white bg-dark bg-opacity-50 w-100">
                <h4>Why Book With Us?</h4>
                <p><i class="bi bi-check2-circle text-primary"></i> Guaranteed On-Time Delivery</p>
                <p><i class="bi bi-check2-circle text-primary"></i> 24/7 Real-Time Tracking</p>
                <p><i class="bi bi-check2-circle text-primary"></i> Professional Parcel Handling</p>
            </div>
        </div>

        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
          @if(session('success'))
            <div class="alert alert-success m-4 shadow-sm border-0">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
          @endif

          <form action="{{ route('web.courier.store') }}" method="post" class="p-4 p-md-5 shadow bg-white border-top border-primary border-4">
            @csrf
            <h3 class="fw-bold">Shipment Details</h3>
            <p class="text-muted">Enter parcel information for an accurate delivery schedule.</p>

            <div class="row gy-4">
              <div class="col-md-6">
                <label class="form-label fw-bold">Departure City</label>
                <input type="text" name="from_city" class="form-control" placeholder="City of Origin" required>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-bold">Delivery City</label>
                <input type="text" name="to_city" class="form-control" placeholder="Destination City" required>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-bold">Total Weight (kg)</label>
                <input type="number" name="weight" class="form-control" placeholder="Weight in kg" required>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-bold">Receiver Name</label>
                <input type="text" name="receiver_name" class="form-control" placeholder="Who is receiving?" required>
              </div>

              <div class="col-lg-12 border-top pt-4">
                <h4 class="fw-bold">Sender Information</h4>
              </div>

              <div class="col-md-12">
                <input type="text" name="sender_name" class="form-control" placeholder="Your Full Name" required>
              </div>

              <div class="col-md-6">
                <input type="email" class="form-control" name="sender_email" placeholder="Email Address" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="sender_phone" placeholder="Mobile Number (03xx...)" required>
              </div>

              <div class="col-12">
                <textarea class="form-control" name="message" rows="3" placeholder="Additional instructions (Optional)"></textarea>
              </div>

              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">Confirm & Generate Tracking ID</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection