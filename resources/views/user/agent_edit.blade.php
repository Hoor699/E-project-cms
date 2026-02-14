@extends('user.user_master')

@section('main')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark text-white border-info shadow-lg">
                <div class="card-header border-info">
                    <h4 class="mb-0 text-info"><i class="bi bi-pencil-square me-2"></i>Update Status</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('agent.courier.update', $courier->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="text-secondary">Tracking Number</label>
                            <h5 class="text-primary">{{ $courier->tracking_no }}</h5>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Delivery Status</label>
                            <select name="status" class="form-select bg-secondary text-white border-0">
                                <option value="pending" {{ $courier->status == 'pending' ? 'selected' : '' }}>PENDING</option>
                                <option value="dispatched" {{ $courier->status == 'dispatched' ? 'selected' : '' }}>DISPATCHED</option>
                                <option value="delivered" {{ $courier->status == 'delivered' ? 'selected' : '' }}>DELIVERED</option>
                                <option value="returned" {{ $courier->status == 'returned' ? 'selected' : '' }}>RETURNED</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-info fw-bold">Save Changes</button>
                            <a href="{{ route('user.customer.list') }}" class="btn btn-link text-muted mt-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection