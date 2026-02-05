@extends('admin.master')

@section('main')
<style>
/* ... (Aapka purana CSS waise hi rahega) ... */
.app-content { overflow-x: hidden !important; width: 100%; }
.table-responsive { display: block; width: 100%; overflow-x: auto !important; }
.table { width: 100% !important; min-width: 900px !important; }
</style>

<div class="app-content">
    <div class="container-fluid">
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3 border-0 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card custom-table-card mt-4"> 
                    <div class="card-header border-bottom">
                        <h3 class="card-title">All Booked Couriers</h3>
                        <div class="card-tools">
                            <a href="{{ route('report.download') }}" class="btn btn-sm btn-info me-2 text-white">
                                <i class="bi bi-download"></i> Download CSV
                            </a>
                            <a href="{{ route('courier.create') }}" class="btn btn-sm btn-success">
                                <i class="bi bi-plus-lg"></i> Add New
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Tracking #</th>
                                        <th>Sender Name</th>
                                        <th>Sender Email</th> <th>Sender Phone</th> <th>Receiver</th>     <th>Route</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th style="width: 150px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td class="fw-bold">
                                            <span class="badge bg-secondary">{{ $courier->tracking_no }}</span>
                                        </td>
                                        <td>{{ $courier->sender_name }}</td>
        
        <td class="text-dark">{{ $courier->sender_email ?? 'No Email' }}</td>
        <td class="text-dark">{{ $courier->sender_phone ?? 'No Phone' }}</td>
        
        <td>{{ $courier->receiver_name }}</td>
                                        <td>
                                            {{ $courier->from_city }} 
                                            <i class="bi bi-arrow-right mx-1 text-primary"></i> 
                                            {{ $courier->to_city }}
                                        </td>
                                        <td class="fw-bold">Rs. {{ number_format($courier->price) }}</td>
                                        <td>
                                            <span class="badge {{ $courier->status == 'Pending' ? 'bg-warning text-dark' : 'bg-success text-white' }}">
                                                {{ $courier->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('courier.edit', $courier->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                
                                                <a href="{{ route('courier.delete', $courier->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                
                                                <a href="{{ route('agent.send_sms', $courier->id) }}" class="btn btn-sm btn-outline-warning" title="Send SMS">
                                                    <i class="bi bi-chat-dots"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection