@extends('admin.master')

@section('main')
<style>
    /* Background and Card Styling */
    .content-wrapper { background-color: #0f172a !important; }
    
    .custom-table-card {
        background-color: #ffffff !important;
        border-radius: 15px !important;
        border: none !important;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        overflow: hidden;
    }

    .custom-table-card .card-header {
        background-color: #ffffff !important;
        border-bottom: 1px solid #f1f5f9 !important;
        padding: 20px !important;
    }

    .custom-table-card .card-title {
        color: #1e293b !important;
        font-weight: 700 !important;
        font-size: 1.25rem;
    }

    /* Table Styling */
    .table thead th {
        background-color: #f8f9fa !important;
        color: #475569 !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        padding: 15px !important;
        border: none !important;
    }

    .table tbody td {
        color: #1e293b !important; /* Pure Black Text */
        font-weight: 500;
        vertical-align: middle;
        padding: 15px !important;
        border-color: #f1f5f9 !important;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(59, 130, 246, 0.04) !important;
    }

    /* Delete Button Styling */
    .btn-delete {
        border-radius: 6px !important;
        font-weight: 600;
        transition: all 0.2s;
        border: 1px solid #fee2e2 !important;
        color: #dc2626 !important;
        background: #fef2f2 !important;
    }

    .btn-delete:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }
</style>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12">
            <div class="card custom-table-card shadow-lg"> 
                <div class="card-header">
                    <h3 class="card-title m-0">Customer Database</h3>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address / City</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <td class="fw-bold">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; border: 1px solid #e2e8f0;">
                                                <i class="bi bi-person text-primary"></i>
                                            </div>
                                            {{ $customer->name }}
                                        </div>
                                    </td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>{{ $customer->address }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('customer.delete', $customer->id) }}" 
                                           class="btn btn-sm btn-delete px-3" 
                                           onclick="return confirm('Are you sure you want to delete this customer?')">
                                            <i class="bi bi-trash3 me-1"></i> Delete
                                        </a>
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
@endsection