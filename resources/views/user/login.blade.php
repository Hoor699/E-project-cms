@extends('Website.master')

@section('main')
<main class="main">
    <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('frontend/logis/assets/img/page-title-bg.jpg') }}); padding: 80px 0 60px 0;">
        <div class="container position-relative">
            <h1>Staff Authentication</h1>
            <p>Access the Courier Management Dashboard to manage shipments and agents.</p>
        </div>
    </div>

    <section id="login" class="login section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <i class="bi bi-person-circle text-primary" style="font-size: 48px;"></i>
                                <h3 class="fw-bold mt-2">Staff Login</h3>
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                        <input type="email" name="email" class="form-control border-start-0 ps-0" placeholder="name@example.com" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                        <input type="password" name="password" class="form-control border-start-0 ps-0" placeholder="••••••••" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 8px;">
                                    Sign In to Dashboard
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection