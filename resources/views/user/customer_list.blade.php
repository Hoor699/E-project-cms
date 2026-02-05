@extends('user.user_master')

@section('main')
<div class="container-fluid pt-4">
    <div class="card bg-dark text-white border-secondary shadow-lg">
        <div class="card-header border-secondary d-flex justify-content-between align-items-center">
            <h3 class="card-title text-info"><i class="bi bi-box-seam me-2"></i> My Courier History</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr class="text-secondary">
                            <th>Tracking No</th>
                            <th>Receiver</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                        <tr>
                            <td class="fw-bold text-primary">{{ $customer->tracking_no }}</td>
                            <td>{{ $customer->receiver_name }}</td>
                            <td>{{ $customer->to_city }}</td>
                            <td>
                                <span class="badge {{ $customer->status == 'delivered' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ strtoupper($customer->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('user.track.details', $customer->tracking_no) }}" class="btn btn-sm btn-outline-info">
                                    <i class="bi bi-printer-fill"></i> View & Print
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No records found for your account.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection