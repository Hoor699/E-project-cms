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
                    <button onclick="generatePrintWindow()" class="btn btn-dark btn-lg">
    <i class="fas fa-print"></i> Generate & Print Receipt
</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
  function generatePrintWindow() {
    // Pehle data ko variables mein save karlo
    var trackingNo = "{{ $courier->tracking_no }}";
    var sender = "{{ $courier->sender_name }}";
    var receiver = "{{ $courier->receiver_name }}";
    var weight = "{{ $courier->weight }}";
    var status = "{{ $courier->status }}";
    var totalPrice = "{{ $courier->total_price }}"; // <--- Main check yahan hai

    var printWindow = window.open('', '_blank', 'height=600,width=800');

    var receiptContent = `
        <html>
        <head>
            <title>Print Receipt</title>
            <style>
                body { font-family: 'Courier New', monospace; padding: 20px; text-align: left; }
                .receipt-header { text-align: center; border-bottom: 2px dashed #000; padding-bottom: 10px; }
                .total { font-size: 22px; font-weight: bold; margin-top: 20px; border-top: 1px solid #000; padding-top: 10px; }
            </style>
        </head>
        <body>
            <div class="receipt-header">
                <h1>COURIER RECEIPT</h1>
                <p>Tracking ID: <strong>${trackingNo}</strong></p>
            </div>
            <div style="margin-top:20px;">
                <p><strong>Sender:</strong> ${sender}</p>
                <p><strong>Receiver:</strong> ${receiver}</p>
                <p><strong>Weight:</strong> ${weight} KG</p>
                <p><strong>Status:</strong> ${status}</p>
            </div>
            <div class="total">
                Total Amount: Rs. ${totalPrice}
            </div>
            <p style="text-align:center; margin-top:40px;">--- Thank You ---</p>
        </body>
        </html>
    `;

    printWindow.document.write(receiptContent);
    printWindow.document.close();
    
    printWindow.onload = function() {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    };
}
</script>
@endsection