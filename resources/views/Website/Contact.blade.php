@extends('Website.master')

@section('main')
<main class="main">

  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('frontend/logis/assets/img/page-title-bg.jpg') }});">
    <div class="container position-relative">
      <h1>Contact Us</h1>
      <p>Have questions? Reach out to our global support team for any logistics or tracking inquiries.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="current">Contact</li>
        </ol>
      </nav>
    </div>
  </div>

  <section id="contact" class="contact section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 350px;" 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14478.4116524385!2d67.0681324!3d24.8774028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e97098e9b6f%3A0x6734139e7826359e!2sShahrah-e-Faisal%2C%20Karachi!5e0!3m2!1sen!2spk!4v1700000000000!5m2!1sen!2spk" 
          frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="row gy-4">

        <div class="col-lg-4">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Headquarters</h3>
              <p>Office 402, Business Avenue, Shahrah-e-Faisal, Karachi, Pakistan</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Support</h3>
              <p>+92 21 34567890</p>
              <p>+92 300 1234567</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Inquiries</h3>
              <p>support@serviceflow.com</p>
              <p>info@serviceflow.com</p>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <form action="#" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            @csrf
            <div class="row gy-4">
              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required="">
              </div>

              <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Your Email Address" required="">
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Inquiry Subject (e.g., Tracking Issue)" required="">
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="How can we help you?" required=""></textarea>
              </div>

              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary px-5 py-3">Send Inquiry</button>
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>

  </section>
</main>
@endsection