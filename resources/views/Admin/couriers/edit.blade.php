@extends('admin.master')

@section('main')
<div class="app-content">
    <div class="container-fluid">
        <div class="card card-info card-outline mt-4 bg-dark">
            <div class="card-header text-white">
                <h3 class="card-title">Update Courier: {{ $courier->tracking_no }}</h3>
            </div>
            <form action="{{ route('courier.update', $courier->id) }}" method="POST">
                @csrf
                @method('PUT') 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">Sender Name</label>
                            <input type="text" name="sender_name" class="form-control" value="{{ $courier->sender_name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">Receiver Name</label>
                            <input type="text" name="receiver_name" class="form-control" value="{{ $courier->receiver_name }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">Sender Email</label>
                            <input type="email" name="sender_email" class="form-control bg-light text-dark" value="{{ $courier->sender_email }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">Sender Phone</label>
                            <input type="text" name="sender_phone" class="form-control bg-light text-dark" value="{{ $courier->sender_phone }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">From City</label>
                            <select name="from_city" class="form-select">
                                <option value="Karachi" {{ $courier->from_city == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                <option value="Lahore" {{ $courier->from_city == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                <option value="Islamabad" {{ $courier->from_city == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">To City</label>
                            <select name="to_city" class="form-select">
                                <option value="Karachi" {{ $courier->to_city == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                <option value="Lahore" {{ $courier->to_city == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                <option value="Islamabad" {{ $courier->to_city == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                         <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">weight</label>
                            <input type="number" name="weight" class="form-control" value="{{ $courier->weight }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">Price (PKR)</label>
                            <input type="number" name="price" class="form-control" value="{{ $courier->price }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-white fw-bold">Status</label>
                            <select name="status" class="form-select">
                                <option value="Pending" {{ $courier->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Transit" {{ $courier->status == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                                <option value="Delivered" {{ $courier->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer border-top border-secondary">
                    <button type="submit" class="btn btn-info float-end">Update Courier</button>
                    <a href="{{ route('courier.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection