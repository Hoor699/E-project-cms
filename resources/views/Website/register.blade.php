@extends('Website.master')

@section('main')
<main id="main">

  <div class="page-title dark-background" data-aos="fade" style="background-image: url('{{ asset('frontend/logis/assets/img/page-title-bg.jpg') }}'); padding: 80px 0 60px 0;">
    <div class="container position-relative">
      <h1>Register with Logis</h1>
      <p>Create your account to manage and track your shipments in real-time.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="current">Register</li>
        </ol>
      </nav>
    </div>
  </div><section id="contact" class="contact section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg p-4" style="border-radius: 20px;">
            <div class="card-body">
              <div class="text-center mb-4">
                 <i class="bi bi-person-plus-fill text-primary" style="font-size: 3rem;"></i>
                 <h3 class="fw-bold">Join ServiceFlow</h3>
                 <p class="text-muted small">Enter your details below to create your secure account</p>
              </div>

              <form action="{{ route('user.register') }}" method="POST" class="php-email-form-style">
                @csrf
                <div class="row gy-4">

                  <div class="col-md-12">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Ajwa Khan" style="padding: 12px; border-radius: 8px;" required>
                  </div>

                  <div class="col-md-12">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="ajwa@example.com" style="padding: 12px; border-radius: 8px;" required>
                  </div>

                  <div class="col-md-12">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Create a strong password" style="padding: 12px; border-radius: 8px;" required>
                  </div>

                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary w-100 py-3 mt-2" style="background: var(--accent-color); border: 0; border-radius: 50px; font-weight: 600;">
                      Create My Account
                    </button>
                  </div>

                  <div class="col-md-12 text-center mt-3">
                    <p class="mb-0">Already have an account? <a href="{{ route('user.login') }}" class="text-primary fw-bold">Login Here</a></p>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@endsection