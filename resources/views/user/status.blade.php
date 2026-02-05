@extends('admin.master')

@section('main')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0 text-white">Consignment Tracking</h3>
            </div>
            <div class="col-sm-6 text-end">
                <button onclick="window.print()" class="btn btn-primary no-print">
                    <i class="bi bi-printer"></i> Print Receipt
                </button>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark shadow">
                    <div class="card-header border-secondary text-center py-4">
                        <h3 class="card-title text-white w-100">
                            Tracking Number: <span class="text-warning fw-bold">{{ $details->tracking_no }}</span>
                        </h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover border-secondary">
                                <tbody>
                                    <tr>
                                        <th class="text-white" style="width: 35%;"><i class="bi bi-person-fill me-2"></i>Sender Name</th>
                                        <td class="text-white-50">{{ $details->sender_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-white"><i class="bi bi-person-badge-fill me-2"></i>Receiver Name</th>
                                        <td class="text-white-50">{{ $details->receiver_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-white"><i class="bi bi-geo-alt-fill me-2"></i>Origin City</th>
                                        <td class="text-white-50">{{ $details->from_city }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-white"><i class="bi bi-geo-fill me-2"></i>Destination City</th>
                                        <td class="text-white-50">{{ $details->to_city }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-white"><i class="bi bi-box-seam-fill me-2"></i>Package Weight</th>
                                        <td class="text-white-50">{{ $details->weight }} KG</td>
                                    </tr>
                                    <tr>
                                        <th class="text-white"><i class="bi bi-info-circle-fill me-2"></i>Current Status</th>
                                        <td>
                                            <span class="badge {{ $details->status == 'Delivered' ? 'bg-success' : 'bg-info' }} text-uppercase px-3 py-2">
                                                {{ $details->status }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-white"><i class="bi bi-calendar-check-fill me-2"></i>Booking Date</th>
                                        <td class="text-white-50">{{ $details->created_at->format('d M, Y | h:i A') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer bg-dark border-secondary text-center no-print py-3">
                        <a href="{{ route('user.track') }}" class="btn btn-outline-light px-4">
                           <i class="bi bi-arrow-left me-2"></i> Track Another Shipment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Professional Printing logic */
    @media print {
        body { background: white !important; }
        .text-white, .text-white-50, .card, .bg-dark, .table-dark { 
            color: black !important; 
            background: white !important; 
        }
        .no-print, .app-sidebar, .app-header, .btn, .card-footer { 
            display: none !important; 
        }
        .card { 
            border: 2px solid #000 !important; 
            box-shadow: none !important;
        }
        .table { 
            width: 100% !important; 
            border-collapse: collapse !important;
        }
        th, td { 
            border: 1px solid #ddd !important; 
            padding: 10px !important;
        }
    }
</style>
@endsection