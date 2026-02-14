@extends('user.user_master')

@section('main')
<div class="container-fluid pt-4">
    <div class="card bg-dark text-white border-secondary shadow-lg">
        <div class="card-header border-secondary d-flex justify-content-between align-items-center">
            <h3 class="card-title text-info">
                <i class="bi bi-box-seam me-2"></i> 
                {{ Auth::user()->role == 'agent' ? 'Agent Delivery Portal' : 'My Courier History' }}
            </h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr class="text-secondary">
                            {{-- Role wise columns --}}
                            @if(Auth::user()->role == 'user')
                                <th>Tracking No</th>
                            @endif
                            <th>Receiver</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                        <tr>
                            @if(Auth::user()->role == 'user')
                                <td class="fw-bold text-primary">{{ $customer->tracking_no }}</td>
                            @endif
                            
                            <td>{{ $customer->receiver_name }}</td>
                            <td>{{ $customer->to_city }}</td>
                            <td>
                                <span class="badge {{ $customer->status == 'delivered' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ strtoupper($customer->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('user.track.details', $customer->tracking_no) }}" class="btn btn-sm btn-outline-info">
                                    <i class="bi bi-printer-fill"></i> View
                                </a>

                                @if(Auth::user()->role == 'agent')
                                    <a href="{{ route('agent.courier.edit', $customer->id) }}" class="btn btn-sm btn-info ms-1">
                                        <i class="bi bi-pencil"></i> Update
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection