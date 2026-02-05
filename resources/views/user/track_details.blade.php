@extends('user.user_master')

@section('main')
<style>
    @media print {
        .no-print, .main-header, .main-sidebar { display: none !important; }
        .content-wrapper { margin-left: 0 !important; }
    }
   
    @media print {
        /* 1. Sidebar ko hide karne ke liye */
        .main-sidebar, 
        .sidebar, 
        .nav-item,
        .app-sidebar,
        aside { 
            display: none !important; 
        }

        /* 2. Header aur Buttons ko hide karne ke liye */
        .main-header, 
        .no-print, 
        .btn, 
        footer { 
            display: none !important; 
        }

        /* 3. Main content ko poore page par phelane ke liye */
        .content-wrapper, 
        .main-content, 
        main { 
            margin-left: 0 !important; 
            padding: 0 !important;
            width: 100% !important;
        }

        /* 4. Background color white karne ke liye */
        body { 
            background-color: white !important; 
        }
    }

</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4 no-print">
                <div class="card-body">
                    <form action="{{ route('user.status') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="tracking_no" class="form-control" placeholder="Enter Tracking Number (e.g. CMS-608968)" required>
                            <button class="btn btn-primary" type="submit">Track Now</button>
                        </div>
                    </form>
                </div>
            </div>

            @if(isset($courier) && $courier != null)
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Shipment Details</h4>
                </div>
                <div class="card-body bg-white text-dark">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h6><strong>Tracking No:</strong></h6>
                            <p class="text-muted">{{ $courier->tracking_no }}</p>
                        </div>
                        <div class="col-6 text-end">
                            <h6><strong>Status:</strong></h6>
                            <span class="badge bg-warning text-dark">{{ $courier->status }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p><strong>Sender:</strong> {{ $courier->sender_name }}</p>
                            <p><strong>From:</strong> {{ $courier->from_city }}</p>
                        </div>
                        <div class="col-6 text-end">
                            <p><strong>Receiver:</strong> {{ $courier->receiver_name }}</p>
                            <p><strong>To:</strong> {{ $courier->to_city }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4 no-print text-center">
                        <button onclick="window.print()" class="btn btn-dark btn-lg">
                            <i class="fas fa-print"></i> Print Receipt
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection